<?php $__env->startSection('pageHeading'); ?>
  <?php if(!empty($pageHeading)): ?>
    <?php echo e($pageHeading->blog_details_page_title); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php echo e($details->meta_keywords); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php echo e($details->meta_description); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->blog_details_page_title])) echo $__env->make('frontend.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->blog_details_page_title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!--====== BLOG DETAILS PART START ======-->
  <section class="blog-standard-area gray-bg pt-80 pb-120 header-next">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="blog-standard-2">
            <div class="single-blog-standard mt-40">
              <div class="blog-dteails-content bg-white">
                <div class="blog-details-bath pb-40">
                  <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_BLOG_IMAGE,$details->image,$userBs)); ?>" class="lazy" alt="image">
                </div>

                <div class="blog-details-top">
                  <span><?php echo e($details->categoryName); ?></span>
                  <h2 class="title"><?php echo e($details->title); ?></h2>
                  <ul class="my-3">
                    <li><i class="fal fa-calendar-alt"></i> <?php echo e(date_format($details->created_at, 'M d, Y')); ?></li>
                  </ul>
                  <div class="summernote-content">
                    <?php echo replaceBaseUrl($details->content); ?>

                  </div>
                </div>

                <div class="blog-details-bar d-flex justify-content-between mt-40 mb-50">
                  <div class="blog-social">
                    <h4 class="title"><?php echo e($keywords['Share'] ?? __('Share')); ?></h4>
                    <ul>
                      <li><a href="//www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="//twitter.com/intent/tweet?text=my share text&amp;url=<?php echo e(urlencode(url()->current())); ?>"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo e(urlencode(url()->current())); ?>&amp;title=<?php echo e($details->title); ?>"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                  </div>
                </div>

                <div class="blog-details-releted-post mt-45">
                  <h4 class="title"><?php echo e($keywords['related_blog'] ?? __('Related Blog')); ?></h4>
                  <?php if(count($relatedBlogs) == 0): ?>
                    <div class="row text-center">
                      <div class="col">
                        <h5 class="mt-40"><?php echo e($keywords['no_related_blog_found'] ?? __('No Related Blog Found') . '!'); ?></h5>
                      </div>
                    </div>
                  <?php else: ?>
                    <div class="row">
                      <?php $__currentLoopData = $relatedBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-6 col-md-6">
                          <div class="blog-details-related-item mt-30">
                            <div class="related-thumb">
                              <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_BLOG_IMAGE,$relatedBlog->image,$userBs)); ?>" class="lazy" alt="image">
                            </div>
                            <div class="related-content">
                              <span><i class="fal fa-calendar-alt"></i> <?php echo e(date_format($relatedBlog->created_at, 'M d, Y')); ?></span>
                              <a class="d-block" href="<?php echo e(route('front.user.blog_details', [getParam(),'slug' => $relatedBlog->slug])); ?>">
                                <h4 class="title"><?php echo e(strlen($relatedBlog->title) > 30 ? mb_substr($relatedBlog->title, 0, 30, 'UTF-8') . '...' : $relatedBlog->title); ?></h4>
                              </a>
                              <p><?php echo strlen(strip_tags($relatedBlog->content)) > 100 ? mb_substr(strip_tags($relatedBlog->content), 0, 100, 'UTF-8') . '...' : strip_tags($relatedBlog->content); ?></p>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  <?php endif; ?>
                </div>

                <?php if($disqusInfo->disqus_status == 1): ?>
                  <div id="disqus_thread" class="mt-45"></div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

        <?php if ($__env->exists('user-front.common.journal.side-bar')) echo $__env->make('user-front.common.journal.side-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
  </section>
  <!--====== BLOG DETAILS PART END ======-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
    "use strict";
    const shortName = '<?php echo e($disqusInfo->disqus_short_name); ?>';
  </script>
  <script type="text/javascript" src="<?php echo e(asset('assets/tenant/js/blog/blog.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-front.common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/journal/blog-details.blade.php ENDPATH**/ ?>