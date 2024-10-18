@extends('front.layout')

@section('pagename')
    - {{$package->title}}
@endsection

@section('meta-description', !empty($package) ? $package->meta_keywords : '')
@section('meta-keywords', !empty($package) ? $package->meta_description : '')

@section('breadcrumb-title')
    {{$package->title}}
@endsection
@section('breadcrumb-link')
    {{$package->title}}
@endsection
<style>
    #passwordConfirmToggleIcon, #passwordToggleIcon {
    position: absolute;
    top: 50%;
    right: 13px;
    transform: translateY(-50%);
    cursor: pointer;
    color: #888; /* Icon color */
    font-size: 18px; /* Icon size */
    z-index: 2;
}

</style>
@section('content')
    <!-- Authentication Start -->
    <div class="authentication-area pt-90 pb-120">
        <div class="container">
            <div class="main-form">
                <form id="#authForm" action="{{ route('front.checkout.view') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="title">
                        <h3>{{ __('Sign up') }}</h3>
                    </div>
                    <div class="form-group mb-30">
                        <input type="text" class="form-control" name="username" placeholder="{{ __('Username') }}" value="{{ old('username') }}" required >
                        @if ($hasSubdomain)
                            <p class="mb-0">
                                {{ __('Your subdomain based website URL will be') }}:
                                <strong class="text-primary"><span id="username">{username}</span>.{{env('WEBSITE_HOST')}}</strong>
                            </p>
                        @endif
                        <p class="text-danger mb-0" id="usernameAvailable"></p>
                        @error('username')
                        <p class="text-danger mb-2 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-30">
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                               placeholder="{{ __('Email address') }}" required>
                        @error('email')
                        <p class="text-danger mb-2 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-30" style="position: relative;">
                        <input class="form-control" type="password" id="password" class="form_control" name="password" value="{{ old('password') }}"
                               placeholder="{{ __('Password') }}" required>
                               <span onclick="togglePasswordVisibility('password', 'passwordToggleIcon');">
                                <i class="fa fa-eye" id="passwordToggleIcon"></i>
                            </span>
                        @error('password')
                        <p class="text-danger mb-2 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-30" style="position: relative;">
                        <input class="form-control" id="password-confirm" type="password" class="form_control"
                               placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required
                               autocomplete="new-password">
                               <span onclick="togglePasswordVisibility('password-confirm', 'passwordConfirmToggleIcon');">
                                    <i class="fa fa-eye" id="passwordConfirmToggleIcon"></i>
                                </span>
                        @error('password_confirmation')
                        <p class="text-danger mb-2 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="hidden" name="status" value="{{ $status }}">
                        <input type="hidden" name="id" value="{{ $id }}">
                    </div>
                    <button type="submit" class="btn primary-btn w-100"> {{ __('Continue') }} </button>
                </form>
            </div>
        </div>
    </div>
    <!-- Authentication End -->
@endsection


@section('scripts')
    @if ($hasSubdomain)
        <script>
            "use strict";
            $(document).ready(function() {
                $("input[name='username']").on('input', function() {
                    let username = $(this).val();
                    if (username.length > 0) {
                        $("#username").text(username);
                    } else {
                        $("#username").text("{username}");
                    }
                });
            });
        </script>
    @endif
    <script>
        "use strict";

        // Define togglePasswordVisibility function outside of $(document).ready()
        function togglePasswordVisibility(fieldId, iconId) {
            var passwordField = document.getElementById(fieldId);
            var icon = document.getElementById(iconId);

            if (passwordField && icon) { // Check if both elements exist
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordField.type = "password";
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            } else {
                console.error("Element not found:", fieldId, iconId);
            }
        }


        $(document).ready(function() {
            $("input[name='username']").on('change', function() {
                let username = $(this).val();
                if (username.length > 0) {
                    $.get("{{url('/')}}/check/" + username + '/username', function(data) {
                        if (data == true) {
                            $("#usernameAvailable").text('This username is already taken.');
                        } else {
                            $("#usernameAvailable").text('');
                        }
                    });
                } else {
                    $("#usernameAvailable").text('');
                }
            });
        });
    </script>
@endsection

