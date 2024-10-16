<?php
    $user = Auth::guard('web')->user();
    $features = \App\Http\Helpers\UserPermissionHelper::currentPackageFeatures($user->id);
    $hasAwsPermission = in_array("Amazon AWS s3", $features);
?>
<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Plugins')); ?></h4>
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
        <a href="#"><?php echo e(__('Plugins')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
      <?php if($hasAwsPermission): ?>
          <div class="col-lg-4">
              <div class="card">
                  <form action="<?php echo e(route('user.update_aws_credentials')); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <div class="card-header">
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="card-title"><?php echo e(__('AWS Credentials')); ?></div>
                              </div>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <label><?php echo e(__('AWS Status*')); ?></label>
                                      <div class="selectgroup w-100">
                                          <label class="selectgroup-item">
                                              <input type="radio" name="aws_status" value="1" class="selectgroup-input" <?php echo e($data->aws_status == 1 ? 'checked' : ''); ?>>
                                              <span class="selectgroup-button"><?php echo e(__('Active')); ?></span>
                                          </label>

                                          <label class="selectgroup-item">
                                              <input type="radio" name="aws_status" value="0" class="selectgroup-input" <?php echo e($data->aws_status != 1 ? 'checked' : ''); ?>>
                                              <span class="selectgroup-button"><?php echo e(__('Deactive')); ?></span>
                                          </label>
                                      </div>

                                      <?php if($errors->has('aws_status')): ?>
                                          <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('aws_status')); ?></p>
                                      <?php endif; ?>
                                  </div>

                                  <div class="form-group">
                                      <label><?php echo e(__('AWS Access Key Id*')); ?></label>
                                      <input type="text" class="form-control" name="aws_access_key_id" value="<?php echo e($data->aws_access_key_id); ?>">

                                      <?php if($errors->has('aws_access_key_id')): ?>
                                          <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('aws_access_key_id')); ?></p>
                                      <?php endif; ?>
                                  </div>
                                  <div class="form-group">
                                      <label><?php echo e(__('AWS Secret Access Key*')); ?></label>
                                      <input type="text" class="form-control" name="aws_secret_access_key" value="<?php echo e($data->aws_secret_access_key); ?>">

                                      <?php if($errors->has('aws_secret_access_key')): ?>
                                          <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('aws_secret_access_key')); ?></p>
                                      <?php endif; ?>
                                  </div>
                                  <div class="form-group">
                                      <label><?php echo e(__('AWS Default Region*')); ?></label>
                                      <input type="text" class="form-control" name="aws_default_region" value="<?php echo e($data->aws_default_region); ?>">

                                      <?php if($errors->has('aws_default_region')): ?>
                                          <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('aws_default_region')); ?></p>
                                      <?php endif; ?>
                                  </div>
                                  <div class="form-group">
                                      <label><?php echo e(__('AWS Bucket*')); ?></label>
                                      <input type="text" class="form-control" name="aws_bucket" value="<?php echo e($data->aws_bucket); ?>">

                                      <?php if($errors->has('aws_bucket')): ?>
                                          <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('aws_bucket')); ?></p>
                                      <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="card-footer">
                          <div class="row">
                              <div class="col-12 text-center">
                                  <button type="submit" class="btn btn-success">
                                      <?php echo e(__('Update')); ?>

                                  </button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      <?php endif; ?>
    <div class="col-lg-4">
      <div class="card">
        <form action="<?php echo e(route('user.update_disqus')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="card-header">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-title"><?php echo e(__('Disqus')); ?></div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label><?php echo e(__('Disqus Status*')); ?></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="disqus_status" value="1" class="selectgroup-input" <?php echo e($data->disqus_status == 1 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Active')); ?></span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="disqus_status" value="0" class="selectgroup-input" <?php echo e($data->disqus_status == 0 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Deactive')); ?></span>
                    </label>
                  </div>

                  <?php if($errors->has('disqus_status')): ?>
                    <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('disqus_status')); ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group">
                  <label><?php echo e(__('Disqus Short Name*')); ?></label>
                  <input type="text" class="form-control" name="disqus_short_name" value="<?php echo e($data->disqus_short_name); ?>">

                  <?php if($errors->has('disqus_short_name')): ?>
                    <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('disqus_short_name')); ?></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-success">
                  <?php echo e(__('Update')); ?>

                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="col-lg-4">
      <div class="card">
        <form action="<?php echo e(route('user.update_whatsapp')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="card-header">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-title"><?php echo e(__('WhatsApp')); ?></div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label><?php echo e(__('WhatsApp Status*')); ?></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="whatsapp_status" value="1" class="selectgroup-input" <?php echo e($data->whatsapp_status == 1 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Active')); ?></span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="whatsapp_status" value="0" class="selectgroup-input" <?php echo e($data->whatsapp_status == 0 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Deactive')); ?></span>
                    </label>
                  </div>

                  <?php if($errors->has('whatsapp_status')): ?>
                    <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('whatsapp_status')); ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group">
                  <label><?php echo e(__('WhatsApp Number*')); ?></label>
                  <input type="text" class="form-control" name="whatsapp_number" value="<?php echo e($data->whatsapp_number); ?>">

                  <?php if($errors->has('whatsapp_number')): ?>
                    <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('whatsapp_number')); ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group">
                  <label><?php echo e(__('WhatsApp Header Title*')); ?></label>
                  <input type="text" class="form-control" name="whatsapp_header_title" value="<?php echo e($data->whatsapp_header_title); ?>">

                  <?php if($errors->has('whatsapp_header_title')): ?>
                    <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('whatsapp_header_title')); ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group">
                  <label><?php echo e(__('WhatsApp Popup Status*')); ?></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="whatsapp_popup_status" value="1" class="selectgroup-input" <?php echo e($data->whatsapp_popup_status == 1 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Active')); ?></span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="whatsapp_popup_status" value="0" class="selectgroup-input" <?php echo e($data->whatsapp_popup_status == 0 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Deactive')); ?></span>
                    </label>
                  </div>

                  <?php if($errors->has('whatsapp_popup_status')): ?>
                    <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('whatsapp_popup_status')); ?></p>
                  <?php endif; ?>
                </div>

                <div class="form-group">
                  <label><?php echo e(__('WhatsApp Popup Message*')); ?></label>
                  <textarea class="form-control" name="whatsapp_popup_message" rows="2"><?php echo e($data->whatsapp_popup_message); ?></textarea>

                  <?php if($errors->has('whatsapp_popup_message')): ?>
                    <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('whatsapp_popup_message')); ?></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-success">
                  <?php echo e(__('Update')); ?>

                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/settings/plugins.blade.php ENDPATH**/ ?>