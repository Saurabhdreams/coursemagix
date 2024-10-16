<div class="header-navigation">
  <div class="container-fluid">
    <div class="site-menu d-flex align-items-center justify-content-between">
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

      <div class="primary-menu">
        <div class="nav-menu">
          <!-- Navbar Close Icon -->
          <div class="navbar-close">
            <div class="cross-wrap"><i class="far fa-times"></i></div>
          </div>

          <!-- Nav Menu -->
          <nav class="main-menu">
              <ul>
                  <?php
                      $links = json_decode($userMenus, true);
                  ?>
                  <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $href = getUserHref($link, $currentLanguageInfo->id);
                      ?>

                      <?php if(!array_key_exists("children",$link)): ?>
                          
                          <li><a href="<?php echo e($href); ?>" target="<?php echo e($link["target"]); ?>"><?php echo e($link["text"]); ?></a></li>
                      <?php else: ?>
                          
                          <li class="menu-item menu-item-has-children"><a href="<?php echo e($href); ?>" target="<?php echo e($link["target"]); ?>"><?php echo e($link["text"]); ?></a>
                              <ul class="sub-menu">
                                  
                                  <?php $__currentLoopData = $link["children"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php
                                          $l2Href = getUserHref($level2, $currentLanguageInfo->id);
                                      ?>
                                      <li><a href="<?php echo e($l2Href); ?>" target="<?php echo e($level2["target"]); ?>"><?php echo e($level2["text"]); ?></a></li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                          </li>
                      <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </nav>
        </div>
      </div>

      <div class="navbar-item d-flex align-items-center justify-content-between">
        <div class="menu-btns">
          <ul>
            <?php if(auth()->guard('customer')->guest()): ?>
              <li><a href="<?php echo e(route('customer.login', getParam())); ?>"><i class="fal fa-sign-in-alt"></i> <span><?php echo e($keywords['login'] ?? __('Login')); ?></span></a></li>
              <li><a href="<?php echo e(route('customer.signup', getParam())); ?>"><i class="fal fa-user-plus"></i> <span><?php echo e($keywords['signup'] ?? __('Signup')); ?></span></a></li>
            <?php endif; ?>

            <?php if(auth()->guard('customer')->check()): ?>
              <?php $authUserInfo = Auth::guard('customer')->user(); ?>

              <li><a href="<?php echo e(route('customer.dashboard', getParam())); ?>"><i class="fal fa-user"></i> <span><?php echo e($authUserInfo->username); ?></span></a></li>
              <li><a href="<?php echo e(route('customer.logout', getParam())); ?>"><i class="fal fa-sign-out-alt"></i> <span><?php echo e($keywords['logout'] ?? __('Logout')); ?></span></a></li>
            <?php endif; ?>

            <li>
              <div class="navbar-toggler">
                <span></span><span></span><span></span>
              </div>
            </li>
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
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/header/header-nav-v2.blade.php ENDPATH**/ ?>