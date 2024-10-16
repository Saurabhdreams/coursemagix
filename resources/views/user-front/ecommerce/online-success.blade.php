<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $bs->website_title }} - {{ __('Success') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/tenant/ecommerce/assets/css/plugin.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/tenant/ecommerce/assets/css/success.css') }}" />
    <!-- base color change -->
    <link href="{{ asset('assets/front/css/style-base-color.php') . '?color=' . $bs->base_color }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/css/cookie-alert.css') }}">
    @php
        $primaryColor = '2079FF';

        if (!empty($userBs->primary_color)) {
            $primaryColor = $userBs->primary_color;
        }

        $secondaryColor = 'F16001';

        if (!empty($userBs->secondary_color)) {
            $secondaryColor = $userBs->secondary_color;
        }

        $footerBackgroundColor = '001B61';

        if (!empty($footerInfo->footer_background_color)) {
            $footerBackgroundColor = $footerInfo->footer_background_color;
        }

        $copyrightBackgroundColor = '003A91';

        if (!empty($footerInfo->copyright_background_color)) {
            $copyrightBackgroundColor = $footerInfo->copyright_background_color;
        }

        $breadcrumbOverlayColor = '001B61';

        if (!empty($userBs->breadcrumb_overlay_color)) {
            $breadcrumbOverlayColor = $userBs->breadcrumb_overlay_color;
        }

        $breadcrumbOverlayOpacity = 0.5;

        if (!empty($userBs->breadcrumb_overlay_opacity)) {
            $breadcrumbOverlayOpacity = $userBs->breadcrumb_overlay_opacity;
        }
    @endphp
    <link rel="stylesheet"
        href="{{ asset("assets/tenant/css/website-color.php?primary_color=$primaryColor&secondary_color=$secondaryColor&footer_background_color=$footerBackgroundColor&copyright_background_color=$copyrightBackgroundColor&breadcrumb_overlay_color=$breadcrumbOverlayColor&breadcrumb_overlay_opacity=$breadcrumbOverlayOpacity") }}">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto" id="mt">
                <div class="payment">
                    <div class="payment_header text-center">
                         <div class="check">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="content">
                        <h1>{{ $keywords['payment_success'] ?? __('Payment Success') }}</h1>
                        <p class="paragraph-text">
                            {{ $keywords['item_order_payment_success_msg'] ?? __('Your payment for items order is successful. We sent you an email with Invoice. Please check your inbox') }}
                        </p>
                        <a  href="{{ route('front.user.detail.view', getParam()) }}">
                            {{ $keywords['Go_to_Home'] ?? __('Go to Home') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
