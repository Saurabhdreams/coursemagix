<?php if($secInfo->call_to_action_section_status == 1): ?>

    <section class="action-banner ptb-100 bg-img bg-cover"
        data-bg-image="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ACTION_SECTION_IMAGE, $callToActionInfo->background_image ?? '', $userBs)); ?>">
        <div class="container">
            <div class="row justify-content-center gx-xl-5">
                <div class="col-lg-6">
                    <div class="content-title text-center" data-aos="fade-up">
                        <h2 class="title color-white mb-0">
                            <?php echo e(!empty($callToActionInfo) ? $callToActionInfo->second_title : ''); ?>

                        </h2>
                        <div class="btn-groups justify-content-center mt-25">
                            <?php if(!empty($callToActionInfo->first_button) && !empty($callToActionInfo->first_button_url)): ?>
                                <a href="<?php echo e($callToActionInfo->first_button_url); ?>"
                                    class="btn btn-lg btn-secondary radius-sm"
                                    title="<?php echo e($callToActionInfo->first_button); ?>"
                                    target="_self"><?php echo e($callToActionInfo->first_button); ?></a>
                            <?php endif; ?>
                            <?php if(!empty($callToActionInfo->second_button) && !empty($callToActionInfo->second_button_url)): ?>
                                <a href="<?php echo e($callToActionInfo->second_button_url); ?>"
                                    class="btn btn-lg btn-primary radius-sm"
                                    title="<?php echo e($callToActionInfo->second_button); ?>"
                                    target="_self"><?php echo e($callToActionInfo->second_button); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/theme5/call-to-action.blade.php ENDPATH**/ ?>