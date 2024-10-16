<?php if($secInfo->featured_courses_section_status == 1): ?>
    <?php
        $totalCourses = count($courses);
    ?>

    <section class="product-area pb-75">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">
                            <?php echo e(!empty($secTitleInfo->featured_courses_section_title) ? $secTitleInfo->featured_courses_section_title : ''); ?>

                        </h2>
                        <?php if($totalCourses > 0): ?>
                            <div class="cta-btn">
                                <a href="<?php echo e(route('front.user.courses', getParam())); ?>"
                                    class="btn btn-lg btn-primary btn-gradient rounded-pill"
                                    title=" <?php echo e($keywords['see_all_course'] ?? __('See All Course')); ?>"
                                    target="_self"><?php echo e($keywords['see_all_course'] ?? __('See All Course')); ?></a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                <?php if($totalCourses > 0): ?>
                    <div class="col-12">
                        <!-- Slider main container -->
                        <div class="swiper product-inline-slider" id="product-inline-slider-1" data-slides-per-view="2"
                            data-swiper-loop="true" data-aos="fade-up">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->

                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <?php echo $__env->make('user-front.theme6.course', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination swiper-pagination_gradient position-static mb-25"
                                id="product-inline-slider-1-pagination"></div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-secondary">
                            <?php echo e($keywords['no_featured_course_category_found'] ?? __('No Featured Course  Category Found')); ?>

                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme6/featured-course.blade.php ENDPATH**/ ?>