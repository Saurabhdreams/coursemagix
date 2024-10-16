<?php if ($__env->exists('user.partials.rtl-style')) echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Hero Section')); ?></h4>
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
                <a href="#"><?php echo e(__('Hero Section')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card-title"><?php echo e(__('Update Hero Section')); ?></div>
                        </div>

                        <div class="col-lg-2">
                            <?php if ($__env->exists('user.partials.languages')) echo $__env->make('user.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <form id="ajaxForm"
                                  action="<?php echo e(route('user.home_page.update_hero_section', ['language' => request()->input('language')])); ?>"
                                  method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <?php if($themeInfo->theme_version == 1 || $themeInfo->theme_version == 2 || $themeInfo->theme_version ==3  || $themeInfo->theme_version == 5 ): ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label for="image"><strong><?php echo e(__('Background Image') . '*'); ?></strong></label>
                                            </div>
                                            <div class="col-md-12 showBackgroundImage mb-3">
                                                <img
                                                    src="<?php echo e(isset($data->background_image) ? \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_HERO_SECTION_IMAGE,$data->background_image,$userBs) : asset('assets/tenant/image/default.jpg')); ?>"
                                                    alt="..."
                                                    class="img-thumbnail">
                                            </div>
                                            <input type="file" name="background_image" id="backgroundImage"
                                                   class="form-control">
                                            <p id="errbackground_image" class="mt-2 mb-0 text-danger em"></p>
                                            <p class="text-warning mb-0">Upload 1920 X 900 image for best quality</p>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for=""><?php echo e(__('First Title')); ?></label>
                                            <input type="text" class="form-control" name="first_title"
                                                   value="<?php echo e(empty($data->first_title) ? '' : $data->first_title); ?>"
                                                   placeholder="Enter First Title">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for=""><?php echo e(__('Second Title')); ?></label>
                                            <input type="text" class="form-control" name="second_title"
                                                   value="<?php echo e(empty($data->second_title) ? '' : $data->second_title); ?>"
                                                   placeholder="Enter Second Title">
                                        </div>
                                    </div>
                                </div>

                                <?php if($themeInfo->theme_version == 1 || $themeInfo->theme_version == 3): ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for=""><?php echo e(__('First Button')); ?></label>
                                                <input type="text" class="form-control" name="first_button"
                                                       value="<?php echo e(empty($data->first_button) ? '' : $data->first_button); ?>"
                                                       placeholder="Enter First Button Name">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for=""><?php echo e(__('First Button URL')); ?></label>
                                                <input type="url" class="form-control ltr" name="first_button_url"
                                                       value="<?php echo e(empty($data->first_button_url) ? '' : $data->first_button_url); ?>"
                                                       placeholder="Enter First Button URL">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for=""><?php echo e(__('Second Button')); ?></label>
                                                <input type="text" class="form-control" name="second_button"
                                                       value="<?php echo e(empty($data->second_button) ? '' : $data->second_button); ?>"
                                                       placeholder="Enter Second Button Name">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for=""><?php echo e(__('Second Button URL')); ?></label>
                                                <input type="url" class="form-control ltr" name="second_button_url"
                                                       value="<?php echo e(empty($data->second_button_url) ? '' : $data->second_button_url); ?>"
                                                       placeholder="Enter Second Button URL">
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($themeInfo->theme_version == 2): ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for=""><?php echo e(__('Video URL')); ?></label>
                                                <input type="url" class="form-control ltr" name="video_url"
                                                       value="<?php echo e(empty($data->video_url) ? '' : $data->video_url); ?>"
                                                       placeholder="Enter Video URL">
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($themeInfo->theme_version == 3 || $themeInfo->theme_version == 4 || $themeInfo->theme_version == 6): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="col-12 mb-2">
                                                    <label for="image"><strong><?php echo e(__('Image')); ?></strong></label>
                                                </div>
                                                <div class="col-md-12 showImage mb-3">
                                                    <img
                                                        src="<?php echo e(isset($data->image) ? asset('assets/tenant/image/hero-section/' . $data->image) : asset('assets/tenant/image/default.jpg')); ?>"
                                                        alt="..."
                                                        class="img-thumbnail">
                                                </div>
                                                <input type="file" name="image" id="image" class="form-control">
                                                <p id="errimage" class="mt-2 mb-0 text-danger em"></p>
                                            </div>
                                        </div>
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

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/home-page/hero-section.blade.php ENDPATH**/ ?>