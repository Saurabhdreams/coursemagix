<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $bs->website_title }} - {{ __('Error') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/tenant/ecommerce/assets/css/plugin.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/tenant/ecommerce/assets/css/success.css') }}" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto" id="mt">
                <div class="payment">
                    <div class="payment_header">
                        <div class="check">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="content">
                        <h1>{{ $keywords['payment_error'] ?? __('Payment Error') }}</h1>
                        <p class="paragraph-text text-warning">
                            {{ $message ? $message : 'Payment gateway credentials something is problem!' }}
                        </p>
                        <a
                            href="{{ route('front.user.detail.view', getParam()) }}">{{ $keywords['Go_to_Home'] ?? __('Go to Home') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
