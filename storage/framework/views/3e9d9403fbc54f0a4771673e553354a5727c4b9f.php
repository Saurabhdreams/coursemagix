<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Add Blog Category')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxForm" class="modal-form create" action="<?php echo e(route('user.blog_management.store_category')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label for=""><?php echo e(__('Language')); ?><span class="text-danger">*</span></label>
            <select name="user_language_id" class="form-control">
              <option selected disabled><?php echo e(__('Select a Language')); ?></option>
              <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($lang->id); ?>"><?php echo e($lang->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <p id="erruser_language_id" class="mt-1 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Category Name')); ?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" placeholder="Enter Category Name">
            <p id="errname" class="mt-1 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Category Status')); ?><span class="text-danger">*</span></label>
            <select name="status" class="form-control">
              <option selected disabled><?php echo e(__('Select a Status')); ?></option>
              <option value="1"><?php echo e(__('Active')); ?></option>
              <option value="0"><?php echo e(__('Deactive')); ?></option>
            </select>
            <p id="errstatus" class="mt-1 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Category Serial Number')); ?><span class="text-danger">*</span></label>
            <input type="number" class="form-control ltr" name="serial_number" placeholder="Enter Category Serial Number">
            <p id="errserial_number" class="mt-1 mb-0 text-danger em"></p>
            <p class="text-warning mt-2 mb-0">
              <small><?php echo e(__('The higher the serial number is, the later the category will be shown.')); ?></small>
            </p>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <?php echo e(__('Close')); ?>

        </button>
        <button id="submitBtn" type="button" class="btn btn-primary btn-sm">
          <?php echo e(__('Save')); ?>

        </button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/journal/category/create.blade.php ENDPATH**/ ?>