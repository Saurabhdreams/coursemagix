<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title><?php echo e($bs->website_title); ?></title>
  	<link rel="icon" href="<?php echo e(asset('assets/front/img/'.$bs->favicon)); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/login.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/forget.css')); ?>">
  </head>
  <body>
    <div class="login-page">
      <div class="text-center mb-4">
        <img class="login-logo" src="<?php echo e(asset('assets/front/img/'.$bs->logo)); ?>" alt="">
      </div>
      <div class="form">
        <?php if(session()->has('success')): ?>
          <div class="alert alert-success fade show" role="alert">
            <strong><?php echo e(__('Success')); ?>!</strong> <?php echo e(session('success')); ?>

          </div>
        <?php endif; ?>
        <form class="login-form" action="<?php echo e(route('admin.forget.mail')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <input type="email" name="email" placeholder="<?php echo e(__('Enter email address')); ?>"/>
          <?php if($errors->has('email')): ?>
            <p class="text-danger text-left"><?php echo e($errors->first('email')); ?></p>
          <?php endif; ?>
          <button type="submit"><?php echo e(__('Send Mail')); ?></button>
        </form>

        <p class="back-link">
          <a href="<?php echo e(route('admin.login')); ?>">&lt;&lt; <?php echo e(__('Back')); ?></a>
        </p>
      </div>
    </div>


    <!-- jquery js -->
    <script src="<?php echo e(asset('assets/front/js/jquery-3.3.1.min.js')); ?>"></script>
    <!-- popper js -->
    <script src="<?php echo e(asset('assets/front/js/popper.min.js')); ?>"></script>
    <!-- bootstrap js -->
    <script src="<?php echo e(asset('assets/front/js/bootstrap.min.js')); ?>"></script>
    <!-- Bootstrap Notify -->
    <script src="<?php echo e(asset('assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>

  </body>
</html>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/admin/forget.blade.php ENDPATH**/ ?>