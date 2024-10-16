
<?php if(
    ($userBs->theme_version == 4 || $userBs->theme_version == 5 || $userBs->theme_version == 6) &&
        request()->routeIs('front.user.detail.view')): ?>
     <?php echo $__env->make('user-front.common.partials.theme_4_5_6_home_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php if($userBs->theme_version == 4 || $userBs->theme_version == 5 || $userBs->theme_version == 6): ?>
        <?php echo $__env->make('user-front.common.partials.theme_4_5_6_header_footer_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('user-front.common.partials.multipurpose_style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>
<?php if($websiteInfo->whatsapp_status == 1): ?>
    <style>
        .back-to-top {
            left: 30px;
            right: auto;
        }
    </style>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/styles.blade.php ENDPATH**/ ?>