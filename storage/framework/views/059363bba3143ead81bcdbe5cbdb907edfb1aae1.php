<?php if ($__env->exists('user.partials.rtl-style')) echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Cookie Alert')); ?></h4>
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
        <a href="#"><?php echo e(__('Cookie Alert')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-10">
              <div class="card-title"><?php echo e(__('Update Cookie Alert')); ?></div>
            </div>

            <div class="col-lg-2">
              <?php if ($__env->exists('user.partials.languages')) echo $__env->make('user.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
          </div>
        </div>

        <div class="card-body pt-5">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <form id="ajaxForm" action="<?php echo e(route('user.update_cookie_alert', ['language' => request()->input('language')])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <label><?php echo e(__('Cookie Alert Status*')); ?></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="cookie_alert_status" value="1" class="selectgroup-input" <?php echo e($data != null && $data->cookie_alert_status == 1 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Active')); ?></span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="cookie_alert_status" value="0" class="selectgroup-input" <?php echo e($data == null || $data->cookie_alert_status != 1 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Deactive')); ?></span>
                    </label>
                  </div>
                  <p id="errcookie_alert_status" class="mb-0 text-danger em"></p>
                </div>

                <div class="form-group">
                  <label><?php echo e(__('Cookie Alert Button Text*')); ?></label>
                  <input type="text" class="form-control" name="cookie_alert_btn_text" value="<?php echo e($data != null ? $data->cookie_alert_btn_text : ''); ?>" placeholder="<?php echo e(__('Enter Cookie Alert Button Text')); ?>">
                  <p id="errcookie_alert_btn_text" class="em text-danger mb-0"></p>
                </div>

                <div class="form-group">
                  <label for=""><?php echo e(__('Cookie Alert Text*')); ?></label>
                  <textarea class="form-control summernote" name="cookie_alert_text" data-height="120"><?php echo $data != null ? replaceBaseUrl($data->cookie_alert_text, 'summernote') : ''; ?></textarea>
                  <p id="errcookie_alert_text" class="em text-danger mb-0"></p>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-12 text-center">
              <button type="submit" id="submitBtn" class="btn btn-success">
                <?php echo e(__('Update')); ?>

              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/settings/cookie-alert.blade.php ENDPATH**/ ?>