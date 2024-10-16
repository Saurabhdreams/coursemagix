
<!--====== Style color ======-->
<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/ecommerce/assets/css/default.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/ecommerce/assets/css/style.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/ecommerce/assets/css/custom-style.css')); ?>" />

<?php if($currentLanguageInfo->rtl == 1): ?>
    <!-- RTL CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/tenant/ecommerce/assets/css/rtl.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/tenant/ecommerce/assets/css/rtl-responsive.css')); ?>">
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/ecommerce/partials/styles.blade.php ENDPATH**/ ?>