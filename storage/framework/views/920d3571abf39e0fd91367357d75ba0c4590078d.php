<!-- CSS Files -->

<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/all.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/fontawesome-iconpicker.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/dropzone.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap-tagsinput.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap-datepicker.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/jquery-ui.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/jquery.timepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/summernote-bs4.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/atlantis.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/custom.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/version-header.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/select2.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('assets/tenant/css/monokai-sublime.css')); ?>">

<?php if(request()->cookie('user-theme') == 'dark'): ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/dark.css')); ?>">
<?php endif; ?>

<?php echo $__env->yieldContent('styles'); ?>
<?php /**PATH C:\xampp\htdocs\coursemagix\resources\views/user/partials/styles.blade.php ENDPATH**/ ?>