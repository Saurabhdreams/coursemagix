@extends('front.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/front/css/checkout.css') }}">
@endsection

@section('pagename')
    - {{ __('Checkout') }}
@endsection

@section('meta-description', !empty($seo) ? $seo->checkout_meta_description : '')
@section('meta-keywords', !empty($seo) ? $seo->checkout_meta_keywords : '')

@section('breadcrumb-title')
    {{ __('Checkout') }}
@endsection
@section('breadcrumb-link')
    {{ __('Checkout') }}
@endsection


@section('content')
    <!--====== Start saas_checkout ======-->
    <section class="checkout-area ptb-90">
        <div class="container">
            <form
                onsubmit="document.getElementById('confirmBtn').innerHTML='Processing...';document.getElementById('confirmBtn').disabled=true;"
                action="{{ route('front.membership.checkout') }}" method="POST" enctype="multipart/form-data"
                id="my-checkout-form">
                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="billing_form form-block">
                            <div class="title mb-30">
                                <h3>{{ __('Billing Details') }}</h3>
                            </div>
                            @csrf
                            <div class="row">
                                <input type="hidden" name="username" value="{{ $username }}">
                                <input type="hidden" name="password" value="{{ $password }}">
                                <input type="hidden" name="package_type" value="{{ $status }}">
                                <input type="hidden" name="email" value="{{ $email }}">
                                <input type="hidden" name="package_id" value="{{ $id }}">
                                <input type="hidden" name="trial_days" id="trial_days"
                                       value="{{ $package->trial_days }}">
                                <input type="hidden" name="start_date"
                                       value="{{ \Carbon\Carbon::today()->format('d-m-Y') }}">
                                @if ($status === 'trial')
                                    <input type="hidden" name="expire_date"
                                           value="{{ \Carbon\Carbon::today()->addDay($package->trial_days)->format('d-m-Y') }}">
                                @else
                                    @if ($package->term === 'monthly')
                                        <input type="hidden" name="expire_date"
                                               value="{{ \Carbon\Carbon::today()->addMonth()->format('d-m-Y') }}">
                                    @elseif($package->term === 'lifetime')
                                        <input type="hidden" name="expire_date"
                                               value="{{ \Carbon\Carbon::maxValue()->format('d-m-Y') }}">
                                    @else
                                        <input type="hidden" name="expire_date"
                                               value="{{ \Carbon\Carbon::today()->addYear()->format('d-m-Y') }}">
                                    @endif
                                @endif
                                <div class="col-lg-6">
                                    <div class="form-group mb-30">
                                        <label for="first_name">{{ __('First Name') }}*</label>
                                        <input id="first_name" type="text" class="form-control" name="first_name"
                                               placeholder="{{ __('First Name') }}" value="{{ old('first_name') }}"
                                               required  pattern="[A-Za-z]+" title="Only letters are allowed">
                                        @if ($errors->has('first_name'))
                                            <span class="error text-danger">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-30">
                                        <label for="last_name">{{ __('Last Name') }}*</label>
                                        <input id="last_name" type="text" class="form-control" name="last_name"
                                               placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}"
                                               required pattern="[A-Za-z]+" title="Only letters are allowed">
                                        @if ($errors->has('last_name'))
                                            <span class="error text-danger">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-30">
                                        <label for="phone">{{ __('Phone Number') }}*</label>
                                        <input id="phone" type="text" class="form-control" name="phone"
                                               placeholder="{{ __('Phone Number') }}" value="{{ old('phone') }}"
                                               required pattern="\d+" title="Only numbers are allowed">
                                        @if ($errors->has('phone'))
                                            <span class="error text-danger">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-30">
                                        <label for="email">{{ __('Email Address') }}*</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ $email }}" disabled>
                                        @if ($errors->has('email'))
                                            <span class="error text-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-30">
                                        <label for="company_name">{{ __('Company Name') }}*</label>
                                        <input id="company_name" type="text" class="form-control" name="company_name"
                                               placeholder="{{ __('Company Name') }}" value="{{ old('company_name') }}"
                                               required>
                                        @if ($errors->has('company_name'))
                                            <span class="error text-danger">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-30">
                                        <label for="address">{{ __('Street Address') }}</label>
                                        <input id="address" type="text" class="form-control" name="address"
                                               placeholder="{{ __('Street Address') }}" value="{{ old('address') }}">
                                        @if ($errors->has('address'))
                                            <span class="error text-danger">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-30">
                                        <label for="city">{{ __('City') }}</label>
                                        <input id="city" type="text" class="form-control" name="city"
                                               placeholder="{{ __('City') }}" value="{{ old('city') }}"  pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed">
                                        @if ($errors->has('city'))
                                            <span class="error text-danger">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-30">
                                        <label for="district">{{ __('State') }}</label>
                                        <input id="district" type="text" class="form-control" name="district"
                                               placeholder="{{ __('State') }}" value="{{ old('district') }}"  pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed">
                                        @if ($errors->has('district'))
                                            <span class="error text-danger">
                                            <strong>{{ $errors->first('district') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-30">
                                        <label for="country">{{ __('Country') }}*</label>
                                        <input id="country" type="text" class="form-control" name="country"
                                               placeholder="{{ __('Country') }}" value="{{ old('country') }}" required  pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed">
                                        @if ($errors->has('country'))
                                            <span class="error text-danger">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_wrap_box mb-40">
                            <div id="couponReload">
                                <input type="hidden" name="price"
                                       value="{{ $status == 'trial' ? 0 : $package->price - $cAmount }}">
                                <div class="order-summery form-block mb-30 mt-30">

                                    <div class="title">
                                        <h3>{{ __('Package Summary') }}</h3>
                                    </div>
                                    <div class="order-list-info">
                                        <ul class="summery-list">
                                            <li>{{ __('Package') }} <span>{{ $package->title }}
                                                    ({{ __(ucfirst($package->term)) }})</span></li>
                                            <li>{{ __('Start Date') }}
                                                <span>{{ \Carbon\Carbon::today()->format('d-m-Y') }}</span>
                                            </li>
                                            @if ($status === 'trial')
                                                <li>
                                                    {{ __('Expiry Date') }}
                                                    <span>
                                                        {{ \Carbon\Carbon::today()->addDay($package->trial_days)->format('d-m-Y') }}
                                                    </span>
                                                </li>
                                            @else
                                                <li>
                                                    {{ __('Expiry Date') }}
                                                    <span>
                                                        @if ($package->term === 'monthly')
                                                            {{ \Carbon\Carbon::today()->addMonth()->format('d-m-Y') }}
                                                        @elseif($package->term === 'lifetime')
                                                            {{ __('Lifetime') }}
                                                        @else
                                                            {{ \Carbon\Carbon::today()->addYear()->format('d-m-Y') }}
                                                        @endif
                                                    </span>
                                                </li>
                                            @endif
                                            @if (session()->has('coupon'))
                                                <li>
                                                    <span>{{ __('Package Price') }}</span>
                                                    <span class="price">
                                                        @if ($status === 'trial')
                                                            {{ __('Free') }} ({{ $package->trial_days . ' days' }})
                                                        @elseif($package->price == 0)
                                                            {{ __('Free') }}
                                                        @else
                                                            {{ format_price($package->price) }}
                                                        @endif
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>{{ __('Discount') }}</span>
                                                    <span class="price text-success">
                                                        - {{ format_price($cAmount) }}
                                                    </span>
                                                </li>
                                            @endif
                                            <li class="border-0">
                                                <span>{{ __('Total') }}</span>
                                                <span class="price">
                                                    @if ($status === 'trial')
                                                        {{ __('Free') }} ({{ $package->trial_days }} {{__('days')}})
                                                    @elseif($package->price == 0)
                                                        {{ __('Free') }}
                                                    @else
                                                        {{ format_price($package->price - $cAmount) }}
                                                    @endif
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @if ($package->price > 0 && $status != 'trial')
                                    @if (!session()->has('coupon'))
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group mb-3 align-items-lg-stretch">
                                                    <input type="text" class="form-control" name="coupon"
                                                           placeholder="{{ __('Enter Coupon Code Here') }}">
                                                    <div class="input-group-append">
                                                        <span class="btn primary-btn no-animation rounded-1 h-100 coupon-apply"
                                                              id="basic-addon2">{{ __('Apply') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="alert alert-success">
                                            {{ __('Coupon already applied') }}
                                        </div>
                                    @endif
                                @endif

                                @if ($package->price - $cAmount <= 0 || $status == 'trial')
                                @else
                                    <div class="order-payment form-block">
                                        <div class="title">
                                            <h3>{{__('Payment Method')}}</h3>
                                        </div>
                                        <div class="form-group mb-30">
                                            <select name="payment_method" id="payment-gateway" class="olima_select">
                                                <option value="" selected disabled>{{ __('Choose an option') }}</option>
                                                @foreach ($payment_methods as $payment_method)
                                                    <option value="{{ $payment_method->name }}"
                                                        {{ old('payment_method') == $payment_method->name ? 'selected' : '' }}>
                                                        {{ $payment_method->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('payment_method'))
                                                <span class="method-error text-danger">
                                                    <strong>{{ $errors->first('payment_method') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                            {{-- START: Stripe Card Details Form --}}
                            <div id="tab-stripe" class="dis-none gateway-details">
                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Card Number') }} *</label>
    
                                            <input type="text" class="form-control" name="cardNumber"
                                                   placeholder="{{ __('Card Number') }}" autocomplete="off"
                                                   oninput="validateCard(this.value);" disabled />
    
                                            @if ($errors->has('cardNumber'))
                                                <p class="text-danger">{{ $errors->first('cardNumber') }}</p>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('CVC') }} *</label>
    
                                            <input type="text" class="form-control" placeholder="{{ __('CVC') }}"
                                                   name="cardCVC" oninput="validateCVC(this.value);" disabled>
    
                                            @if ($errors->has('cardCVC'))
                                                <p class="text-danger">{{ $errors->first('cardCVC') }}</p>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Month') }} *</label>
    
                                            <input type="text" class="form-control" placeholder="{{ __('Month') }}"
                                                   name="month" disabled>
    
                                            @if ($errors->has('month'))
                                                <p class="text-danger">{{ $errors->first('month') }}</p>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Year') }} *</label>
    
                                            <input type="text" class="form-control" placeholder="{{ __('Year') }}"
                                                   name="year" disabled>
    
                                            @if ($errors->has('year'))
                                                <p class="text-danger">{{ $errors->first('year') }}</p>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- END: Stripe Card Details Form --}}

                            {{-- START: Authorize.net Card Details Form --}}
                            <div class="dis-none gateway-details" id="tab-anet">
                                <div class="row py-3">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <input class="form-control" type="text" id="anetCardNumber"
                                                   placeholder="Card Number" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="anetExpMonth"
                                                   placeholder="Expire Month" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="anetExpYear" placeholder="Expire Year"
                                                   disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="anetCardCode" placeholder="Card Code"
                                                   disabled />
                                        </div>
                                    </div>
                                    <input type="hidden" name="opaqueDataValue" id="opaqueDataValue" disabled />
                                    <input type="hidden" name="opaqueDataDescriptor" id="opaqueDataDescriptor" disabled />
                                    <ul id="anetErrors" class="dis-none"></ul>
                                </div>
                            </div>
                            {{-- END: Authorize.net Card Details Form --}}

                            {{-- START: Offline Gateways Information & Receipt Area --}}
                            <div>
                                <div id="instructions"></div>
                                <input type="hidden" name="is_receipt" value="0" id="is_receipt">
                                @if ($errors->has('receipt'))
                                    <span class="error text-danger">
                        <strong>{{ $errors->first('receipt') }}</strong>
                    </span>
                                @endif
                            </div>
                            {{-- END: Offline Gateways Information & Receipt Area --}}

                            <div class="text-center mt-4">
                                <button form="my-checkout-form" id="confirmBtn" class="btn primary-btn w-100"
                                        type="submit">{{ __('Confirm') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--====== End saas_checkout ======-->
@endsection

@section('scripts')
    <script>
		"use strict";
        var couponRoute = "{{ route('front.membership.coupon') }}";
        var packageId = {{ $package->id }};
        var ogateways = @php echo json_encode($offline) @endphp;
        var oinstructions = "{{ route('front.payment.instructions') }}";
    </script>
    <script src="{{asset('assets/front/js/checkout.js')}}"></script>

    {{-- START: Authorize.net Scripts --}}
    @php
        $anet = App\Models\PaymentGateway::find(20);
        $anerInfo = $anet->convertAutoData();
        $anetTest = $anerInfo['sandbox_check'];

        if ($anetTest == 1) {
        $anetSrc = 'https://jstest.authorize.net/v1/Accept.js';
        } else {
        $anetSrc = 'https://js.authorize.net/v1/Accept.js';
        }
    @endphp
    <script>
		"use strict";
        var clientKey = "{{ $anerInfo['public_key'] }}";
        var loginId = "{{ $anerInfo['login_id'] }}";
    </script>
    <script type="text/javascript" src="{{ $anetSrc }}" charset="utf-8"></script>
    <script src="{{asset('assets/front/js/anet.js')}}"></script>
    {{-- END: Authorize.net Scripts --}}
@endsection
