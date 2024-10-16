<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Theme & Home')); ?></h4>
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
                <a href="#"><?php echo e(__('Theme & Home')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="<?php echo e(route('user.theme.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card-title"><?php echo e(__('Update Theme Version') . ' (' . __('Home Page') . ')'); ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="row mt-2 justify-content-center">
                                        <div class="col-md-3">
                                            <label class="imagecheck">
                                                <input name="theme_version" type="radio" value="1" class="imagecheck-input" <?php echo e(isset($data) && $data->theme_version == 1 ? 'checked' : ''); ?>>
                                                <figure class="imagecheck-figure">
                                                    <img src="<?php echo e(asset('assets/tenant/image/themes/1.png')); ?>" alt="theme 1" class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="imagecheck">
                                                <input name="theme_version" type="radio" value="2" class="imagecheck-input" <?php echo e(isset($data) && $data->theme_version == 2 ? 'checked' : ''); ?>>
                                                <figure class="imagecheck-figure">
                                                    <img src="<?php echo e(asset('assets/tenant/image/themes/2.png')); ?>" alt="theme 2" class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="imagecheck">
                                                <input name="theme_version" type="radio" value="3" class="imagecheck-input" <?php echo e(isset($data) && $data->theme_version == 3 ? 'checked' : ''); ?>>
                                                <figure class="imagecheck-figure">
                                                    <img src="<?php echo e(asset('assets/tenant/image/themes/3.png')); ?>" alt="theme 3" class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="imagecheck">
                                                <input name="theme_version" type="radio" value="4" class="imagecheck-input" <?php echo e(isset($data) && $data->theme_version == 4 ? 'checked' : ''); ?>>
                                                <figure class="imagecheck-figure">
                                                    <img src="<?php echo e(asset('assets/tenant/image/themes/4.png')); ?>" alt="theme 3" class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="imagecheck">
                                                <input name="theme_version" type="radio" value="5" class="imagecheck-input" <?php echo e(isset($data) && $data->theme_version == 5 ? 'checked' : ''); ?>>
                                                <figure class="imagecheck-figure">
                                                    <img src="<?php echo e(asset('assets/tenant/image/themes/5.png')); ?>" alt="theme 3" class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label class="imagecheck">
                                                <input name="theme_version" type="radio" value="6" class="imagecheck-input" <?php echo e(isset($data) && $data->theme_version == 6 ? 'checked' : ''); ?>>
                                                <figure class="imagecheck-figure">
                                                    <img src="<?php echo e(asset('assets/tenant/image/themes/6.png')); ?>" alt="theme 3" class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>

                                        <?php if($errors->has('theme_version')): ?>
                                            <p class="mb-0 ml-3 text-danger"><?php echo e($errors->first('theme_version')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
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


<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/settings/themes.blade.php ENDPATH**/ ?>