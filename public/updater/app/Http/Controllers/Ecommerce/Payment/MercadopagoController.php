<?php

namespace App\Http\Controllers\Ecommerce\Payment;


use Carbon\Carbon;
use App\Models\Package;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Helpers\MegaMailer;
use App\Models\User\UserPackage;
use App\Models\User\BasicSetting;
use App\Http\Controllers\Controller;
use App\Models\User\PaymentGateway as UserPaymentGeteway;
use Illuminate\Support\Facades\Session;
use App\Http\Helpers\UserPermissionHelper;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\UserCheckoutController;

class MercadopagoController extends Controller
{
    private $access_token;
    private $sandbox;

    public function __construct()
    {
        $data = UserPaymentGeteway::whereKeyword('mercadopago')->where('user_id',  getUser()->id)->first();
        $paydata = $data->convertAutoData();
        $this->access_token = $paydata['token'];
        $this->sandbox = $paydata['sandbox_check'];
    }

    public function paymentProcess(Request $request, $_amount, $_success_url, $_cancel_url, $email, $_title, $_description, $bex)
    {
        $return_url = $_success_url;
        $cancel_url = $_cancel_url;
        $notify_url = $_success_url;

        $curl = curl_init();
        $preferenceData = [
            'items' => [
                [
                    'id' => uniqid("mercadopago-"),
                    'title' => $_title,
                    'description' => $_description,
                    'quantity' => 1,
                    'currency_id' => "BRL", //unfortunately mercadopago only support BRL currency
                    'unit_price' => round($_amount, 2), //5.53 BRL = 1 USD
                ]
            ],
            'payer' => [
                'email' => $email,
            ],
            'back_urls' => [
                'success' => $return_url,
                'pending' => '',
                'failure' => $cancel_url,
            ],
            'notification_url' => $notify_url,
            'auto_return' => 'approved',

        ];

        $httpHeader = [
            "Content-Type: application/json",
        ];
        $url = "https://api.mercadopago.com/checkout/preferences?access_token=" . $this->access_token;
        $opts = [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($preferenceData, true),
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => $httpHeader
        ];

        curl_setopt_array($curl, $opts);
        $response = curl_exec($curl);
        $payment = json_decode($response, true);
        $err = curl_error($curl);
        curl_close($curl);


        Session::put('user_request', $request->all());
        Session::put('user_success_url', $_success_url);
        Session::put('user_cancel_url', $_cancel_url);

        if ($this->sandbox == 1) {
            return redirect($payment['sandbox_init_point']);
        } else {
            return redirect($payment['init_point']);
        }
    }

    public function curlCalls($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $paymentData = curl_exec($ch);
        curl_close($ch);
        return $paymentData;
    }

    public function paycancle()
    {
        return redirect()->back()->with('error', 'Payment Cancelled.');
    }

    public function payreturn()
    {
        if (Session::has('tempcart')) {
            $oldCart = Session::get('tempcart');
            $tempcart = new Cart($oldCart);
            $order = Session::get('temporder');
        } else {
            $tempcart = '';
            return redirect()->back();
        }

        return view('front.success', compact('tempcart', 'order'));
    }

    public function successPayment(Request $request)
    {
        $requestData = Session::get('user_request');
        // dd($requestData);
        $user  = getUser();
        $bs = BasicSetting::where('user_id', $user->id)->firstorFail();

        $success_url = Session::get('user_success_url');
        $cancel_url = Session::get('user_cancel_url');

        if (!isset($request['payment_id']))
          {
             return redirect($cancel_url);
          }

        $paymentUrl = "https://api.mercadopago.com/v1/payments/" . $request['payment_id']. "?access_token=" . $this->access_token;
        $paymentData = $this->curlCalls($paymentUrl);
        $payment = json_decode($paymentData, true);

        if ($payment['status'] == 'approved') {
            $txnId = UserPermissionHelper::uniqidReal(8);
            $chargeId = $request->paymentId;
            $order = $this->saveOrder($requestData, $txnId, $chargeId, 'Completed');
            $order_id = $order->id;
            $this->saveOrderedItems($order_id);
            $this->sendMails($order);
            session()->flash('success', __('successful_payment'));
            Session::forget('user_request');
            Session::forget('user_amount');
            Session::forget('user_paypal_payment_id');
            return redirect()->route('customer.success.page', getParam());
        }

        return redirect($cancel_url);
    }

    public function cancelPayment()
    {

        $message = request()->query('message') ? request()->query('message') :'Payment gateway something went Problem';
        session()->put('payment_error_message', $message);
        session()->flash('warning', __('cancel_payment'));
        return redirect()->route('payment.error.page', getParam());
    }
}
