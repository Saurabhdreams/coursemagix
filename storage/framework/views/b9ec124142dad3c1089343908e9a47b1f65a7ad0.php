
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo e(asset('assets/front/theme_4_5_6/assets/css/vendors/bootstrap.min.css')); ?>">
<!-- Fontawesome Icon CSS -->
<link rel="stylesheet" href="<?php echo e(asset('assets/front/theme_4_5_6/assets/fonts/fontawesome/css/all.min.css')); ?>">
<!-- Icomoon Icon CSS -->
<link rel="stylesheet" href="<?php echo e(asset('assets/front/theme_4_5_6/assets/fonts/icomoon/style.css')); ?>">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="<?php echo e(asset('assets/front/theme_4_5_6/assets/css/vendors/magnific-popup.min.css')); ?>">
<!-- Swiper Slider -->
<link rel="stylesheet" href="<?php echo e(asset('assets/front/theme_4_5_6/assets/css/vendors/swiper-bundle.min.css')); ?>">
<!-- Nice Select -->
<link rel="stylesheet" href="<?php echo e(asset('assets/front/theme_4_5_6/assets/css/vendors/nice-select.css')); ?>">
<!-- AOS Animation CSS -->
<link rel="stylesheet" href="<?php echo e(asset('assets/front/theme_4_5_6/assets/css/vendors/aos.min.css')); ?>">
<!-- Animate CSS -->
<link rel="stylesheet" href="<?php echo e(asset('assets/front/theme_4_5_6/assets/css/vendors/animate.min.css')); ?>">
<?php echo $__env->make('user-front.common.partials.plugin_style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Main Style CSS -->
<link rel="stylesheet" href="<?php echo e(asset('assets/front/theme_4_5_6/assets/css/style.css')); ?>">
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?php echo e(asset('assets/front/theme_4_5_6/assets/css/responsive.css')); ?>">

<?php if($currentLanguageInfo->rtl == 1): ?>
    <!-- RTL CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/front/theme_4_5_6/assets/css/rtl.css')); ?>">
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/theme_4_5_6_home_css.blade.php ENDPATH**/ ?>