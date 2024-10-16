<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Add Coupon')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxForm" class="modal-form" action="<?php echo e(route('user.course_management.store_coupon')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="row no-gutters">
            <div class="col-lg-6">
              <div class="form-group">
                <label for=""><?php echo e(__('Name')); ?><span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" placeholder="Enter Coupon Name">
                <p id="errname" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for=""><?php echo e(__('Code')); ?><span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="code" placeholder="Enter Coupon Code">
                <p id="errcode" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>
          </div>

          <div class="row no-gutters">
            <div class="col-lg-6">
              <div class="form-group">
                <label for=""><?php echo e(__('Coupon Type')); ?><span class="text-danger">*</span></label>
                <select name="type" class="form-control">
                  <option selected disabled><?php echo e(__('Select a Type')); ?></option>
                  <option value="fixed"><?php echo e(__('Fixed')); ?></option>
                  <option value="percentage"><?php echo e(__('Percentage')); ?></option>
                </select>
                <p id="errtype" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for=""><?php echo e(__('Value')); ?><span class="text-danger">*</span></label>
                <input type="number" step="0.01" class="form-control" name="value" placeholder="Enter Coupon Value">
                <p id="errvalue" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>
          </div>

          <div class="row no-gutters">
            <div class="col-lg-6">
              <div class="form-group">
                <label for=""><?php echo e(__('Start Date')); ?><span class="text-danger">*</span></label>
                <input type="text" class="form-control datepicker" name="start_date" placeholder="Enter Start Date">
                <p id="errstart_date" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for=""><?php echo e(__('End Date')); ?><span class="text-danger">*</span></label>
                <input type="text" class="form-control datepicker" name="end_date" placeholder="Enter End Date">
                <p id="errend_date" class="mt-1 mb-0 text-danger em"></p>
              </div>
            </div>
          </div>

          <div class="row no-gutters">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for=""><?php echo e(__('Courses')); ?></label>
                      <select class="select2" name="courses[]" multiple="multiple" placeholder="Select Courses">
                          <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                                  $courseInfo = $course->courseInformation()->where('language_id', $deLang->id)->select('title', 'id')->first();
                                  $title = $courseInfo->title;
                                  $id = $course->id;
                              ?>
                              <option value="<?php echo e($id); ?>">
                                <?php echo e($title); ?>

                              </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <p class="mb-0 text-warning">This coupon can be applied to these courses</p>
                      <p class="mb-0 text-warning">Leave this field blank for all courses</p>
                      <p id="errcourses" class="mb-0 text-danger em"></p>
                  </div>
              </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
          <?php echo e(__('Close')); ?>

        </button>
        <button id="submitBtn" type="button" class="btn btn-sm btn-primary">
          <?php echo e(__('Save')); ?>

        </button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/curriculum/coupon/create.blade.php ENDPATH**/ ?>