<?php $__env->startSection('pageHeading'); ?>
    <?php echo e($keywords['Home'] ?? 'Home'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
    <?php if(!empty($seoInfo)): ?>
        <?php echo e($seoInfo->home_meta_keywords); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
    <?php if(!empty($seoInfo)): ?>
        <?php echo e($seoInfo->home_meta_description); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--====== BANNER PART START ======-->
    <section class="banner-area banner-area-2 bg_cover lazy"
        <?php if(!empty($heroInfo)): ?> data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_HERO_SECTION_IMAGE, $heroInfo->background_image, $userBs)); ?>" <?php else: ?> data-bg="<?php echo e(asset('assets/tenant/image/static/hero_bg_2.jpeg')); ?>" <?php endif; ?>>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="banner-content text-center">
                        <?php if(!empty($heroInfo->video_url)): ?>
                            <a class="video-popup" href="<?php echo e($heroInfo->video_url); ?>"><i class="fal fa-play"></i></a> <br>
                        <?php endif; ?>

                        <?php if(!empty($heroInfo->first_title)): ?>
                            <span><?php echo e($heroInfo->first_title); ?></span>
                        <?php endif; ?>

                        <?php if(!empty($heroInfo->second_title)): ?>
                            <h1 class="title"><?php echo e($heroInfo->second_title); ?></h1>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== BANNER PART END ======-->

    <!--====== SUB ITEMS PART START ======-->
    <?php if($secInfo->features_section_status == 1 && count($features) > 0): ?>
        <section class="sub-items-area">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4">
                        <div class="sub-item">
                            <h3 class="title"><?php echo e($keywords['find_your_dream_course'] ?? __('Find Your Dream Course')); ?>

                            </h3>
                            <form action="<?php echo e(route('front.user.courses', getParam())); ?>" method="GET">
                                <div class="input-box">
                                    <input type="text" name="keyword"
                                        placeholder="<?php echo e($keywords['search_course_here'] ?? __('Search Course Here')); ?>">
                                    <i class="fal fa-search"></i>
                                    <button type="submit"><?php echo e($keywords['find_course'] ?? __('Find Course')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4">
                            <div class="sub-item item-2" style="background: <?php echo e('#' . $feature->background_color); ?>;">
                                <h3 class="title"><?php echo e($feature->title); ?></h3>
                                <div class="sub-content">
                                    <p><?php echo e($feature->text); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--====== SUB ITEMS PART END ======-->

    <!--====== FEATURED COURSES PART START ======-->
    <?php if($secInfo->featured_courses_section_status == 1): ?>
        <section class="advance-courses-area pt-110 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="section-title section-title-2">
                            <h3 class="title">
                                <?php echo e(!empty($secTitleInfo->featured_courses_section_title) ? $secTitleInfo->featured_courses_section_title : ''); ?>

                            </h3>
                        </div>
                    </div>
                </div>

                <?php if(count($courses) == 0): ?>
                    <div class="row text-center">
                        <div class="col">
                            <h3 class="mt-5">
                                <?php echo e($keywords['no_featured_course_found'] ?? __('No Featured Course Found')); ?>

                                <?php echo e('!'); ?></h3>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="courses-active">
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-courses mt-30">
                                <div class="courses-thumb">
                                    <a class="d-block"
                                        href="<?php echo e(route('front.user.course.details', [getParam(), 'slug' => $course->slug])); ?>"><img
                                            data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE, $course->thumbnail_image, $userBs)); ?>"
                                            class="lazy" alt="image"></a>

                                    <div class="corses-thumb-title">
                                        <a class="category"
                                            href="<?php echo e(route('front.user.courses', [getParam(), 'category' => $course->categorySlug])); ?>"><?php echo e($course->categoryName); ?></a>
                                    </div>
                                </div>

                                <div class="courses-content">
                                    <a
                                        href="<?php echo e(route('front.user.course.details', [getParam(), 'slug' => $course->slug])); ?>">
                                        <h4 class="title">
                                            <?php echo e(strlen($course->title) > 45 ? mb_substr($course->title, 0, 45, 'UTF-8') . '...' : $course->title); ?>

                                        </h4>
                                    </a>
                                    <div class="courses-info d-flex justify-content-between">
                                        <div class="item">
                                            <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE, $course->instructorImage, $userBs)); ?>"
                                                class="lazy" alt="instructor">
                                            <p><?php echo e(strlen($course->instructorName) > 10 ? mb_substr($course->instructorName, 0, 10, 'utf-8') . '...' : $course->instructorName); ?>

                                            </p>
                                        </div>

                                        <div class="price">
                                            <?php if($course->pricing_type == 'premium'): ?>
                                                <span><?php echo e($currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : ''); ?><?php echo e($course->current_price); ?><?php echo e($currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : ''); ?></span>

                                                <?php if(!is_null($course->previous_price)): ?>
                                                    <span
                                                        class="pre-price"><?php echo e($currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : ''); ?><?php echo e($course->previous_price); ?><?php echo e($currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : ''); ?></span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span><?php echo e($keywords['free'] ?? __('Free')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <ul class="d-flex justify-content-center">
                                        <li><i class="fal fa-users"></i> <?php echo e($course->enrolmentCount); ?>

                                            <?php echo e($keywords['students'] ?? __('Students')); ?></li>

                                        <?php
                                            $period = $course->duration;
                                            $array = explode(':', $period);
                                            $hour = $array[0];
                                            $courseDuration = \Carbon\Carbon::parse($period);
                                        ?>

                                        <li><i class="fal fa-clock"></i>
                                            <?php echo e($hour == '00' ? '00' : $courseDuration->format('h')); ?>h
                                            <?php echo e($courseDuration->format('i')); ?>m</li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <?php if(is_array($packagePermissions) && in_array('Advertisement', $packagePermissions)): ?>
                    <?php if(!empty(showAd(3))): ?>
                        <div class="text-center mt-5">
                            <?php echo showAd(3); ?>

                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
    <!--====== FEATURED COURSES PART END ======-->

    <!--====== OFFER-2 PART START ======-->
    <?php if($secInfo->call_to_action_section_status == 1): ?>
        <section class="offer-2-area bg_cover pt-110 pb-120 lazy"
            <?php if(!empty($callToActionInfo)): ?> data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ACTION_SECTION_IMAGE, $callToActionInfo->background_image, $userBs)); ?>" <?php else: ?> data-bg="<?php echo e(asset('assets/tenant/image/static/cta_bg_2.jpeg')); ?>" <?php endif; ?>>
            <div class="container">
                <div class="row">
                    <div class="<?php echo e(empty($callToActionInfo->image) ? 'col' : 'col-lg-7'); ?> ">
                        <div class="offer-content">
                            <span><?php echo e(!empty($callToActionInfo->first_title) ? $callToActionInfo->first_title : ''); ?></span>
                            <h3 class="title">
                                <?php echo e(!empty($callToActionInfo->second_title) ? $callToActionInfo->second_title : ''); ?></h3>
                            <ul>
                                <?php if(!empty($callToActionInfo->first_button) && !empty($callToActionInfo->first_button_url)): ?>
                                    <li><a class="main-btn"
                                            href="<?php echo e($callToActionInfo->first_button_url); ?>"><?php echo e($callToActionInfo->first_button); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(!empty($callToActionInfo->second_button) && !empty($callToActionInfo->second_button_url)): ?>
                                    <li><a class="main-btn-2 main-btn"
                                            href="<?php echo e($callToActionInfo->second_button_url); ?>"><?php echo e($callToActionInfo->second_button); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <?php if(!empty($callToActionInfo->image)): ?>
                        <div class="col-lg-5">
                            <div class="offer-thumb ml-30 pt-25">
                                <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ACTION_SECTION_IMAGE, $callToActionInfo->image, $userBs)); ?>"
                                    class="lazy" alt="image">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--====== OFFER-2 PART END ======-->

    <!--====== FEATURED INSTRUCTORS PART START ======-->
    <?php if($secInfo->featured_instructors_section_status == 1): ?>
        <section class="mentors-area pt-105 pb-120 gray-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title section-title-2 text-center">
                            <h3 class="title">
                                <?php echo e(!empty($secTitleInfo->featured_instructors_section_title) ? $secTitleInfo->featured_instructors_section_title : 'Our Instructors'); ?>

                            </h3>
                        </div>
                    </div>
                </div>

                <?php if(count($instructors) == 0): ?>
                    <div class="row text-center">
                        <div class="col">
                            <h3 class="mt-5">
                                <?php echo e($keywords['no_featured_instructor_found'] ?? __('No Featured Instructor Found')); ?>

                                <?php echo e('!'); ?></h3>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row justify-content-center">
                        <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-8">
                                <div class="single-mentors mt-30">
                                    <div class="mentors-thumb">
                                        <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE, $instructor->image, $userBs)); ?>"
                                            class="lazy" alt="instructor">
                                    </div>
                                    <div class="mentors-content bg-white text-center">
                                        <h4 class="title"><?php echo e($instructor->name); ?></h4>
                                        <span class="d-block mb-2"><?php echo e($instructor->occupation); ?></span>
                                        <a href="#" class="main-btn" data-toggle="modal"
                                            data-target="#<?php echo e('staticBackdrop-' . $instructor->id); ?>"><?php echo e(__('View More')); ?></a>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo e('staticBackdrop-' . $instructor->id); ?>"
                                    data-backdrop="false" data-keyboard="false" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <?php echo e(__('Information of') . ' ' . $instructor->name); ?></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="summernote-content">
                                                    <?php echo replaceBaseUrl($instructor->description, 'summernote'); ?>

                                                </div>

                                                <?php
                                                    $socials = $instructor->socialPlatform;
                                                ?>

                                                <?php if(count($socials) > 0): ?>
                                                    <h5 class="my-3"><?php echo e(__('Follow Me') . ':'); ?></h5>
                                                    <div class="btn-group" role="group" aria-label="Social Links">
                                                        <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="<?php echo e($social->url); ?>"
                                                                class="btn social-link-btn mr-2" target="_blank"><i
                                                                    class="<?php echo e($social->icon); ?>"></i></a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary text-white"
                                                    data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <?php if(is_array($packagePermissions) && in_array('Advertisement', $packagePermissions)): ?>
                    <?php if(!empty(showAd(3))): ?>
                        <div class="text-center mt-5">
                            <?php echo showAd(3); ?>

                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
    <!--====== FEATURED INSTRUCTORS PART END ======-->

    <!--====== VIDEO PART START ======-->
    <?php if($secInfo->video_section_status == 1): ?>
        <section class="play-area play-area-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title section-title-2 text-center">
                            <h3 class="title"><?php echo e(!empty($videoData->title) ? $videoData->title : ''); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="play-thumb mt-30">
                            <?php if(!empty($videoData)): ?>
                                <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_VIDEO_SECTION_IMAGE, $videoData->image, $userBs)); ?>"
                                    class="lazy" alt="image">
                                <div class="play-btn">
                                    <a href="<?php echo e($videoData->link); ?>" class="video-popup"><i class="fas fa-play"></i></a>
                                </div>
                            <?php else: ?>
                                <img data-src="<?php echo e(asset('assets/tenant/image/static/intro_video.png')); ?>" class="lazy"
                                    alt="image">
                                <div class="play-btn">
                                    <a href="#" class="video-popup"><i class="fas fa-play"></i></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--====== VIDEO PART END ======-->

    <!--====== COUNTER PART START ======-->
    <?php if($secInfo->fun_facts_section_status == 1): ?>
        <section class="counter-area counter-area-2 bg_cove lazy"
            <?php if(!empty($factData->background_image)): ?> data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FUN_FACT_SECTION_IMAGE, $factData->background_image, $userBs)); ?>" <?php endif; ?>>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title section-title-2 text-center">
                            <h3 class="title"><?php echo e(!empty($factData->title) ? $factData->title : ''); ?></h3>
                        </div>
                    </div>
                </div>

                <?php if(count($countInfos) == 0): ?>
                    <div class="row text-center">
                        <div class="col">
                            <h3 class="text-light"><?php echo e($keywords['no_information_found'] ?? __('No Information Found')); ?>

                                <?php echo e('!'); ?></h3>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <?php $__currentLoopData = $countInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="counter-item text-center pt-40">
                                    <h3 class="title"><span class="counter"><?php echo e($countInfo->amount); ?></span>+</h3>
                                    <span><?php echo e($countInfo->title); ?></span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="counter-dot">
                <img data-src="<?php echo e(asset('assets/tenant/image/counter-dot.png')); ?>" class="lazy" alt="dot">
            </div>
        </section>
    <?php endif; ?>
    <!--====== COUNTER PART END ======-->

    <!--====== TESTIMONIALS PART START ======-->
    <?php if($secInfo->testimonials_section_status == 1): ?>
        <section class="testimonials-2-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title section-title-2 text-center">
                            <h3 class="title">
                                <?php echo e(!empty($secTitleInfo->testimonials_section_title) ? $secTitleInfo->testimonials_section_title : ''); ?>

                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <?php if(count($testimonials) == 0): ?>
                    <div class="row text-center">
                        <div class="col">
                            <h3><?php echo e($keywords['no_testimonial_found'] ?? __('No Testimonial Found')); ?> <?php echo e('!'); ?>

                            </h3>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="testimonials-2-active">
                        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-testimonials mt-60">
                                <div class="testimonials-content">
                                    <i class="fas fa-quote-left"></i>
                                    <p><?php echo e($testimonial->comment); ?></p>
                                </div>

                                <div class="testimonials-info d-flex align-items-center pl-15 pt-30">
                                    <div class="info-thumb">
                                        <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_TESTIMONIAL_CLIENT_IMAGE, $testimonial->image, $userBs)); ?>"
                                            class="lazy" alt="client">
                                    </div>

                                    <div class="info-content pl-20">
                                        <h5 class="title"><?php echo e($testimonial->name); ?></h5>
                                        <span><?php echo e($testimonial->occupation); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
    <!--====== TESTIMONIALS PART END ======-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-front.common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme2/index.blade.php ENDPATH**/ ?>