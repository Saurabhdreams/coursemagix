<script>
    "use strict";
    const baseURL = "<?php echo e(url('/')); ?>";
    const vapid_public_key = "<?php echo env('VAPID_PUBLIC_KEY'); ?>";
    const langDir = <?php echo e($currentLanguageInfo->rtl); ?>;
    const rtl = <?php echo e($currentLanguageInfo->rtl); ?>;

    var mainurl = "<?php echo e(route('front.user.shop', getParam())); ?>";
    var textPosition = "<?php echo e($userBs->base_currency_text_position); ?>";
    var currSymbol = "<?php echo e($userBs->base_currency_symbol); ?>";
    var position = "<?php echo e($userBs->base_currency_symbol_position); ?>";
</script>

    
    <script type="text/javascript" src="<?php echo e(asset('assets/front/js/vendor/jquery.min.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('assets/front/js/vendor/modernizr.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/front/js/popper.min.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('assets/tenant/js/jquery.magnific-popup.min.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('assets/tenant/js/toastr.min.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('assets/front/js/plugin.min.js')); ?>"></script>
 

    
    <?php echo $__env->make('user-front.common.partials.themes_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php if(session()->has('success')): ?>
    <script>
        "use strict";
        toastr['success']("<?php echo e(__(session('success'))); ?>");
    </script>
<?php endif; ?>

<?php if(session()->has('error')): ?>
    <script>
        "use strict";
        toastr['error']("<?php echo e(__(session('error'))); ?>");
    </script>
<?php endif; ?>

<?php if(session()->has('warning')): ?>
    <script>
        "use strict";
        toastr['warning']("<?php echo e(__(session('warning'))); ?>");
    </script>
<?php endif; ?>

<?php if(request()->routeIs('customer.my_course.curriculum')): ?>
    
    <script type="text/javascript" src="<?php echo e(asset('assets/tenant/js/video.min.js')); ?>"></script>
<?php endif; ?>


<?php if($websiteInfo->whatsapp_status == 1): ?>
    <script type="text/javascript">
        var whatsapp_popup = <?php echo e($websiteInfo->whatsapp_popup_status); ?>;
        var whatsappImg = "<?php echo e(asset('assets/front/img/whatsapp.svg')); ?>";
        $(function() {
            $('#WAButton').floatingWhatsApp({
                phone: "<?php echo e($websiteInfo->whatsapp_number); ?>", //WhatsApp Business phone number
                headerTitle: "<?php echo e($websiteInfo->whatsapp_header_title); ?>", //Popup Title
                popupMessage: `<?php echo nl2br($websiteInfo->whatsapp_popup_message); ?>`, //Popup Message
                showPopup: whatsapp_popup == 1 ? true : false, //Enables popup display
                buttonImage: '<img src="' + whatsappImg + '" />', //Button Image
                position: "right"
            });
        });
    </script>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/scripts.blade.php ENDPATH**/ ?>