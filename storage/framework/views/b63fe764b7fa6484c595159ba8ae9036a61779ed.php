<?php if($secInfo->courses_section_status == 1): ?>
    <section class="product-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">
                            <?php echo e(!empty($secTitleInfo->course_section_title) ? $secTitleInfo->course_section_title : ''); ?>

                        </h2>
                        <div class="tabs-navigation tabs-navigation_gradient">
                            <ul class="nav nav-tabs" data-hover="fancyHover">
                                <?php if($categories->count() > 0): ?>
                                <li class="nav-item active">
                                    <button class="nav-link hover-effect active btn-md rounded-pill"
                                        data-bs-toggle="tab" data-bs-target="#all"
                                        type="button"><?php echo e($keywords['all'] ?? __('All')); ?></button>
                                </li>
                                <?php endif; ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <button class="nav-link hover-effect btn-md rounded-pill" data-bs-toggle="tab"
                                            data-bs-target="#tab_<?php echo e($category->slug); ?>"
                                            type="button"><?php echo e($category->name); ?></button>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content" data-aos="fade-up">
                        <div class="tab-pane slide show active" id="all">
                            <div class="row">
                                <?php $__currentLoopData = $allCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->iteration <= 6): ?>
                                        <div class="col-xl-6 col-lg-4 col-sm-6">
                                            <div
                                                class="row g-0 product-default product-column border radius-md mb-25 align-items-center">
                                                <figure class="product-img col-sm-12 col-xl-5">
                                                    <a href="<?php echo e(route('front.user.course.details', [getParam(), 'slug' => $course->slug])); ?>"
                                                        title="Image" target="_self"
                                                        class="lazy-container radius-md ratio ratio-5-4">
                                                        <img class="lazyload"
                                                            data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE, $course->thumbnail_image ?? '', $userBs)); ?>"
                                                            alt="Product">
                                                    </a>
                                                    <div class="hover-show radius-md">
                                                        <a href="<?php echo e(route('front.user.course.details', [getParam(), 'slug' => $course->slug])); ?>"
                                                            class="btn btn-md btn-primary btn-gradient rounded-pill"
                                                            title="<?php echo e($keywords['enroll_now'] ?? __('Enroll Now')); ?>"
                                                            target="_self">
                                                            <?php echo e($keywords['enroll_now'] ?? __('Enroll Now')); ?> </a>
                                                    </div>
                                                </figure>
                                                <div class="product-details col-sm-12 col-xl-7 ps-xl-2">
                                                    <div class="p-3">
                                                        <a href="<?php echo e(route('front.user.courses', [getParam(), 'category' => $course->categorySlug])); ?>"
                                                            target="_self" title="<?php echo e($course->categoryName); ?>"
                                                            class="tag font-sm color-primary"><?php echo e($course->categoryName); ?></a>
                                                        <h6 class="product-title lc-2 mb-0">
                                                            <a href="<?php echo e(route('front.user.course.details', [getParam(), 'slug' => $course->slug])); ?>"
                                                                target="_self" title="<?php echo e($course->title); ?>">
                                                                <?php echo e(strlen($course->title) > 45 ? mb_substr($course->title, 0, 45, 'UTF-8') . '...' : $course->title); ?>

                                                            </a>
                                                        </h6>
                                                        <div class="authors mt-15">
                                                            <div class="author">
                                                                <img class="lazyload blur-up radius-sm"
                                                                    data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE, $course->instructorImage ?? '', $userBs)); ?>"
                                                                    alt="Image">
                                                                <span class="font-sm">
                                                                    <a target="_self"
                                                                        title="<?php echo e($course->instructorName); ?>">
                                                                        <?php echo e(strlen($course->instructorName) > 10 ? mb_substr($course->instructorName, 0, 10, 'utf-8') . '...' : $course->instructorName); ?>

                                                                    </a>
                                                                </span>
                                                            </div>
                                                            <?php
                                                                $period = $course->duration;
                                                                $array = explode(':', $period);
                                                                $hour = $array[0];
                                                                $courseDuration = \Carbon\Carbon::parse($period);
                                                            ?>
                                                            <span class="font-sm icon-start"><i
                                                                    class="fas fa-clock"></i><?php echo e($hour == '00' ? '00' : $courseDuration->format('h')); ?><?php echo e(__('h')); ?>

                                                                <?php echo e($courseDuration->format('i')); ?><?php echo e(__('m')); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="px-xl-3 mb-1">
                                                        <div class="product-bottom-info py-2 px-3 px-xl-0">
                                                            <span class="price-area">
                                                                <?php if($course->pricing_type == 'premium'): ?>
                                                                    <?php if($course->current_price): ?>
                                                                        <i class="fas fa-usd-circle"></i>
                                                                        <span class="font-sm font-s-bold">
                                                                            <?php echo e($currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : ''); ?><?php echo e($course->current_price); ?><?php echo e($currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : ''); ?>

                                                                        </span>
                                                                    <?php endif; ?>
                                                                    <?php if($course->previous_price): ?>
                                                                        <span class="font-xsm prev">
                                                                            <del>
                                                                                <?php echo e($currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : ''); ?><?php echo e($course->previous_price); ?><?php echo e($currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : ''); ?>

                                                                            </del>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <span
                                                                        class=""><?php echo e($keywords['free'] ?? __('Free')); ?></span>
                                                                <?php endif; ?>
                                                            </span>

                                                            <span class="font-sm"><i class="fas fa-book-alt"></i>
                                                                <?php if($course->moduleCount > 0): ?>
                                                                    <?php echo e($course->moduleCount); ?>

                                                                <?php endif; ?>

                                                                <?php if($course->moduleCount > 0): ?>
                                                                    <?php if($course->moduleCount == 1): ?>
                                                                        <?php echo e($keywords['lesson'] ?? __('Lesson')); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e($keywords['lessons'] ?? __('Lessons')); ?>

                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <?php echo e($keywords['no_lesson'] ?? __('No Lesson')); ?>

                                                                <?php endif; ?>


                                                            </span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php if($allCourses->count() > 6): ?>
                                <div class="cta-btn text-center mt-15">
                                    <a href="<?php echo e(route('front.user.courses', getParam())); ?>"
                                        class="btn btn-lg btn-primary btn-gradient rounded-pill"
                                        title="<?php echo e($keywords['view_more'] ?? __('View More')); ?>"
                                        target="_self"><?php echo e($keywords['view_more'] ?? __('View More')); ?> </a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane slide" id="tab_<?php echo e($category->slug); ?>">
                                <?php if(count($category->courseInfoList) > 0): ?>
                                    <div class="row">
                                        <?php $__currentLoopData = $category->courseInfoList()->take(6)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($courseInfo->course): ?>
                                                <?php if($courseInfo->course->status == 'published'): ?>
                                                    <div class="col-xl-6 col-lg-4 col-sm-6">
                                                        <div
                                                            class="row g-0 product-default product-column border radius-md mb-25 align-items-center">
                                                            <figure class="product-img col-sm-12 col-xl-5">
                                                                <a href="<?php echo e(route('front.user.course.details', [getParam(), 'slug' => $course->slug])); ?>"
                                                                    title="Image" target="_self"
                                                                    class="lazy-container radius-md ratio ratio-5-4">
                                                                    <img class="lazyload"
                                                                        data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE, $courseInfo->course->thumbnail_image ?? '', $userBs)); ?>"
                                                                        alt="Product">
                                                                </a>
                                                                <div class="hover-show radius-md">
                                                                    <a href="<?php echo e(route('front.user.course.details', [getParam(), 'slug' => $courseInfo->slug])); ?>"
                                                                        class="btn btn-md btn-primary btn-gradient rounded-pill"
                                                                        title="<?php echo e($keywords['enroll_now'] ?? __('Enroll Now')); ?>"
                                                                        target="_self"><?php echo e($keywords['enroll_now'] ?? __('Enroll Now')); ?></a>
                                                                </div>
                                                            </figure>
                                                            <div class="product-details col-sm-12 col-xl-7 ps-xl-2">
                                                                <div class="p-3">
                                                                    <?php if($courseInfo->courseCategory): ?>
                                                                        <a href="<?php echo e(route('front.user.courses', [getParam(), 'category' => $courseInfo->courseCategory->slug])); ?>"
                                                                            target="_self"
                                                                            title="<?php echo e($courseInfo->courseCategory->name); ?>"
                                                                            class="tag font-sm color-primary"><?php echo e($courseInfo->courseCategory->name); ?></a>
                                                                    <?php endif; ?>

                                                                    <h6 class="product-title lc-2 mb-0">
                                                                        <a href="<?php echo e(route('front.user.course.details', [getParam(), 'slug' => $course->slug])); ?>"
                                                                            target="_self"
                                                                            title="<?php echo e($courseInfo->title); ?>">
                                                                            <?php echo e(strlen($courseInfo->title) > 45 ? mb_substr($courseInfo->title, 0, 45, 'UTF-8') . '...' : $courseInfo->title); ?>

                                                                        </a>
                                                                    </h6>



                                                                    <div class="authors mt-15">

                                                                        <?php if($courseInfo->instructor): ?>
                                                                            <div class="author">
                                                                                <img class="lazyload blur-up radius-sm"
                                                                                    data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE, $courseInfo->instructor->image ?? '', $userBs)); ?>"
                                                                                    alt="Image">
                                                                                <span class="font-sm">
                                                                                    <a target="_self"
                                                                                        title="<?php echo e($courseInfo->instructor->name); ?>">
                                                                                        <?php echo e(strlen($courseInfo->instructor->name) > 10 ? mb_substr($courseInfo->instructor->name, 0, 10, 'utf-8') . '...' : $courseInfo->instructor->name); ?>

                                                                                    </a>
                                                                                </span>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <?php
                                                                            $period = $courseInfo->course ? $courseInfo->course->duration : 0;
                                                                            $array = explode(':', $period);
                                                                            $hour = $array[0];
                                                                            $courseDuration = \Carbon\Carbon::parse($period);
                                                                        ?>
                                                                        <span class="font-sm icon-start"><i
                                                                                class="fas fa-clock"></i><?php echo e($hour == '00' ? '00' : $courseDuration->format('h')); ?><?php echo e(__('h')); ?>

                                                                            <?php echo e($courseDuration->format('i')); ?><?php echo e(__('m')); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="px-xl-3 mb-1">
                                                                    <div class="product-bottom-info py-2 px-3 px-xl-0">


                                                                        <?php if($courseInfo->course): ?>
                                                                            <span class="price-area">
                                                                                <?php if($courseInfo->course->pricing_type == 'premium'): ?>
                                                                                    <?php if($courseInfo->course->current_price): ?>
                                                                                        <i
                                                                                            class="fas fa-usd-circle"></i>
                                                                                        <span
                                                                                            class="font-sm font-s-bold">
                                                                                            <?php echo e($currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : ''); ?><?php echo e($courseInfo->course->current_price); ?><?php echo e($currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : ''); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                    <?php if($courseInfo->course->previous_price): ?>
                                                                                        <span class="font-xsm prev">
                                                                                            <del>
                                                                                                <?php echo e($currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : ''); ?><?php echo e($courseInfo->course->previous_price); ?><?php echo e($currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : ''); ?>

                                                                                            </del>
                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                <?php else: ?>
                                                                                    <span
                                                                                        class=""><?php echo e($keywords['free'] ?? __('Free')); ?></span>
                                                                                <?php endif; ?>
                                                                            </span>
                                                                        <?php endif; ?>


                                                                        <span class="font-sm"><i
                                                                                class="fas fa-book-alt"></i>
                                                                            <?php if($courseInfo->module()->where('status', 'published')->count() > 0): ?>
                                                                                <?php echo e($courseInfo->module()->where('status', 'published')->count()); ?>

                                                                            <?php endif; ?>

                                                                            <?php if($courseInfo->module()->where('status', 'published')->count() > 0): ?>
                                                                                <?php if($courseInfo->module()->where('status', 'published')->count() == 1): ?>
                                                                                    <?php echo e($keywords['lesson'] ?? __('Lesson')); ?>

                                                                                <?php else: ?>
                                                                                    <?php echo e($keywords['lessons'] ?? __('Lessons')); ?>

                                                                                <?php endif; ?>
                                                                            <?php else: ?>
                                                                                <?php echo e($keywords['no_lesson'] ?? __('No Lesson')); ?>

                                                                            <?php endif; ?>

                                                                        </span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php if(count($category->courseInfoList) > 6): ?>
                                        <div class="cta-btn text-center mt-15">
                                            <a href="<?php echo e(route('front.user.courses', [getParam(), 'category' => $category->slug])); ?>"
                                                class="btn btn-lg btn-primary rounded-pill"
                                                title="<?php echo e($keywords['view_more'] ?? __('View More')); ?>"
                                                target="_self"><?php echo e($keywords['view_more'] ?? __('View More')); ?></a>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="row">
                                        <h4> <?php echo e($keywords['no_course_found'] ?? __('No Course Found')); ?> </h4>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme6/featured-course-category.blade.php ENDPATH**/ ?>