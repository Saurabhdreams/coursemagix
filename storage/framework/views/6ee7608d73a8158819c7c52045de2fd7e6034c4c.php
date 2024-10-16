<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Add Testimonial')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="ajaxForm" class="modal-form create"
                      action="<?php echo e(route('user.home_page.store_testimonial', ['language' => request()->input('language')])); ?>"
                      method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for=""><?php echo e(__('Language') . '*'); ?></label>
                        <select name="user_language_id" class="form-control">
                            <option selected disabled><?php echo e(__('Select a Language')); ?></option>
                            <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lang->id); ?>"><?php echo e($lang->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <p id="erruser_language_id" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="col-12 mb-2">
                                    <label for="image"><strong><?php echo e(__('Image') . '*'); ?></strong></label>
                                </div>
                                <div class="col-md-12 showImage mb-3">
                                    <img
                                        src="<?php echo e(asset('assets/tenant/image/default.jpg')); ?>"
                                        alt="..."
                                        class="img-thumbnail">
                                </div>
                                <input type="file" name="image" id="image"
                                       class="form-control">
                                <p id="errimage" class="mt-1 mb-0 text-danger em"></p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for=""><?php echo e(__('Name') . '*'); ?></label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Client Name">
                        <p id="errname" class="mt-1 mb-0 text-danger em"></p>
                    </div>

                    <div class="form-group">
                        <label for=""><?php echo e(__('Occupation') . '*'); ?></label>
                        <input type="text" class="form-control" name="occupation" placeholder="Enter Client Occupation">
                        <p id="erroccupation" class="mt-1 mb-0 text-danger em"></p>
                    </div>

                    <div class="form-group">
                        <label for=""><?php echo e(__('Comment') . '*'); ?></label>
                        <textarea class="form-control" name="comment" placeholder="Enter Client Comment"
                                  rows="5"></textarea>
                        <p id="errcomment" class="mt-1 mb-0 text-danger em"></p>
                    </div>

                    <div class="form-group">
                        <label for=""><?php echo e(__('Serial Number') . '*'); ?></label>
                        <input type="number" class="form-control ltr" name="serial_number"
                               placeholder="Enter Serial Number">
                        <p id="errserial_number" class="mt-1 mb-0 text-danger em"></p>
                        <p class="text-warning mt-2 mb-0">
                            <small><?php echo e(__('The higher the serial number is, the later the testimonial will be shown.')); ?></small>
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
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/home-page/testimonial-section/create.blade.php ENDPATH**/ ?>