<?php if($secInfo->course_categories_section_status == 1): ?>
    <section class="category-area category-area_v2 pt-100 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title mb-0">
                            <?php echo e(!empty($secTitleInfo->category_section_title) ? $secTitleInfo->category_section_title : ''); ?>

                        </h2>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up">
                    <?php if(count($categories) > 0): ?>
                        <div class="row">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="card radius-md mb-25">
                                        <a href="<?php echo e(route('front.user.courses', [getParam(), 'category' => $category->slug])); ?>"
                                            target="_self" title="<?php echo e($category->name); ?>">
                                            <div class="card-img">
                                                <img class="lazyload"
                                                    data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_CATEGORY_SECTION_IMAGE, $category->image ?? '', $userBs)); ?>"
                                                    alt="<?php echo e($category->name); ?>">
                                            </div>
                                            <div class="card-text text-center">
                                                <h5 class="card-title color-white mb-1"><?php echo e($category->name); ?></h5>
                                                <?php if($category->courseInfoList->count() > 0): ?>
                                                    <?php if($category->courseInfoList->count() == 1): ?>
                                                        <span class="font-sm">
                                                            <?php echo e($category->courseInfoList->count()); ?>

                                                            <?php echo e($keywords['course'] ?? __('Course')); ?>


                                                        </span>
                                                    <?php else: ?>
                                                        <span class="font-sm">
                                                            <?php echo e($category->courseInfoList->count()); ?>

                                                            <?php echo e($keywords['courses'] ?? __('Courses')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <span class="font-sm">
                                                        <?php echo e($keywords['no_course_found'] ?? __('No Course Found')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="row text-center">
                            <div class="col">
                                <div class="alert alert-secondary">
                                    <?php echo e($keywords['no_course_category_found'] ?? __('No Course Category Found')); ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme5/course-category.blade.php ENDPATH**/ ?>