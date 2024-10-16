<?php if($secInfo->fun_facts_section_status == 1): ?>

    <div class="feature-cards mtn-50" data-aos="fade-up">
        <div class="container">
            <div class="wrapper bg-white shadow-md radius-md px-30 pt-30">
                <div class="row">
                    <?php $__currentLoopData = $countInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-lg-3 mb-30">
                            <div class="card text-center bg-none">
                                <div class="card-icon mx-auto mb-15">
                                    <img class="lazyload"
                                        data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FUN_FACT_SECTION_IMAGE, $countInfo->image ?? '', $userBs)); ?>"
                                        alt="Image">
                                </div>
                                <div class="card-content">
                                    <span class="h3 font-medium mb-2"><span
                                            class="counter"><?php echo e($countInfo->amount); ?></span><?php echo e($countInfo->symbol); ?></span>
                                    <p class="card-text lh-1"><?php echo e($countInfo->title); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme6/counter-area.blade.php ENDPATH**/ ?>