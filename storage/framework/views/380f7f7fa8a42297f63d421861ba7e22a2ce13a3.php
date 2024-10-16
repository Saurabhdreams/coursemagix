<div class="footer-item mt-30">
  <div class="footer-title item-3">
    <i class="fal fa-paper-plane"></i>
    <h4 class="title"><?php echo e($keywords['Contact_Us'] ?? __('Contact Us')); ?></h4>
  </div>

  <div class="footer-list-area">
    <div class="footer-list d-block d-sm-flex">
      <ul>
        <li><a href="<?php echo e('mailto:' . $userBs->email_address); ?>"><i class="fal fa-envelope"></i> <?php echo e($userBs->email_address); ?></a></li>
        <li><a href="<?php echo e('tel:' . $userBs->contact_number); ?>"><i class="fal fa-phone-office"></i> <?php echo e($userBs->contact_number); ?></a></li>
        <li><a href="<?php echo e("//maps.google.com/?ll=$userBs->latitude,$userBs->longitude"); ?>"><i class="fal fa-map-marker-alt"></i> <?php echo e($userBs->address); ?></a></li>
      </ul>
    </div>
  </div>
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/partials/footer/contact-info.blade.php ENDPATH**/ ?>