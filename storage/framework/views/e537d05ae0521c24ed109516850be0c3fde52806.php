<?php if($secInfo->testimonials_section_status == 1): ?>
    <section class="testimonial-area testimonial-area_v3 pt-100 pb-60">
        <div class="container">
            <div class="row align-items-center gx-xl-5">
                <div class="col-lg-5">
                    <div class="content-title mb-30" data-aos="fade-up">
                        <h2 class="title">
                            <?php echo e(!empty($secTitleInfo->testimonials_section_title) ? $secTitleInfo->testimonials_section_title : ''); ?>

                        </h2>
                    </div>
                    <div class="swiper testimonial-slider mb-40" id="testimonial-slider-1" data-aos="fade-up">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <div class="slider-item bg-white">
                                        <div class="quote">
                                            <span class="icon"><i class="fas fa-quote-left"></i></span>
                                            <p class="text font-lg mb-0">
                                                <?php echo e($testimonial->comment); ?>

                                            </p>
                                        </div>
                                        <div
                                            class="d-flex flex-wrap gap-15 align-items-center justify-content-between mt-30">
                                            <div class="client-info d-flex align-items-center">
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
                                            <span class="icon"><i class="fas fa-quote-right"></i></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-lg-first" data-aos="fade-up">
                    <div class="testimonial-images mb-40">
                        <?php if(!empty($testimonialData->testimonials_section_image)): ?>
                            <img class="lazyload blur-up"
                                data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_TESTIMONIAL_SECTION_IMAGE, $testimonialData->testimonials_section_image ?? '', $userBs)); ?>"
                                alt="">
                        <?php else: ?>
                            <img class="lazyload blur-up"
                                data-src="<?php echo e(asset('assets/tenant/image/static/testimonial_bg.png')); ?>"
                                alt="Testimonial Section Image">
                        <?php endif; ?>
                        <!-- Slider pagination -->
                        <div class="swiper-pagination swiper-pagination_gradient " id="testimonial-slider-1-pagination">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme6/testimonials.blade.php ENDPATH**/ ?>