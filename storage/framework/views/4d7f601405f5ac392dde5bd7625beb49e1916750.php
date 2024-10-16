<?php $__env->startSection('pageHeading'); ?>
    <?php echo e($keywords['edit_profile'] ?? __('Edit Profile')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if ($__env->exists('user-front.common.partials.breadcrumb', [
        'breadcrumb' => $bgImg->breadcrumb,
        'title' => $keywords['edit_profile'] ?? __('Edit Profile'),
    ])) echo $__env->make('user-front.common.partials.breadcrumb', [
        'breadcrumb' => $bgImg->breadcrumb,
        'title' => $keywords['edit_profile'] ?? __('Edit Profile'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Start User Edit-Profile Section -->
    <section class="user-dashboard">
        <div class="container">
            <div class="row">
                <?php if ($__env->exists('user-front.common.customer.common.side-navbar')) echo $__env->make('user-front.common.customer.common.side-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="user-profile-details">
                                <div class="account-info">
                                    <div class="title">
                                        <h4><?php echo e($keywords['edit_your_profile'] ?? __('Edit Your Profile')); ?></h4>
                                    </div>

                                    <div class="edit-info-area">
                                        <form action="<?php echo e(route('customer.update_profile', getParam())); ?>" method="POST"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="upload-img">
                                                <div class="img-box">
                                                    <img data-src="<?php echo e(is_null($authUser->image) ? asset('assets/tenant/image/customers/profile.jpg') : \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_TENANT_CUSTOMER_IMAGE . '/' . $user->id, $authUser->image, $userBs)); ?>"
                                                        alt="user image" class="user-photo lazy">
                                                </div>

                                                <div class="file-upload-area">
                                                    <div class="upload-file">
                                                        <input type="file" accept=".jpg, .jpeg, .png" name="image"
                                                            class="upload">
                                                        <span><?php echo e($keywords['upload'] ?? __('Upload')); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="mb-3 text-danger"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control"
                                                        placeholder="<?php echo e($keywords['first_name'] ?? __('First Name')); ?>"
                                                        name="first_name" value="<?php echo e($authUser->first_name); ?>">
                                                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <p class="mb-3 text-danger"><?php echo e($message); ?></p>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>

                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control"
                                                        placeholder="<?php echo e($keywords['last_name'] ?? __('Last Name')); ?>"
                                                        name="last_name" value="<?php echo e($authUser->last_name); ?>">
                                                    <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <p class="mb-3 text-danger"><?php echo e($message); ?></p>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>

                                                <div class="col-lg-6">
                                                    <input type="email" class="form_control"
                                                        placeholder="<?php echo e($keywords['email'] ?? __('Email')); ?>"
                                                        value="<?php echo e($authUser->email); ?>" readonly>
                                                </div>

                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control"
                                                        placeholder="<?php echo e($keywords['contact_number'] ?? __('Contact Number')); ?>"
                                                        name="contact_number" value="<?php echo e($authUser->contact_number); ?>">
                                                    <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <p class="mb-3 text-danger"><?php echo e($message); ?></p>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>

                                                <div class="col-lg-6">
                                                    <textarea class="form_control" placeholder="<?php echo e($keywords['address'] ?? __('Address')); ?>" name="address"><?php echo e($authUser->address); ?></textarea>
                                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <p class="mb-3 text-danger"><?php echo e($message); ?></p>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>

                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control"
                                                        placeholder="<?php echo e($keywords['city'] ?? __('City')); ?>" name="city"
                                                        value="<?php echo e($authUser->city); ?>">
                                                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <p class="mb-3 text-danger"><?php echo e($message); ?></p>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>

                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control"
                                                        placeholder="<?php echo e($keywords['state'] ?? __('State')); ?>"
                                                        name="state" value="<?php echo e($authUser->state); ?>">
                                                </div>

                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control"
                                                        placeholder="<?php echo e($keywords['country'] ?? __('Country')); ?>"
                                                        name="country" value="<?php echo e($authUser->country); ?>">
                                                    <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <p class="mb-3 text-danger"><?php echo e($message); ?></p>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-button">
                                                        <button
                                                            class="btn form-btn"><?php echo e($keywords['submit'] ?? __('Submit')); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User Edit-Profile Section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-front.common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/customer/edit-profile.blade.php ENDPATH**/ ?>