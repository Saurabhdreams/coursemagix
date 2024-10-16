<?php if ($__env->exists('user.partials.rtl-style')) echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Edit Instructor')); ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?php echo e(route('user-dashboard')); ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?php echo e(__('Instructors')); ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?php echo e(__('Edit Instructor')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">
                        <?php echo e(__('Edit Instructor')); ?>

                    </div>
                    <a class="btn btn-info btn-sm float-right d-inline-block"
                       href="<?php echo e(route('user.instructors', ['language' => request()->input('language')])); ?>">
            <span class="btn-label">
              <i class="fas fa-backward" ></i>
            </span>
                        <?php echo e(__('Back')); ?>

                    </a>
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <form id="ajaxEditForm"
                                  action="<?php echo e(route('user.update_instructor', ['id' => $instructor->id])); ?>"
                                  method="POST" enctype="multipart/form-data">
                                
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label for="image"><strong><?php echo e(__('Image')); ?><span class="text-danger">*</span></strong></label>
                                            </div>
                                            <div class="col-md-12 showImage mb-3">
                                                <img
                                                    src="<?php echo e(isset($instructor->image) ? \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE,$instructor->image,$userBs) : asset('assets/tenant/image/default.jpg')); ?>"
                                                    alt="..."
                                                    class="img-thumbnail">
                                            </div>
                                            <input type="file" name="image" id="image" class="form-control">
                                            <p id="editErr_image" class="mt-2 mb-0 text-danger em"></p>
                                            <p class="text-warning mb-0"><?php echo e(__('Upload 370 X 370 image for best quality')); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label><?php echo e(__('Name')); ?><span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                  maxlength="35" placeholder="Enter Instructor Name" value="<?php echo e($instructor->name); ?>">
                                            <p id="editErr_name" class="mt-2 mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label><?php echo e(__('Occupation')); ?><span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="occupation"
                                                   placeholder="Enter Instructor Occupation"
                                                   value="<?php echo e($instructor->occupation); ?>">
                                            <p id="editErr_occupation" class="mt-2 mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group pb-0">
                                            <label><?php echo e(__('Description')); ?><span class="text-danger">*</span></label>
                                            <textarea class="form-control summernote" name="description"
                                                      placeholder="Enter Instructor Description"
                                                      data-height="300"><?php echo e($instructor->description); ?></textarea>
                                            <p id="editErr_description" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success" id="updateBtn">
                                <?php echo e(__('Update')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/instructor/edit.blade.php ENDPATH**/ ?>