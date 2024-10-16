<?php $__env->startSection('pageHeading'); ?>
  <?php if(!empty($pageHeading)): ?>
    <?php echo e($pageHeading->courses_page_title); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->courses_meta_keywords); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->courses_meta_description); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('user-front.common.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->courses_page_title])) echo $__env->make('user-front.common.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->courses_page_title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!--====== COURSES PART START ======-->
  <section class="course-grid-area pt-90 pb-120 courses-page">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="course-grid mt-30">
            <div class="course-grid-top d-sm-flex d-block justify-content-between align-items-center">
              <div class="course-filter d-block align-items-center d-sm-flex">
                <select id="sort-type">
                  <option selected disabled><?php echo e($keywords['sort_by'] ?? __('Sort By')); ?></option>
                  <option <?php echo e(request()->input('sort') == 'new' ? 'selected' : ''); ?> value="new">
                    <?php echo e($keywords['new_course'] ?? __('New Course')); ?>

                  </option>
                  <option <?php echo e(request()->input('sort') == 'old' ? 'selected' : ''); ?> value="old">
                    <?php echo e($keywords['old_course'] ?? __('Old Course')); ?>

                  </option>
                  <option <?php echo e(request()->input('sort') == 'ascending' ? 'selected' : ''); ?> value="ascending">
                    <?php echo e($keywords['price'] ?? __('Price') . ': '); ?><?php echo e(__('Ascending')); ?>

                  </option>
                  <option <?php echo e(request()->input('sort') == 'descending' ? 'selected' : ''); ?> value="descending">
                    <?php echo e($keywords['price'] ?? __('Price') . ': '); ?><?php echo e($keywords['descending'] ?? __('Descending')); ?>

                  </option>
                </select>

                <div class="input-box">
                  <i class="fal fa-search" id="course-search-icon"></i>
                  <input type="text" id="search-input" placeholder="<?php echo e($keywords['search_course'] ?? __('Search Course')); ?>" value="<?php echo e(!empty(request()->input('keyword')) ? request()->input('keyword') : ''); ?>">
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-10">
            <?php if(count($courses) == 0): ?>
              <div class="col-lg-12">
                <h3 class="text-center mt-30"><?php echo e($keywords['no_course_found'] ?? __('No Course Found') . '!'); ?></h3>
              </div>
            <?php else: ?>
              <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-sm-8">
                  <div class="single-courses mt-30">
                    <div class="courses-thumb">
                      <a class="d-block" href="<?php echo e(route('front.user.course.details', [getParam(), 'slug' => $course->slug])); ?>"><img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE,$course->thumbnail_image,$userBs)); ?>" class="lazy" alt="image"></a>

                      <div class="corses-thumb-title">
                        <a class="category" href="<?php echo e(route('front.user.courses', [getParam(), 'category' => $course->categorySlug])); ?>"><?php echo e($course->categoryName); ?></a>
                      </div>
                    </div>

                    <div class="courses-content">
                      <a href="<?php echo e(route('front.user.course.details', [getParam(),'slug' => $course->slug])); ?>">
                        <h4 class="title"><?php echo e(strlen($course->title) > 45 ? mb_substr($course->title, 0, 45, 'UTF-8') . '...' : $course->title); ?></h4>
                      </a>
                      <div class="courses-info d-flex justify-content-between">
                        <div class="item">
                          <p><?php echo e(strlen($course->instructorName) > 10 ? mb_substr($course->instructorName, 0, 10, 'utf-8') . '...' : $course->instructorName); ?></p>
                        </div>

                        <div class="price">
                          <?php if($course->pricing_type == 'premium'): ?>
                            <span><?php echo e($currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : ''); ?><?php echo e($course->current_price); ?><?php echo e($currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : ''); ?></span>

                            <?php if(!is_null($course->previous_price)): ?>
                              <span class="pre-price"><?php echo e($currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : ''); ?><?php echo e($course->previous_price); ?><?php echo e($currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : ''); ?></span>
                            <?php endif; ?>
                          <?php else: ?>
                            <span><?php echo e($keywords['free'] ?? __('Free')); ?></span>
                          <?php endif; ?>
                        </div>
                      </div>
                      <ul class="d-flex justify-content-center">
                        <li><i class="fal fa-users"></i> <?php echo e($course->enrolmentCount . ' '); ?><?php echo e($keywords['students'] ?? __('Students')); ?></li>

                        <?php
                          $period = $course->duration;
                          $array = explode(':', $period);
                          $hour = $array[0];
                          $courseDuration = \Carbon\Carbon::parse($period);
                        ?>

                        <li><i class="fal fa-clock"></i> <?php echo e($hour == '00' ? '00' : $courseDuration->format('h')); ?>h <?php echo e($courseDuration->format('i')); ?>m</li>
                      </ul>
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <div class="col-lg-12">
              <?php if(count($courses) > 0): ?>
                <?php echo e($courses->appends([
                  'type' => request()->input('type'),
                  'category' => request()->input('category'),
                  'min' => request()->input('min'),
                  'max' => request()->input('max'),
                  'keyword' => request()->input('keyword'),
                  'sort' => request()->input('sort')
                ])->links()); ?>

              <?php endif; ?>
            </div>

            <?php if(is_array($packagePermissions) && in_array('Advertisement',$packagePermissions)): ?>
                <?php if(!empty(showAd(3))): ?>
                    <div class="course-add mt-30">
                        <?php echo showAd(3); ?>

                    </div>
                <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-8">
          <div class="course-sidebar">
            <div class="course-price-filter white-bg mt-30">
              <div class="course-title">
                <h4 class="title"><?php echo e($keywords['course_type'] ?? __('Course Type')); ?></h4>
              </div>
              <div class="input-radio-btn">
                <ul class="radio_common-2 radio_style2">
                  <li>
                    <input type="radio" <?php echo e(empty(request()->input('type')) ? 'checked' : ''); ?> name="type" id="radio1" value="">
                    <label for="radio1"><span></span><?php echo e($keywords['all_courses'] ?? __('All Courses')); ?></label>
                  </li>
                  <li>
                    <input type="radio" <?php echo e(request()->input('type') == 'free' ? 'checked' : ''); ?> name="type" id="radio2" value="free">
                    <label for="radio2"><span></span><?php echo e($keywords['free_courses'] ?? __('Free Courses')); ?></label>
                  </li>
                  <li>
                    <input type="radio" <?php echo e(request()->input('type') == 'premium' ? 'checked' : ''); ?> name="type" id="radio3" value="premium">
                    <label for="radio3"><span></span><?php echo e($keywords['premium_courses'] ?? __('Premium Courses')); ?></label>
                  </li>
                </ul>
              </div>
            </div>

            <?php if(count($categories) > 0): ?>
              <div class="course-price-filter white-bg mt-30">
                <div class="course-title">
                  <h4 class="title"><?php echo e($keywords['Categories'] ?? __('Categories')); ?></h4>
                </div>
                <div class="input-radio-btn">
                  <ul class="radio_common-2 radio_style2">
                    <li>
                      <input type="radio" <?php echo e(empty(request()->input('category')) ? 'checked' : ''); ?> name="category" id="all-category" value="">
                      <label for="all-category"><span></span><?php echo e($keywords['all_category'] ?? __('All Category')); ?></label>
                    </li>

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li>
                        <input type="radio" <?php echo e(request()->input('category') == $category->slug ? 'checked' : ''); ?> name="category" id="<?php echo e('catRadio' . $category->id); ?>" value="<?php echo e($category->slug); ?>">
                        <label for="<?php echo e('catRadio' . $category->id); ?>"><span></span><?php echo e($category->name); ?></label>
                      </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              </div>
            <?php endif; ?>

            <div class="course-price-filter white-bg mt-30">
              <div class="course-title">
                <h4 class="title"><?php echo e($keywords['filter_by_price'] ?? __('Filter By Price')); ?></h4>
              </div>
              <div class="price-number">
                <ul>
                  <li><span class="amount"><?php echo e($keywords['price'] ?? __('Price') . ' :'); ?></span></li>
                  <li><input type="text" id="amount" readonly></li>
                </ul>
              </div>
              <div id="range-slider"></div>
            </div>
              <?php if(is_array($packagePermissions) && in_array('Advertisement',$packagePermissions)): ?>
                  <?php if(!empty(showAd(2))): ?>
                      <div class="course-add mt-30">
                          <?php echo showAd(2); ?>

                      </div>
                  <?php endif; ?>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--====== COURSES PART END ======-->

  <form id="filtersForm" class="d-none" action="<?php echo e(route('front.user.courses', getParam())); ?>" method="GET">
    <input type="hidden" id="type-id" name="type" value="<?php echo e(!empty(request()->input('type')) ? request()->input('type') : ''); ?>">

    <input type="hidden" id="category-id" name="category" value="<?php echo e(!empty(request()->input('category')) ? request()->input('category') : ''); ?>">

    <input type="hidden" id="min-id" name="min" value="<?php echo e(!empty(request()->input('min')) ? request()->input('min') : ''); ?>">

    <input type="hidden" id="max-id" name="max" value="<?php echo e(!empty(request()->input('max')) ? request()->input('max') : ''); ?>">

    <input type="hidden" id="keyword-id" name="keyword" value="<?php echo e(!empty(request()->input('keyword')) ? request()->input('keyword') : ''); ?>">

    <input type="hidden" id="sort-id" name="sort" value="<?php echo e(!empty(request()->input('sort')) ? request()->input('sort') : ''); ?>">

    <button type="submit" id="submitBtn"></button>
  </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

  <script>
    "use strict";
    var currency_info = <?php echo json_encode($currencyInfo) ?>;
    var position = currency_info.base_currency_symbol_position;
    var symbol = currency_info.base_currency_symbol;
    var min_price = <?php echo e($minPrice); ?>;
    var max_price = <?php echo e($maxPrice); ?>;
    var curr_min = <?php echo e(!empty(request()->input('min')) ? request()->input('min') : $minPrice); ?>;
    var curr_max = <?php echo e(!empty(request()->input('max')) ? request()->input('max') : $maxPrice); ?>;
  </script>

  <script type="text/javascript" src="<?php echo e(asset('assets/tenant/js/course/course.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-front.common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/curriculum/courses.blade.php ENDPATH**/ ?>