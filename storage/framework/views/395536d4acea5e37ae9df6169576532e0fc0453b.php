
        <div class="main-navbar">
            <div class="header-top bg-white py-3 mobile-item">
                <div class="container">
                    <div class="d-flex flex-wrap justify-content-between gap-15 align-items-center">
                        <a href="mailTo:<?php echo e($userBs->email); ?>" class="icon-start" target="_self" title="<?php echo e($userBs->email); ?>">
                            <i class="fal fa-envelope"></i>
                            <?php echo e($userBs->email); ?>

                        </a>
                        <div class="social-link style-2 size-md">
                            <?php $__currentLoopData = $socialMediaInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialMediaInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="rounded-pill" href="<?php echo e($socialMediaInfo->url); ?>" target="_blank" title="instagram"><i class="<?php echo e($socialMediaInfo->icon); ?>"></i></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <!-- Logo -->
                        <?php if(!is_null($websiteInfo->logo)): ?>
                        <a class="navbar-brand" href="<?php echo e(route('front.user.detail.view', getParam())); ?>" target="_self" title="<?php echo e(env('APP_NAME')); ?>">
                            <img src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_LOGO,$websiteInfo->logo,$userBs,'assets/front/img/'.$bs->logo)); ?>" alt="Brand Logo">
                        </a>
                        <?php else: ?>
                        <a class="navbar-brand" href="<?php echo e(route('front.user.detail.view', getParam())); ?>" target="_self" title="<?php echo e(env('APP_NAME')); ?>">
                            <img src="<?php echo e(asset('assets/tenant/image/static/logo.png')); ?>" alt="Brand Logo">
                        </a>
                        <?php endif; ?>
                        <!-- Navigation items -->

                        <div class="collapse navbar-collapse">
                            <ul id="mainMenu" class="navbar-nav mobile-item mx-auto">
                                <?php
                                    $links = json_decode($userMenus, true);
                                ?>
                                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $href = getUserHref($link, $currentLanguageInfo->id);
                                    ?>
                                    <?php if(!array_key_exists('children', $link)): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e($href); ?>"><?php echo e($link['text']); ?></a>
                                        </li>
                                    <?php else: ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e($href); ?>" class="nav-link toggle"> <?php echo e($link['text']); ?> <i
                                                    class="fal fa-plus"></i></a>
                                            <ul class="menu-dropdown">
                                                <?php $__currentLoopData = $link['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $l2Href = getUserHref($level2, $currentLanguageInfo->id);
                                                    ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="<?php echo e($l2Href); ?>"><?php echo e($level2['text']); ?></a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="more-option mobile-item">
                            <div class="item">
                                <div class="language">
                                    <form action="<?php echo e(route('changeUserLanguage', getParam())); ?>" method="GET">
                                        <select class="niceselect" name="lang_code" onchange="this.form.submit()">
                                            <?php $__currentLoopData = $allLanguageInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languageInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($languageInfo->code); ?>"
                                                    <?php echo e($languageInfo->code == $currentLanguageInfo->code ? 'selected' : ''); ?>>
                                                    <?php echo e($languageInfo->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="item">
                                <?php if(auth()->guard('customer')->guest()): ?>
                                <a href="<?php echo e(route('customer.login', getParam())); ?>" class="btn-icon-text" target="_self" aria-label="User" title="<?php echo e($keywords['login'] ?? __('Login')); ?>">
                                    <i class="fal fa-sign-in-alt"></i>
                                    <span><?php echo e($keywords['login'] ?? __('Login')); ?></span>
                                </a>
                                <?php endif; ?>

                                <?php if(auth()->guard('customer')->check()): ?>
                                <?php $authUserInfo = Auth::guard('customer')->user(); ?>
                                <a href="<?php echo e(route('customer.dashboard', getParam())); ?>" class="btn-icon-text" target="_self" aria-label="User" title="<?php echo e($keywords['dashboard'] ?? __('Dashboard')); ?>">
                                    <i class="fal fa-user"></i>
                                    <span><?php echo e($keywords['dashboard'] ?? __('Dashboard')); ?></span>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/header/header-nav-v5.blade.php ENDPATH**/ ?>