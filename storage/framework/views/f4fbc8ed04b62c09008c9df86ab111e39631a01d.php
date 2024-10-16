<?php $__env->startSection('pageHeading'); ?>
  <?php if(!empty($pageHeading)): ?>
    <?php echo e($pageHeading->contact_page_title); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->contact_meta_keywords); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->contact_meta_description); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('user-front.common.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->contact_page_title])) echo $__env->make('user-front.common.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->contact_page_title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!--====== CONTACT INFO PART START ======-->
  <section class="contact-info-area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <div class="contact-info-content">
            <div class="single-contact-info">
              <div class="info-icon">
                <i class="fal fa-phone"></i>
              </div>
              <div class="info-contact">
                <h4 class="title"><?php echo e($keywords['phone_number'] ?? __('Phone Number')); ?></h4>
                <span><?php echo e(!empty($info->contact_number) ? $info->contact_number : ''); ?></span>
              </div>
            </div>

            <div class="single-contact-info item-2 d-flex align-items-center">
              <div class="info-icon">
                <i class="fal fa-envelope"></i>
              </div>
              <div class="info-contact">
                <h4 class="title"><?php echo e($keywords['email_address'] ?? __('Email Address')); ?></h4>
                <span><?php echo e(!empty($info->email_address) ? $info->email_address : ''); ?></span>
              </div>
            </div>

            <div class="single-contact-info item-3 d-flex align-items-center">
              <div class="info-icon">
                <i class="fal fa-map-marker-alt"></i>
              </div>
              <div class="info-contact">
                <h4 class="title"><?php echo e($keywords['location'] ?? __('Location')); ?></h4>
                <span><?php echo e(!empty($info->address) ? $info->address : ''); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--====== CONTACT INFO PART END ======-->

  <!--====== CONTACT ACTION PART START ======-->
  <section class="contact-action-area pt-0 pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="contact-action-item">
            <h2 class="title"><?php echo e($keywords['get_in_touch'] ?? __('Get In Touch')); ?></h2>
            <form action="<?php echo e(route('front.contact.message',getParam())); ?>" method="post">
              <?php echo csrf_field(); ?>
              <div class="row">
                <div class="col-lg-6">
                  <div class="input-box mt-20">
                    <input name="fullname" type="text" placeholder="<?php echo e($keywords['enter_your_full_name'] ?? __('Enter Your Full Name')); ?>">
                    <i class="fal fa-user"></i>
                  </div>
                  <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-lg-6">
                  <div class="input-box mt-20">
                    <input name="email" type="email" placeholder="<?php echo e($keywords['enter_your_email'] ?? __('Enter Your Email')); ?>">
                    <i class="fal fa-envelope"></i>
                  </div>
                  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>

              <div class="input-box mt-20">
                <input name="subject" type="text" placeholder="<?php echo e($keywords['enter_email_subject'] ??__('Enter Email Subject')); ?>">
                <i class="fal fa-edit"></i>
              </div>
              <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

              <div class="input-box mt-20">
                <textarea name="message" cols="30" rows="10" placeholder="<?php echo e($keywords['write_your_message'] ?? __('Write Your Message')); ?>"></textarea>
                <i class="fal fa-edit"></i>
              </div>
              <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

              <button class="contact-form-btn" type="submit"><?php echo e($keywords['send'] ?? __('Send')); ?></button>
            </form>
          </div>
        </div>

        <div class="col-lg-6">
          <?php if(!empty($info->latitude) && !empty($info->longitude)): ?>
            <div class="map">
              <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="//maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo e($info->latitude); ?>,%20<?php echo e($info->longitude); ?>+(<?php echo e($websiteInfo->website_title); ?>)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <?php if(is_array($packagePermissions) && in_array('Advertisement',$packagePermissions)): ?>
          <?php if(!empty(showAd(3))): ?>
              <div class="text-center mt-30">
                  <?php echo showAd(3); ?>

              </div>
          <?php endif; ?>
      <?php endif; ?>
    </div>
  </section>
  <!--====== CONTACT ACTION PART END ======-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-front.common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/contact.blade.php ENDPATH**/ ?>