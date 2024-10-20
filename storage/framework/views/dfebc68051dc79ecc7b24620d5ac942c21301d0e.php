<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Edit FAQ')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxEditForm" class="modal-form" action="<?php echo e(route('user.faq_management.update_faq')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" id="inid" name="id">

          <div class="form-group">
            <label for=""><?php echo e(__('Question')); ?><span class="text-danger">*</span></label>
            <input type="text" id="inquestion" class="form-control" name="question" placeholder="Enter Question">
            <p id="editErr_question" class="mt-1 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Answer')); ?><span class="text-danger">*</span></label>
            <textarea class="form-control" id="inanswer" name="answer" rows="5" cols="80" placeholder="Enter Answer"></textarea>
            <p id="editErr_answer" class="mt-1 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Serial Number')); ?><span class="text-danger">*</span></label>
            <input type="number" id="inserial_number" class="form-control ltr" name="serial_number" placeholder="Enter FAQ Serial Number">
            <p id="editErr_serial_number" class="mt-1 mb-0 text-danger em"></p>
            <p class="text-warning mt-2 mb-0">
              <small><?php echo e(__('The higher the serial number is, the later the FAQ will be shown.')); ?></small>
            </p>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <?php echo e(__('Close')); ?>

        </button>
        <button id="updateBtn" type="button" class="btn btn-primary btn-sm">
          <?php echo e(__('Update')); ?>

        </button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/faq/edit.blade.php ENDPATH**/ ?>