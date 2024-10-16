    <!-- Footer-area start -->
    <?php if($footerSecStatus == 1): ?>
        <footer class="footer-area bg-primary-light">
            <div class="footer-top pt-100 pb-70">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-3 col-sm-8">
                            <div class="footer-widget" data-aos="fade-up">
                                <!-- Logo -->
                                <div class="logo mb-20">
                                    <?php if(!is_null($userBs->footer_logo)): ?>
                                        <a class="navbar-brand" href="<?php echo e(route('front.user.detail.view', getParam())); ?>"
                                            target="_self" title="Link">
                                            <img src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FOOTER_LOGO, $userBs->footer_logo, $userBs)); ?>"
                                                alt="Logo">
                                        </a>
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/tenant/image/static/logo.png')); ?>" alt="Logo">
                                    <?php endif; ?>
                                </div>
                                <?php if(!is_null($footerInfo)): ?>
                                    <p>
                                        <?php echo e($footerInfo->about_company); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-4">
                            <div class="footer-widget" data-aos="fade-up">
                                <h5><?php echo e($keywords['useful_links'] ?? __('Useful Links')); ?></h5>
                                <?php if(count($quickLinkInfos) == 0): ?>
                                    <div class="alert-secondary mt-4">
                                        <?php echo e($keywords['no_link_found'] ?? __('No Link Found')); ?>

                                    </div>
                                <?php else: ?>
                                    <ul class="footer-links">
                                        <?php $__currentLoopData = $quickLinkInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quickLinkInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="<?php echo e($quickLinkInfo->url); ?>" target="_self"
                                                    title="link"><?php echo e($quickLinkInfo->title); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-widget" data-aos="fade-up">
                                <h5 class="mb-0"><?php echo e($keywords['latest_post'] ?? __('Latest Post')); ?></h5>
                                <div class="row">
                                    <?php if(count($latestBlogInfos) == 0): ?>
                                        <div class="alert-secondary mt-4 ">
                                            <?php echo e($keywords['no_blog_found'] ?? __('No Blog Found')); ?>

                                        </h6>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $latestBlogInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestBlogInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <article class="article-item mt-25">
                                                    <div class="image">
                                                        <a href="<?php echo e(route('front.user.blog_details', [getParam(), 'slug' => $latestBlogInfo->slug])); ?>"
                                                            target="_self"
                                                            title="<?php echo e(route('front.user.blog_details', [getParam(), 'slug' => $latestBlogInfo->slug])); ?>"
                                                            class="lazy-container ratio ratio-1-1 radius-sm">
                                                            <img class="lazyload"
                                                                data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_BLOG_IMAGE, $latestBlogInfo->image, $userBs)); ?>"
                                                                alt="Blog Image">
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <ul class="info-list">
                                                            <li><?php echo e($latestBlogInfo->author); ?> </li>
                                                            <li><?php echo e(date_format($latestBlogInfo->created_at, 'M d, Y')); ?>

                                                            </li>
                                                        </ul>
                                                        <h6 class="lc-2 mb-0">
                                                            <a href="<?php echo e(route('front.user.blog_details', [getParam(), 'slug' => $latestBlogInfo->slug])); ?>"
                                                                target="_self" title="<?php echo e($latestBlogInfo->title); ?>">
                                                                <?php echo e(strlen($latestBlogInfo->title) > 55 ? mb_substr($latestBlogInfo->title, 0, 55, 'UTF-8') . '...' : $latestBlogInfo->title); ?>

                                                            </a>
                                                        </h6>
                                                    </div>
                                                </article>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right-area border-top ptb-30">
                <div class="container">
                    <div class="copy-right-content">
                        <?php if(count($socialMediaInfos) > 0): ?>
                            <div class="social-link rounded style-2 justify-content-center mb-10">
                                <?php $__currentLoopData = $socialMediaInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialMediaInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($socialMediaInfo->url); ?>" target="_blank" title="">
                                        <i class="<?php echo e($socialMediaInfo->icon); ?>"></i>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                        <span>
                            <?php echo !empty($footerInfo->copyright_text) ? $footerInfo->copyright_text : ''; ?>

                        </span>
                    </div>
                </div>
            </div>
        </footer>
    <?php endif; ?>
    <!-- Footer-area end-->
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/footer/footer-v6.blade.php ENDPATH**/ ?>