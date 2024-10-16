<?php if ($__env->exists('user.partials.rtl-style')) echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Edit Profile')); ?></h4>
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
                <a href="#"><?php echo e(__('Edit Profile')); ?></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block"><?php echo e(__('Update Profile')); ?></div>
                </div>
                <div class="card-body pt-5 pb-5">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <form id="ajaxForm" class="" action="<?php echo e(route('user-profile-update')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label for="image"><strong><?php echo e(__('Image') . '*'); ?></strong></label>
                                            </div>
                                            <div class="col-md-12 showImage mb-3">
                                                <img
                                                    src="<?php echo e(isset($user->photo) ? asset('assets/front/img/user/' . $user->photo) : asset('assets/admin/img/noimage.jpg')); ?>"
                                                    alt="..."
                                                    class="img-thumbnail">
                                            </div>
                                            <input type="file" name="photo" id="image" class="form-control">
                                            <p id="errphoto" class="mt-2 mb-0 text-danger em"></p>
                                            <p class="text-warning mb-0"><?php echo e(__('Upload 100 X 100 image for best quality')); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('First Name')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="first_name" value="<?php echo e($user->first_name); ?>">
                                    <p id="errfirst_name" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Last Name')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="last_name" value="<?php echo e($user->last_name); ?>">
                                    <p id="errlast_name" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Company Name')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="company_name" value="<?php echo e($user->company_name); ?>">
                                    <p id="errcompany_name" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Username')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="username" value="<?php echo e($user->username); ?>">
                                    <p id="errusername" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Phone')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo e($user->phone); ?>">
                                    <p id="errphone" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Address')); ?></label>
                                    <textarea type="text" class="form-control" name="address" rows="5"><?php echo e($user->address); ?></textarea>
                                    <p id="erraddress" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('City')); ?></label>
                                    <input type="text" class="form-control" name="city" rows="5" value="<?php echo e($user->city); ?>">
                                    <p id="errcity" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('State')); ?></label>
                                    <input type="text" class="form-control" name="state" rows="5" value="<?php echo e($user->state); ?>">
                                    <p id="errstate" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Country')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="country" rows="5" value="<?php echo e($user->country); ?>">
                                    <p id="errcountry" class="mb-0 text-danger em"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form">
                        <div class="form-group from-show-notify row">
                            <div class="col-12 text-center">
                                <button type="submit" id="submitBtn" class="btn btn-success"><?php echo e(__('Update')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/edit-profile.blade.php ENDPATH**/ ?>