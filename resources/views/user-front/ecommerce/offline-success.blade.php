<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Success!</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/tenant/ecommerce/assets/css/plugin.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/tenant/ecommerce/assets/css/success.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/tenant/ecommerce/assets/css/cookie-alert.css') }}">
    <!-- base color change -->

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
                    <div class="payment_header">
                        <div class="check">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="content">
                        <h1> {{ $keywords['Success'] ?? __('Success') }}</h1>
                        <p class="paragraph-text">
                            {{ $keywords['tenant_offline_payment_success_text'] ?? 'Your Order Compete Successfully' }}
                        </p>
                        <a
                            href="{{ route('customer.dashboard', getParam()) }}">{{ $keywords['Go_to_Dashboard'] ?? 'Go to Dashboard' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
