
<?php if(count($popupInfos) > 0): ?>
  <?php $__currentLoopData = $popupInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popupInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $type = $popupInfo->type; ?>

    <?php if($type == 1): ?>
      <div data-popup_delay="<?php echo e($popupInfo->delay); ?>" data-popup_id="<?php echo e($popupInfo->id); ?>" id="modal-popup-<?php echo e($popupInfo->id); ?>" class="popup-wrapper">
        <div>
          <img data-src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ANNOUNCEMENT_POPUP_IMAGE,$popupInfo->image,$userBs)); ?>" class="lazy" alt="Popup Image" width="100%">
        </div>
      </div>
    <?php elseif($type == 2): ?>
      <div data-popup_delay="<?php echo e($popupInfo->delay); ?>" data-popup_id="<?php echo e($popupInfo->id); ?>" id="modal-popup-<?php echo e($popupInfo->id); ?>" class="popup-wrapper">
        <div class="popup-one bg_cover lazy" data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ANNOUNCEMENT_POPUP_IMAGE,$popupInfo->image,$userBs)); ?>">
          <div class="popup_main-content" style="background-color: <?php echo e('#' . $popupInfo->background_color); ?>; opacity: <?php echo e($popupInfo->background_color_opacity); ?>;">
            <h1><?php echo e($popupInfo->title); ?></h1>
            <p><?php echo e($popupInfo->text); ?></p>
            <a href="<?php echo e($popupInfo->button_url); ?>" class="popup-main-btn" style="background-color: <?php echo e('#' . $popupInfo->button_color); ?>;"><?php echo e($popupInfo->button_text); ?></a>
          </div>
        </div>
      </div>
    <?php elseif($type == 3): ?>
      <div data-popup_delay="<?php echo e($popupInfo->delay); ?>" data-popup_id="<?php echo e($popupInfo->id); ?>" id="modal-popup-<?php echo e($popupInfo->id); ?>" class="popup-wrapper">
        <div class="popup-two bg_cover lazy" data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ANNOUNCEMENT_POPUP_IMAGE,$popupInfo->image,$userBs)); ?>">
          <div class="popup_main-content" style="background-color: <?php echo e('#' . $popupInfo->background_color); ?>; opacity: <?php echo e($popupInfo->background_color_opacity); ?>;">
            <h1><?php echo e($popupInfo->title); ?></h1>
            <p><?php echo e($popupInfo->text); ?></p>

            <div class="subscribe-form">
              <form class="subscriptionForm" action="<?php echo e(route('front.user.subscriber',getParam())); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form_group">
                  <input type="email" class="form_control" placeholder="<?php echo e($keywords['enter_your_email'] ?? __('Enter Your Email Address')); ?>" name="email">
                </div>

                <div class="form_group">
                  <button type="submit" class="popup-main-btn" style="background-color: <?php echo e('#' . $popupInfo->button_color); ?>;">
                    <?php echo e($popupInfo->button_text); ?>

                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php elseif($type == 4): ?>
      <div data-popup_delay="<?php echo e($popupInfo->delay); ?>" data-popup_id="<?php echo e($popupInfo->id); ?>" id="modal-popup-<?php echo e($popupInfo->id); ?>" class="popup-wrapper">
        <div class="popup-three">
          <div class="popup_main-content">
            <div class="left-bg bg_cover lazy" data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ANNOUNCEMENT_POPUP_IMAGE,$popupInfo->image,$userBs)); ?>"></div>
            <div class="right-content">
              <h1><?php echo e($popupInfo->title); ?></h1>
              <p><?php echo e($popupInfo->text); ?></p>
              <a href="<?php echo e($popupInfo->button_url); ?>" class="popup-main-btn" style="background-color: <?php echo e('#' . $popupInfo->button_color); ?>;"><?php echo e($popupInfo->button_text); ?></a>
            </div>
          </div>
        </div>
      </div>
    <?php elseif($type == 5): ?>
      <div data-popup_delay="<?php echo e($popupInfo->delay); ?>" data-popup_id="<?php echo e($popupInfo->id); ?>" id="modal-popup-<?php echo e($popupInfo->id); ?>" class="popup-wrapper">
        <div class="popup-four">
          <div class="popup_main-content">
            <div class="left-bg bg_cover lazy" data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ANNOUNCEMENT_POPUP_IMAGE,$popupInfo->image,$userBs)); ?>"></div>
            <div class="right-content">
              <h1><?php echo e($popupInfo->title); ?></h1>
              <p><?php echo e($popupInfo->text); ?></p>

              <div class="subscribe-form">
                <form class="subscriptionForm" action="<?php echo e(route('front.user.subscriber',getParam())); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="form_group">
                    <input type="email" class="form_control" placeholder="<?php echo e(__('Enter Your Email Address')); ?>" name="email">
                  </div>

                  <div class="form_group">
                    <button type="submit" class="popup-main-btn" style="background-color: <?php echo e('#' . $popupInfo->button_color); ?>;">
                      <?php echo e($popupInfo->button_text); ?>

                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php elseif($type == 6): ?>
      <div data-popup_delay="<?php echo e($popupInfo->delay); ?>" data-popup_id="<?php echo e($popupInfo->id); ?>" id="modal-popup-<?php echo e($popupInfo->id); ?>" class="popup-wrapper">
        <div class="popup-five bg_cover lazy" data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ANNOUNCEMENT_POPUP_IMAGE,$popupInfo->image,$userBs)); ?>">
          <div class="popup_main-content">
            <h1><?php echo e($popupInfo->title); ?></h1>
            <h4><?php echo e($popupInfo->text); ?></h4>

            <div class="offer-timer" data-end_date="<?php echo e($popupInfo->end_date); ?>" data-end_time="<?php echo e($popupInfo->end_time); ?>"></div>

            <a href="<?php echo e($popupInfo->button_url); ?>" class="popup-main-btn" style="background-color: <?php echo e('#' . $popupInfo->button_color); ?>;"><?php echo e($popupInfo->button_text); ?></a>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div data-popup_delay="<?php echo e($popupInfo->delay); ?>" data-popup_id="<?php echo e($popupInfo->id); ?>" id="modal-popup-<?php echo e($popupInfo->id); ?>" class="popup-wrapper">
        <div class="popup-six">
          <div class="popup_main-content">
            <div class="left-bg bg_cover lazy" data-bg="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ANNOUNCEMENT_POPUP_IMAGE,$popupInfo->image,$userBs)); ?>"></div>
            <div class="right-content bg_cover" style="background-color: <?php echo e('#' . $popupInfo->background_color); ?>; background-image: url(<?php echo e(asset('assets/img/popups/right-bg.png')); ?>);">
              <h1><?php echo e($popupInfo->title); ?></h1>
              <h4><?php echo e($popupInfo->text); ?></h4>
              <div class="offer-timer" data-end_date="<?php echo e($popupInfo->end_date); ?>" data-end_time="<?php echo e($popupInfo->end_time); ?>"></div>
              <a href="<?php echo e($popupInfo->button_url); ?>" class="popup-main-btn" style="background-color: <?php echo e('#' . $popupInfo->button_color); ?>;"><?php echo e($popupInfo->button_text); ?></a>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/popups.blade.php ENDPATH**/ ?>