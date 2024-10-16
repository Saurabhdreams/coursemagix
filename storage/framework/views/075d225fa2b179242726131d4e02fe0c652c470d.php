<?php if($secInfo->features_section_status == 1): ?>
    <section class="feature-area feature-area_v2 pb-100">
        <div class="banner-img z-1" data-aos="fade-up">
            <div class="lazy-container ratio ratio-21-8">
                <?php if($userBs->features_section_image): ?>
                <img class="lazyload"
                    data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE, $userBs->features_section_image ?? '', $userBs)); ?>"
                    alt="Image">
                    <?php else: ?>
                      <img class="lazyload" data-src="<?php echo e(asset('assets/tenant/image/static/no-image.png')); ?>"
                                    alt="Image">
                    <?php endif; ?>
            </div>
            <?php if($userBs->feature_url): ?>
            <a href="<?php echo e($userBs->feature_url); ?>" class="video-btn youtube-popup p-absolute"
                title=" <?php echo e($keywords['play_video'] ?? __('Play Video')); ?>">
                <i class="fas fa-play"></i>
            </a>
            <?php endif; ?>
        </div>
        <?php if($features->count() > 0): ?>
        <div class="feature-cards mtn-50" data-aos="fade-up">
            <div class="container">
                <div class="wrapper bg-white shadow-md radius-md px-30 pb-30">
                    <div class="row">
                        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-2">
                                <div class="card text-center mt-30">
                                    <div class="card-icon mx-auto mb-20">
                                        <img class="lazyload"
                                            data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE, $item->image ?? '', $userBs)); ?>"
                                            alt="Image">
                                    </div>
                                    <h6 class="card-title lc-1 mb-0">
                                        <a target="_self" title="<?php echo e($item->title); ?>">
                                            <?php echo e($item->title); ?>

                                        </a>
                                    </h6>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="arrows d-none d-lg-block">
                        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->last): ?>
                            <?php else: ?>
                                <img class="arrow lazyload"
                                    data-src="<?php echo e(asset('assets/front/theme_4_5_6/assets/images/icon/line-arrow-2.png')); ?>"
                                    alt="Image">
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme5/featured-area.blade.php ENDPATH**/ ?>