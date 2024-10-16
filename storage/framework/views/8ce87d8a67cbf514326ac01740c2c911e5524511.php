<?php $__env->startSection('pagename'); ?>
    - <?php echo e(__('Blog Details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta-description', !empty($blog) ? $blog->meta_keywords : ''); ?>
<?php $__env->startSection('meta-keywords', !empty($blog) ? $blog->meta_description : ''); ?>

<?php $__env->startSection('og-meta'); ?>
    <meta property="og:image" content="<?php echo e(asset('assets/front/img/blogs/'.$blog->main_image)); ?>">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <?php echo e(strlen($blog->title) > 30 ? mb_substr($blog->title, 0, 30) . '...' : $blog->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb-link'); ?>
    <?php echo e(__('Blog Details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--====== BLOG DETAILS PART START ======-->

    <!-- Blog Details Start -->
    <div class="blog-details-area pt-120 pb-90">
        <div class="container">
            <div class="row justify-content-center gx-xl-5">
                <div class="col-lg-8">
                    <div class="blog-description mb-50">
                        <article class="item-single">
                            <div class="image">
                                <div class="lazy-container aspect-ratio-16-9">
                                    <img class="lazyload lazy-image" src="<?php echo e(asset('assets/front/img/blogs/'.$blog->main_image)); ?>"
                                         data-src="<?php echo e(asset('assets/front/img/blogs/'.$blog->main_image)); ?>" alt="Blog Image">
                                </div>
                            </div>
                            <div class="content">
                                <ul class="info-list">
                                    <li><i class="fal fa-user"></i><?php echo e(__('Admin')); ?></li>
                                    <li><i class="fal fa-calendar"></i><?php echo e(\Carbon\Carbon::parse($blog->created_at)->format("F j, Y")); ?></li>
                                    <li><i class="fal fa-tag"></i><a
                                        href="<?php echo e(route('front.blogs', ['category'=>$blog->bcategory->id])); ?>"><?php echo e($blog->bcategory->name); ?></a></li>
                                </ul>
                                <h3 class="title">
                                    <?php echo e($blog->title); ?>

                                </h3>
                                <div class="summernote-content">
                                    <?php echo replaceBaseUrl($blog->content); ?>

                                </div>
                            </div>
                            <div class="blog-social">
                                <div class="shop-social d-flex align-items-center">
                                    <span><?php echo e(__('Share')); ?> :</span>
                                    <ul>
                                        <li class="p-1"><a href="//www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="p-1"><a href="//twitter.com/intent/tweet?text=my share text&amp;url=<?php echo e(urlencode(url()->current())); ?>"><i class="fab fa-twitter"></i></a></li>
                                        <li class="p-1"><a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo e(urlencode(url()->current())); ?>&amp;title=<?php echo e($blog->title); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </article>


                    </div>
                    <div class="blog-details-comment mt-5">
                        <div class="comment-lists">
                            <div id="disqus_thread"></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <?php if ($__env->exists('front.partials.blog-sidebar')) echo $__env->make('front.partials.blog-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details End -->



    <!--====== BLOG DETAILS PART ENDS ======-->


<?php $__env->stopSection(); ?>

<?php if($bs->is_disqus == 1): ?>
    <?php $__env->startSection('scripts'); ?>
    <script>
        "use strict";
        (function() {
            var d = document, s = d.createElement('script');
            s.src = '//<?php echo e($bs->disqus_shortname); ?>.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.  || d.body).appendChild(s);
        })();
    </script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/front/blog-details.blade.php ENDPATH**/ ?>