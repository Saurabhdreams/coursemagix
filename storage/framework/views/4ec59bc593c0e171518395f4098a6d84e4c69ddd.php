
<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/animate.min.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/all.min.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/flaticon.css')); ?>">
<?php if($userBs->theme_version == 1 || $userBs->theme_version == 2 || $userBs->theme_version == 3): ?>


<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap.min.css')); ?>">

<?php endif; ?>


<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/magnific-popup.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/owl-carousel.min.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/nice-select.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/slick.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/toastr.min.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/datatables-1.10.23.min.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/whatsapp.min.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/jquery-ui.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/monokai-sublime.css')); ?>">

<?php if(request()->routeIs('customer.my_course.curriculum')): ?>
  
  <link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/video.min.css')); ?>">
<?php endif; ?>


<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/default.min.css')); ?>">
<?php if($userBs->theme_version == 4 || $userBs->theme_version == 5 || $userBs->theme_version ==6): ?>
<!-- Header-footer CSS -->
<link rel="stylesheet" href="<?php echo e(asset('assets/front/theme_4_5_6/assets/css/header-footer.css')); ?>">

<?php endif; ?>


<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/mega-menu.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/main.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/responsive.css')); ?>">

<?php if($currentLanguageInfo->rtl == 1): ?>
  
  <link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/rtl.css')); ?>">

  
  <link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/rtl-responsive.css')); ?>">
<?php endif; ?>

<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/multipurpose_style.blade.php ENDPATH**/ ?>