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
    <!-- Home-area start-->
    <section class="hero-banner hero-banner_v3 header-next pb-60">
        <div class="container">
            <div class="row align-items-center gx-xl-5">
                <div class="col-lg-6">
                    <div class="banner-content mb-40">
                        <h1 class="title mb-30" data-aos="fade-up" data-aos-delay="100">
                            <?php echo e(!empty($heroInfo->first_title) ? $heroInfo->first_title : ''); ?>

                        </h1>
                        <p class="text" data-aos="fade-up" data-aos-delay="100">
                            <?php echo e(!empty($heroInfo->second_title) ? $heroInfo->second_title : ''); ?>

                        </p>
                        <div class="banner-filter-form mt-40" data-aos="fade-up" data-aos-delay="150">
                            <div class="form-wrapper border rounded-pill">
                                <form action="<?php echo e(route('front.user.courses', getParam())); ?>" method="GET">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <label for="search"><i class="fas fa-search"></i></label>
                                                <input type="text" id="search" class="form-control" name="keyword"
                                                    placeholder="<?php echo e($keywords['search_course_here'] ?? __('Search Course Here')); ?>">
                                                <div class="vr"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <label for="search"><i class="fas fa-th-large"></i></label>
                                                <select class="niceselect" name="category">
                                                    <option data-display="Select Category" value="">
                                                        <?php echo e($keywords['select_category'] ?? __('Select a Category')); ?>

                                                    </option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->slug); ?>">
                                                            <?php echo e($category->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <button class="btn btn-lg btn-primary btn-gradient rounded-pill w-100"
                                                type="submit"
                                                aria-label=" <?php echo e($keywords['find_course'] ?? __('Find Course')); ?>">
                                                <?php echo e($keywords['find_course'] ?? __('Find Course')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="banner-image mb-40">
                        <?php if(!is_null($heroInfo)): ?>
                            <img class="lazyload blur-up"
                                data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_HERO_SECTION_IMAGE, $heroInfo->image ?? '', $userBs)); ?>"
                                alt="Banner Image">
                        <?php else: ?>
                            <img class="lazyload blur-up" data-src="<?php echo e(asset('assets/tenant/image/static/no-image.png')); ?>"
                                alt="Banner Image">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bg shapes -->
        <div class="shapes">
            <span class="shape"></span>
            <span class="shape"></span>
            <span class="shape"></span>
        </div>
    </section>
    <!-- Home-area end -->

    <!-- Category-area start -->
    <?php if ($__env->exists('user-front.theme6.course-category')) echo $__env->make('user-front.theme6.course-category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Category-area end -->

    <!-- Product-area start -->
    <?php if ($__env->exists('user-front.theme6.featured-course')) echo $__env->make('user-front.theme6.featured-course', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Product-area end -->

    <!-- Feature-area start -->
    <?php if ($__env->exists('user-front.theme6.featured-area')) echo $__env->make('user-front.theme6.featured-area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Feature-area end -->

    <!-- Product-area start -->
    <?php if ($__env->exists('user-front.theme6.featured-course-category')) echo $__env->make('user-front.theme6.featured-course-category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Product-area end -->

    <!-- Instructor-area start -->
    <?php echo $__env->make('user-front.theme6.instructors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Instructor-area end -->

    <!-- Testimonial-area start -->
    <?php if ($__env->exists('user-front.theme6.testimonials')) echo $__env->make('user-front.theme6.testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Testimonial-area end -->

    <!-- Newsletter-area start -->
    <?php if ($__env->exists('user-front.theme6.newsletter')) echo $__env->make('user-front.theme6.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Newsletter-area end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-front.common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme6/index.blade.php ENDPATH**/ ?>