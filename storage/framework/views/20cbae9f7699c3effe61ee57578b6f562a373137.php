<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Edit Course Category')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxEditForm" class="modal-form" action="<?php echo e(route('user.course_management.update_category')); ?>" method="post">
          
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <input type="hidden" id="inid" name="id">
          <input type="hidden" name="theme_version" value="<?php echo e($themeInfo->theme_version); ?>">
          <?php if($themeInfo->theme_version == 1 || $themeInfo->theme_version == 2 || $themeInfo->theme_version == 3 ||$themeInfo->theme_version == 4 ): ?>
          <div class="form-group">
            <label for=""><?php echo e(__('Category Icon')); ?><span class="text-danger">*</span></label>
            <div class="btn-group d-block">
              <button type="button" class="btn btn-primary iconpicker-component edit-iconpicker-component">
                <i class="" id="in_icon"></i>
              </button>
              <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle" data-selected="fa-car" data-toggle="dropdown"></button>
              <div class="dropdown-menu"></div>
            </div>

            <input type="hidden" id="editInputIcon" name="icon">
            <p id="editErr_icon" class="mt-1 mb-0 text-danger em"></p>

            <div class="text-warning mt-2">
              <small><?php echo e(__('Click on the dropdown icon to select an icon for category.')); ?></small>
            </div>
          </div>
          <div class="form-group">
            <label><?php echo e(__('Category Icon Color')); ?><span class="text-danger">*</span></label>
            <input class="jscolor form-control ltr" name="color" id="incolor">
            <p id="editErr_color" class="mt-1 mb-0 text-danger em"></p>
          </div>
          <?php endif; ?>

          <?php if($themeInfo->theme_version == 5 || $themeInfo->theme_version == 6): ?>
          <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="col-12 mb-2">
                        <label for="image"><strong><?php echo e(__('Image')); ?><span class="text-danger">*</span></strong></label>
                    </div>
                    <div class="col-md-12 showImage mb-3">
                        <img
                            src=""
                            alt="..."
                            class="img-thumbnail" id="in_image">
                    </div>
                    <input type="file" name="image" id="image"
                           class="form-control">
                    <p id="errimage" class="mt-1 mb-0 text-danger em"></p>
                </div>
            </div>
           </div>

          <?php endif; ?>

          <div class="form-group">
            <label for=""><?php echo e(__('Category Name')); ?><span class="text-danger">*</span></label>
            <input type="text" id="inname" class="form-control" name="name" placeholder="Enter Category Name">
            <p id="editErr_name" class="mt-1 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Category Status')); ?><span class="text-danger">*</span></label>
            <select name="status" id="instatus" class="form-control">
              <option disabled><?php echo e(__('Select a Status')); ?></option>
              <option value="1"><?php echo e(__('Active')); ?></option>
              <option value="0"><?php echo e(__('Deactive')); ?></option>
            </select>
            <p id="editErr_status" class="mt-1 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Category Serial Number')); ?><span class="text-danger">*</span></label>
            <input type="number" id="inserial_number" class="form-control ltr" name="serial_number" placeholder="Enter Category Serial Number">
            <p id="editErr_serial_number" class="mt-1 mb-0 text-danger em"></p>
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
        <button id="updateBtn" type="button" class="btn btn-primary btn-sm">
          <?php echo e(__('Update')); ?>

        </button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH C:\xampp\htdocs\coursemagix\resources\views/user/curriculum/category/edit.blade.php ENDPATH**/ ?>