<?php $__env->startSection('meta-description', !empty($seo) ? $seo->contact_meta_description : ''); ?>
<?php $__env->startSection('meta-keywords', !empty($seo) ? $seo->contact_meta_keywords : ''); ?>

<?php $__env->startSection('pagename'); ?>
- <?php echo e(__('Contact')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb-title'); ?>
<?php echo e(__('Contact')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb-link'); ?>
    <?php echo e(__('Contact')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--====== Start contacts-section ======-->
    <div class="contact-area pt-120 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row justify-content-center">
                        
                        <?php
                            $mails = explode(',', $be->contact_mails);
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="card mb-30 green" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="card-text">
                                    <?php $__currentLoopData = $mails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p><a href="mailTo:<?php echo e($mail); ?>"><?php echo e($mail); ?></a></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 mb-30" data-aos="fade-up" data-aos-delay="100">
                            <form action="<?php echo e(route('front.admin.contact.message')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-30">
                                            <input type="text" name="name" class="form-control" id="name" required
                                                   data-error="Enter your name" placeholder="<?php echo e(__('Full Name')); ?> *" pattern="[A-Za-z\s]+" 														title="Only letters and spaces are allowed" />
                                            <?php if($errors->has('name')): ?>
                                                <div class="help-block with-errors text-danger"><?php echo e($errors->first('name')); ?></div>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-30">
                                            <input type="email" name="email" class="form-control" id="email" required
                                                   data-error="Enter your email" placeholder="<?php echo e(__('Email Address')); ?>*" />
                                            <?php if($errors->has('email')): ?>
                                                <div class="help-block with-errors text-danger"><?php echo e($errors->first('email')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mb-30">
                                            <input type="subject" name="subject" class="form-control" id="subject" required data-error="Enter your subject" placeholder="<?php echo e(__('Subject')); ?>*" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed"/>
                                            <?php if($errors->has('subject')): ?>
                                                <div class="help-block with-errors text-danger"><?php echo e($errors->first('subject')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mb-30">
                                            <textarea name="message" id="message" class="form-control" cols="30"
                                                      rows="8" required data-error="Please enter your message"
                                                      placeholder="<?php echo e(__('Message')); ?>*"></textarea>
                                            <?php if($errors->has('message')): ?>
                                                <div class="help-block with-errors text-danger"><?php echo e($errors->first('message')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn primary-btn primary-btn-5"
                                                title="Send message"><?php echo e(__('Send Message')); ?></button>
                                        <div id="msgSubmit"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bg Shape -->
        <div class="shape">
            <img class="shape-1" src="<?php echo e(asset('assets/front/img/shape/shape-4.png')); ?>" alt="Shape">
            <img class="shape-2" src="<?php echo e(asset('assets/front/img/shape/shape-10.png')); ?>" alt="Shape">
            <img class="shape-3" src="<?php echo e(asset('assets/front/img/shape/shape-9.png')); ?>" alt="Shape">
            <img class="shape-4" src="<?php echo e(asset('assets/front/img/shape/shape-7.png')); ?>" alt="Shape">
            <img class="shape-5" src="<?php echo e(asset('assets/front/img/shape/shape-10.png')); ?>" alt="Shape">
            <img class="shape-6" src="<?php echo e(asset('assets/front/img/shape/shape-4.png')); ?>" alt="Shape">
            <img class="shape-7" src="<?php echo e(asset('assets/front/img/shape/shape-10.png')); ?>" alt="Shape">
            <img class="shape-8" src="<?php echo e(asset('assets/front/img/shape/shape-9.png')); ?>" alt="Shape">
            <img class="shape-9" src="<?php echo e(asset('assets/front/img/shape/shape-7.png')); ?>" alt="Shape">
            <img class="shape-10" src="<?php echo e(asset('assets/front/img/shape/shape-10.png')); ?>" alt="Shape">
        </div>
    </div>
    <!--====== End contacts-section ======-->


    <!--====== End contacts-section ======-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/front/contact.blade.php ENDPATH**/ ?>