<?php

namespace App\Http\Controllers;

use App\Models\BasicExtended;
use App\Models\User\Language;
use App\Models\User\BasicSetting;
use App\Models\User\PageHeading;
use App\Http\Helpers\MegaMailer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Config;
use App\Models\User\Language as UserLanguage;
use Carbon\Carbon;

use App\Models\Ecommerce\UserItem;
use App\Models\Ecommerce\UserOrder;
use App\Models\Ecommerce\UserOrderItem;
use App\Models\Ecommerce\UserItemContent;
use App\Models\Ecommerce\UserItemVariation;
use App\Models\Ecommerce\UserShippingCharge;

use App\Models\User\OfflineGateway as UserOfflineGateway;
use Illuminate\Support\Facades\Auth;
use PDF;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getUserCurrentLanguage($userId)
    {
        // get the current locale of this system
        if (Session::has('user_lang')) {
            $locale = Session::get('user_lang');
        }
        if (empty($locale)) {
            $language = Language::query()->where('is_default', 1)->where('user_id', $userId)->firstOrFail();
        } else {
            $language = Language::query()->where('code', $locale)->where('user_id', $userId)->firstOrFail();
        }
        return $language;
    }

    public function getUserPageHeading($language, $userId)
    {
         $pageHeading =null;
        if (URL::current() == Route::is('front.user.courses')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('courses_page_title')->first();
        } else if (URL::current() == Route::is('front.user.course.details')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('course_details_page_title')->first();
        } else if (URL::current() == Route::is('front.user.instructors')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('instructors_page_title')->first();
        } else if (URL::current() == Route::is('front.user.blogs')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('blog_page_title')->first();
        } else if (URL::current() == Route::is('front.user.blog_details')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('blog_details_page_title')->first();
        } else if (URL::current() == Route::is('front.user.faq')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('faq_page_title')->first();
        } else if (URL::current() == Route::is('front.user.contact')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('contact_page_title')->first();
        } else if (URL::current() == Route::is('customer.login')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('login_page_title')->first();
        } else if (URL::current() == Route::is('customer.forget_password')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('forget_password_page_title')->first();
        } else if (URL::current() == Route::is('customer.signup')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('signup_page_title')->first();
        }else if(URL::current() == Route::is('front.user.shop')){
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('shop_page_title')->first();
        } else if (URL::current() == Route::is('front.user.item_details')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('shop_details_page_title')->first();
        } else if (URL::current() == Route::is('front.user.cart')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('cart_page_title')->first();
        } else if (URL::current() == Route::is('front.user.checkout')) {
            $pageHeading = PageHeading::query()->where('language_id', $language->id)->where('user_id', $userId)->select('checkout_page_title')->first();
        }

        return $pageHeading;
    }

    public function getUserCurrencyInfo($userId)
    {
        return BasicSetting::query()
            ->where('user_id', $userId)
            ->select(
                'base_currency_symbol',
                'base_currency_symbol_position',
                'base_currency_text',
                'base_currency_text_position',
                'base_currency_rate'
            )->first();

    }

    public function getUserBreadcrumb($userId)
    {
        return BasicSetting::query()->where('user_id', $userId)->select('breadcrumb')->first();
    }

    public function sendMailWithPhpMailer($request, $file_name, $be, $subject, $body, $email, $name)
    {
        $mail = new PHPMailer(true);
        if ($be->is_smtp == 1) {
            try {
                $mail->isSMTP();
                $mail->Host = $be->smtp_host;
                $mail->SMTPAuth = true;
                $mail->Username = $be->smtp_username;
                $mail->Password = $be->smtp_password;
                $mail->SMTPSecure = $be->encryption;
                $mail->Port = $be->smtp_port;
                $mail->setFrom($be->from_mail, $be->from_name);
                $mail->addAddress($email, $name);
                if ($file_name) {
                    $mail->addAttachment(public_path('assets/front/invoices/' . $file_name));
                }
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->send();
                if ($file_name) {
                    @unlink(public_path('assets/front/invoices/' . $file_name));
                }
            } catch (Exception $e) {
                session()->flash('error', $e->getMessage());
                return back();
            }
        } else {
            try {
                $mail->setFrom($be->from_mail, $be->from_name);
                $mail->addAddress($email, $name);
                if ($file_name) {
                    $mail->addAttachment(public_path('assets/front/invoices/' . $file_name));
                }
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->send();
                if ($file_name) {
                    @unlink(public_path('assets/front/invoices/' . $file_name));
                }
            } catch (Exception $e) {
                session()->flash('error', $e->getMessage());
                return back();
            }
        }
    }

    public function makeInvoice($request, $key, $member, $password, $amount, $payment_method, $phone, $base_currency_symbol_position, $base_currency_symbol, $base_currency_text, $order_id, $package_title, $membership)
    {
        $file_name = uniqid($key) . ".pdf";
        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])->loadView('pdf.membership', compact('request', 'member', 'password', 'amount', 'payment_method', 'phone', 'base_currency_symbol_position', 'base_currency_symbol', 'base_currency_text', 'order_id', 'package_title', 'membership'));
        $output = $pdf->output();
        @mkdir(public_path('assets/front/invoices/'), 0775, true);
        file_put_contents(public_path('assets/front/invoices/' . $file_name), $output);
        return $file_name;
    }

    public function resetPasswordMail($email, $name, $subject, $body)
    {
        $be = BasicExtended::first();

        $mail = new PHPMailer(true);
        if ($be->is_smtp == 1) {
            try {
                $mail->isSMTP();
                $mail->Host = $be->smtp_host;
                $mail->SMTPAuth = true;
                $mail->Username = $be->smtp_username;
                $mail->Password = $be->smtp_password;
                $mail->SMTPSecure = $be->encryption;
                $mail->Port = $be->smtp_port;
                $mail->setFrom($be->from_mail, $be->from_name);
                $mail->addAddress($email, $name);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->send();
            } catch (Exception $e) {
                session()->flash('error', $e->getMessage());
                return back();
            }
        } else {
            try {
                $mail->setFrom($be->from_mail, $be->from_name);
                $mail->addAddress($email, $name);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->send();
            } catch (Exception $e) {
                session()->flash('error', $e->getMessage());
                return back();
            }
        }
    }

    // items checkout
    public function orderTotal($shipping)
    {
        if ($shipping != 0) {
            $shipping = UserShippingCharge::findOrFail($shipping);
            $shippig_charge = (int)$shipping->charge;
        } else {
            $shippig_charge = 0;
        }
        $total = (cartTotal() - coupon()) + $shippig_charge + tax();
        return round($total, 2);
    }
    public function orderValidation($request, $gtype = 'online')
    {
        $rules = [
            'billing_fname' => 'required',
            'billing_lname' => 'required',
            'billing_address' => 'required',
            'billing_city' => 'required',
            'billing_country' => 'required',
            'billing_number' => 'required',
            'billing_email' => 'required',
            'shpping_fname' => 'required',
            'shpping_lname' => 'required',
            'shpping_address' => 'required',
            'shpping_city' => 'required',
            'shpping_country' => 'required',
            'shpping_number' => 'required',
            'shpping_email' => 'required',
            'shpping_state' => 'required',
            'billing_state' => 'required',
        ];

        if ($gtype == 'offline') {
            $gateway = UserOfflineGateway::find($request->method);
            if ($gateway->is_receipt == 1) {
                $rules['receipt'] = [
                    'required',
                    function ($attribute, $value, $fail) use ($request) {
                        $ext = $request->file('receipt')->getClientOriginalExtension();
                        if (!in_array($ext, array('jpg', 'png', 'jpeg'))) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    },
                ];
            }
        }

        $request->validate($rules);
    }


    public function saveOrder($request, $txnId, $chargeId, $paymentStatus = 'Pending')
    {
        $total = $this->orderTotal($request["shipping_charge"] ?? 0);


        if ((int)$request['shipping_charge'] != 0) {
            $shipping = UserShippingCharge::findOrFail($request['shipping_charge']);
            $shippig_charge = $shipping->charge;
            $shipping_method = $shipping->title;
        } else {
            $shippig_charge = 0;
            $shipping_method = NULL;
        }

        $user = getUser();
        $userBs = BasicSetting::where('user_id', $user->id)->first();
        $order = new UserOrder();

        $order->user_id = $user->id;
        $order->customer_id = Auth::guard('customer')->user()->id;
        $order->billing_fname = $request['billing_fname'];
        $order->billing_lname = $request['billing_lname'];
        $order->billing_email = $request['billing_email'];
        $order->billing_address = $request['billing_address'];
        $order->billing_city = $request['billing_city'];
        $order->billing_country = $request['billing_country'];
        $order->billing_number = $request['billing_number'];
        $order->shpping_fname = $request['shpping_fname'];
        $order->shpping_lname = $request['shpping_lname'];
        $order->shpping_email = $request['shpping_email'];
        $order->shpping_address = $request['shpping_address'];
        $order->shpping_city = $request['shpping_city'];
        $order->shpping_country = $request['shpping_country'];
        $order->shpping_number = $request['shpping_number'];
        $order->order_status = 'Pending';
        $order->gateway_type = $request['mode'];

        $order->cart_total = cartTotal();
        $order->tax = tax();
        $order->discount = coupon();
        $order->total = $total;
        $order->shipping_method = $shipping_method;
        $order->shipping_charge = round($shippig_charge, 2);
        if ($request['mode'] == 'online') {
            $order->method = $request['payment_method'];
        } elseif ($request['mode'] == 'offline') {
            $gateway = UserOfflineGateway::where('name', $request['payment_method'])->where('user_id', getUser()->id)->first();

            $order->method = $gateway->name;
            if ($request->hasFile('receipt')) {
                // store the receipt in folder & database
                $receipt = uniqid() . '.' . $request->file('receipt')->getClientOriginalExtension();
                $request->file('receipt')->move(public_path('assets/front/receipt/'), $receipt);
                $order->receipt = $receipt;
            } else {
                $order->receipt = NULL;
            }
        }
        $order->currency_code = $userBs->base_currency_text;
        $order['order_number'] = \Str::random(4) . time();
        $order['payment_status'] = $paymentStatus;
        $order['txnid'] = $txnId;
        $order['charge_id'] = $chargeId;
        $order->save();
        return $order;
    }


    public function saveOrderedItems($orderId)
    {
        $user = getUser();

        $bs = BasicSetting::where('user_id', $user->id)->first();
        Config::set('app.timezone', $bs->timezoneinfo->timezone);

        $cart = Session::get('cart');
        $items = [];
        $qty = [];
        $total = [];
        $variations = [];

        foreach ($cart as $id => $crtitm) {
            $qty[] = $crtitm['qty'];
            $total[] = $crtitm['total'];
            $product_price[] = $crtitm['product_price'];
            $variations[] = json_encode($crtitm['variations']);
            $items[] = UserItem::findOrFail($crtitm['id']);
        }


        if (session()->has('user_lang')) {
            $userCurrentLang = UserLanguage::where('code', session()->get('user_lang'))->where('user_id', $user->id)->firstOrFail();
            if (empty($userCurrentLang)) {
                $userCurrentLang = UserLanguage::where('is_default', 1)->where('user_id', $user->id)->firstOrFail();
                session()->put('user_lang', $userCurrentLang->code);
            }
        } else {
            $userCurrentLang = UserLanguage::where('is_default', 1)->where('user_id', $user->id)->firstOrFail();
        }
        foreach ($items as $key => $item) {
            $itemcontent = UserItemContent::where('item_id', $item->id)->where('language_id', $userCurrentLang->id)->first();
            $v_total = 0;
            if ($item->type == 'physical') {
                $orderderd_variations = json_decode($variations[$key]);
                // if variation present minus the quantity for all languages
                if ($orderderd_variations) {

                    foreach ($orderderd_variations as $vkey => $value) {
                        $db_variation = UserItemVariation::where('variant_name', $vkey)->where('item_id', $itemcontent->item_id)->where('language_id', $userCurrentLang->id)->first();
                        $db_variations_all_languages = UserItemVariation::where('item_id', $itemcontent->item_id)->where('indx', $db_variation->indx)->get();
                        $db_op_name = json_decode($db_variation->option_name);
                        $db_op_stock = [];
                        $okey  = array_search($value->name, $db_op_name);
                        foreach ($db_variations_all_languages as $allvkey => $allVval) {
                            $db_op_stock = json_decode($allVval->option_stock);
                            $db_op_stock[$okey] = $db_op_stock[$okey] - $qty[$key];
                            $allVval->option_stock = json_encode($db_op_stock);
                            $allVval->save();
                        }
                        $v_total += $value->price;
                    }
                } else {
                    foreach ($cart as $id => $proId) {
                        $product = UserItem::findOrFail($proId['id']);
                        if ($product->id == $item->id && $product->type == 'physical') {
                            $stock = $product->stock - $proId['qty'];
                            $product->stock = $stock;
                            $product->save();
                        }
                    }
                }
            }
            UserOrderItem::insert([
                'user_order_id' => $orderId,
                'customer_id' => Auth::guard('customer')->user()->id,
                'item_id' => $item->id,
                'title' => $itemcontent->title ?? '',
                'sku' => $item->sku,
                'qty' => $qty[$key],
                'variations' => $variations[$key],
                'category' => $itemcontent->category_id,
                'price' =>  $variations[$key] ? $total[$key] - $v_total * $qty[$key] : $product_price[$key] * $qty[$key],
                'previous_price' => $item->previous_price,
                'image' => $item->thumbnail,
                'summary' => $itemcontent->summary ?? '',
                'description' => $itemcontent->description ?? '',
                'created_at' => Carbon::now()
            ]);
        }
    }

    public function sendMails($order)
    {
        $user = getUser();
        $data['userBs'] = BasicSetting::where('user_id', $user->id)->first();
        $fileName = \Str::random(4) . time() . '.pdf';
        $path = public_path('assets/front/invoices/' . $fileName);
        $order['tax'] = tax();
        $order['discount'] = Session::get('user_coupon');
        // $var = (array)json_decode($order->orderitems[0]->variations);
        // dd($data['order']->billing_fname);
        UserOrder::where('id', $order->id)->update([
            'invoice_number' => $fileName
        ]);
        $order['invoice_number']  = $fileName;
        $data['order']  = $order;
        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])->loadView('pdf.item', $data)->save($path);
        // Send Mail to Buyer
        $mailer = new MegaMailer;
        $data = [
            'toMail' => $order->billing_email,
            'toName' => $order->billing_fname,
            'attachment' => $fileName,
            'customer_name' => $order->billing_fname,
            'order_number' => $order->order_number,
            'order_link' => !empty($order->customer_id) ? "<strong>Order Details:</strong> <a href='" . route('customer.orders-details', ['id' => $order->id, getParam()]) . "'>" . route('customer.orders-details', ['id' => $order->id, getParam()]) . "</a>" : "",
            'website_title' => $data['userBs']->website_title,
            'templateType' => 'product_order',
            'type' => 'productOrder',
            'billing_lname' => $order->billing_lname,
            'billing_address' => $order->billing_address,
            'billing_city' => $order->billing_city,
            'billing_country' => $order->billing_country,
            'billing_number' => $order->billing_number,
            'shpping_fname' => $order->shpping_fname,
            'shpping_lname' => $order->shpping_lname,
            'shpping_address' => $order->shpping_address,
            'shpping_city' => $order->shpping_city,
            'shpping_country' => $order->shpping_country,
            'shpping_number' => $order->shpping_number,
        ];
        $mailer->mailFromTenant($data);
        Session::forget('cart');
        Session::forget('user_coupon');
    }
}
