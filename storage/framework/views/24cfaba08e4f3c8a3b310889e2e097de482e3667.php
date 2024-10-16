<?php if($secInfo->course_categories_section_status == 1): ?>
    <section class="category-area category-area_v3 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">
                            <?php echo e(!empty($secTitleInfo->category_section_title) ? $secTitleInfo->category_section_title :''); ?>

                        </h2>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up">
                    <?php if(count($categories) > 0): ?>
                        <div class="swiper category-slider" id="category-slider-3" data-slides-per-view="4"
                            data-swiper-loop="true">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">

                                        <div class="card p-25 border radius-md">
                                            <div class="card-img mb-20">
                                                <a
                                                    href="<?php echo e(route('front.user.courses', [getParam(), 'category' => $category->slug])); ?>">
                                                    <img class="lazyload"
                                                        data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_CATEGORY_SECTION_IMAGE, $category->image ?? '', $userBs)); ?>"
                                                        alt="<?php echo e($category->name); ?>">
                                                </a>
                                            </div>
                                            <h5 class="card-title lc-1 mb-1">
                                                <a href="<?php echo e(route('front.user.courses', [getParam(), 'category' => $category->slug])); ?>"
                                                    title="<?php echo e($category->name); ?>">
                                                    <?php echo e($category->name); ?>

                                                </a>
                                            </h5>
                                            <p class="card-text">
                                                <?php if($category->courseInfoList->count() > 0): ?>
                                                    <?php if($category->courseInfoList->count() == 1): ?>
                                                        <?php echo e($category->courseInfoList->count()); ?>


                                                        <?php echo e($keywords['course'] ?? __('Course')); ?>

                                                    <?php else: ?>
                                                        <?php echo e($category->courseInfoList->count()); ?>

                                                        <?php echo e($keywords['courses'] ?? __('Courses')); ?>

                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php echo e(__('No')); ?> <?php echo e(__('Course Found !')); ?>

                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </div>
                            <div class="swiper-pagination swiper-pagination_gradient position-static mt-30"
                                id="category-slider-3-pagination"></div>
                        </div>
                    <?php else: ?>
                        <div class="col">
                            <div class="alert alert-secondary">
                                <?php echo e($keywords['no_course_category_found'] ?? __('No Course Category Found')); ?>

                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme6/course-category.blade.php ENDPATH**/ ?>