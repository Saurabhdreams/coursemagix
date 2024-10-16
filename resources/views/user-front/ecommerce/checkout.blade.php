@extends('user-front.common.layout')

@section('style')
    @include('user-front.ecommerce.partials.styles')
@endsection

@section('meta-description', !empty($userSeo) ? $userSeo->checkout_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->checkout_meta_keywords : '')
@section('tab-title')
    {{ $keywords['Checkout'] ?? 'Checkout' }}
@endsection
@section('page-name')
    {{ $keywords['Checkout'] ?? 'Checkout' }}
@endsection
@section('br-name')
    {{ $keywords['Checkout'] ?? 'Checkout' }}
@endsection
@section('content')
    <!------=== breadcum---------->
      @includeIf('user-front.common.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->checkout_page_title ?? 'Checkout' ])

    <!--====== Breadcrumb part End ======-->
    <section class="checkout-area-section section-gap">
        <form action="{{ route('item.payment.submit', getParam()) }}" method="POST" id="payment"
            enctype="multipart/form-data">
            @csrf
            <div class="container">
                @if (Session::has('st_errors'))
                    <div class="alert alert-warning">
                        <ul>
                            @foreach (Session::get('st_errors') as $sterr)
                                <li class="text-muted">
                                    {{ $keywords['Stock_not_available_for_the'] ?? 'Stock not available for the' }}
                                    <b>{{ $sterr }}</b>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form billing-info">
                            <div class="shop-title-box">
                                <h3>{{ $keywords['Billing_Details'] ?? 'Billing Details' }}</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="field-label">{{ $keywords['first_name'] ?? 'First Name' }}<span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="text" class="form_control"
                                            placeholder="{{ $keywords['first_name'] ?? 'First Names' }}"
                                            name="billing_fname" value="{{ convertUtf8($customer->first_name ?? '') }}">
                                        @error('billing_fname')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="field-label">{{ $keywords['last_name'] ?? 'Last Name' }} <span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="text" class="form_control"
                                            placeholder="{{ $keywords['last_name'] ?? 'Last Name' }}" name="billing_lname"
                                            value="{{ convertUtf8($customer->last_name ?? '') }}">
                                        @error('billing_lname')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="field-label">{{ $keywords['Email_Address'] ?? 'Email Address' }} <span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="email" class="form_control"
                                            placeholder="{{ $keywords['Email_Address'] ?? 'Email Address' }}"
                                            name="billing_email" value="{{ convertUtf8($customer->email ?? '') }}">
                                        @error('billing_email')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="field-label">{{ $keywords['phone'] ?? 'phone' }} <span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="text" class="form_control"
                                            placeholder="{{ $keywords['phone'] ?? 'phone' }}" name="billing_number"
                                            value="{{ convertUtf8($customer->contact_number ?? '') }}">
                                        @error('billing_number')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="field-label">{{ $keywords['address'] ?? 'Address' }} <span
                                            class="text-danger">*</span></div>
                                    <textarea name="billing_address" class="form_control" placeholder="{{ $keywords['address'] ?? 'Address' }}">{{ convertUtf8($customer->address ?? '') }}</textarea>
                                    @error('billing_address')
                                        <p class="text-danger">{{ convertUtf8($message) }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="field-label">{{ $keywords['city'] ?? 'City' }} <span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="text" class="form_control"
                                            placeholder="{{ $keywords['city'] ?? 'City' }}" name="billing_city"
                                            value="{{ convertUtf8($customer->city ?? '') }}">
                                        @error('billing_city')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="field-label">{{ $keywords['state'] ?? 'state' }} <span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="text" class="form_control"
                                            placeholder="{{ $keywords['state'] ?? 'state' }}" name="billing_state"
                                            value="{{ convertUtf8($customer->state) }}">
                                        @error('billing_state')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="field-label">{{ $keywords['country'] ?? 'Country' }} <span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="text" class="form_control"
                                            placeholder="{{ $keywords['country'] ?? 'Country' }} " name="billing_country"
                                            value="{{ convertUtf8($customer->country) }}">
                                        @error('billing_country')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form shipping-info">
                            <div class="shop-title-box">
                                <h3>{{ $keywords['Shipping_Details'] ?? 'Shipping details' }}</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="field-label">{{ $keywords['first_name'] ?? 'First Name' }} <span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="text" class="form_control"
                                            placeholder="{{ old('shpping_fname') ? old('shpping_fname') : $keywords['first_name'] ?? 'First Name' }}"
                                            name="shpping_fname"
                                            value="{{ convertUtf8(Auth::guard('customer')->user()->shpping_fname) }}">
                                        @error('shpping_fname')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="field-label">{{ $keywords['last_name'] ?? 'Last Name' }}<span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="text" class="form_control"
                                            placeholder="{{ old('shpping_lname') ? old('shpping_lname') : $keywords['last_name'] ?? 'Last Name' }}"
                                            name="shpping_lname"
                                            value="{{ convertUtf8(Auth::guard('customer')->user()->shpping_lname) }}">
                                        @error('shpping_lname')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="field-label">{{ $keywords['Email_Address'] ?? 'Email Address' }} <span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="email" class="form_control"
                                            placeholder="{{ $keywords['Email_Address'] ?? 'Email Address' }}"
                                            name="shpping_email"
                                            value="{{ old('shpping_email') ?? convertUtf8(Auth::guard('customer')->user()->shpping_email) }}">
                                        @error('shpping_email')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="field-label">{{ $keywords['phone'] ?? 'phone' }} <span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="text" class="form_control"
                                            placeholder="{{ $keywords['phone'] ?? 'phone' }} " name="shpping_number"
                                            value="{{ old('shpping_number') ?? convertUtf8(Auth::guard('customer')->user()->shpping_number) }}">
                                        @error('shpping_number')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="field-label">{{ $keywords['address'] ?? 'Address' }} <span
                                            class="text-danger">*</span></div>
                                    <textarea name="shpping_address" class="form_control" placeholder="{{ $keywords['address'] ?? 'Address' }}">{{ old('shpping_address') ?? convertUtf8(Auth::guard('customer')->user()->shpping_address) }}</textarea>
                                    @error('shpping_address')
                                        <p class="text-danger">{{ convertUtf8($message) }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="field-label">{{ $keywords['city'] ?? 'City' }}<span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="text" class="form_control"
                                            placeholder="{{ $keywords['city'] ?? 'City' }}" name="shpping_city"
                                            value="{{ old('shpping_city') ?? convertUtf8(Auth::guard('customer')->user()->shpping_city) }}">
                                        @error('shpping_city')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="field-label">{{ $keywords['state'] ?? 'state' }} <span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="text" class="form_control"
                                            placeholder="{{ $keywords['state'] ?? 'state' }}" name="shpping_state"
                                            value="{{ old('shpping_state') ?? convertUtf8(Auth::guard('customer')->user()->shpping_state) }}">
                                        @error('shpping_state')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="field-label">{{ $keywords['country'] ?? 'Country' }} <span
                                            class="text-danger">*</span></div>
                                    <div class="field-input">
                                        <input type="text" class="form_control"
                                            placeholder="{{ $keywords['country'] ?? 'Country' }}" name="shpping_country"
                                            value="{{ old('shpping_country') ?? convertUtf8(Auth::guard('customer')->user()->shpping_country) }}">
                                        @error('shpping_country')
                                            <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="container">
                    <div class="row">
                        @if (!onlyDigitalItemsInCart() && sizeof($shippings) > 0)
                            @php
                                $scharge = round($shippings[0]->charge, 2);
                            @endphp
                            <div class="col-12 mb-5">
                                <div class="table">
                                    <div class="shop-title-box">
                                        <h3> {{ $keywords['Shipping_Method'] ?? __('Shipping Methods') }}</h3>
                                    </div>
                                    <table class="cart-table shipping-method table table-bordered">
                                        <thead class="cart-header">
                                            <tr>
                                                <th>#</th>
                                                <th>{{ $keywords['Method'] ?? __('Method') }}</th>
                                                <th class="price">{{ $keywords['Cost'] ?? __('Cost') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($shippings as $key => $charge)
                                                <tr>
                                                    <td>
                                                        <input type="radio" {{ $key == 0 ? 'checked' : '' }}
                                                            name="shipping_charge" {{ $cart == null ? 'disabled' : '' }}
                                                            data="{{ $charge->charge }}" class="shipping-charge"
                                                            value="{{ $charge->id }}">

                                                    </td>
                                                    <td>
                                                        <p class="mb-2">
                                                            <strong>{{ convertUtf8($charge->title) }}</strong>
                                                        </p>
                                                        <p><small>{{ convertUtf8($charge->text) }}</small></p>
                                                    </td>
                                                    <td>
                                                        {{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}
                                                        <span>{{ $charge->charge }}</span>
                                                        {{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="col-12">
                                <input style="visibility: hidden;" type="radio" checked name="shipping_charge"
                                    {{ $cart == null ? 'disabled' : '' }} data="0" class="shipping-charge"
                                    value="0">
                            </div>
                        @endif
                        <div class="col-lg-6">
                            <div class="table">
                                <div class="shop-title-box">
                                    <h3>{{ $keywords['Order_Summary'] ?? __('Order Summary') }}</h3>
                                </div>
                                <table class="cart-table table table-bordered">
                                    <thead class="cart-header">
                                        <tr>
                                            <th class="product-column" colspan="2">
                                                {{ $keywords['Item'] ?? __('Items') }}</th>
                                            <th>{{ $keywords['Quantity'] ?? __('Quantity') }}</th>
                                            <th class="price">{{ $keywords['Total'] ?? __('Total') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @if ($cart)
                                            @foreach ($cart as $key => $item)
                                                <input type="hidden" name="product_id[]" value="{{ $item['id'] }}">
                                                @php
                                                    $total += $item['product_price'] * $item['qty'];
                                                @endphp
                                                <tr>
                                                    <td colspan="2" class="product-column">
                                                        <div class="column-box">
                                                            <div class="product-title">
                                                                <a target="_blank"
                                                                    href="{{ route('front.user.item_details', ['slug' => $item['slug'], getParam()]) }}">
                                                                    <h3 class="prod-title">
                                                                        {{ strlen($item['name']) > 30 ? mb_substr($item['name'], 0, 30, 'UTF-8') . '...' : $item['name'] }}
                                                                    </h3>
                                                                </a>
                                                            </div>
                                                            <strong>
                                                                {{ $keywords['Item_price'] ?? __('Item Price') }}:
                                                            </strong>{{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}{{ $item['product_price'] }}{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}
                                                            @if (!empty($item['variations']))
                                                                <h6 class="p-2 pl-0">
                                                                    {{ $keywords['Variations'] ?? __('Variations') }}:
                                                                </h6>
                                                                @foreach ($item['variations'] as $k => $itm)
                                                                    <table
                                                                        class="variation-table table-borderless table-sm">
                                                                        <tr>
                                                                            <strong>{{ $k }} : </strong>
                                                                            {{ $itm['name'] }}:
                                                                            {{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}{{ $itm['price'] }}{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}
                                                                        </tr>
                                                                    </table>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <td class="qty">
                                                        <input class="quantity-spinner" disabled type="text"
                                                            value="{{ $item['qty'] }}" name="quantity">
                                                    </td>
                                                    <td class="price">
                                                        {{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}
                                                        {{ $item['total'] }}
                                                        {{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="4">{{ $keywords['Cart_Empty'] ?? __('Cart is Empty') }}
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="cart-total">
                                <div class="shop-title-box">
                                    <h3>{{ $keywords['Order'] ?? __('Order') }}
                                        {{ $keywords['Total'] ?? __(' Total') }}</h3>
                                </div>

                                <div id="cartTotal">
                                    <ul class="cart-total-table">
                                        <li class="clearfix">
                                            <span
                                                class="col col-title">{{ $keywords['Cart_Total'] ?? __('Cart Total') }}</span>
                                            <span
                                                class="col">{{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}<span
                                                    data="{{ cartTotal() }}"
                                                    class="subtotal">{{ cartTotal() }}</span>{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}</span>
                                        </li>
                                        <li class="clearfix">
                                            <span class="col col-title">{{ $keywords['Discount'] ?? __('Discount') }}
                                                <span class="text-success">(<i class="fas fa-minus"></i>)</span></span>
                                            <span
                                                class="col">{{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}<span
                                                    id="discount"
                                                    data="{{ $discount }}">{{ $discount }}</span>{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}</span>
                                        </li>
                                        <li class="clearfix">
                                            <span
                                                class="col col-title">{{ $keywords['Subtotal'] ?? __('Subtotal') }}</span>
                                            <span
                                                class="col">{{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}<span
                                                    data="{{ cartSubTotal() }}" class="subtotal"
                                                    id="subtotal">{{ cartSubTotal() }}</span>{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}</span>
                                        </li>
                                        @if (!onlyDigitalItemsInCart() && sizeof($shippings) > 0)
                                            @php
                                                $scharge = round($shippings[0]->charge, 2);
                                            @endphp
                                            <li class="clearfix">
                                                <span
                                                    class="col col-title">{{ $keywords['Shipping_Charge'] ?? __('Shipping Charge') }}
                                                    <span class="text-danger">
                                                        (<i class="fas fa-plus"></i>)
                                                    </span>
                                                </span>
                                                <span class="col">
                                                    {{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}<span
                                                        data="{{ $scharge }}"
                                                        class="shipping">{{ $scharge }}</span>{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}</span>
                                            </li>
                                        @else
                                            @php
                                                $scharge = 0;
                                            @endphp
                                        @endif
                                        <li class="clearfix">
                                            <span
                                                class="col col-title">{{ $keywords['Tax'] ?? __('Tax') }}({{ $userShopSetting->tax }}%)<span
                                                    class="text-danger">(<i class="fas fa-plus"></i>)</span></span>
                                            <span
                                                class="col">{{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}<span
                                                    data-tax="{{ tax() }}"
                                                    id="tax">{{ tax() }}</span>{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}</span>
                                        </li>
                                        <li class="clearfix">
                                            <span class="col col-title">{{ $keywords['Order'] ?? __('Order') }}
                                                {{ $keywords['Total'] ?? __('Total') }}</span>
                                            <span class="col">
                                                {{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}<span
                                                    data="{{ cartSubTotal() + $scharge + tax() }}" class="grandTotal">
                                                    {{ cartSubTotal() + $scharge + tax() }}</span>{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}</span>
                                        </li>
                                    </ul>
                                    {{-- {{ Session::forget('user_coupon') }} --}}
                                    @if (session()->has('user_coupon'))
                                        <div class="mt-20 alert alert-success">
                                            <strong>
                                            </strong>{{ $keywords['Coupon_Already_Applied'] ?? __('Coupon Already Applied') }}
                                        </div>
                                    @else
                                        <div class="coupon mt-4">
                                            <h4 class="mb-3"> {{ $keywords['Coupon'] ?? __('Coupon') }}</h4>
                                            <div class="form-group d-flex">
                                                <input type="text" class="form-control" name="coupon"
                                                    value="">
                                                <button class="btn btn-primary base-bg border-0" type="button"
                                                    onclick="applyCoupon();">
                                                    {{ $keywords['Apply'] ?? __(' Apply') }}</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="payment-options">
                                    <h4 class="mb-4">{{ $keywords['Payment_Method'] ?? __('Payment Method') }}</h4>
                                    @include('user-front.ecommerce.payment-gateways')
                                    @if ($errors->has('cardNumber'))
                                        <p class="text-danger">{{ $errors->first('cardNumber') }}</p>
                                    @endif
                                    @if ($errors->has('cardCVC'))
                                        <p class="text-danger">{{ $errors->first('cardCVC') }}</p>
                                    @endif
                                    @if ($errors->has('month'))
                                        <p class="text-danger">{{ $errors->first('month') }}</p>
                                    @endif
                                    @if ($errors->has('year'))
                                        <p class="text-danger">{{ $errors->first('year') }}</p>
                                    @endif
                                    @if ($errors->has('anetCardNumber'))
                                        <p class="text-danger">{{ $errors->first('anetCardNumber') }}</p>
                                    @endif
                                    @if ($errors->has('anetExpMonth'))
                                        <p class="text-danger">{{ $errors->first('anetExpMonth') }}</p>
                                    @endif
                                    @if ($errors->has('anetExpYear'))
                                        <p class="text-danger">{{ $errors->first('anetExpYear') }}</p>
                                    @endif
                                    @if ($errors->has('anetCardCode'))
                                        <p class="text-danger">{{ $errors->first('anetCardCode') }}</p>
                                    @endif
                                    <div class="placeorder-button text-left">
                                        <button {{ $cart ? '' : 'disabled' }} id="confirmBtn" class="main-btn"
                                            type="submit">
                                            <span class="btn-title">
                                                {{ $keywords['Place_Order'] ?? __(' Place Order') }}
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

@php
    $anet = App\Models\User\PaymentGateway::whereKeyword('Authorize.net')
        ->where('user_id', getUser()->id)
        ->first();
    $anerInfo = $anet->convertAutoData();
    $anetTest = $anerInfo['sandbox_check'] ?? '';
    if ($anetTest == 1) {
        $anetSrc = 'https://jstest.authorize.net/v1/Accept.js';
    } else {
        $anetSrc = 'https://js.authorize.net/v1/Accept.js';
    }
@endphp

@php
    $stripe = \App\Models\User\PaymentGateway::where('keyword', 'stripe')->first();
    $stripe_info = json_decode($stripe->information, true);
    $stripe_key = $stripe_info['key'];
@endphp
@section('script')
    @include('user-front.ecommerce.partials.scripts')
    {{-- -------------stripe--------- --}}
    <script>
        let stripe_key = "{{ $stripe_key }}";
    </script>
    {{-- START: Authorize.net Scripts --}}
    <script type="text/javascript" src="{{ $anetSrc }}" charset="utf-8"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('assets/tenant/ecommerce/assets/js/stripe.js') }}"></script>
    <script src="{{ asset('assets/tenant/ecommerce/assets/js/payement-gateways.js') }}"></script>
    <script>
        $(document).ready(function() {


            // Destroy Nice Select on a specific select element
            $('#payment-gateway').niceSelect('destroy');

        });
        // apply coupon functionality starts
        function applyCoupon() {
            $.post(
                "{{ route('front.coupon', getParam()) }}", {
                    coupon: $("input[name='coupon']").val(),
                    _token: document.querySelector('meta[name=csrf-token]').getAttribute('content')
                },
                function(data) {

                    if (data.status == 'success') {
                        toastr["success"](data.message);
                        $("input[name='coupon']").val('');
                        $("#cartTotal").load(location.href + " #cartTotal", function() {
                            let scharge = parseFloat($("input[name='shipping_charge']:checked").attr('data'));
                            let total = parseFloat($(".grandTotal").attr('data'));
                            $(".shipping").attr('data', scharge);
                            $(".shipping").text(scharge);
                            $(".grandTotal").attr('data', total.toFixed(2));
                            $(".grandTotal").text(total.toFixed(2));
                        });
                    } else {
                        toastr["error"](data.message);
                    }
                }
            );
        }
        $("input[name='coupon']").on('keypress', function(e) {
            let code = e.which;
            if (code == 13) {
                e.preventDefault();
                applyCoupon();
            }
        });
        // place order click -- loader load
        $(document).on('click', '#confirmBtn', function(e) {
            "use strict";

            if ($("#payment-gateway").val() != null) {
                $(".request-loader").show();

                setTimeout(() => {
                    $(".request-loader").hide();
                }, 1000);
            }

        });

        // apply coupon functionality ends
        $(document).on('click', '.shipping-charge', function() {
            // $(".shipping-charge").removeAttr('checked')
            // $(this).attr('checked','checked')
            $(this).attr('data')
            let total = 0;
            let shipping = 0;
            shipping = parseFloat($('.shipping').attr('data'));
            let shipCharge = parseFloat($(this).attr('data'));
            shipping = parseFloat(shipCharge);
            total = {{ cartSubTotal() + tax() }} + parseFloat(shipCharge);
            $('.shipping').text(shipping);
            $('.grandTotal').text(parseFloat(total.toFixed(2)));
        })
    </script>
    <script>
        "use strict";

        $('#payment-gateway').niceSelect('destroy').niceSelect();;
        $("#payment-gateway").on('change', function() {
            let offline = @php echo json_encode($offlines) @endphp;
            let data = [];
            offline.map(({
                id,
                name
            }) => {
                data.push(name);
            });
            let paymentMethod = $("#payment-gateway").val();
            $("input[name='payment_method']").val(paymentMethod);
            $(".gateway-details").hide();
            $(".gateway-details input").attr('disabled', true);

            if (paymentMethod == 'Stripe') {
                $('#stripe-element').removeClass('d-none');
            } else {
                $('#stripe-element').addClass('d-none');
            }

            if (paymentMethod == 'Authorize.net') {
                $("#tab-anet").show();
                $("#tab-anet input").removeAttr('disabled');
            }

            if (data.indexOf(paymentMethod) != -1) {
                let formData = new FormData();
                formData.append('name', paymentMethod);
                $.ajax({
                    url: "{{ route('user.front.payment.instructions', getParam()) }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    cache: false,
                    data: formData,
                    success: function(data) {
                        let instruction = $("#instructions");
                        let instructions =
                            `<div class="gateway-desc">${data.instructions}</div>`;
                        if (data.description != null) {
                            var description =
                                `<div class="gateway-desc"><p>${data.description}</p></div>`;
                        } else {
                            var description = `<div></div>`;
                        }
                        let receipt = `<div class="form-element mb-2">
                                      <label>Receipt<span>*</span></label><br>
                                      <input type="file" name="receipt" value="" class="file-input" required>
                                      <p class="mb-0 text-warning">** Receipt image must be .jpg / .jpeg / .png</p>
                                   </div>`;
                        if (data.is_receipt == 1) {
                            $("#is_receipt").val(1);
                            let finalInstruction = instructions + description + receipt;
                            instruction.html(finalInstruction);
                        } else {
                            $("#is_receipt").val(0);
                            let finalInstruction = instructions + description;
                            instruction.html(finalInstruction);
                        }
                        $('#instructions').fadeIn();
                    },
                    error: function(data) {}
                })
            } else {
                $('#instructions').fadeOut();
            }
        });

        // $(document).ready(function() { });
    </script>
    <script type="text/javascript">
        function sendPaymentDataToAnet() {
            // Set up authorisation to access the gateway.
            var authData = {};
            authData.clientKey = "{{ $anerInfo['public_key'] ?? '' }}";
            authData.apiLoginID = "{{ $anerInfo['login_id'] ?? '' }}";

            var cardData = {};
            cardData.cardNumber = document.getElementById("anetCardNumber").value;
            cardData.month = document.getElementById("anetExpMonth").value;
            cardData.year = document.getElementById("anetExpYear").value;
            cardData.cardCode = document.getElementById("anetCardCode").value;

            // Now send the card data to the gateway for tokenisation.
            // The responseHandler function will handle the response.
            var secureData = {};
            secureData.authData = authData;
            secureData.cardData = cardData;
            Accept.dispatchData(secureData, responseHandler);
        }

        function responseHandler(response) {
            if (response.messages.resultCode === "Error") {
                var i = 0;
                let errorLists = ``;
                while (i < response.messages.message.length) {
                    errorLists += `<li class="text-danger">${response.messages.message[i].text}</li>`;

                    i = i + 1;
                }
                $("#anetErrors").show();
                $("#anetErrors").html(errorLists);
            } else {
                paymentFormUpdate(response.opaqueData);
            }
        }

        function paymentFormUpdate(opaqueData) {
            document.getElementById("opaqueDataDescriptor").value = opaqueData.dataDescriptor;
            document.getElementById("opaqueDataValue").value = opaqueData.dataValue;
            document.getElementById("payment").submit();
        }
    </script>
    {{-- END: Authorize.net Scripts --}}
@endsection
