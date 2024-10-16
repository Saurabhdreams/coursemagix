<div class="col-lg-4 col-md-6 col-sm-8">
  <div class="blog-sidebar ml-10">
    <div class="blog-side-about white-bg mt-40">
      <div class="about-title">
        <h4 class="title"><?php echo e($keywords['search_blog'] ?? __('Search Blog')); ?></h4>
      </div>
      <div class="blog-Search-content text-center">
        <form action="<?php echo e(route('front.user.blogs', getParam())); ?>" method="GET">
          <div class="input-box">
            <input type="text" placeholder="<?php echo e($keywords['search_by_title'] ?? __('Search By Title')); ?>" name="title" value="<?php echo e(!empty(request()->input('title')) ? request()->input('title') : ''); ?>">
            <input type="hidden" name="category" value="<?php echo e(!empty(request()->input('category')) ? request()->input('category') : ''); ?>">
            <button type="submit"><i class="far fa-search"></i></button>
          </div>
        </form>
      </div>
    </div>

    <div class="blog-side-about white-bg mt-40">
      <div class="about-title">
        <h4 class="title"><?php echo e($keywords['Categories'] ?? __('Categories')); ?></h4>
      </div>
      <div class="blog-categories-content mt-35">
        <?php if(count($categories) == 0): ?>
          <h5><?php echo e($keywords['no_category_found'] ?? __('No Category Found') . '!'); ?></h5>
        <?php else: ?>
          <ul class="blog-categories">
            <li <?php if(empty(request()->input('category'))): ?> class="active" <?php endif; ?>>
              <a href="#"><?php echo e($keywords['All'] ?? __('All')); ?> <span><?php echo e($allBlogs); ?></span></a>
            </li>

            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li <?php if($category->id == request()->input('category')): ?> class="active" <?php endif; ?>>
                <a href="#" data-category_id="<?php echo e($category->slug); ?>"><?php echo e($category->name); ?> <span><?php echo e($category->blogCount); ?></span></a>
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
    <?php if(is_array($packagePermissions) && in_array('Advertisement',$packagePermissions)): ?>
        <?php if(!empty(showAd(1))): ?>
            <div class="banner-add mt-40 text-center">
                <?php echo showAd(1); ?>

            </div>
        <?php endif; ?>
        <?php if(!empty(showAd(2))): ?>
            <div class="banner-add mt-40 text-center">
                <?php echo showAd(2); ?>

            </div>
        <?php endif; ?>
    <?php endif; ?>
  </div>

  
  <form class="d-none" action="<?php echo e(route('front.user.blogs', getParam())); ?>" method="GET">
    <input type="hidden" name="title" value="<?php echo e(!empty(request()->input('title')) ? request()->input('title') : ''); ?>">

    <input type="hidden" id="categoryKey" name="category">

    <button type="submit" id="submitBtn"></button>
  </form>
  
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/journal/side-bar.blade.php ENDPATH**/ ?>