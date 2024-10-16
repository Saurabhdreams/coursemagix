<?php if ($__env->exists('user.partials.rtl-style')) echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
    $lang = \App\Models\User\Language::query()
        ->where('user_id', \Illuminate\Support\Facades\Auth::guard('web')->user()->id)
        ->where('code', request()->language)
        ->first();
    $count = \App\Http\Helpers\LimitCheckerHelper::currentCourseCategoryCount(Auth::guard('web')->user()->id, $lang->id); //category added count of selected language
    $category_limit = \App\Http\Helpers\LimitCheckerHelper::courseCategoriesLimit(Auth::guard('web')->user()->id); //category limit count of current package
?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Categories')); ?></h4>
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
                <a href="#"><?php echo e(__('Course Management')); ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?php echo e(__('Categories')); ?></a>
            </li>
        </ul>
    </div>
    <?php if($count > $category_limit): ?>
        <div class="row justify-content-center align-items-center mb-1">
            <div class="col-12">
                <div class="alert border-left border-primary text-dark">
                    <strong
                        class="text-danger"><?php echo e(__("Edit Buttons are disabled, because you have more category ($count) than your current package limit ($category_limit).")); ?></strong><br>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block"><?php echo e(__('Course Categories')); ?></div>
                        </div>

                        <div class="col-lg-3">
                            <?php if ($__env->exists('user.partials.languages')) echo $__env->make('user.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <?php if($count > $category_limit): ?>
                                <a type="button" class="btn btn-primary btn-sm float-lg-right float-left disabled-btn"
                                    disabled><i class="fas fa-plus"></i> <?php echo e(__('Add Category')); ?>

                                </a>
                            <?php else: ?>
                                <a href="#" data-toggle="modal" data-target="#createModal"
                                    class="btn btn-primary btn-sm float-lg-right float-left"><i class="fas fa-plus"></i>
                                    <?php echo e(__('Add Category')); ?>

                                </a>
                            <?php endif; ?>
                            <button class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete"
                                data-href="<?php echo e(route('user.course_management.bulk_delete_category')); ?>">
                                <i class="flaticon-interface-5"></i> <?php echo e(__('Delete')); ?>

                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(count($categories) == 0): ?>
                                <h3 class="text-center mt-2"><?php echo e(__('NO COURSE CATEGORY FOUND') . '!'); ?></h3>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <input type="checkbox" class="bulk-check" data-val="all">
                                                </th>
                                                <?php if($themeInfo->theme_version == 1 || $themeInfo->theme_version == 2 || $themeInfo->theme_version == 3 ||$themeInfo->theme_version == 4 ): ?>
                                                    <th scope="col"><?php echo e(__('Icon')); ?></th>
                                                <?php endif; ?>
                                                <?php if($themeInfo->theme_version == 5 || $themeInfo->theme_version == 6): ?>
                                                    <th scope="col"><?php echo e(__('Image')); ?></th>
                                                <?php endif; ?>
                                                <th scope="col"><?php echo e(__('Name')); ?></th>
                                                <th scope="col"><?php echo e(__('Status')); ?></th>
                                                <th scope="col"><?php echo e(__('Serial Number')); ?></th>
                                                <?php if($themeInfo->theme_version == 3): ?>
                                                    <th scope="col"><?php echo e(__('Featured')); ?></th>
                                                <?php endif; ?>
                                                <th scope="col"><?php echo e(__('Actions')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="bulk-check"
                                                            data-val="<?php echo e($category->id); ?>">
                                                    </td>

                                                    <?php if($themeInfo->theme_version == 1 || $themeInfo->theme_version == 2 || $themeInfo->theme_version == 3 ||$themeInfo->theme_version == 4 ): ?>
                                                        <td><i class="<?php echo e($category->icon); ?>"></i></td>
                                                    <?php endif; ?>

                                                    <?php if($themeInfo->theme_version == 5 || $themeInfo->theme_version == 6): ?>
                                                        <td>

                                                            <img src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_CATEGORY_SECTION_IMAGE, $category->image, $userBs)); ?>"
                                                                alt="client" width="50">
                                                        </td>
                                                    <?php endif; ?>


                                                    <td>
                                                        <?php echo e(strlen($category->name) > 50 ? mb_substr($category->name, 0, 50, 'UTF-8') . '...' : $category->name); ?>

                                                    </td>
                                                    <td>
                                                        <?php if($category->status == 1): ?>
                                                            <h2 class="d-inline-block"><span
                                                                    class="badge badge-success"><?php echo e(__('Active')); ?></span>
                                                            </h2>
                                                        <?php else: ?>
                                                            <h2 class="d-inline-block"><span
                                                                    class="badge badge-danger"><?php echo e(__('Deactive')); ?></span>
                                                            </h2>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($category->serial_number); ?></td>

                                                    <?php if($themeInfo->theme_version == 3): ?>
                                                        <td>
                                                            <form id="featuredForm-<?php echo e($category->id); ?>"
                                                                class="d-inline-block"
                                                                action="<?php echo e(route('user.course_management.category.update_featured', ['id' => $category->id])); ?>"
                                                                method="post">

                                                                <?php echo csrf_field(); ?>
                                                                <select
                                                                    class="form-control form-control-sm <?php echo e($category->is_featured == 1 ? 'bg-success' : 'bg-danger'); ?>"
                                                                    name="is_featured"
                                                                    onchange="document.getElementById('featuredForm-<?php echo e($category->id); ?>').submit()">
                                                                    <option value="1"
                                                                        <?php echo e($category->is_featured == 1 ? 'selected' : ''); ?>>
                                                                        <?php echo e(__('Yes')); ?>

                                                                    </option>
                                                                    <option value="0"
                                                                        <?php echo e($category->is_featured != 1 ? 'selected' : ''); ?>>
                                                                        <?php echo e(__('No')); ?>

                                                                    </option>
                                                                </select>
                                                            </form>
                                                        </td>
                                                    <?php endif; ?>

                                                    <td>
                                                        <?php if($count > $category_limit): ?>
                                                            <a type="button"
                                                                class="btn btn-secondary btn-sm mr-1 disabled-btn" disabled>
                                                                <span class="btn-label">
                                                                    <i class="fas fa-edit"></i>
                                                                </span>
                                                                <?php echo e(__('Edit')); ?>

                                                            </a>
                                                        <?php else: ?>
                                                            <a class="btn btn-secondary btn-sm mr-1 editbtn" href="#"
                                                                data-toggle="modal" data-target="#editModal"
                                                                data-id="<?php echo e($category->id); ?>"
                                                                data-icon="<?php echo e($category->icon); ?>"
                                                                data-color="<?php echo e($category->color); ?>"
                                                                data-name="<?php echo e($category->name); ?>"
                                                                data-status="<?php echo e($category->status); ?>"
                                                                data-serial_number="<?php echo e($category->serial_number); ?>"
                                                                data-image="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_CATEGORY_SECTION_IMAGE, $category->image, $userBs)); ?>">
                                                                <span class="btn-label">
                                                                    <i class="fas fa-edit"></i>
                                                                </span>
                                                                <?php echo e(__('Edit')); ?>

                                                            </a>
                                                        <?php endif; ?>

                                                        <form class="deleteform d-inline-block"
                                                            action="<?php echo e(route('user.course_management.delete_category', ['id' => $category->id])); ?>"
                                                            method="post">

                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                                                <span class="btn-label">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                                <?php echo e(__('Delete')); ?>

                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card-footer"></div>
            </div>
        </div>
    </div>

    
    <?php echo $__env->make('user.curriculum.category.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('user.curriculum.category.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/curriculum/category/index.blade.php ENDPATH**/ ?>