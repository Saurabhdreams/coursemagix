@extends('user.layout')

@section('content')
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if (!empty($membership) && ($membership->package->term == 'lifetime' || $membership->is_trial == 1))
        <div class="alert bg-warning alert-warning text-white text-center">
            <h3>{{ __('If you purchase this package') }} <strong class="text-dark">({{ $package->title }})</strong>,
                {{ __('then your current package') }} <strong class="text-dark">({{ $membership->package->title }}
                    @if ($membership->is_trial == 1)
                        <span class="badge badge-secondary">{{ __('Trial') }}</span>
                    @endif)</strong> {{ __('will be replaced immediately') }}</h3>
        </div>
    @endif
    <div class="row justify-content-center align-items-center mb-1">
        <div class="col-md-1 pl-md-0">
        </div>

        <div class="col-md-6 pl-md-0 pr-md-0">
            <div class="card card-pricing card-pricing-focus card-secondary">
                <form id="my-checkout-form" action="{{ route('user.plan.checkout') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="payment_method" id="payment" value="{{ old('payment_method') }}">
                    <div class="card-header">
                        <h4 class="card-title">{{ $package->title }}</h4>
                        <div class="card-price">
                            <span class="price">{{ $package->price == 0 ? 'Free' : format_price($package->price) }}</span>
                            <span class="text">/{{ $package->term }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="specification-list">
                            <li>
                                <span class="name-specification">{{ __('Membership') }}</span>
                                <span class="status-specification">{{ __('Yes') }}</span>
                            </li>
                            <li>
                                <span class="name-specification">{{ __('Start Date') }}</span>
                                @if (
                                    (!empty($previousPackage) && $previousPackage->term == 'lifetime') ||
                                        (!empty($membership) && $membership->is_trial == 1))
                                    <input type="hidden" name="start_date"
                                        value="{{ \Illuminate\Support\Carbon::yesterday()->format('d-m-Y') }}">
                                    <span
                                        class="status-specification">{{ \Illuminate\Support\Carbon::today()->format('d-m-Y') }}</span>
                                @else
                                    <input type="hidden" name="start_date"
                                        value="{{ \Illuminate\Support\Carbon::parse($membership->expire_date ?? \Carbon\Carbon::yesterday())->addDay()->format('d-m-Y') }}">
                                    <span
                                        class="status-specification">{{ \Illuminate\Support\Carbon::parse($membership->expire_date ?? \Carbon\Carbon::yesterday())->addDay()->format('d-m-Y') }}</span>
                                @endif
                            </li>
                            <li>
                                <span class="name-specification">{{ __('Expire Date') }}</span>
                                <span class="status-specification">
                                    @if ($package->term == 'monthly')
                                        @if (
                                            (!empty($previousPackage) && $previousPackage->term == 'lifetime') ||
                                                (!empty($membership) && $membership->is_trial == 1))
                                            {{ \Illuminate\Support\Carbon::parse(now())->addMonth()->format('d-m-Y') }}
                                            <input type="hidden" name="expire_date"
                                                value="{{ \Illuminate\Support\Carbon::parse(now())->addMonth()->format('d-m-Y') }}">
                                        @else
                                            {{ \Illuminate\Support\Carbon::parse($membership->expire_date ?? now())->addMonth()->format('d-m-Y') }}
                                            <input type="hidden" name="expire_date"
                                                value="{{ \Illuminate\Support\Carbon::parse($membership->expire_date ?? now())->addMonth()->format('d-m-Y') }}">
                                        @endif
                                    @elseif($package->term == 'lifetime')
                                        {{ __('Lifetime') }}
                                        <input type="hidden" name="expire_date"
                                            value="{{ \Illuminate\Support\Carbon::maxValue()->format('d-m-Y') }}">
                                    @else
                                        @if (
                                            (!empty($previousPackage) && $previousPackage->term == 'lifetime') ||
                                                (!empty($membership) && $membership->is_trial == 1))
                                            {{ \Illuminate\Support\Carbon::parse(now())->addYear()->format('d-m-Y') }}
                                            <input type="hidden" name="expire_date"
                                                value="{{ \Illuminate\Support\Carbon::parse(now())->addYear()->format('d-m-Y') }}">
                                        @else
                                            {{ \Illuminate\Support\Carbon::parse($membership->expire_date ?? now())->addYear()->format('d-m-Y') }}
                                            <input type="hidden" name="expire_date"
                                                value="{{ \Illuminate\Support\Carbon::parse($membership->expire_date ?? now())->addYear()->format('d-m-Y') }}">
                                        @endif
                                    @endif
                                </span>
                            </li>
                            <li>
                                <span class="name-specification">{{ __('Total Cost') }}</span>
                                <input type="hidden" name="price" value="{{ $package->price }}">
                                <span class="status-specification">
                                    {{ $package->price == 0 ? 'Free' : format_price($package->price) }}
                                </span>
                            </li>
                            @if ($package->price != 0)
                                <li>
                                    <div class="form-group px-0">
                                        <label class="text-white">{{ __('Payment Method') }}</label>
                                        <select name="payment_method" class="form-control input-solid" id="payment-gateway"
                                            required>
                                            <option value="" disabled selected>{{ __('Select a Payment Method') }}
                                            </option>
                                            @foreach ($payment_methods as $payment_method)
                                                <option value="{{ $payment_method->name }}"
                                                    {{ old('payment_method') == $payment_method->name ? 'selected' : '' }}>
                                                    {{ $payment_method->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </li>
                            @endif


                            {{-- Strat Stripe Card Details --}}
                            <div>
                                <div id="stripe-element" class="mb-2 mt-2">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors -->
                                <div id="stripe-errors" role="alert" class="mb-2"></div>
                            </div>
                            {{-- ----End Stripe Card Details---- --}}


                            {{-- START: Authorize.net Card Details Form --}}
                            <div class="gateway-details dis-none" id="tab-anet">
                                <div class="row pt-3">
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
                                            <input class="form-control" type="text" id="anetExpYear"
                                                placeholder="Expire Year" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="anetCardCode"
                                                placeholder="Card Code" disabled />
                                        </div>
                                    </div>
                                    <input type="hidden" name="opaqueDataValue" id="opaqueDataValue" disabled />
                                    <input type="hidden" name="opaqueDataDescriptor" id="opaqueDataDescriptor"
                                        disabled />
                                    <ul id="anetErrors" class="dis-none"></ul>
                                </div>
                            </div>
                            {{-- END: Authorize.net Card Details Form --}}

                            <div id="instructions" class="text-left"></div>
                            <input type="hidden" name="is_receipt" value="0" id="is_receipt">
                        </ul>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-light btn-block" type="submit" id="confirmBtn"><b>{{ __('Checkout Now') }}</b></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1 pr-md-0"></div>
    </div>
    @php
        $stripe = \App\Models\PaymentGateway::where('keyword', 'stripe')->first();
        $stripe_info = json_decode($stripe->information, true);
        $stripe_key = $stripe_info['key'];
    @endphp
@endsection

@section('scripts')
    <script>
        "use strict";
        var couponRoute = "{{ route('front.membership.coupon') }}";
        var packageId = {{ $package->id }};
        var ogateways = @php echo json_encode($offline) @endphp;
        var oinstructions = "{{ route('front.payment.instructions') }}";
        let stripe_key = "{{ $stripe_key }}";
    </script>
    {{---Stat Stripe---}}
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('assets/front/js/stripe.js') }}"></script>
    <script src="{{ asset('assets/front/js/checkout.js') }}"></script>

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
    <script src="{{ asset('assets/front/js/anet.js') }}"></script>
    {{-- END: Authorize.net Scripts --}}
@endsection
