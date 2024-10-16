<?php if ($__env->exists('user.partials.rtl-style')) echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-header">
        <h4 class="page-title">
            <?php if($themeInfo->theme_version != 6): ?>
            <?php echo e(__('Features Section')); ?>

            <?php else: ?>
            <?php echo e(__('Video Section')); ?>

            <?php endif; ?>

        </h4>
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
                <a href="#">
                    <?php if($themeInfo->theme_version != 6): ?>
                    <?php echo e(__('Features Section')); ?>

                    <?php else: ?>
                    <?php echo e(__('Video Section')); ?>

                    <?php endif; ?>
                </a>
            </li>
        </ul>
    </div>

    <?php if($themeInfo->theme_version == 1 || $themeInfo->theme_version == 4 ||  $themeInfo->theme_version == 5 || $themeInfo->theme_version == 6 ): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="card-title">

                                    <?php if($themeInfo->theme_version != 6): ?>
                                    <?php echo e(__('Features Section')); ?>

                                    <?php else: ?>
                                    <?php echo e(__('Video Section')); ?>

                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <form id="featureSectionForm"
                                      action="<?php echo e(route('user.home_page.update_feature_section_image')); ?>" method="POST"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="theme_version" value="<?php echo e($themeInfo->theme_version); ?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="col-12 mb-2">
                                                    <label for="image"><strong><?php echo e(__('Image') . '*'); ?></strong></label>
                                                </div>
                                                <div class="col-md-12 showImage mb-3">
                                                    <img
                                                        src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE,$data->features_section_image,$userBs)); ?>"
                                                        alt="..."
                                                        class="img-thumbnail">
                                                </div>
                                                <input type="file" name="features_section_image" id="image"
                                                       class="form-control">
                                                <p id="errfeatures_section_image" class="mt-2 mb-0 text-danger em"></p>
                                                <p class="text-warning mb-0">Upload 625 X 810 image for best quality</p>
                                            </div>
                                           <?php if($themeInfo->theme_version == 4 || $themeInfo->theme_version == 5  || $themeInfo->theme_version == 6 ): ?>
                                            <div class="form-group">
                                                    <label for="">
                                                        <strong>
                                                        <?php if($themeInfo->theme_version == 4  || $themeInfo->theme_version == 5 || $themeInfo->theme_version == 6 ): ?>
                                                        <?php echo e('Video'); ?>

                                                        <?php endif; ?>
                                                        <?php echo e(__('Url')); ?>

                                                        <?php if($themeInfo->theme_version == 1  || $themeInfo->theme_version == 2 || $themeInfo->theme_version == 3 ): ?>
                                                        <?php echo e('*'); ?>

                                                        <?php endif; ?>
                                                        </strong>
                                                </label>
                                                    <input type="text" name="url" placeholder="Enter Url" class="form-control" value="<?php echo e($data->feature_url); ?>">
                                                    <p id="errurl" class="mt-2 mb-0 text-danger em"></p>
                                            </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" id="submitFeatureSectionBtn" class="btn btn-success">
                                    <?php echo e(__('Update')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if($themeInfo->theme_version != 6): ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title"><?php echo e(__('Features')); ?></div>
                        </div>

                        <div class="col-lg-3">
                            <?php if ($__env->exists('user.partials.languages')) echo $__env->make('user.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a href="#" data-toggle="modal" data-target="#createModal"
                               class="btn btn-primary btn-sm float-lg-right float-left"><i
                                    class="fas fa-plus"></i> <?php echo e(__('Add Feature')); ?></a>

                            <button class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete"
                                    data-href="<?php echo e(route('user.home_page.bulk_delete_feature')); ?>">
                                <i class="flaticon-interface-5"></i> <?php echo e(__('Delete')); ?>

                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <?php if(count($features) == 0): ?>
                                <h3 class="text-center mt-2"><?php echo e(__('NO FEATURE FOUND') . '!'); ?></h3>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                        <tr>
                                            <th scope="col">
                                                <input type="checkbox" class="bulk-check" data-val="all">
                                            </th>

                                            <?php if($themeInfo->theme_version == 3): ?>
                                                <th scope="col"><?php echo e(__('Icon')); ?></th>
                                            <?php endif; ?>

                                            <?php if($themeInfo->theme_version == 4 || $themeInfo->theme_version == 5): ?>
                                                <th scope="col"><?php echo e(__('Image')); ?></th>
                                            <?php endif; ?>
                                            <?php if($themeInfo->theme_version != 5): ?>
                                            <th scope="col"><?php echo e(__('Title')); ?></th>
                                            <?php endif; ?>
                                            <th scope="col"><?php echo e(__('Serial Number')); ?></th>
                                            <th scope="col"><?php echo e(__('Actions')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="bulk-check"
                                                           data-val="<?php echo e($feature->id); ?>">
                                                </td>

                                                <?php if($themeInfo->theme_version == 3): ?>
                                                    <td>
                                                        <?php if(is_null($feature->icon)): ?>
                                                            -
                                                        <?php else: ?>
                                                            <i class="<?php echo e($feature->icon); ?>"></i>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>

                                                <?php if($themeInfo->theme_version == 4 || $themeInfo->theme_version == 5): ?>
                                                <td>
                                                    <img
                                                    src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE,$feature->image,$userBs)); ?>"
                                                    alt="client" width="50">
                                                </td>
                                                 <?php endif; ?>

                                                 <?php if($themeInfo->theme_version != 5): ?>
                                                <td>
                                                    <?php echo e(strlen($feature->title) > 30 ? mb_substr($feature->title, 0, 30, 'UTF-8') . '...' : $feature->title); ?>

                                                </td>
                                                <?php endif; ?>
                                                <td><?php echo e($feature->serial_number); ?></td>
                                                <td>
                                                    <a class="btn btn-secondary btn-sm mr-1 editbtn" href="#"
                                                       data-toggle="modal" data-target="#editModal"
                                                       data-id="<?php echo e($feature->id); ?>"
                                                       data-background_color="<?php echo e($feature->background_color); ?>"
                                                       data-icon="<?php echo e($feature->icon); ?>"
                                                       data-feature_title="<?php echo e($feature->title); ?>"
                                                       data-text="<?php echo e($feature->text); ?>"
                                                       data-serial_number="<?php echo e($feature->serial_number); ?>"
                                                       <?php if($themeInfo->theme_version == 4 ||  $themeInfo->theme_version == 5 || $themeInfo->theme_version == 6): ?>
                                                             data-image="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE,$feature->image,$userBs)); ?>"
                                                        <?php else: ?>
                                                             data-image=""
                                                        <?php endif; ?>
                                                       >
                                                        <span class="btn-label">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                        <?php echo e(__('Edit')); ?>

                                                    </a>

                                                    <form class="deleteform d-inline-block"
                                                          action="<?php echo e(route('user.home_page.delete_feature', ['id' => $feature->id])); ?>"
                                                          method="post">

                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                                        <span class="btn-label">
                                                        <i class="fas fa-trash"></i>
                                                        </span>
                                                            <?php echo e(__('Delete')); ?>

                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <?php endif; ?>


    
    <?php echo $__env->make('user.home-page.feature-section.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('user.home-page.feature-section.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/home-page/feature-section/index.blade.php ENDPATH**/ ?>