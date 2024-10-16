<?php if($secInfo->features_section_status == 1): ?>
    <section class="feature-area feature-area_v3 pb-100">
        <div class="banner-img z-1" data-aos="fade-up">
            <div class="lazy-container ratio ratio-21-8">
                <img class="lazyload"
                    data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE, $userBs->features_section_image ?? '', $userBs)); ?>"
                    alt="Image">
            </div>
            <?php if($userBs->feature_url): ?>
                <a href="<?php echo e($userBs->feature_url); ?>" class="video-btn youtube-popup p-absolute"
                    title="<?php echo e($keywords['play_video'] ?? __('Play Video')); ?>">
                    <i class="fas fa-play"></i>
                </a>
            <?php endif; ?>
        </div>
        <?php if ($__env->exists('user-front.theme6.counter-area')) echo $__env->make('user-front.theme6.counter-area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme6/featured-area.blade.php ENDPATH**/ ?>