<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Breadcrumb')); ?></h4>
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
                <a href="#"><?php echo e(__('Breadcrumb')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card-title"><?php echo e(__('Update Breadcrumb')); ?></div>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-5 pb-4">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <form id="ajaxForm" action="<?php echo e(route('user.update_breadcrumb')); ?>"
                                  method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <div class="col-12 mb-2">
                                        <label for=""><?php echo e(__('Breadcrumb*')); ?></label>
                                    </div>
                                    <div class="col-md-12 showImage mb-3">
                                        <img
                                            src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_BREADCRUMB,$basic_setting->breadcrumb,$userBs)); ?>"
                                            alt="..." class="img-thumbnail">
                                    </div>
                                    <input type="file" name="breadcrumb" id="image" class="form-control image">
                                    <p class="text-warning mb-0"><?php echo e(__('Only JPG, JPEG, PNG images are allowed')); ?></p>
                                    <p id="errbreadcrumb" class="mb-0 text-danger em"></p>
                                    <p class="text-warning mb-0"><?php echo e(__('Upload 1920 X 820 image for best quality')); ?></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="button" id="submitBtn" class="btn btn-success">
                                <?php echo e(__('Update')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/settings/breadcrumb.blade.php ENDPATH**/ ?>