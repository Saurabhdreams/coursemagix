<?php $__env->startSection('pageHeading'); ?>
    <?php echo e($keywords["Home"] ?? "Home"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
    <?php if(!empty($seoInfo)): ?>
        <?php echo e($seoInfo->home_meta_keywords); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
    <?php if(!empty($seoInfo)): ?>
        <?php echo e($seoInfo->home_meta_description); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!--====== BANNER PART START ======-->
  <section class="banner-area banner-area-3 bg_cover lazy" <?php if(!empty($heroInfo)): ?> data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_HERO_SECTION_IMAGE,$heroInfo->background_image,$userBs)); ?>" <?php else: ?> data-bg="<?php echo e(asset('assets/tenant/image/static/hero_bg_3.jpeg')); ?>" <?php endif; ?>>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="banner-content text-center">
            <span><?php echo e(!empty($heroInfo->first_title) ? $heroInfo->first_title : ''); ?></span>
            <h1 class="title"><?php echo e(!empty($heroInfo->second_title) ? $heroInfo->second_title : ''); ?></h1>
            <ul>
              <?php if(!empty($heroInfo->first_button) && !empty($heroInfo->first_button_url)): ?>
                <li><a class="main-btn" href="<?php echo e($heroInfo->first_button_url); ?>"><?php echo e($heroInfo->first_button); ?></a></li>
              <?php endif; ?>

              <?php if(!empty($heroInfo->second_button) && !empty($heroInfo->second_button_url)): ?>
                <li><a class="main-btn-2 main-btn" href="<?php echo e($heroInfo->second_button_url); ?>"><?php echo e($heroInfo->second_button); ?></a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <?php if(!empty($heroInfo->image)): ?>
      <div class="banner-thumb">
        <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_HERO_SECTION_IMAGE,$heroInfo->image,$userBs)); ?>" class="lazy" alt="image">
      </div>
    <?php endif; ?>
  </section>
  <!--====== BANNER PART END ======-->

  <!--====== WE DO/FEATURES PART START ======-->
  <?php if($secInfo->features_section_status == 1): ?>
    <section class="we-do-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title section-title-2 text-center">
              <span></span>
              <h3 class="title"><?php echo e(!empty($secTitleInfo->features_section_title) ? $secTitleInfo->features_section_title : ''); ?></h3>
            </div>
          </div>
        </div>

        <?php if(count($features) == 0): ?>
          <div class="row text-center">
            <div class="col">
              <h3><?php echo e($keywords['no_feature_found'] ?? __('No Feature Found')); ?> <?php echo e('!'); ?></h3>
            </div>
          </div>
        <?php else: ?>
          <div class="row justify-content-center">
            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $color = $feature->background_color; ?>
              <style>
                .we-do-3 .single-we-do i.icon<?php echo e($loop->iteration); ?>::after {
                  border-top-color: #<?php echo e($color); ?>;
                  border-bottom-color: #<?php echo e($color); ?>;
                }
              </style>
              <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="single-we-do text-center mt-30">

                  <?php $color = $feature->background_color; ?>

                  <i class="<?php echo e($feature->icon); ?> icon<?php echo e($loop->iteration); ?>" style="color: <?php echo e('#' . $color); ?>"></i>
                  <h4 class="title"><?php echo e($feature->title); ?></h4>
                  <p><?php echo e($feature->text); ?></p>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>
  <!--====== WE DO/FEATURES PART END ======-->

  <!--====== CATEGORIES PART START ======-->
  <?php if($secInfo->course_categories_section_status == 1): ?>
    <div class="services-area-3 bg_cover lazy" <?php if(!empty($courseCategoryData->course_categories_section_image)): ?> data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_CATEGORY_SECTION_IMAGE,$courseCategoryData->course_categories_section_image,$userBs)); ?>" <?php else: ?> data-bg="<?php echo e(asset('assets/tenant/image/static/category_bg.jpeg')); ?>" <?php endif; ?>>
      <div class="container">
        <?php if(count($categories) == 0): ?>
          <div class="row text-center">
            <div class="col">
              <h3 class="text-light mt-30"><?php echo e($keywords['no_course_category_found'] ?? __('No Course Category Found')); ?> <?php echo e('!'); ?></h3>
            </div>
          </div>
        <?php else: ?>
          <div class="row justify-content-center">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-lg-3 col-md-6 col-sm-9">
                <a class="single-services text-center mt-30 d-block" href="<?php echo e(route('front.user.courses', [getParam(), 'category' => $category->slug])); ?>">
                  <i class="<?php echo e($category->icon); ?>" style="color: <?php echo e('#' . $category->color); ?>;"></i>
                  <span><?php echo e($category->name); ?></span>
                </a>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
  <!--====== CATEGORIES PART END ======-->

  <!--====== ABOUT PART START ======-->
  <?php if($secInfo->about_us_section_status == 1): ?>
    <section class="exp-area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="exp-thumb mr-50">
              <?php if(!empty($aboutUsInfo)): ?>
                <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ABOUT_US_SECTION_IMAGE,$aboutUsInfo->image,$userBs)); ?>" class="lazy" alt="image">
              <?php else: ?>
                <img data-src="<?php echo e(asset('assets/tenant/image/static/about.jpeg')); ?>" class="lazy" alt="image">
              <?php endif; ?>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="exp-content-area">
              <div class="top-content">
                <span><?php echo e(!empty($aboutUsInfo->title) ? $aboutUsInfo->title : ''); ?></span>
                <h3 class="title"><?php echo e(!empty($aboutUsInfo->subtitle) ? $aboutUsInfo->subtitle : ''); ?></h3>
                <p><?php echo e(!empty($aboutUsInfo->text) ? $aboutUsInfo->text : ''); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <!--====== ABOUT PART END ======-->

  <!--====== OUR COURSES PART START ======-->
  <?php if($secInfo->featured_courses_section_status == 1): ?>
    <section class="our-courses-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title section-title-2">
              <span></span>
              <h3 class="title"><?php echo e(!empty($secTitleInfo->featured_courses_section_title) ? $secTitleInfo->featured_courses_section_title : ''); ?></h3>

              <?php if(count($categories) > 0): ?>
                <ul class="nav nav-pills d-flex justify-content-between" id="pills-tab" role="tablist">
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                      <a class="nav-link <?php echo e($loop->first ? 'active' : ''); ?>" id="<?php echo e('category-' . $category->id . '-tab'); ?>" data-toggle="pill" href="<?php echo e('#category-' . $category->id); ?>" role="tab" aria-controls="<?php echo e('category-' . $category->id); ?>" aria-selected="<?php echo e($loop->first ? 'true' : 'false'); ?>"><?php echo e($category->name); ?></a>
                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <?php if(count($categories) == 0): ?>
          <div class="row text-center">
            <div class="col">
              <h3><?php echo e($keywords['no_featured_course_category_found'] ?? __('No Featured Course Category Found')); ?> <?php echo e('!'); ?></h3>
            </div>
          </div>
        <?php else: ?>
          <div class="tab-content" id="categories-tabContent">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="tab-pane fade <?php echo e($loop->first ? 'show active' : ''); ?>" id="<?php echo e('category-' . $category->id); ?>" role="tabpanel" aria-labelledby="<?php echo e('category-' . $category->id . '-tab'); ?>">
                <?php $courses = $category->courses; ?>

                <?php if(count($courses) == 0): ?>
                  <div class="row text-center">
                    <div class="col">
                      <h3 class="mt-30"><?php echo e($keywords['no_course_found'] ?? __('No Course Found')); ?> <?php echo e('!'); ?></h3>
                    </div>
                  </div>
                <?php else: ?>
                  <div class="courses-active-3">
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="single-courses-3 mt-30">
                        <div class="courses-thumb">
                          <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE,$course->thumbnail_image,$userBs)); ?>" class="lazy" alt="image">

                          <a class="courses-overlay d-block" href="<?php echo e(route('front.user.course.details', [getParam(), 'slug' => $course->slug])); ?>">
                            <ul>
                              <?php if(!is_null($course->average_rating)): ?>
                                <li><i class="fas fa-star"></i> <span><?php echo e($course->average_rating . ' ' . __('Ratings')); ?></span></li>
                              <?php endif; ?>

                              <li><p><?php echo e($category->name); ?></p></li>
                            </ul>
                          </a>
                        </div>

                        <div class="courses-content">
                          <a href="<?php echo e(route('front.user.course.details', [getParam(),'slug' => $course->slug])); ?>">
                            <h5 class="title"><?php echo e(strlen($course->title) > 40 ? mb_substr($course->title, 0, 40, 'UTF-8') . '...' : $course->title); ?></h5>
                          </a>
                          <p><?php echo strlen(strip_tags($course->description)) > 80 ? mb_substr(strip_tags($course->description), 0, 80, 'UTF-8') . '...' : strip_tags($course->description); ?></p>
                          <ul>
                            <li><i class="fal fa-user"></i><?php echo e(strlen($course->instructorName) > 12 ? mb_substr($course->instructorName, 0, 12, 'utf-8') . '...' : $course->instructorName); ?></li>
                            <li>
                              <?php if($course->pricing_type == 'premium'): ?>
                                <p><?php echo e($keywords['price'] ?? __('Price') . ':'); ?> <span><?php echo e($currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : ''); ?><?php echo e($course->current_price); ?><?php echo e($currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : ''); ?></span></p>
                              <?php else: ?>
                                <p><?php echo e($keywords['price'] ?? __('Price') . ':'); ?> <span><?php echo e($keywords['free'] ?? __('Free')); ?></span></p>
                              <?php endif; ?>
                            </li>
                          </ul>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>
        
        <?php if(is_array($packagePermissions) && in_array('Advertisement',$packagePermissions)): ?>
            <?php if(!empty(showAd(3))): ?>
                <div class="text-center mt-5">
                    <?php echo showAd(3); ?>

                </div>
            <?php endif; ?>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>
  <!--====== OUR COURSES PART END ======-->

  <!--====== NEWSLETTER PART START ======-->
  <?php if($secInfo->newsletter_section_status == 1): ?>
    <section class="faq-answer-area faq-answer-area-2 bg_cover lazy" <?php if(!empty($newsletterData)): ?> data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_NEWSLETTER_SECTION_IMAGE,$newsletterData->background_image,$userBs)); ?>" <?php else: ?> data-bg="<?php echo e(asset('assets/tenant/image/static/newsletter_bg_3.jpeg')); ?>" <?php endif; ?>>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title section-title-2 text-center">
              <span></span>
              <h3 class="title"><?php echo e(!empty($newsletterData->title) ? $newsletterData->title : ''); ?></h3>
            </div>
          </div>
        </div>

        <form class="subscriptionForm" action="<?php echo e(route('front.user.subscriber',getParam())); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="input-box text-center mt-30">
                <input type="email" placeholder="<?php echo e($keywords['Enter_Email_Address'] ?? __('Enter Your Email Address')); ?>" name="email">
                <i class="fal fa-envelope"></i>
                <button type="submit"><?php echo e($keywords['Subscribe'] ?? __('Subscribe')); ?></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  <?php endif; ?>
  <!--====== NEWSLETTER PART END ======-->

  <!--====== COUNTER INFORMATION PART START ======-->
  <?php if($secInfo->fun_facts_section_status == 1): ?>
    <section class="counter-3-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title section-title-2 text-center">
              <span></span>
              <h3 class="title"><?php echo e(!empty($factData->title) ? $factData->title : ''); ?></h3>
            </div>
          </div>
        </div>

        <?php if(count($countInfos) == 0): ?>
          <div class="row text-center">
            <div class="col">
              <h3 class="mt-3"><?php echo e($keywords['no_information_found'] ?? __('No Information Found')); ?> <?php echo e('!'); ?></h3>
            </div>
          </div>
        <?php else: ?>
          <div class="row justify-content-center">
            <?php $__currentLoopData = $countInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-lg-3 col-md-6 col-sm-9">
                <div class="single-counter text-center mt-30">
                  <i class="<?php echo e($countInfo->icon); ?>" style="color: <?php echo e('#' . $countInfo->color); ?>;"></i>
                  <span><span class="counter"><?php echo e($countInfo->amount); ?></span>+</span>
                  <p><?php echo e($countInfo->title); ?></p>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>
  <!--====== COUNTER INFORMATION PART END ======-->

  <!--====== BLOG PART START ======-->
  <?php if(is_array($packagePermissions) && in_array('Blog',$packagePermissions)): ?>
      <?php if($secInfo->latest_blog_section_status == 1): ?>
          <section class="news-3-area">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-lg-8">
                          <div class="section-title section-title-2 text-center">
                              <span></span>
                              <h3 class="title"><?php echo e(!empty($secTitleInfo->blog_section_title) ? $secTitleInfo->blog_section_title : ''); ?></h3>
                          </div>
                      </div>
                  </div>

                  <?php if(count($blogs) == 0): ?>
                      <div class="row text-center">
                          <div class="col">
                              <h3 class="mt-3"><?php echo e($keywords['no_blog_found'] ?? __('No Blog Found')); ?> <?php echo e('!'); ?></h3>
                          </div>
                      </div>
                  <?php else: ?>
                      <div class="row justify-content-center">
                          <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="col-lg-4 col-md-7 col-sm-9">
                                  <div class="single-news mt-30">
                                      <a class="news-thumb d-block" href="<?php echo e(route('front.user.blog_details', [getParam(), 'slug' => $blog->slug])); ?>">
                                            <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_BLOG_IMAGE,$blog->image,$userBs)); ?>" class="lazy" alt="image">
                                      </a>
                                      <div class="news-content">
                                          <ul>
                                              <li><i class="fal fa-user"></i><?php echo e($blog->author); ?></li>
                                          </ul>
                                          <a href="<?php echo e(route('front.user.blog_details', [getParam(),'slug' => $blog->slug])); ?>">
                                              <h3 class="title"><?php echo e(strlen($blog->title) > 45 ? mb_substr($blog->title, 0, 45, 'UTF-8') . '...' : $blog->title); ?></h3>
                                          </a>
                                          <div class="btns d-flex justify-content-between align-items-center">
                                            <a class="category" href="<?php echo e(route('front.user.blogs', [getParam(), 'category' => $blog->categorySlug])); ?>"><?php echo e($blog->categoryName); ?></a>
                                            <a href="<?php echo e(route('front.user.blog_details', [getParam(), 'slug' => $blog->slug])); ?>"><i class="fal fa-eye"></i></a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                  <?php endif; ?>
                  <?php if(is_array($packagePermissions) && in_array('Advertisement',$packagePermissions)): ?>
                      <?php if(!empty(showAd(3))): ?>
                          <div class="text-center mt-5">
                              <?php echo showAd(3); ?>

                          </div>
                      <?php endif; ?>
                  <?php endif; ?>
              </div>
          </section>
      <?php endif; ?>
  <?php endif; ?>
  <!--====== BLOG PART END ======-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-front.common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme3/index.blade.php ENDPATH**/ ?>