<div class="footer-item mt-30">
  <div class="footer-title item-3">
    <i class="fal fa-blog"></i>
    <h4 class="title"><?php echo e($keywords['Latest_Blog'] ?? __('Latest Blog')); ?></h4>
  </div>

  <div class="footer-instagram">
    <?php if(count($latestBlogInfos) == 0): ?>
      <h6 class="text-light"><?php echo e($keywords['no_blog_found'] ?? __('No Blog Found') . '!'); ?></h6>
    <?php else: ?>
      <div class="instagram-item">
        <?php $__currentLoopData = $latestBlogInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestBlogInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="item mt-20 d-flex align-items-center">
            <div class="blog-img <?php echo e($currentLanguageInfo->rtl == 0 ? 'mr-4' : 'ml-4'); ?>">
              <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_BLOG_IMAGE,$latestBlogInfo->image,$userBs)); ?>" class="lazy" alt="image">
            </div>

            <div class="blog-info">
              <h6 class="blog-title">
                <a href="<?php echo e(route('front.user.blog_details', [getParam(),'slug' => $latestBlogInfo->slug])); ?>"><?php echo e(strlen($latestBlogInfo->title) > 30 ? mb_substr($latestBlogInfo->title, 0, 30, 'UTF-8') . '...' : $latestBlogInfo->title); ?></a>
              </h6>
              <span class="mt-1"><?php echo e(date_format($latestBlogInfo->created_at, 'M d, Y')); ?></span>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/footer/latest-blogs.blade.php ENDPATH**/ ?>