        <!-- Start mobile menu -->
        <div class="mobile-menu">
            <div class="container">
                <div class="mobile-menu-wrapper"></div>
            </div>
        </div>
        <!-- End mobile menu -->

        <div class="main-responsive-nav">
            <div class="container">
                <!-- Mobile Logo -->
                <div class="logo">
                    <?php if(!is_null($websiteInfo->logo)): ?>
                    <a href="<?php echo e(route('front.user.detail.view', getParam())); ?>" target="_self" title="<?php echo e(env('APP_NAME')); ?>">
                        <img src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_LOGO,$websiteInfo->logo,$userBs,'assets/front/img/'.$bs->logo)); ?>" alt="website logo">
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e(route('front.user.detail.view', getParam())); ?>" target="_self" title="<?php echo e(env('APP_NAME')); ?>">
                        <img src="<?php echo e(asset('assets/tenant/image/static/logo.png')); ?>" alt="website logo">
                    </a>

                    <?php endif; ?>
                </div>
                <!-- Menu toggle button -->
                <button class="menu-toggler" type="button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/header/header-top-v4.blade.php ENDPATH**/ ?>