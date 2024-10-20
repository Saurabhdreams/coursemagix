@extends('front.layout')

@section('meta-description', !empty($seo) ? $seo->login_meta_description : '')
@section('meta-keywords', !empty($seo) ? $seo->login_meta_keywords : '')

@section('pagename')
    - {{ __("Login") }}
@endsection
@section('breadcrumb-title')
    {{ __("Login") }}
@endsection
@section('breadcrumb-link')
    {{ __("Login") }}
@endsection

@section('content')

<!--====== Start user-form-section ======-->
<div class="authentication-area pt-90 pb-120">
    <div class="container">
        <div class="main-form">
            <form id="#authForm" action="{{ route('user.login') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="title">
                    <h3>{{ __('Login') }}</h3>
                </div>

                <!-- Email input -->
                <div class="form-group mb-30">
                    <input type="email" name="email" class="form-control" placeholder="{{ __('email') }}" value="{{ old('email') }}" >
                    @if(Session::has('err'))
                        <p class="text-danger mb-2 mt-2">{{ Session::get('err') }}</p>
                    @endif
                    @error('email')
                        <p class="text-danger mb-2 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="form-group mb-30">
                    <input type="password" name="password" class="form-control" placeholder="{{ __('password') }}">
                    @error('password')
                        <p class="text-danger mb-2 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- reCAPTCHA (if enabled) -->
                <div class="form_group">
                    @if ($bs->is_recaptcha == 1)
                        <div class="d-block mb-4">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <p class="text-danger mb-0 mt-2">{{ $errors->first('g-recaptcha-response') }}</p>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Login button -->
                <button type="submit" class="btn primary-btn w-100">{{ __('LOG IN') }}</button>

                <!-- Forgot password link -->
                <div class="row align-items-center mt-3">
                    <div class="col-4 col-xs-12">
                        <div class="link">
                            <a href="{{ route('user.forgot.password.form') }}">{{ __('Forgot your password ') }}?</a>
                        </div>
                    </div>

                    <!-- Signup link, moved below the login button -->
                    <div class="col-8 col-xs-12 mt-3">
                        <div class="link go-signup">
                            {{ __("Don't have an account?") }} <a href="{{ route('front.pricing') }}">{{ __("Click Here") }}</a> {{ __("to Signup") }}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--====== End user-form-section ======-->

@endsection
