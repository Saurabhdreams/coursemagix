<?php if($secInfo->testimonials_section_status == 1): ?>
    <section class="testimonial-area testimonial-area_v2 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title">
                            <?php echo e(!empty($secTitleInfo->testimonials_section_title) ? $secTitleInfo->testimonials_section_title : ''); ?>

                        </h2>
                    </div>
                </div>
            </div>
            <?php if($testimonials->count() > 0): ?>
                <div class="row align-items-center gx-xl-5">
                    <div class="col-lg-5">
                        <div class="swiper testimonial-slider mb-40" id="testimonial-slider-1" data-aos="fade-up">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <div class="slider-item bg-white">
                                            <span class="icon"><i class="fas fa-quote-right"></i></span>
                                            <div class="quote">
                                                <p class="text font-lg mb-0">
                                                    <?php echo e($testimonial->comment); ?>

                                                </p>
                                            </div>
                                            <div class="client-info d-flex align-items-center mt-30">
                                                <div class="client-img">
                                                    <div class="lazy-container rounded-pill ratio ratio-1-1">
                                                        <img class="lazyload"
                                                            data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_TESTIMONIAL_CLIENT_IMAGE, $testimonial->image ?? '', $userBs)); ?>"
                                                            alt="<?php echo e($testimonial->name); ?>">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h6 class="name mb-0"><?php echo e($testimonial->name); ?></h6>
                                                    <span
                                                        class="designation font-sm"><?php echo e($testimonial->occupation); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="swiper-pagination" id="testimonial-slider-1-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-7" data-aos="fade-up">
                        <div class="testimonial-images mb-40 ps-lg-5">
                            <div class="wrapper">
                                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img class="lazyload"
                                        data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_TESTIMONIAL_CLIENT_IMAGE, $testimonial->image ?? '', $userBs)); ?>"
                                        alt="<?php echo e($testimonial->name); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>

                </div>
            <?php else: ?>
                <div class="row">
                    <div class="alert alert-secondary">
                        <?php echo e($keywords['no_testimonial_found'] ?? __('No Testimonial Found')); ?>

                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme5/testimonials.blade.php ENDPATH**/ ?>