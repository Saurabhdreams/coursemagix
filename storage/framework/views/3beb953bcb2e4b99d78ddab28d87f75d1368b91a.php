<div class="container">
  <div class="header-navigation">
    <div class="site-menu d-flex align-items-center justify-content-between">
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

        <!-- Navbar Toggler -->
        <div class="navbar-toggler">
          <span></span><span></span><span></span>
        </div>
      </div>

      <?php if(count($socialMediaInfos) > 0): ?>
        <div class="navbar-item float-right">
          <div class="menu-icon">
            <ul>
              <?php $__currentLoopData = $socialMediaInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialMediaInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e($socialMediaInfo->url); ?>"><i class="<?php echo e($socialMediaInfo->icon); ?>"></i></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/header/header-nav-v3.blade.php ENDPATH**/ ?>