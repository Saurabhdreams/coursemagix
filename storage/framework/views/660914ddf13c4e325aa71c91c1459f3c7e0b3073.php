<?php if($footerSecStatus == 1): ?>
  <footer class="footer-area footer-area-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="footer-item mt-30">
            <div class="footer-content">
              <?php if(!empty($newsletterTitle)): ?>
                <h3 class="title"><?php echo e($newsletterTitle); ?></h3>
              <?php endif; ?>

              <form class="subscriptionForm" action="<?php echo e(route('front.user.subscriber',getParam())); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="input-box">
                  <input type="email" placeholder="<?php echo e($keywords['enter_your_email'] ?? __('Enter Your Email Address')); ?>" name="email">
                  <i class="fal fa-envelope"></i>
                </div>
                <button type="submit"><?php echo e($keywords['Subscribe'] ?? __('Subscribe')); ?></button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="footer-item mt-30">
            <div class="footer-title">
              <i class="fal fa-link"></i>
              <h4 class="title"><?php echo e($keywords['useful_links'] ?? __('Useful Links')); ?></h4>
            </div>

            <div class="footer-list-area">
              <?php if(count($quickLinkInfos) == 0): ?>
                <h6 class="text-light"><?php echo e($keywords['no_link_found'] ?? __('No Link Found') . '!'); ?></h6>
              <?php else: ?>
                <div class="footer-list">
                  <ul>
                    <?php $__currentLoopData = $quickLinkInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quickLinkInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="<?php echo e($quickLinkInfo->url); ?>" target="_blank"><i class="fal fa-angle-right"></i> <?php echo e($quickLinkInfo->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
          <?php if(is_array($packagePermissions) && in_array('Blog',$packagePermissions)): ?>
              <div class="col-lg-4">
                  <?php if ($__env->exists('user-front.common.partials.footer.latest-blogs')) echo $__env->make('user-front.common.partials.footer.latest-blogs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
          <?php endif; ?>
      </div>
    </div>

    <div class="footer-dot">
      <img data-src="<?php echo e(asset('assets/tenant/image/shapes/footer-dot.png')); ?>" class="lazy" alt="footer dot">
    </div>
  </footer>

  <div class="text-center py-4 copyright-part-two">
    <div class="row">
      <div class="col">
        <p class="text-light">
          <?php echo !empty($footerInfo->copyright_text) ? $footerInfo->copyright_text : ''; ?>

        </p>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/footer/footer-v2.blade.php ENDPATH**/ ?>