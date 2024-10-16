<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap-iconpicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php if ($__env->exists('user.partials.rtl-style')) echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
    use App\Http\Helpers\UserPermissionHelper;
    use Illuminate\Support\Facades\Auth;
    $user = Auth::guard('web')->user();
    $package = UserPermissionHelper::currentPackage($user->id);
    if (!empty($user)) {
        $permissions = UserPermissionHelper::packagePermission($user->id);
        $permissions = json_decode($permissions, true);
    }
?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <h4 class="page-title"><?php echo e(__('Drag & Drop Menu Builder')); ?></h4>
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
            <a href="#"><?php echo e(__('Menu Builder')); ?></a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card-title"><?php echo e(__('Menu Builder')); ?></div>
                    </div>
                    <div class="col-lg-2">
                        <?php if ($__env->exists('user.partials.languages')) echo $__env->make('user.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <div class="card-body pt-5 pb-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card border-primary mb-3">
                            <div class="card-header bg-primary text-white"><?php echo e(__('Pre-built Menus')); ?></div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item"><?php echo e($keywords['Home'] ?? __('Home')); ?> <a data-text="<?php echo e($keywords['Home'] ?? __('Home')); ?>" data-type="home" class="addToMenus btn btn-primary btn-sm float-right" href=""><?php echo e(__('Add to Menus')); ?></a></li>
                                    <li class="list-group-item"><?php echo e($keywords['Courses'] ?? __('Courses')); ?> <a data-text="<?php echo e($keywords['Courses'] ?? __('Courses')); ?>" data-type="courses" class="addToMenus btn btn-primary btn-sm float-right" href=""><?php echo e(__('Add to Menus')); ?></a></li>
                                    <li class="list-group-item"><?php echo e($keywords['Instructors'] ?? __('Instructors')); ?> <a data-text="<?php echo e($keywords['Instructors'] ?? __('Instructors')); ?>" data-type="instructors" class="addToMenus btn btn-primary btn-sm float-right" href=""><?php echo e(__('Add to Menus')); ?></a></li>
                                    <?php if(!empty($permissions) && in_array('Blog', $permissions)): ?>
                                        <li class="list-group-item"><?php echo e($keywords['Blog'] ?? 'Blog'); ?> <a data-text="<?php echo e($keywords['Blog'] ?? __('Blog')); ?>" data-type="blog" class="addToMenus btn btn-primary btn-sm float-right" href=""><?php echo e(__('Add to Menus')); ?></a></li>
                                    <?php endif; ?>

                                    <?php if(!empty($permissions) && in_array('Ecommerce', $permissions)): ?>
                                    <li class="list-group-item"><?php echo e($keywords['Shop'] ?? 'Shop'); ?> <a data-text="<?php echo e($keywords['Shop'] ?? __('Shop')); ?>" data-type="Shop" class="addToMenus btn btn-primary btn-sm float-right" href=""><?php echo e(__('Add to Menus')); ?></a></li>
                                    <?php endif; ?>


                                    <li class="list-group-item"><?php echo e($keywords['FAQ'] ?? __('FAQ')); ?> <a data-text="<?php echo e($keywords['FAQ'] ?? __('FAQ')); ?>" data-type="faq" class="addToMenus btn btn-primary btn-sm float-right" href=""><?php echo e(__('Add to Menus')); ?></a></li>
                                    <li class="list-group-item"><?php echo e($keywords['Contact'] ?? __('Contact')); ?> <a data-text="<?php echo e($keywords['Contact'] ?? __('Contact')); ?>" data-type="contact" class="addToMenus btn btn-primary btn-sm float-right" href=""><?php echo e(__('Add to Menus')); ?></a></li>

                                    <?php if(!empty($permissions) && in_array('Custom Page', $permissions)): ?>
                                        <?php $__currentLoopData = $apages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item">
                                            <?php echo e($apage->title); ?> <span class="badge badge-primary"><?php echo e($keywords['custom_page'] ?? __('Custom Page')); ?></span>
                                            <a data-text="<?php echo e($apage->title); ?>" data-type="<?php echo e($apage->page_id); ?>" data-custom="yes" class="addToMenus btn btn-primary btn-sm float-right" href=""><?php echo e(__('Add to Menus')); ?></a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-primary mb-3">
                            <div class="card-header bg-primary text-white"><?php echo e(__('Add / Edit Menu')); ?></div>
                            <div class="card-body">
                                <form id="frmEdit" class="form-horizontal">
                                    <input class="item-menu" type="hidden" name="type" value="">

                                    <div id="withUrl">
                                        <div class="form-group">
                                            <label for="text"><?php echo e(__('Text')); ?></label>
                                            <input type="text" class="form-control item-menu" maxlength="35" name="text" placeholder="<?php echo e(__('Text')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="href"><?php echo e(__('URL')); ?></label>
                                            <input type="text" class="form-control item-menu" name="href" placeholder="<?php echo e(__('URL')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="target"><?php echo e(__('Target')); ?></label>
                                            <select name="target" id="target" class="form-control item-menu">
                                                <option value="_self"><?php echo e(__('Self')); ?></option>
                                                <option value="_blank"><?php echo e(__('Blank')); ?></option>
                                                <option value="_top"><?php echo e(__('Top')); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="withoutUrl" class="dis-none">
                                        <div class="form-group">
                                            <label for="text"><?php echo e(__('Text')); ?></label>
                                            <input type="text" class="form-control item-menu" name="text" placeholder="<?php echo e(__('Text')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="href"><?php echo e(__('URL')); ?></label>
                                            <input type="text" class="form-control item-menu" name="href" placeholder="<?php echo e(__('URL')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="target"><?php echo e(__('Target')); ?></label>
                                            <select name="target" class="form-control item-menu">
                                                <option value="_self"><?php echo e(__('Self')); ?></option>
                                                <option value="_blank"><?php echo e(__('Blank')); ?></option>
                                                <option value="_top"><?php echo e(__('Top')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> <?php echo e(__('Update')); ?></button>
                                <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> <?php echo e(__('Add')); ?></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white"><?php echo e(__('Website Menus')); ?></div>
                            <div class="card-body">
                                <ul id="myEditor" class="sortableLists list-group">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer pt-3">
                <div class="form">
                    <div class="form-group from-show-notify row">
                        <div class="col-12 text-center">
                            <button id="btnOutput" class="btn btn-success"><?php echo e(__('Update Menu')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/admin/js/plugin/jquery-menu-editor/jquery-menu-editor.js')); ?>"></script>
<script>
    "use strict";
    var prevMenus = <?php echo json_encode($prevMenu) ?>;
    var langid = <?php echo e($lang_id); ?>;
    var menuUpdate = "<?php echo e(route('user.menu_builder.update')); ?>";
</script>
<script type="text/javascript" src="<?php echo e(asset('assets/admin/js/menu-builder.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/menu_builder/index.blade.php ENDPATH**/ ?>