<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Maintenance Mode')); ?></h4>
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
                <a href="#"><?php echo e(__('Maintenance Mode')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-title"><?php echo e(__('Update Maintenance Mode')); ?></div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <form id="ajaxForm" action="<?php echo e(route('user.update_maintenance_mode')); ?>"
                                  method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label
                                                    for="image"><strong><?php echo e(__('Maintenance Mode Image') . '*'); ?></strong></label>
                                            </div>
                                            <div class="col-md-12 showImage mb-3">
                                                <img src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_MAINTENANCE_IMAGE,$data->maintenance_img,$userBs)); ?>"
                                                    alt="..." class="img-thumbnail">
                                            </div>
                                            <input type="file" name="maintenance_img" id="image" class="form-control">
                                            <p id="errmaintenance_img" class="mb-0 text-danger em"></p>
                                            <p class="text-warning mb-0">Upload 770 X 720 image for best quality</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Maintenance Status*')); ?></label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="maintenance_status" value="1"
                                                   class="selectgroup-input" <?php echo e($data->maintenance_status == 1 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button"><?php echo e(__('Active')); ?></span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="maintenance_status" value="0"
                                                   class="selectgroup-input" <?php echo e($data->maintenance_status == 0 ? 'checked' : ''); ?>>
                                            <span class="selectgroup-button"><?php echo e(__('Deactive')); ?></span>
                                        </label>
                                    </div>
                                    <p id="errmaintenance_status" class="mb-0 text-danger em"></p>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Maintenance Message*')); ?></label>
                                    <textarea class="form-control" name="maintenance_msg" rows="3"
                                              cols="80"><?php echo $data->maintenance_msg; ?></textarea>
                                    <p id="errmaintenance_msg" class="mb-0 text-danger em"></p>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Bypass Token')); ?></label>
                                    <input type="text" class="form-control" name="bypass_token"
                                           value="<?php echo e($data->bypass_token); ?>" placeholder="<?php echo e(__('Enter Bypass Token')); ?>">
                                    <p class="mt-2 mb-0 text-info">
                                        <?php echo e(__('During maintenance, you can access the system through this token.')); ?>

                                        <br>
                                        <strong>Example:</strong> 
                                        <span class="text-warning"><?php echo e(url('/').'/'.\Illuminate\Support\Facades\Auth::user()->username.'/apply/your-bypass-token-here'); ?></span><br>
                                        <?php echo e(__('Please Do not use special character in token.')); ?>

                                    </p>
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

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/settings/maintenance.blade.php ENDPATH**/ ?>