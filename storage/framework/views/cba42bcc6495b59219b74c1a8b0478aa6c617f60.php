<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Currency')); ?></h4>
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
                <a href="#"><?php echo e(__('Currency')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form id="ajaxForm" action="<?php echo e(route('user.update.currency')); ?>" method="post"
                      enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card-title"><?php echo e(__('Update Currency')); ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo e(__('Base Currency Symbol') . '*'); ?></label>
                                            <input type="text" class="form-control ltr" name="base_currency_symbol"
                                                   value="<?php echo e($data->base_currency_symbol); ?>">
                                            <p id="errbase_currency_symbol" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo e(__('Base Currency Symbol Position') . '*'); ?></label>
                                            <select name="base_currency_symbol_position" class="form-control ltr">
                                                <option selected disabled><?php echo e(__('Select')); ?></option>
                                                <option
                                                    value="left" <?php echo e($data->base_currency_symbol_position == 'left' ? 'selected' : ''); ?>><?php echo e(__('Left')); ?></option>
                                                <option
                                                    value="right" <?php echo e($data->base_currency_symbol_position == 'right' ? 'selected' : ''); ?>><?php echo e(__('Right')); ?></option>
                                            </select>
                                            <p id="errbase_currency_symbol" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo e(__('Base Currency Text') . '*'); ?></label>
                                            <input type="text" class="form-control ltr" name="base_currency_text"
                                                   value="<?php echo e($data->base_currency_text); ?>">
                                            <p id="errbase_currency_text" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo e(__('Base Currency Text Position') . '*'); ?></label>
                                            <select name="base_currency_text_position" class="form-control ltr">
                                                <option selected disabled><?php echo e(__('Select')); ?></option>
                                                <option
                                                    value="left" <?php echo e($data->base_currency_text_position == 'left' ? 'selected' : ''); ?>><?php echo e(__('Left')); ?></option>
                                                <option
                                                    value="right" <?php echo e($data->base_currency_text_position == 'right' ? 'selected' : ''); ?>><?php echo e(__('Right')); ?></option>
                                            </select>
                                            <p id="errbase_currency_text_position" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label><?php echo e(__('Base Currency Rate') . '*'); ?></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><?php echo e(__('1 USD =')); ?></span>
                                                </div>
                                                <input type="text" name="base_currency_rate" class="form-control ltr"
                                                       value="<?php echo e($data->base_currency_rate); ?>">
                                                <div class="input-group-append">
                                                    <span
                                                        class="input-group-text"><?php echo e($data->base_currency_text); ?></span>
                                                </div>
                                            </div>
                                            <p id="errbase_currency_rate" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="button" id="submitBtn" class="btn btn-success">
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

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/settings/currency.blade.php ENDPATH**/ ?>