<?php $__env->startSection('pageHeading'); ?>
  <?php if(!empty($pageHeading)): ?>
    <?php echo e($pageHeading->blog_page_title); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->blogs_meta_keywords); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->blogs_meta_description); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('user-front.common.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->blog_page_title])) echo $__env->make('user-front.common.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->blog_page_title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!--====== BLOG STANDARD PART START ======-->
  <section class="blog-standard-area gray-bg pt-80 pb-120">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="blog-standard">
            <div class="row">
              <?php if(count($blogs) == 0): ?>
                <div class="col">
                  <h3 class="mt-40 text-center"><?php echo e($keywords['no_blog_found'] ?? __('No Blog Found') . '!'); ?></h3>
                </div>
              <?php else: ?>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-lg-6 col-md-6 col-sm-9">
                    <div class="single-blog-grid mt-40">
                      <a href="<?php echo e(route('front.user.blog_details', [getParam(),'slug' => $blog->slug])); ?>" class="blog-thumb d-block">
                        <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_BLOG_IMAGE,$blog->image,$userBs)); ?>" class="lazy" alt="image">
                      </a>
                      <div class="blog-content">
                        <a class="category" href="<?php echo e(route('front.user.blogs', [getParam(), 'category' => $blog->categorySlug])); ?>"><?php echo e($blog->categoryName); ?></a>
                        <a class="d-block" href="<?php echo e(route('front.user.blog_details', [getParam() ,'slug' => $blog->slug])); ?>">
                          <h4 class="title"><?php echo e(strlen($blog->title) > 30 ? mb_substr($blog->title, 0, 30, 'UTF-8') . '...' : $blog->title); ?></h4>
                        </a>
                        <ul>
                          <li><i class="fal fa-calendar-alt"></i> <?php echo e(date_format($blog->created_at, 'M d, Y')); ?></li>
                        </ul>
                        <p><?php echo strlen(strip_tags($blog->content)) > 100 ? mb_substr(strip_tags($blog->content), 0, 100, 'UTF-8') . '...' : strip_tags($blog->content); ?></p>
                      </div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>

            <?php if(count($blogs) > 0): ?>
              <?php echo e($blogs->appends([
                'title' => request()->input('title'), 
                'category' => request()->input('category')
              ])->links()); ?>

            <?php endif; ?>
          </div>

          <?php if(is_array($packagePermissions) && in_array('Advertisement',$packagePermissions)): ?>
              <?php if(!empty(showAd(3))): ?>
                  <div class="text-center mt-30">
                      <?php echo showAd(3); ?>

                  </div>
              <?php endif; ?>
          <?php endif; ?>
        </div>

        <?php if ($__env->exists('user-front.common.journal.side-bar')) echo $__env->make('user-front.common.journal.side-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
  </section>
  <!--====== BLOG STANDARD PART END ======-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script type="text/javascript" src="<?php echo e(asset('assets/tenant/js/blog/blog.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-front.common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/journal/blogs.blade.php ENDPATH**/ ?>