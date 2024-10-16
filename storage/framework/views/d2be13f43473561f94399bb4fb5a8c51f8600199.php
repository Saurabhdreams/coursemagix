<div class="header-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-7 col-sm-5">
        <div class="header-logo d-flex align-items-center justify-content-center justify-content-sm-start">
          <div class="logo">
            <?php if(!is_null($websiteInfo->logo)): ?>
              <a href="<?php echo e(route('front.user.detail.view', getParam())); ?>">
                <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_LOGO,$websiteInfo->logo,$userBs,'assets/front/img/'.$bs->logo)); ?>" class="lazy" alt="website logo">
              </a>
            <?php else: ?>
              <a href="<?php echo e(route('front.user.detail.view', getParam())); ?>">
                  <img data-src="<?php echo e(asset('assets/tenant/image/static/logo.png')); ?>" class="lazy" alt="website logo">
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-5 col-sm-7">
        <div class="header-btns d-flex align-items-center justify-content-center justify-content-sm-end">

          <div class="menu-btns">
            <ul>
              <?php if(auth()->guard('customer')->guest()): ?>
                <li><a href="<?php echo e(route('customer.login', getParam())); ?>"><i class="fal fa-sign-in-alt"></i> <?php echo e($keywords['login'] ?? __('Login')); ?></a></li>
                <li><a href="<?php echo e(route('customer.signup', getParam())); ?>"><i class="fal fa-user-plus"></i> <?php echo e($keywords['signup'] ?? __('Signup')); ?></a></li>
              <?php endif; ?>

              <?php if(auth()->guard('customer')->check()): ?>
              <?php $authUserInfo = Auth::guard('customer')->user(); ?>

                <li><a href="<?php echo e(route('customer.dashboard', getParam())); ?>"><i class="fal fa-user"></i> <?php echo e($authUserInfo->username); ?></a></li>
                <li><a href="<?php echo e(route('customer.logout', getParam())); ?>"><i class="fal fa-sign-out-alt"></i> <?php echo e($keywords['logout'] ?? __('Logout')); ?></a></li>
              <?php endif; ?>
              
            </ul>
          </div>

          <div class="menu-dropdown mobile-item mobile-hide">
            <form action="<?php echo e(route('changeUserLanguage', getParam())); ?>" method="GET">
              <select class="wide" name="lang_code" onchange="this.form.submit()">
                <?php $__currentLoopData = $allLanguageInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languageInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($languageInfo->code); ?>" <?php echo e($languageInfo->code == $currentLanguageInfo->code ? 'selected' : ''); ?>>
                    <?php echo e($languageInfo->name); ?>

                  </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/header/header-top-v3.blade.php ENDPATH**/ ?>