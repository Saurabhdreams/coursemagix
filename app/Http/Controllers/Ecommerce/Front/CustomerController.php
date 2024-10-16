<?php

namespace App\Http\Controllers\Ecommerce\Front;

use App\Http\Controllers\Controller;
use App\Models\Ecommerce\CustomerWishList;
use App\Models\Ecommerce\UserOrder;
use App\Models\Ecommerce\UserShopSetting;
use App\Models\User\Language;
use App\Models\User\OfflineGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function myOrders(Request $request, $domain)
    {
        $user = getUser();
        $data['bgImg'] = $this->getUserBreadcrumb($user->id);
        $userShop = UserShopSetting::where('user_id', $user->id)->first();
        if (!empty($userShop) && ($userShop->is_shop == 0 || $userShop->catalog_mode == 1)) {
            return back();
        }

        $bex = UserShopSetting::where('user_id', $user->id)->first();
        if ($bex->is_shop == 0) {
            return back();
        }
        $data['orders'] = UserOrder::where('customer_id', Auth::guard('customer')->user()->id)->orderBy('id', 'DESC')->get();
        return view('user-front.common.customer.my-orders', $data);
    }
    public function orderdetails($domain, $id)
    {

        $user = getUser();
        $userShop = UserShopSetting::where('user_id', $user->id)->first();
        if (!empty($userShop) && ($userShop->is_shop == 0 || $userShop->catalog_mode == 1)) {
            return back();
        }
        $data['currentLanguage'] = $this->getUserCurrentLanguage(getUser()->id);
        $bex = UserShopSetting::where('user_id',  $user->id)->first();
        if ($bex->is_shop == 0) {
            return back();
        }
        $data['bgImg'] = $this->getUserBreadcrumb($user->id);
        $data['data'] = UserOrder::findOrFail($id);
        return view('user-front.common.customer.order_details', $data);
    }
    public function customerWishlist($domain)
    {

        $user = getUser();
        if (session()->has('user_lang') && !empty($user)) {
            $data['language'] = Language::where('code', session()->get('user_lang'))->where('user_id', $user->id)->first();
            if (empty($data['language'])) {
                $data['language'] = Language::where('is_default', 1)->where('user_id', $user->id)->first();
                session()->put('user_lang', $data['language']->code);
            }
        } else {
            $data['language'] = Language::where('is_default', 1)->where('user_id', $user->id)->first();
        }

        $data['wishlist'] = CustomerWishList::where('customer_id', Auth::guard('customer')->user()->id)
            ->with('item.itemContents')
            ->orderBy('id', 'DESC')->get();
        $data['bgImg'] = $this->getUserBreadcrumb($user->id);
        return view('user-front.common.customer.wishlist', $data);
    }

    public function removefromWish($domain, $id)
    {
        $data['wishlist'] = CustomerWishList::findOrFail($id)->delete();
        return response()->json(['message' => 'Item removed from wishlist successfully']);
    }
    public function onlineSuccess()
    {
        Session::forget('user_coupon');
        Session::forget('coupon_amount');
        return view('user-front.ecommerce.online-success');
    }
    public function shippingdetails($domain)
    {
        $user = getUser();
        $bex = UserShopSetting::where('user_id', $user->id)->first();
        if ($bex->is_shop == 0) {
            return back();
        }
        $bgImg = $this->getUserBreadcrumb($user->id);
        $user = Auth::guard('customer')->user();
        return view('user-front.common.customer.shipping_details', compact('user', 'bgImg'));
    }
    public function shippingupdate(Request $request)
    {
        $request->validate([
            "shpping_fname" => 'required',
            "shpping_lname" => 'required',
            "shpping_email" => 'required',
            "shpping_number" => 'required',
            "shpping_city" => 'required',
            "shpping_state" => 'required',
            "shpping_address" => 'required',
            "shpping_country" => 'required',
        ]);
        Auth::guard('customer')->user()->update($request->all());
        Session::flash('success', 'Shipping Details Update Successfully.');
        return back();
    }
    public function billingdetails()
    {
        $user = getUser();
        $bex = UserShopSetting::where('user_id', $user->id)->first();
        if ($bex->is_shop == 0) {
            return back();
        }
        $bgImg = $this->getUserBreadcrumb($user->id);
        Auth::guard('customer')->user();
        return view('user-front.common.customer.billing_details', compact('user', 'bgImg'));
    }
    public function billingupdate(Request $request)
    {
        $request->validate([
            "billing_fname" => 'required',
            "billing_lname" => 'required',
            "billing_email" => 'required',
            "billing_number" => 'required',
            "billing_city" => 'required',
            "billing_state" => 'required',
            "billing_address" => 'required',
            "billing_country" => 'required',
        ]);
        Auth::guard('customer')->user()->update($request->all());
        Session::flash('success', 'Billing Details Update Successfully.');
        return back();
    }
    public function paymentInstruction(Request $request)
    {
        $user = getUser();
        $offline = OfflineGateway::where('user_id', $user->id)->where('name', $request->name)
            ->select('short_description', 'instructions', 'is_receipt')
            ->first();
        return response()->json([
            'description' => $offline->short_description,
            'instructions' => $offline->instructions ?? '', 'is_receipt' => $offline->is_receipt
        ]);
    }
}
