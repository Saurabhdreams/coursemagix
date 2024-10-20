<?php $__env->startSection('pagename'); ?>
    - <?php echo e(__('Pricing')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta-description', !empty($seo) ? $seo->pricing_meta_description : ''); ?>
<?php $__env->startSection('meta-keywords', !empty($seo) ? $seo->pricing_meta_keywords : ''); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <?php echo e(__('Pricing')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb-link'); ?>
    <?php echo e(__('Pricing')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- Pricing Start -->
    <section class="pricing-area pb-90 pt-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if(count($terms) > 1): ?>
                        <div class="nav-tabs-navigation text-center" data-aos="fade-up">
                            <ul class="nav nav-tabs">
                                <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="nav-item">
                                        <button class="nav-link <?php echo e($loop->first ? 'active' : ''); ?>" data-bs-toggle="tab" data-bs-target="#<?php echo e(__("$term")); ?>"
                                                type="button"><?php echo e(__("$term")); ?></button>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="tab-content">
                        <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade <?php echo e($loop->first ? 'show active' : ''); ?> " id="<?php echo e(__("$term")); ?>">
                                <div class="row">
                                    <?php
                                        $packages = \App\Models\Package::where('status', '1')->where('featured', '1')->where('term', strtolower($term))->get();
                                    ?>
                                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $pFeatures = json_decode($package->features);
                                        ?>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="card mb-30 <?php echo e($package->recommended == '1' ? 'active' : ''); ?>" data-aos="fade-up" data-aos-delay="100">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon blue"><i class="<?php echo e($package->icon); ?>"></i></div>
                                                    <div class="label">
                                                        <h3><?php echo e($package->title); ?></h3>

                                                        <?php if($package->recommended == '1'): ?>
                                                            <span><?php echo e(__('Recommended')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <p class="text"></p>
                                                <div class="d-flex align-items-center">

                                                    <span class="price"><?php echo e($package->price != 0 && $be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''); ?><?php echo e($package->price == 0 ? "Free" : $package->price); ?><?php echo e($package->price != 0 && $be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''); ?></span>
                                                    <span class="period">/ <?php echo e(__("$package->term")); ?></span>


                                                </div>
                                                <h5><?php echo e(__('Whats Included')); ?></h5>
                                                <ul class="item-list list-unstyled p-0">
    
                                                    <li>
                                                        <i class="fal fa-check"></i>
                                                        <?php echo e($package->course_categories_limit === 999999 ? __('Unlimited') : $package->course_categories_limit.' '); ?><?php echo e($package->course_categories_limit ===1 ? __('Course Category'):__('Course Categories')); ?>

                                                    </li>
                                                    <li>
                                                        <i class="fal fa-check"></i>
                                                        <?php echo e($package->course_limit === 999999 ? __('Unlimited') : $package->course_limit.' '); ?><?php echo e($package->course_limit=== 1 ? __('Course'):__('Courses')); ?>

                                                    </li>
                                                    <li>
                                                        <i class="fal fa-check"></i>
                                                        <?php echo e($package->module_limit === 999999 ? __('Unlimited') : $package->module_limit.' '); ?><?php echo e($package->module_limit===1 ? __('Module'): __('Modules')); ?>

                                                    </li>
                                                    <li>
                                                        <i class="fal fa-check"></i>
                                                        <?php echo e($package->lesson_limit === 999999 ? __('Unlimited') : $package->lesson_limit.' '); ?><?php echo e($package->lesson_limit ===1 ? __('Lesson'):__('Lessons')); ?>

                                                    </li>
                                                    <li>
                                                        <i class="fal fa-check"></i>
                                                        <?php echo e($package->featured_course_limit === 999999 ? __('Unlimited') : $package->featured_course_limit.' '); ?><?php echo e($package->featured_course_limit === 1 ? __('Featured Course'):__('Featured Courses')); ?>

                                                    </li>
        
                                                    <?php $__currentLoopData = $allPfeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li  class="<?php echo e(is_array($pFeatures) && in_array($feature, $pFeatures) ? '' : 'disabled'); ?>">
                                                            <i class="<?php echo e(is_array($pFeatures) && in_array($feature, $pFeatures) ? 'fal fa-check' : 'fal fa-times'); ?>"></i>
                                                            <?php if($feature == 'Storage Limit'): ?>
                                                                <?php if($package->storage_limit == 0 || $package->storage_limit == 999999): ?>
                                                                    <?php echo e(__("$feature")); ?>

                                                                <?php elseif($package->storage_limit < 1024): ?>
                                                                    <?php echo e(__("$feature"). ' ( '.$package->storage_limit .'MB )'); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(__("$feature"). ' ( '. ceil($package->storage_limit/1024) .'GB )'); ?>

                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <?php echo e(__("$feature")); ?>

                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </ul>
                                                <div class="d-flex align-items-center">
                                                    <?php if($package->is_trial === "1" && $package->price != 0): ?>
                                                        <a href="<?php echo e(route('front.register.view',['status' => 'trial','id'=> $package->id])); ?>"
                                                           class="btn secondary-btn"><?php echo e(__('Trial')); ?></a>
                                                    <?php endif; ?>
                                                    <?php if($package->price == 0): ?>
                                                        <a href="<?php echo e(route('front.register.view',['status' => 'regular','id'=> $package->id])); ?>"
                                                           class="btn primary-btn"><?php echo e(__('Signup')); ?></a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('front.register.view',['status' => 'regular','id'=> $package->id])); ?>"
                                                           class="btn primary-btn"><?php echo e(__('Purchase')); ?></a>
                                                    <?php endif; ?>


                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bg Overlay -->
        <img class="bg-overlay" src="<?php echo e(asset('assets/front/img/shadow-bg-2.png')); ?>" alt="Bg">
        <img class="bg-overlay" src="<?php echo e(asset('assets/front/img/shadow-bg-1.png')); ?>" alt="Bg">
        <!-- Bg Shape -->
        <div class="shape">
            <img class="shape-1" src="<?php echo e(asset('assets/front/img/shape/shape-6.png')); ?>" alt="Shape">
            <img class="shape-2" src="<?php echo e(asset('assets/front/img/shape/shape-7.png')); ?>" alt="Shape">
            <img class="shape-3" src="<?php echo e(asset('assets/front/img/shape/shape-3.png')); ?>" alt="Shape">
            <img class="shape-4" src="<?php echo e(asset('assets/front/img/shape/shape-4.png')); ?>" alt="Shape">
            <img class="shape-5" src="<?php echo e(asset('assets/front/img/shape/shape-5.png')); ?>" alt="Shape">
            <img class="shape-6" src="<?php echo e(asset('assets/front/img/shape/shape-11.png')); ?>" alt="Shape">
        </div>
    </section>
    <!-- Pricing End -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/front/pricing.blade.php ENDPATH**/ ?>