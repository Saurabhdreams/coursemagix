<?php $__env->startSection('pagename'); ?>
    - <?php echo e(__('Success')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb-title'); ?>
    <?php echo e(__('Success')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb-link'); ?>
    <?php echo e(__('Success')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container ptb-120">
        <div class="row align-items-center gx-xl-5">
            <div class="col-md-6 mx-auto">
                <div class="payment-img mb-30">
                    <img src="<?php echo e(asset('assets/front/img/success.svg')); ?>" alt="Success Illustration">
                </div>
            </div>
            <div class="col-md-6 mx-auto" id="mt">
                <div class="payment mb-30">
                    <div class="content">
                        <?php if(auth()->guard()->check()): ?>
                            <h2 class="mb-4"><?php echo e(__('offline_payment_success')); ?></h2>
                            <p class="paragraph-text mb-4">
                                <?php echo e(__('offline_extend_success_msg')); ?>

                            </p>
                            <a href="<?php echo e(route('user-dashboard')); ?>"><?php echo e(__('Go to Dashboard')); ?></a>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                            <h2 class="mb-4"><?php echo e(__('offline_payment_success')); ?></h2>
                            <p class="paragraph-text mb-4">
                                <?php echo e(__('offline_extend_success_msg')); ?>

                            </p>
                            <a href="<?php echo e(route('front.index')); ?>" class="btn primary-btn"><?php echo e(__('Go to Home')); ?></a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>



<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/front/offline-success.blade.php ENDPATH**/ ?>