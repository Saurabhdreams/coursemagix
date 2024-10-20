<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Website Appearance')); ?></h4>
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
        <a href="#"><?php echo e(__('Basic Settings')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Website Appearance')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form id="ajaxForm" action="<?php echo e(route('user.update.appearance')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="card-header">
            <div class="row">
              <div class="col-lg-10">
                <div class="card-title"><?php echo e(__('Update Website Appearance')); ?></div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <div class="form-group">
                  <label><?php echo e(__('Primary Color') . '*'); ?></label>
                  <input class="jscolor form-control ltr" name="primary_color" value="<?php echo e($data->primary_color); ?>">
                  <p id="errprimary_color" class="mb-0 text-danger em"></p>
                </div>

                <div class="form-group">
                  <label><?php echo e(__('Secondary Color') . '*'); ?></label>
                  <input class="jscolor form-control ltr" name="secondary_color" value="<?php echo e($data->secondary_color); ?>">
                    <p id="errsecondary_color" class="mb-0 text-danger em"></p>
                </div>

                <div class="form-group">
                  <label><?php echo e(__('Breadcrumb Section Overlay Color') . '*'); ?></label>
                  <input class="jscolor form-control ltr" name="breadcrumb_overlay_color" value="<?php echo e($data->breadcrumb_overlay_color); ?>">
                    <p id="errbreadcrumb_overlay_color" class="mb-0 text-danger em"></p>
                </div>

                <div class="form-group">
                  <label><?php echo e(__('Breadcrumb Section Overlay Opacity') . '*'); ?></label>
                  <input class="form-control ltr" type="number" step="0.01" name="breadcrumb_overlay_opacity" value="<?php echo e($data->breadcrumb_overlay_opacity); ?>">
                  <p id="errbreadcrumb_overlay_opacity" class="mb-0 text-danger em"></p>
                  <p class="mt-2 mb-0 text-warning"><?php echo e(__('This will decide the transparency level of the overlay color.')); ?><br>
                    <?php echo e(__('Value must be between 0 to 1.')); ?><br>
                    <?php echo e(__('Transparency level will be lower with the increment of the value.')); ?>

                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-12 text-center">
                  <button type="button" id="submitBtn" class="btn btn-success"><?php echo e(__('Update')); ?></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/settings/appearance.blade.php ENDPATH**/ ?>