<!DOCTYPE html>
<html lang="<?php echo e($currentLanguageInfo->code); ?>" <?php if($currentLanguageInfo->rtl == 1): ?> dir="rtl" <?php endif; ?>>

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <?php if(isset($websiteInfo) && isset($websiteInfo->website_title)): ?>
    <title><?php echo e($websiteInfo->website_title); ?> - <?php echo $__env->yieldContent('pageHeading'); ?> </title>
    <?php else: ?>
    <title> <?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('pageHeading'); ?></title>
    <?php endif; ?>

    <meta name="keywords" content="<?php echo $__env->yieldContent('metaKeywords'); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('metaDescription'); ?>">

    
    <link rel="shortcut icon" type="image/png" href="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FAVICON, $websiteInfo->favicon, $userBs, 'assets/front/img/' . $bs->favicon)); ?>">

    
    <?php echo $__env->make('user-front.common.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('style'); ?>

    
    
    <?php
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
    ?>
    <link rel="stylesheet" href="<?php echo e(asset("assets/tenant/css/website-color.php?primary_color=$primaryColor&secondary_color=$secondaryColor&footer_background_color=$footerBackgroundColor&copyright_background_color=$copyrightBackgroundColor&breadcrumb_overlay_color=$breadcrumbOverlayColor&breadcrumb_overlay_opacity=$breadcrumbOverlayOpacity")); ?>">
</head>
<?php
$activeThemeClass = '';
?>

<body>
    
    <?php if($userBs->theme_version == 1 || $userBs->theme_version == 2 || $userBs->theme_version == 3): ?>
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div id="preLoader">
        <div class="loader"></div>
    </div>
    <?php endif; ?>
    

    
    <div class="request-loader" style="display:none">
        <img src="<?php echo e(asset('assets/front/img/loader.svg')); ?>" alt="">
    </div>
    

    
    <?php if(!request()->routeIs('customer.my_course.curriculum')): ?>
    <?php if($userBs->theme_version == 1): ?>
    <header class="header-area header-area-one">
        

        <?php if ($__env->exists('user-front.common.partials.header.header-top-v1')) echo $__env->make('user-front.common.partials.header.header-top-v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <?php if ($__env->exists('user-front.common.partials.header.header-nav-v1')) echo $__env->make('user-front.common.partials.header.header-nav-v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <?php elseif($userBs->theme_version == 2): ?>
    <header class="header-area header-area-two">
        
        <?php if ($__env->exists('user-front.common.partials.header.header-nav-v2')) echo $__env->make('user-front.common.partials.header.header-nav-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <?php elseif($userBs->theme_version == 3): ?>
    <header class="header-area header-area-three">
        
        <?php if ($__env->exists('user-front.common.partials.header.header-top-v3')) echo $__env->make('user-front.common.partials.header.header-top-v3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <?php if ($__env->exists('user-front.common.partials.header.header-nav-v3')) echo $__env->make('user-front.common.partials.header.header-nav-v3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <?php elseif($userBs->theme_version == 4): ?>
    <header class="header-area header-area_v1 <?php if(request()->routeIs('front.user.blog_details')): ?> no-breadcrumb <?php endif; ?>">
        
        <?php echo $__env->make('user-front.common.partials.header.header-top-v4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php echo $__env->make('user-front.common.partials.header.header-nav-v4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <?php elseif($userBs->theme_version == 5): ?>
    <header class="header-area header-area_v2 <?php if(request()->routeIs('front.user.blog_details')): ?> no-breadcrumb <?php endif; ?>">
        
        <?php echo $__env->make('user-front.common.partials.header.header-top-v5', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php echo $__env->make('user-front.common.partials.header.header-nav-v5', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <?php elseif($userBs->theme_version == 6): ?>
    <header class="header-area header-area_v1 <?php if(request()->routeIs('front.user.blog_details')): ?> no-breadcrumb <?php endif; ?>">
        
        <?php echo $__env->make('user-front.common.partials.header.header-top-v6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php echo $__env->make('user-front.common.partials.header.header-nav-v6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <?php endif; ?>
    <?php endif; ?>
    

    <?php echo $__env->yieldContent('content'); ?>

    
    <?php if(
    ($userBs->theme_version == 4 || $userBs->theme_version == 5 || $userBs->theme_version == 6) &&
    request()->routeIs('front.user.detail.view')): ?>
    <div class="go-top active">
        <i class="fal fa-long-arrow-up"></i>
    </div>
    <?php else: ?>
    <div class="back-to-top">
        <a href="#">
            <i class="fal fa-chevron-double-up"></i>
        </a>
    </div>
    <?php endif; ?>
    

    
    <?php echo $__env->make('user-front.common.partials.popups', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php
    $cookieStatus = !empty($cookieAlertInfo) && $cookieAlertInfo->cookie_alert_status == 1 ? true : false;
    $cookieName = str_replace(' ', '_', $userBs->website_title . '_' . $user->username);
    $cookieName = strtolower($cookieName) . '_cookie';

    \Config::set('cookie-consent.enabled', $cookieStatus);
    \Config::set('cookie-consent.cookie_name', $cookieName);
    ?>
    
    <div class="cookie">
        <?php echo $__env->make('cookie-consent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <div id="WAButton"></div>
    
    <?php if(!empty($packagePermissions) && in_array('Ecommerce', $packagePermissions)): ?>
    <?php
    $userShop = \App\Models\Ecommerce\UserShopSetting::where('user_id', $user->id)->first();
    ?>
    <?php if(!empty($userShop)): ?>
    <?php if($userShop->is_shop == 1): ?>
    <div id="cartIconWrapper">
        <a class="d-block" id="cartIcon" href="<?php echo e(route('front.user.cart', getParam())); ?>">
            <div class="cart-length">
                <i class="fal fa-shopping-bag"></i>
                <span class="length"><?php echo e(cartLength()); ?> <?php echo e($keywords['ITEMS'] ?? __('ITEMS')); ?></span>
            </div>
            <div class="cart-total">
                <?php echo e($userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : ''); ?><?php echo e(cartTotal()); ?><?php echo e($userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : ''); ?>

            </div>
        </a>
    </div>
    <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>
    

    
    <?php if(!request()->routeIs('customer.my_course.curriculum')): ?>
    <?php if($userBs->theme_version == 1 || $userBs->theme_version == 3): ?>
    <?php if ($__env->exists('user-front.common.partials.footer.footer')) echo $__env->make('user-front.common.partials.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($userBs->theme_version == 4): ?>
    <?php if ($__env->exists('user-front.common.partials.footer.footer-v4')) echo $__env->make('user-front.common.partials.footer.footer-v4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($userBs->theme_version == 5): ?>
    <?php if ($__env->exists('user-front.common.partials.footer.footer-v5')) echo $__env->make('user-front.common.partials.footer.footer-v5', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($userBs->theme_version == 6): ?>
    <?php if ($__env->exists('user-front.common.partials.footer.footer-v6')) echo $__env->make('user-front.common.partials.footer.footer-v6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
    <?php if ($__env->exists('user-front.common.partials.footer.footer-v2')) echo $__env->make('user-front.common.partials.footer.footer-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>
    
    <?php if ($__env->exists('user-front.common.partials.scripts')) echo $__env->make('user-front.common.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/layout.blade.php ENDPATH**/ ?>