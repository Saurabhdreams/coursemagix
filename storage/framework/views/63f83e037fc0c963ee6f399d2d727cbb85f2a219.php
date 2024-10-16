
<div class="modal fade" id="attachmentModal-<?php echo e($enrolment->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <?php echo e(__('Attachment')); ?>

        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <img src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ENROLLMENT_ATTACHMENT,$enrolment->attachment,$userBs)); ?>" alt="attachment" width="100%">
      </div>

      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/curriculum/enrolment/show-attachment.blade.php ENDPATH**/ ?>