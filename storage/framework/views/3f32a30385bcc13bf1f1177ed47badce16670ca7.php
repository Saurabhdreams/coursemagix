<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Edit Feature')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxEditForm" class="modal-form" action="<?php echo e(route('user.home_page.update_feature')); ?>" method="post">
          
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <input type="hidden" name="id" id="inid">
          <input type="hidden" name="theme_version" value="<?php echo e($themeInfo->theme_version); ?>">

          <?php if($themeInfo->theme_version == 1 || $themeInfo->theme_version == 2 || $themeInfo->theme_version == 3): ?>
          <div class="form-group">
            <label><?php echo e(__('Background Color') . '*'); ?></label>
            <input class="jscolor form-control ltr" name="background_color" id="inbackground_color">
            <p id="editErr_background_color" class="mt-1 mb-0 text-danger em"></p>
          </div>
          <?php endif; ?>

          <?php if($themeInfo->theme_version == 3 ): ?>
            <div class="form-group">
              <label for=""><?php echo e(__('Icon') . '*'); ?></label>
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
                <small><?php echo e(__('Click on the dropdown icon to select an icon.')); ?></small>
              </div>
            </div>
          <?php endif; ?>
          <?php if($themeInfo->theme_version == 4 || $themeInfo->theme_version == 5 || $themeInfo->theme_version == 6): ?>
          <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="col-12 mb-2">
                        <label for="image"><strong><?php echo e(__('Image') . '*'); ?></strong></label>
                    </div>
                    <div class="col-md-12 showImage mb-3">
                        <img
                            src=""
                            alt="..."
                            class="img-thumbnail" id="in_image">
                    </div>
                    <input type="file" name="image" id="image"
                           class="form-control">
                    <p id="editErr_image" class="mt-1 mb-0 text-danger em"></p>
                </div>
            </div>
           </div>
          <?php endif; ?>
          <?php if($themeInfo->theme_version != 5): ?>
          <div class="form-group">
            <label for=""><?php echo e(__('Title') . '*'); ?></label>
            <input type="text" class="form-control" name="feature_title" placeholder="Enter Feature Title" id="infeature_title">
            <p id="editErr_feature_title" class="mt-1 mb-0 text-danger em"></p>
          </div>
          <?php endif; ?>

          <?php if($themeInfo->theme_version == 1 || $themeInfo->theme_version == 2 || $themeInfo->theme_version == 3): ?>

          <div class="form-group">
            <label for=""><?php echo e(__('Text') . '*'); ?></label>
            <textarea class="form-control" name="text" placeholder="Enter Feature Text" id="intext" rows="5"></textarea>
            <p id="editErr_text" class="mt-1 mb-0 text-danger em"></p>
          </div>
          <?php endif; ?>

          <div class="form-group">
            <label for=""><?php echo e(__('Serial Number') . '*'); ?></label>
            <input type="number" class="form-control ltr" name="serial_number" placeholder="Enter Feature Serial Number" id="inserial_number">
            <p id="editErr_serial_number" class="mt-1 mb-0 text-danger em"></p>
            <p class="text-warning mt-2 mb-0">
              <small><?php echo e(__('The higher the serial number is, the later the feature will be shown.')); ?></small>
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
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/home-page/feature-section/edit.blade.php ENDPATH**/ ?>