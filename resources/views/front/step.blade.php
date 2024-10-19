@extends('front.layout')

@section('pagename')
    - {{ $package->title }}
@endsection

@section('meta-description', !empty($package) ? $package->meta_keywords : '')
@section('meta-keywords', !empty($package) ? $package->meta_description : '')

@section('breadcrumb-title')
    {{ $package->title }}
@endsection
@section('breadcrumb-link')
    {{ $package->title }}
@endsection

<style>
    #passwordConfirmToggleIcon,
    #passwordToggleIcon {
        position: initial;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
        font-size: 18px;
        z-index: 2;
    }

    .form-group {
        position: relative;
        margin-bottom: 50px;
    }

    .form-group span {
        position: absolute;
        right: 15px;
        /* Adjust the icon position to the right */
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        z-index: 1;
        /* Make sure it appears on top of the input */
    }

    .text-danger {
        margin-top: 5px;
        font-size: small;
    }

    .form-control {
        padding-right: 50px;
    }


    .form-group i.fa-eye,
    .form-group i.fa-eye-slash {
        font-size: 18px;
        /* Adjust the icon size */
        color: #888;
        /* Icon color */
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
                    <div class="form-groups mb-30">
                        <input type="text" class="form-control" name="username" placeholder="{{ __('Username') }}"
                            value="{{ old('username') }}" required>
                        @if ($hasSubdomain)
                            <p class="mb-0">
                                {{ __('Your subdomain based website URL will be') }}:
                                <strong class="text-primary"><span
                                        id="username">{username}</span>.{{ env('WEBSITE_HOST') }}</strong>
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
                        <input class="form-control" type="password" id="password" class="form_control" name="password"
                            value="{{ old('password') }}" placeholder="{{ __('Password') }}" required
                            style="padding-right: 51px;">
                        <span onclick="togglePasswordVisibility('password', 'passwordToggleIcon');">
                            <i class="fa fa-eye-slash" id="passwordToggleIcon"></i>
                        </span>
                        @error('password')
                            <p class="text-danger mb-2 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-30" style="position: relative;">
                        <input class="form-control" id="password-confirm" type="password" class="form_control"
                            placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required
                            style="padding-right: 51px;" autocomplete="new-password">
                        <span onclick="togglePasswordVisibility('password-confirm', 'passwordConfirmToggleIcon');">
                            <i class="fa fa-eye-slash" id="passwordConfirmToggleIcon"></i>
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

        function togglePasswordVisibility(fieldId, iconId) {
            var passwordField = document.getElementById(fieldId);
            var icon = document.getElementById(iconId);

            if (passwordField && icon) {
                if (passwordField.type === "password") {
                    // Show password and change icon to open eye
                    passwordField.type = "text";
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                } else {
                    // Hide password and change icon to closed eye
                    passwordField.type = "password";
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            } else {
                console.error("Element not found:", fieldId, iconId);
            }
        }



        $(document).ready(function() {
            $("input[name='username']").on('change', function() {
                let username = $(this).val();
                if (username.length > 0) {
                    $.get("{{ url('/') }}/check/" + username + '/username', function(data) {
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
