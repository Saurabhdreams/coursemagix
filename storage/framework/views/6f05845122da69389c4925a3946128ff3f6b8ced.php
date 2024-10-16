<?php if ($__env->exists('user.partials.rtl-style')) echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Newsletter Section')); ?></h4>
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
                <a href="#"><?php echo e(__('Home Page')); ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?php echo e(__('Newsletter Section')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card-title"><?php echo e(__('Update Newsletter Section')); ?></div>
                        </div>

                        <div class="col-lg-2">
                            <?php if ($__env->exists('user.partials.languages')) echo $__env->make('user.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <form id="ajaxForm" action="<?php echo e(route('user.home_page.update_newsletter_section', ['language' => request()->input('language')])); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php if($themeInfo->theme_version == 1 || $themeInfo->theme_version == 3 || $themeInfo->theme_version == 4 || $themeInfo->theme_version == 5|| $themeInfo->theme_version == 6): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="col-12 mb-2">
                                                    <label
                                                        for="image"><strong><?php echo e(__('Background Image') . '*'); ?></strong></label>
                                                </div>
                                                <div class="col-md-12 showBackgroundImage mb-3">
                                                    <img
                                                        src="<?php echo e(isset($data->background_image) ? \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_NEWSLETTER_SECTION_IMAGE,$data->background_image,$userBs) : asset('assets/tenant/image/default.jpg')); ?>"
                                                        alt="..."
                                                        class="img-thumbnail">
                                                </div>
                                                <input type="file" name="background_image" id="backgroundImage"
                                                       class="form-control">
                                                <p id="errbackground_image" class="mt-2 mb-0 text-danger em"></p>
                                                <p class="text-warning mb-0">Upload 475 X 880 image for best quality</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($themeInfo->theme_version == 1): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="col-12 mb-2">
                                                    <label for="image"><strong><?php echo e(__('Image') . '*'); ?></strong></label>
                                                </div>
                                                <div class="col-md-12 showImage mb-3">
                                                    <img
                                                        src="<?php echo e(isset($data->image) ? \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_NEWSLETTER_SECTION_IMAGE,$data->image,$userBs) : asset('assets/tenant/image/default.jpg')); ?>"
                                                        alt="..."
                                                        class="img-thumbnail">
                                                </div>
                                                <input type="file" name="image" id="image" class="form-control">
                                                <p id="errimage" class="mt-2 mb-0 text-danger em"></p>
                                                <p class="text-warning mb-0">Upload 520 X 640 image for best quality</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label for=""><?php echo e(__('Title')); ?></label>
                                    <input type="text" class="form-control" name="title" value="<?php echo e(empty($data->title) ? '' : $data->title); ?>" placeholder="Enter Newsletter Section Title">
                                </div>

                                <?php if($themeInfo->theme_version == 1): ?>
                                    <div class="form-group">
                                        <label for=""><?php echo e(__('Text')); ?></label>
                                        <textarea class="form-control" name="text" placeholder="Enter Newsletter Section Text" rows="5"><?php echo e(empty($data->text) ? '' : $data->text); ?></textarea>
                                    </div>
                                <?php endif; ?>
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

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/home-page/newsletter-section.blade.php ENDPATH**/ ?>