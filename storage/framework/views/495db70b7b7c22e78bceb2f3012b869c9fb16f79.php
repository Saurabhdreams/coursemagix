<?php if($secInfo->featured_instructors_section_status == 1): ?>
    <section class="instructor-area instructor-area_v2 pt-100 pb-70 bg-img bg-cover"
        data-bg-image="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE, $bs->instructor_bg_image ?? '', $userBs)); ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title">
                            <?php echo e(!empty($secTitleInfo->featured_instructors_section_title) ? $secTitleInfo->featured_instructors_section_title : ''); ?>

                        </h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $instructors->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                <div class="card radius-lg mb-30">
                                    <div class="card-img">
                                        <a title="Image"class="lazy-container ratio ratio-1-2" data-toggle="modal"
                                            data-target="#<?php echo e('staticBackdrop-' . $instructor->id); ?>">
                                            <img class="lazyload"
                                                data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE, $instructor->image ?? '', $userBs)); ?>"
                                                alt="<?php echo e($instructor->name); ?>">
                                        </a>
                                    </div>
                                    <div class="card-content text-center border radius-md">
                                        <h5 class="card-title lc-1 mb-1">
                                            <a title="Link" data-toggle="modal"
                                                data-target="#<?php echo e('staticBackdrop-' . $instructor->id); ?>">
                                                <?php echo e($instructor->name); ?>

                                            </a>
                                        </h5>
                                        <p class="card-text color-primary font-sm">
                                            <?php echo e($instructor->occupation); ?>

                                        </p>
                                        <?php
                                            $socials = $instructor->socialPlatform;
                                        ?>
                                        <?php if(count($socials) > 0): ?>
                                            <div class="social-link social-link_gradient justify-content-center">
                                                <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e($social->url); ?>" target="_blank" title=""><i
                                                            class="<?php echo e($social->icon); ?>"></i></a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="<?php echo e('staticBackdrop-' . $instructor->id); ?>"
                                data-backdrop="false" data-keyboard="false" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                <?php echo e(__('Information Of') . ' ' . $instructor->name); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="summernote-content px-3">
                                                <?php echo replaceBaseUrl($instructor->description, 'summernote'); ?>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary text-secondary"
                                                data-dismiss="modal"><?php echo e($keywords['close'] ?? __('Close')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col">
                                <div class="alert alert-secondary">
                                    <?php echo e($keywords['no_featured_instructor_found'] ?? __('No Featured Instructor Found')); ?>

                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme6/instructors.blade.php ENDPATH**/ ?>