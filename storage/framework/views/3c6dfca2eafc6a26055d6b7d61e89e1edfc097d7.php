<?php if ($__env->exists('user.partials.rtl-style')) echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('SEO Informations')); ?></h4>
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
                <a href="#"><?php echo e(__('SEO Informations')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form
                    action="<?php echo e(route('user.basic_settings.update_seo_informations')); ?>"
                    method="post"
                >
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card-title"><?php echo e(__('Update SEO Informations')); ?></div>
                            </div>

                            <div class="col-lg-3">
                                <?php if ($__env->exists('user.partials.languages')) echo $__env->make('user.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-5 pb-5">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(__('Meta Keywords For Home Page')); ?></label>
                                    <input
                                        class="form-control"
                                        name="home_meta_keywords"
                                        value="<?php echo e($data->home_meta_keywords); ?>"
                                        placeholder="Enter Meta Keywords"
                                        data-role="tagsinput"
                                    >
                                    <?php if($errors->has('home_meta_keywords')): ?>
                                        <div class="help-block with-errors text-danger"><?php echo e($errors->first('home_meta_keywords')); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Meta Description For Home Page')); ?></label>
                                    <textarea
                                        class="form-control"
                                        name="home_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    ><?php echo e($data->home_meta_description); ?></textarea>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(__('Meta Keywords For Courses Page')); ?></label>
                                    <input
                                        class="form-control"
                                        name="courses_meta_keywords"
                                        value="<?php echo e($data->courses_meta_keywords); ?>"
                                        placeholder="Enter Meta Keywords"
                                        data-role="tagsinput"
                                    >
                                    <?php if($errors->has('courses_meta_keywords')): ?>
                                        <div class="help-block with-errors text-danger"><?php echo e($errors->first('courses_meta_keywords')); ?></div>
                                     <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Meta Description For Courses Page')); ?></label>
                                    <textarea
                                        class="form-control"
                                        name="courses_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    ><?php echo e($data->courses_meta_description); ?></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(__('Meta Keywords For Instructors Page')); ?></label>
                                    <input
                                        class="form-control"
                                        name="instructors_meta_keywords"
                                        value="<?php echo e($data->instructors_meta_keywords); ?>"
                                        placeholder="Enter Meta Keywords"
                                        data-role="tagsinput"
                                    >
                                    <?php if($errors->has('instructors_meta_keywords')): ?>
                                        <div class="help-block with-errors text-danger"><?php echo e($errors->first('instructors_meta_keywords')); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Meta Description For Instructors Page')); ?></label>
                                    <textarea
                                        class="form-control"
                                        name="instructors_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    ><?php echo e($data->instructors_meta_description); ?></textarea>
                                </div>
                            </div>
                            <?php
                                $user = Auth::guard('web')->user();
                                if (!empty($user)) {
                                    $permissions = \App\Http\Helpers\UserPermissionHelper::packagePermission($user->id);
                                    $permissions = json_decode($permissions, true);
                                }
                            ?>
                            <?php if(!empty($permissions) && in_array('Blog', $permissions)): ?>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><?php echo e(__('Meta Keywords For Blog Page')); ?></label>
                                        <input
                                            class="form-control"
                                            name="blogs_meta_keywords"
                                            value="<?php echo e($data->blogs_meta_keywords); ?>"
                                            placeholder="Enter Meta Keywords"
                                            data-role="tagsinput"
                                        >
                                        <?php if($errors->has('blogs_meta_keywords')): ?>
                                            <div class="help-block with-errors text-danger"><?php echo e($errors->first('blogs_meta_keywords')); ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo e(__('Meta Description For Blog Page')); ?></label>
                                        <textarea
                                            class="form-control"
                                            name="blogs_meta_description"
                                            rows="5"
                                            placeholder="Enter Meta Description"
                                        ><?php echo e($data->blogs_meta_description); ?></textarea>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(__('Meta Keywords For FAQ Page')); ?></label>
                                    <input
                                        class="form-control"
                                        name="faqs_meta_keywords"
                                        placeholder="Enter Meta Keywords"
                                        value="<?php echo e($data->faqs_meta_keywords); ?>"
                                        data-role="tagsinput"
                                    >
                                    <?php if($errors->has('faqs_meta_keywords')): ?>
                                        <div class="help-block with-errors text-danger"><?php echo e($errors->first('faqs_meta_keywords')); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Meta Description For FAQ Page')); ?></label>
                                    <textarea
                                        class="form-control"
                                        name="faqs_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    ><?php echo e($data->faqs_meta_description); ?></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(__('Meta Keywords For Contact Page')); ?></label>
                                    <input
                                        class="form-control"
                                        name="contact_meta_keywords"
                                        placeholder="Enter Meta Keywords"
                                        value="<?php echo e($data->contact_meta_keywords); ?>"
                                        data-role="tagsinput"
                                    >
                                    <?php if($errors->has('contact_meta_keywords')): ?>
                                        <div class="help-block with-errors text-danger"><?php echo e($errors->first('contact_meta_keywords')); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Meta Description For Contact Page')); ?></label>
                                    <textarea
                                        class="form-control"
                                        name="contact_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    ><?php echo e($data->contact_meta_description); ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(__('Meta Keywords For Login Page')); ?></label>
                                    <input
                                        class="form-control"
                                        name="login_meta_keywords"
                                        placeholder="Enter Meta Keywords"
                                        value="<?php echo e($data->login_meta_keywords); ?>"
                                        data-role="tagsinput"
                                    >
                                    <?php if($errors->has('login_meta_keywords')): ?>
                                        <div class="help-block with-errors text-danger"><?php echo e($errors->first('login_meta_keywords')); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Meta Description For Login Page')); ?></label>
                                    <textarea
                                        class="form-control"
                                        name="login_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    ><?php echo e($data->login_meta_description); ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(__('Meta Keywords For Sign Up Page')); ?></label>
                                    <input
                                        class="form-control"
                                        name="sign_up_meta_keywords"
                                        placeholder="Enter Meta Keywords"
                                        value="<?php echo e($data->sign_up_meta_keywords); ?>"
                                        data-role="tagsinput"
                                    >
                                    <?php if($errors->has('sign_up_meta_keywords')): ?>
                                        <div class="help-block with-errors text-danger"><?php echo e($errors->first('sign_up_meta_keywords')); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Meta Description For Sign Up Page')); ?></label>
                                    <textarea
                                        class="form-control"
                                        name="sign_up_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    ><?php echo e($data->sign_up_meta_description); ?></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><?php echo e(__('Meta Keywords For Forget Password Page')); ?></label>
                                    <input
                                        class="form-control"
                                        name="forget_password_meta_keywords"
                                        placeholder="Enter Meta Keywords"
                                        value="<?php echo e($data->forget_password_meta_keywords); ?>"
                                        data-role="tagsinput"
                                    >
                                    <?php if($errors->has('forget_password_meta_keywords')): ?>
                                        <div class="help-block with-errors text-danger"><?php echo e($errors->first('forget_password_meta_keywords')); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Meta Description For Forget Password Page')); ?></label>
                                    <textarea
                                        class="form-control"
                                        name="forget_password_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    ><?php echo e($data->forget_password_meta_description); ?></textarea>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button
                                        type="submit"
                                        class="btn btn-success <?php echo e($data == null ? 'd-none' : ''); ?>"
                                    ><?php echo e(__('Update')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/settings/seo.blade.php ENDPATH**/ ?>