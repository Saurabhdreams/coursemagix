<?php $__env->startSection('pageHeading'); ?>
  <?php if(!empty($pageHeading)): ?>
    <?php echo e($pageHeading->course_details_page_title); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php echo e($details->meta_keywords); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php echo e($details->meta_description); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/summernote-content.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php
    $position = $currencyInfo->base_currency_symbol_position;
    $symbol = $currencyInfo->base_currency_symbol;
  ?>

  <!--====== COURSE TITLE PART START ======-->
  <section class="course-title-area pt-120 pb-120 bg_cover lazy" data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_COVER_IMAGE,$details->cover_image,$userBs)); ?>">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="course-title-content">
            <div class="course-title-content-title">
              <span><?php echo e($details->categoryName); ?></span>
              <h2 class="title"><?php echo e($details->title); ?></h2>
            </div>
            <div class="course-rating d-flex">
              <?php if(!is_null($details->average_rating)): ?>
                <div class="rate">
                  <div class="rating" style="width: <?php echo e($details->average_rating * 20 . '%;'); ?>"></div>
                </div>
                <p><?php echo e($details->average_rating . ' (' . $ratingCount . ' ' . __('ratings') . ')'); ?></p>
              <?php endif; ?>
              <ul>
                <li><span><i class="fal fa-users"></i> <?php echo e($enrolmentCount); ?> <?php echo e($keywords["Students_Enrolled"] ?? __('Students Enrolled')); ?></span></li>
              </ul>
            </div>
            <div class="course-info">
              <ul>
                <li><i class="fal fa-user"></i> <?php echo e($keywords['by'] ?? "By"); ?> <?php echo e($details->instructorName); ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--====== COURSE TITLE PART END ======-->

  <!--====== COURSE DETAILS PART START ======-->
  <section class="course-details-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="course-details-items white-bg">
            <div class="course-thumb">
              <div class="tab-btns">
                <ul class="nav nav-pills d-flex justify-content-between" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true"><i class="fal fa-list"></i> <?php echo e($keywords['description'] ?? __('Description')); ?></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false"><i class="fal fa-book"></i> <?php echo e($keywords['curriculum'] ?? __('Curriculum')); ?></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false"><i class="fal fa-user"></i> <?php echo e($keywords['Instructors'] ?? __('Instructor')); ?></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false"><i class="fal fa-stars"></i> <?php echo e($keywords['reviews'] ?? __('Reviews')); ?></a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                <div class="course-details-item">
                  <div class="summernote-content pt-3">
                    <?php echo replaceBaseUrl($details->description); ?>

                  </div>

                  <div class="course-faq">
                    <h4 class="title"><?php echo e($keywords['frequently_asked_questions'] ?? __('Frequently Asked Questions')); ?></h4>
                  </div>

                  <?php
                    $faqs = DB::table('user_course_faqs')->where('course_id', $details->id)->where('language_id', $details->language_id)
                      ->orderBy('serial_number', 'asc')
                      ->get();
                  ?>

                  <?php if(count($faqs) == 0): ?>
                    <div class="row">
                      <div class="col">
                        <h5 class="text-center bg-light py-5"><?php echo e($keywords['no_faq_found'] ?? __('No FAQ Found') . '!'); ?></h5>
                      </div>
                    </div>
                  <?php else: ?>
                    <div class="course-accordian">
                      <div class="accordion" id="accordionCourse">
                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="card">
                            <div class="card-header">
                              <a class="<?php echo e($loop->first ? '' : 'collapsed'); ?> title" data-toggle="collapse" data-target="<?php echo e('#collapse-' . $faq->id); ?>" aria-expanded="<?php echo e($loop->first ? 'true' : 'false'); ?>">
                                <?php echo e($faq->question); ?>

                              </a>
                            </div>
                            <div id="<?php echo e('collapse-' . $faq->id); ?>" class="collapse <?php echo e($loop->first ? 'show' : ''); ?>" data-parent="#accordionCourse">
                              <div class="card-body">
                                <p><?php echo e($faq->answer); ?></p>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                <div class="curriculum-accordion">
                  <div class="accordion" id="curriculumAccordion">
                    <?php
                      $modules = DB::table('user_course_modules')->where('course_information_id', $details->courseInfoId)
                        ->where('status', 'published')
                        ->orderBy('serial_number', 'asc')
                        ->get();
                    ?>

                    <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="card">
                        <?php
                          $modulePeriod = $module->duration;
                          $array = explode(':', $modulePeriod);
                          $moduleHour = $array[0];
                          $moduleDuration = \Carbon\Carbon::parse($modulePeriod);
                        ?>

                        <div class="card-header">
                          <a class="<?php echo e($loop->first ? '' : 'collapsed'); ?> title" data-toggle="collapse" data-target="<?php echo e('#collapse-' . $module->id); ?>" aria-expanded="<?php echo e($loop->first ? 'true' : 'false'); ?>">
                            <?php echo e($module->title); ?>

                            <span class="badge badge-warning"><?php echo e($moduleHour == '00' ? '' : $moduleDuration->format('h') . 'h '); ?><?php echo e($moduleDuration->format('i') . 'm'); ?></span>
                          </a>
                        </div>
                        <div id="<?php echo e(__('collapse-') . $module->id); ?>" class="collapse <?php echo e($loop->first ? 'show' : ''); ?>" aria-labelledby="<?php echo e('heading-' . $module->id); ?>" data-parent="#curriculumAccordion">
                          <?php
                            $lessons = DB::table('user_lessons')->where('module_id', $module->id)
                              ->where('status', 'published')
                              ->orderBy('serial_number', 'asc')
                              ->get();
                          ?>

                          <div class="card-body">
                            <ul class="play-list">
                              <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                  $lessonPeriod = $lesson->duration;
                                  $lessonDuration = \Carbon\Carbon::parse($lessonPeriod);
                                ?>
                                <li>
                                  <a><i class="fas fa-play"></i><?php echo e($lesson->title); ?><span class="time"><?php echo e($lessonDuration->format('i') . ':'); ?><?php echo e($lessonDuration->format('s')); ?></span></a>
                                </li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                <div class="instructor-box">
                  <div class="thumb">
                    <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE,$details->instructorImage,$userBs)); ?>" class="lazy" alt="Instructor">
                  </div>
                  <div class="info">
                    <h5><?php echo e($details->instructorName); ?></h5>
                    <span class="position d-block"><?php echo e($details->instructorJob); ?></span>
                    <?php echo replaceBaseUrl($details->instructorDetails, 'summernote'); ?>


                    <?php
                      $socials = DB::table('instructor_social_links')->where('instructor_id', $details->instructorId)
                        ->orderBy('serial_number', 'asc')
                        ->get();
                    ?>

                    <?php if(count($socials) > 0): ?>
                      <ul class="social-link">
                        <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><a href="<?php echo e($social->url); ?>"><i class="<?php echo e($social->icon); ?>"></i></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                <div class="reviews-area">
                  <?php if(auth()->guard('customer')->guest()): ?>
                    <h4 class="mb-3"><?php echo e($keywords['please_login_to_give_your_feedback'] ?? __('Please login to give your feedback') . '.'); ?></h4>
                    <a href="<?php echo e(route('customer.login', [getParam(),'redirectPath' => 'course_details'])); ?>" class="main-btn"><?php echo e($keywords['login'] ?? __('Login')); ?></a>
                  <?php endif; ?>
                  <?php if(auth()->guard('customer')->check()): ?>
                    <div class="rating-form-area">
                      <h4 class="title"><?php echo e($keywords['ratings'] ?? __('Ratings') . '*'); ?></h4>
                      <div class="rating-form mb-35">
                        <form action="<?php echo e(route('front.user.course.store_feedback', [getParam(),'id' => $details->id])); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                          <div class="form_rating">
                            <ul class="rating">
                              <li class="review-value review-1">
                                <span class="far fa-star" data-ratingVal="1"></span>
                              </li>
                              <li class="review-value review-2">
                                <span class="far fa-star" data-ratingVal="2"></span>
                                <span class="far fa-star" data-ratingVal="2"></span>
                              </li>
                              <li class="review-value review-3">
                                <span class="far fa-star" data-ratingVal="3"></span>
                                <span class="far fa-star" data-ratingVal="3"></span>
                                <span class="far fa-star" data-ratingVal="3"></span>
                              </li>
                              <li class="review-value review-4">
                                <span class="far fa-star" data-ratingVal="4"></span>
                                <span class="far fa-star" data-ratingVal="4"></span>
                                <span class="far fa-star" data-ratingVal="4"></span>
                                <span class="far fa-star" data-ratingVal="4"></span>
                              </li>
                              <li class="review-value review-5">
                                <span class="far fa-star" data-ratingVal="5"></span>
                                <span class="far fa-star" data-ratingVal="5"></span>
                                <span class="far fa-star" data-ratingVal="5"></span>
                                <span class="far fa-star" data-ratingVal="5"></span>
                                <span class="far fa-star" data-ratingVal="5"></span>
                              </li>
                            </ul>
                          </div>

                          <input type="hidden" id="rating-id" name="rating">

                          <div class="form_group">
                            <textarea class="form_control" name="comment" placeholder="<?php echo e($keywords['enter_your_feedback'] ?? __('Enter Your Feedback')); ?>"><?php echo e(old('comment')); ?></textarea>
                          </div>

                          <div class="form_group">
                            <button class="main-btn"><?php echo e($keywords['Submit'] ?? __('Submit')); ?></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if(count($reviews) == 0): ?>
                    <h4 class="mt-25 text-center"><?php echo e($keywords['this_course_is_not_reviewed_yet'] ?? __('This course is not reviewed yet') . '.'); ?></h4>
                  <?php else: ?>
                    <div class="reviews-list">
                      <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="reviews-item">
                          <?php $user = $review->customerInfo()->first(); ?>

                          <div class="thumb">
                            <?php if(is_null($user->image)): ?>
                              <img data-src="<?php echo e(asset('assets/tenant/image/customers/profile.jpg')); ?>" class="lazy" alt="User">
                            <?php else: ?>
                              <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_TENANT_CUSTOMER_IMAGE.'/'.$user->user_id,$user->image,$userBs)); ?>" class="lazy" alt="User">
                            <?php endif; ?>
                          </div>
                          <div class="content">
                            <div class="title-review">
                              <div class="title">
                                <h5><?php echo e($user->first_name . ' ' . $user->last_name); ?></h5>
                                <span class="date"><?php echo e(date_format($review->created_at, 'F d, Y')); ?></span>
                              </div>
                              <ul class="rating user-rating">
                                <?php for($i = 0; $i < $review->rating; $i++): ?>
                                  <li><i class="fas fa-star"></i></li>
                                <?php endfor; ?>
                              </ul>
                            </div>
                            <p><?php echo e($review->comment); ?></p>
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <?php if(is_array($packagePermissions) && in_array('Advertisement',$packagePermissions)): ?>
                  <?php if(!empty(showAd(3))): ?>
                      <div class="text-center mt-30">
                          <?php echo showAd(3); ?>

                      </div>
                  <?php endif; ?>
              <?php endif; ?>

            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-7 col-sm-9">
          <div class="course-details-sidebar white-bg">
            <div class="course-sidebar-thumb">
              <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE,$details->thumbnail_image,$userBs)); ?>" class="lazy" alt="image">
              <a class="video-popup" href="<?php echo e($details->video_link); ?>"><i class="fas fa-play"></i></a>
            </div>

            <div class="course-sidebar-price d-flex justify-content-between align-items-center">
              <?php if($details->pricing_type == 'premium'): ?>
                <h3 class="title"><?php echo e($position == 'left' ? $symbol : ''); ?><?php echo e($details->current_price); ?><?php echo e($position == 'right' ? $symbol : ''); ?> <?php if(!is_null($details->previous_price)): ?> <span><?php echo e($position == 'left' ? $symbol : ''); ?><?php echo e($details->previous_price); ?><?php echo e($position == 'right' ? $symbol : ''); ?></span> <?php endif; ?> </h3>
              <?php else: ?>
                <h3 class="title"><?php echo e($keywords['free'] ?? __('Free')); ?></h3>
              <?php endif; ?>
            </div>

            <div class="course-sidebar-price d-none" id="discount-info">
              <h6><?php echo e($keywords['discounted_price'] ?? __('Discounted Price')); ?>: <?php echo e($position == 'left' ? $symbol : ''); ?><span id="discount-price"></span><?php echo e($position == 'right' ? $symbol : ''); ?></h6>
            </div>

            <div class="course-sidebar-btns">
              <?php if(session()->has('profile_warning')): ?>
                <div class="alert alert-warning" role="alert">
                  <strong><?php echo e(session()->get('profile_warning')); ?> <a href="<?php echo e(route('customer.edit_profile',getParam())); ?>"><?php echo e($keywords['here'] ?? __('here')); ?></a></strong>
                </div>
              <?php endif; ?>

              <?php $__errorArgs = ['attachment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

              <?php
                $courseType = '';

                if ($details->pricing_type == 'free') {
                  $courseType = 'free';
                }
              ?>

              <?php if(auth()->guard('customer')->check()): ?>
                <?php if(($details->pricing_type == 'premium' && (!is_null($enrolmentInfo) && $enrolmentInfo->payment_status == 'completed'))
                  || ($details->pricing_type == 'free' && !is_null($enrolmentInfo))): ?>
                  <div class="alert alert-success" role="alert">
                    <strong><?php echo e($keywords['you_have_already_enrolled_in_this_course'] ?? __('You have already enrolled in this course') . '.'); ?></strong>
                  </div>
                <?php endif; ?>
              <?php endif; ?>

              <?php if(!Auth::guard('customer')->check() || (($details->pricing_type == 'premium' && (is_null($enrolmentInfo) || $enrolmentInfo->payment_status != 'completed')) || ($details->pricing_type == 'free' && is_null($enrolmentInfo)))): ?>
                <form id="my-checkout-form" action="<?php echo e(route('front.user.course.enrolment', [getParam() ,'id' => $details->id, 'type' => $courseType])); ?>" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <?php if($details->pricing_type == 'premium'): ?>
                    <select name="gateway" class="mb-4" id="payment-gateway">
                      <option selected disabled><?php echo e($keywords['select_payment_gateway'] ?? __('Select Payment Gateway')); ?></option>

                      <?php if(count($onlineGateways) > 0): ?>
                        <?php $__currentLoopData = $onlineGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onlineGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($onlineGateway->keyword); ?>" <?php echo e($onlineGateway->keyword == old('gateway') ? 'selected' : ''); ?>>
                            <?php echo e($onlineGateway->name); ?>

                          </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>

                      <?php if(count($offlineGateways) > 0): ?>
                        <?php $__currentLoopData = $offlineGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlineGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($offlineGateway->id); ?>" <?php echo e($offlineGateway->id == old('gateway') ? 'selected' : ''); ?>>
                            <?php echo e($offlineGateway->name); ?>

                          </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </select>

                    <?php $__currentLoopData = $onlineGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onlineGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($onlineGateway->keyword == 'stripe'): ?>
                        <div>
                            <div id="stripe-element" class="mb-2 mt-2">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors -->
                            <div id="stripe-errors" role="alert" class="mb-2"></div>
                        </div>
                      <?php endif; ?>
                      <?php if($onlineGateway->keyword == 'authorize.net'): ?>
                          <div id="authorize-net-input" class="<?php if($errors->has('anetCardNumber') || $errors->has('anetExpMonth') || $errors->has('anetExpYear') || $errors->has('anetCardCode')): ?> d-block <?php else: ?> d-none <?php endif; ?>">
                              <div class="form-group mb-4">
                                  <input type="text" class="form-control" id="anetCardNumber" name="anetCardNumber" placeholder="<?php echo e($keywords['enter_your_card_number'] ?? __('Enter Your Card Number')); ?>" autocomplete="off">
                                  <p class="mt-2 text-danger" id="anetCardNumber-error"></p>
                                  <?php $__errorArgs = ['anetCardNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>

                              <div class="form-group mb-4">
                                  <input type="text" class="form-control" id="anetExpMonth" name="anetExpMonth" placeholder="<?php echo e($keywords['enter_expiry_month'] ?? __('Enter Expiry Month')); ?>" autocomplete="off">
                                  <p class="mt-2 text-danger" id="anetExpMonth-error"></p>
                                  <?php $__errorArgs = ['anetExpMonth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>

                              <div class="form-group mb-4">
                                  <input type="text" class="form-control" id="anetExpYear" name="anetExpYear" placeholder="<?php echo e($keywords['enter_expiry_year'] ?? __('Enter Expiry Year')); ?>" autocomplete="off">
                                  <?php $__errorArgs = ['anetExpYear'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>

                              <div class="form-group mb-4">
                                  <input type="text" class="form-control" id="anetCardCode" name="anetCardCode" placeholder="<?php echo e($keywords['enter_card_code'] ?? __('Enter Card Code')); ?>" autocomplete="off">
                                  <?php $__errorArgs = ['anetCardCode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                              <input type="hidden" name="opaqueDataValue" id="opaqueDataValue" />
                              <input type="hidden" name="opaqueDataDescriptor" id="opaqueDataDescriptor" />
                              <ul id="anetErrors" class="dis-none"></ul>
                          </div>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $offlineGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlineGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="<?php if($errors->has('attachment') && request()->session()->get('gatewayId') == $offlineGateway->id): ?> d-block <?php else: ?> d-none <?php endif; ?> offline-gateway-info" id="<?php echo e('offline-gateway-' . $offlineGateway->id); ?>">
                        <?php if(!is_null($offlineGateway->short_description)): ?>
                          <div class="form-group mb-4">
                            <label><?php echo e($keywords['description'] ?? __('Description')); ?></label>
                            <p><?php echo e($offlineGateway->short_description); ?></p>
                          </div>
                        <?php endif; ?>

                        <?php if(!is_null($offlineGateway->instructions)): ?>
                          <div class="form-group mb-4">
                            <label><?php echo e($keywords['instructions'] ?? __('Instructions')); ?></label>
                            <p><?php echo replaceBaseUrl($offlineGateway->instructions); ?></p>
                          </div>
                        <?php endif; ?>

                        <?php if($offlineGateway->is_receipt == 1): ?>
                          <div class="form-group mb-4">
                            <label><?php echo e($keywords['attachment'] ?? __('Attachment')); ?> *</label>
                            <br>
                            <input type="file" name="attachment">
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(is_array($packagePermissions) && in_array('Coupon',$packagePermissions)): ?>
                            <div class="input-group mb-4">
                                <input type="text" class="form-control" id="coupon-code"
                                       placeholder="<?php echo e($keywords['enter_your_coupon'] ?? __('Enter Your Coupon')); ?>"
                                       aria-label="Coupon Code" aria-describedby="coupon-btn">
                                <div
                                    class="<?php echo e($currentLanguageInfo->rtl == 0 ? 'input-group-append' : 'input-group-prepend'); ?>">
                                    <button class="btn" type="button"
                                            id="coupon-btn"><?php echo e($keywords['apply'] ?? __('Apply')); ?></button>
                                </div>
                            </div>
                        <?php endif; ?>
                  <?php endif; ?>

                  <button id="enrol-btn" type="button"><i class="fal fa-user-graduate"></i> <?php echo e($keywords['enrol_now'] ?? __('Enrol Now')); ?></button>
                </form>
              <?php endif; ?>

              <h6 class="title"><?php echo e($keywords['this_course_includes'] ?? __('This Course Includes')); ?></h6>

              <?php $features = explode(PHP_EOL, $details->features); ?>

              <ul>
                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><i class="fal fa-check"></i> <?php echo e($feature); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>

            <div class="course-sidebar-share">
              <a href="//www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>"><i class="fab fa-facebook-f"></i></a>
              <a href="//twitter.com/intent/tweet?text=my share text&amp;url=<?php echo e(urlencode(url()->current())); ?>"><i class="fab fa-twitter"></i></a>
              <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo e(urlencode(url()->current())); ?>&amp;title=<?php echo e($details->title); ?>"><i class="fab fa-linkedin"></i></a>
            </div>
          </div>

          <?php if(count($relatedCourses) > 0): ?>
            <div class="trending-course">
              <h4 class="title"><i class="fal fa-book"></i> <?php echo e($keywords['related_courses'] ?? __('Related Courses')); ?></h4>
              <?php $__currentLoopData = $relatedCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-courses mt-30">
                  <div class="courses-thumb">
                    <a class="d-block" href="<?php echo e(route('front.user.course.details', [getParam(), 'slug' => $relatedCourse->slug])); ?>"><img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE,$relatedCourse->thumbnail_image,$userBs)); ?>" class="lazy" alt="image"></a>

                    <div class="corses-thumb-title item-2">
                      <a class="category" href="<?php echo e(route('front.user.courses', [getParam(), 'category' => $relatedCourse->categorySlug])); ?>"><?php echo e($relatedCourse->categoryName); ?></a>
                    </div>
                  </div>
                  <div class="courses-content">
                    <a href="<?php echo e(route('front.user.course.details', [getParam(),'slug' => $relatedCourse->slug])); ?>">
                      <h4 class="title"><?php echo e(strlen($relatedCourse->title) > 45 ? mb_substr($relatedCourse->title, 0, 45, 'UTF-8') . '...' : $relatedCourse->title); ?></h4>
                    </a>
                    <div class="courses-info d-flex justify-content-between">
                      <div class="item">
                        <img data-src="<?php echo e(asset('assets/tenant/image/instructors/' . $relatedCourse->instructorImage)); ?>" class="lazy" alt="instructor">
                        <p><?php echo e(strlen($relatedCourse->instructorName) > 10 ? mb_substr($relatedCourse->instructorName, 0, 10, 'utf-8') . '...' : $relatedCourse->instructorName); ?></p>
                      </div>

                      <div class="price">
                        <?php if($relatedCourse->pricing_type == 'premium'): ?>
                          <span><?php echo e($position == 'left' ? $symbol : ''); ?><?php echo e($relatedCourse->current_price); ?><?php echo e($position == 'right' ? $symbol : ''); ?></span>

                          <?php if(!is_null($relatedCourse->previous_price)): ?>
                            <span class="pre-price"><?php echo e($position == 'left' ? $symbol : ''); ?><?php echo e($relatedCourse->previous_price); ?><?php echo e($position == 'right' ? $symbol : ''); ?></span>
                          <?php endif; ?>
                        <?php else: ?>
                          <span><?php echo e($keywords['free'] ?? __('Free')); ?></span>
                        <?php endif; ?>
                      </div>
                    </div>
                    <ul class="d-flex justify-content-center">
                      <li><i class="fal fa-users"></i> <?php echo e($relatedCourse->enrolmentCount.' '); ?><?php echo e($keywords['students'] ?? __('Students')); ?></li>

                      <?php
                        $period = $relatedCourse->duration;
                        $array = explode(':', $period);
                        $hour = $array[0];
                        $courseDuration = \Carbon\Carbon::parse($period);
                      ?>

                      <li><i class="fal fa-clock"></i> <?php echo e($hour == '00' ? '00' : $courseDuration->format('h')); ?>h <?php echo e($courseDuration->format('i')); ?>m</li>
                    </ul>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php endif; ?>

          <?php if(is_array($packagePermissions) && in_array('Advertisement',$packagePermissions)): ?>
              <?php if(!empty(showAd(2))): ?>
                  <div class="text-center mt-30">
                      <?php echo showAd(2); ?>

                  </div>
              <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <!--====== COURSE DETAILS PART END ======-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
    <?php
        $user = getUser();
        $anet = App\Models\User\PaymentGateway::query()
                ->where('user_id', $user->id)
                ->where('keyword','authorize.net')
                ->first();
        $anetSrc = "assets/front/js/anet-test.js";
        $anetAcceptSrc= "https://jstest.authorize.net/v1/Accept.js";
        if(!is_null($anet)){
            $anetInfo = $anet->convertAutoData();
            $anetTest = $anetInfo['sandbox_check'];
            if ($anetTest != 1) {
                $anetSrc = "assets/front/js/anet.js";
                $anetAcceptSrc= "https://js.authorize.net/v1/Accept.js";
            }
        }
    ?>

    
    <?php
        $stripe = \App\Models\User\PaymentGateway::where('keyword', 'stripe')->first();
        $stripe_info = json_decode($stripe->information, true);
        $stripe_key = $stripe_info['key'];
    ?>
        <script>
        let stripe_key = "<?php echo e($stripe_key); ?>";
       </script>
       <script src="https://js.stripe.com/v3/"></script>
       <script src="<?php echo e(asset('assets\tenant\js\stripe.js')); ?>"></script>

    
    <script type="text/javascript" src="<?php echo e(asset("${anetSrc}")); ?>" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo e($anetAcceptSrc); ?>" charset="utf-8"></script>
  <script>
		"use strict";
    let courseId = <?php echo e($details->id); ?>;
    const couponUrl= "<?php echo e(route('front.user.course.enrolment.apply.coupon', getParam())); ?>";
  </script>

  <script>
		"use strict";
    var clientKey = "<?php echo e(isset($anetInfo) ? $anetInfo['public_key'] : null); ?>";
    var apiLoginID = "<?php echo e(isset($anetInfo) ? $anetInfo['login_id'] : null); ?>";
  </script>
  <script type="text/javascript" src="<?php echo e(asset('assets/tenant/js/course/course-details.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-front.common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/curriculum/course-details.blade.php ENDPATH**/ ?>