<?php if ($__env->exists('user.partials.rtl-style')) echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Page Headings')); ?></h4>
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
                <a href="#"><?php echo e(__('Basic Settings')); ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?php echo e(__('Page Headings')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="<?php echo e(route('user.update_page_headings', ['language' => request()->input('language')])); ?>"
                    method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card-title"><?php echo e(__('Update Page Headings')); ?></div>
                            </div>

                            <div class="col-lg-2">
                                <?php if ($__env->exists('user.partials.languages')) echo $__env->make('user.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <?php
                                    $user = Auth::guard('web')->user();
                                    if (!empty($user)) {
                                        $permissions = \App\Http\Helpers\UserPermissionHelper::packagePermission($user->id);
                                        $permissions = json_decode($permissions, true);
                                    }
                                ?>
                                <?php if(!empty($permissions) && in_array('Blog', $permissions)): ?>
                                    <div class="form-group">
                                        <label><?php echo e(__('Blog Page Title')); ?></label>
                                        <input type="text" class="form-control" name="blog_page_title"
                                            value="<?php echo e($data != null ? $data->blog_page_title : ''); ?>">
                                        <?php if($errors->has('blog_page_title')): ?>
                                            <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('blog_page_title')); ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo e(__('Blog Details Page Title')); ?></label>
                                        <input type="text" class="form-control" name="blog_details_page_title"
                                            value="<?php echo e($data != null ? $data->blog_details_page_title : ''); ?>">
                                        <?php if($errors->has('blog_details_page_title')): ?>
                                            <p class="mt-2 mb-0 text-danger">
                                                <?php echo e($errors->first('blog_details_page_title')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label><?php echo e(__('Contact Page Title')); ?></label>
                                    <input type="text" class="form-control" name="contact_page_title"
                                        value="<?php echo e($data != null ? $data->contact_page_title : ''); ?>">
                                    <?php if($errors->has('contact_page_title')): ?>
                                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('contact_page_title')); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Courses Page Title')); ?></label>
                                    <input type="text" class="form-control" name="courses_page_title"
                                        value="<?php echo e($data != null ? $data->courses_page_title : ''); ?>">
                                    <?php if($errors->has('courses_page_title')): ?>
                                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('courses_page_title')); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Course Details Page Title')); ?></label>
                                    <input type="text" class="form-control" name="course_details_page_title"
                                        value="<?php echo e($data != null ? $data->course_details_page_title : ''); ?>">
                                    <?php if($errors->has('course_details_page_title')): ?>
                                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('course_details_page_title')); ?>

                                        </p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('FAQ Page Title')); ?></label>
                                    <input type="text" class="form-control" name="faq_page_title"
                                        value="<?php echo e($data != null ? $data->faq_page_title : ''); ?>">
                                    <?php if($errors->has('faq_page_title')): ?>
                                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('faq_page_title')); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Forget Password Page Title')); ?></label>
                                    <input type="text" class="form-control" name="forget_password_page_title"
                                        value="<?php echo e($data != null ? $data->forget_password_page_title : ''); ?>">
                                    <?php if($errors->has('forget_password_page_title')): ?>
                                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('forget_password_page_title')); ?>

                                        </p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Instructors Page Title')); ?></label>
                                    <input type="text" class="form-control" name="instructors_page_title"
                                        value="<?php echo e($data != null ? $data->instructors_page_title : ''); ?>">
                                    <?php if($errors->has('instructors_page_title')): ?>
                                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('instructors_page_title')); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Login Page Title')); ?></label>
                                    <input type="text" class="form-control" name="login_page_title"
                                        value="<?php echo e($data != null ? $data->login_page_title : ''); ?>">
                                    <?php if($errors->has('login_page_title')): ?>
                                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('login_page_title')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__('Signup Page Title')); ?></label>
                                    <input type="text" class="form-control" name="signup_page_title"
                                        value="<?php echo e($data != null ? $data->signup_page_title : ''); ?>">
                                    <?php if($errors->has('signup_page_title')): ?>
                                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('signup_page_title')); ?></p>
                                    <?php endif; ?>
                                </div>

                                <?php if(!empty($permissions) && in_array('Ecommerce', $permissions)): ?>
                                    <div class="form-group">
                                        <label><?php echo e(__('Shop Page Title')); ?></label>
                                        <input type="text" class="form-control" name="shop_page_title"
                                            value="<?php echo e($data != null ? $data->shop_page_title : ''); ?>">
                                        <?php if($errors->has('shop_page_title')): ?>
                                            <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('shop_page_title')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(__('Shop Deatils Page Title')); ?></label>
                                        <input type="text" class="form-control" name="shop_details_page_title"
                                            value="<?php echo e($data != null ? $data->shop_details_page_title : ''); ?>">
                                        <?php if($errors->has('shop_details_page_title')): ?>
                                            <p class="mt-2 mb-0 text-danger">
                                                <?php echo e($errors->first('shop_details_page_title')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(__('Cart Page Title')); ?></label>
                                        <input type="text" class="form-control" name="cart_page_title"
                                            value="<?php echo e($data != null ? $data->cart_page_title : ''); ?>">
                                        <?php if($errors->has('cart_page_title')): ?>
                                            <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('cart_page_title')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(__('Checkout Page Title')); ?></label>
                                        <input type="text" class="form-control" name="checkout_page_title"
                                            value="<?php echo e($data != null ? $data->checkout_page_title : ''); ?>">
                                        <?php if($errors->has('checkout_page_title')): ?>
                                            <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('checkout_page_title')); ?>

                                            </p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <?php echo e(__('Update')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/settings/page-headings.blade.php ENDPATH**/ ?>