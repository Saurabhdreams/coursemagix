<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Mail Information')); ?></h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="<?php echo e(route('user-dashboard')); ?>">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Settings')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Mail Information')); ?></a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <form action="<?php echo e(route('user.mail.info.update')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="card-header">
            <div class="card-title"><?php echo e(__('Mail Information')); ?></div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8 offset-lg-2">
                  <div class="form-group">
                    <label for="email"><?php echo e(__('Reply To')); ?> **</label>
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e($info->email ?? Auth::user()->email); ?>" placeholder="<?php echo e(__('Enter Email Address')); ?>">
                    <?php if($errors->has('email')): ?>
                      <p class="text-danger mb-0"><?php echo e($errors->first('email')); ?></p>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                      <label for="from-name"><?php echo e(__('From Name')); ?> **</label>
                      <input id="from-name" type="text" class="form-control" name="from_name" value="<?php echo e($info->from_name ?? Auth::user()->company_name); ?>" placeholder="<?php echo e(__('Enter From name')); ?>">
                      <?php if($errors->has('from_name')): ?>
                          <p class="text-danger mb-0"><?php echo e($errors->first('from_name')); ?></p>
                      <?php endif; ?>
                  </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-success">
              <?php echo e(__('save')); ?>

            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/settings/email/mail-information.blade.php ENDPATH**/ ?>