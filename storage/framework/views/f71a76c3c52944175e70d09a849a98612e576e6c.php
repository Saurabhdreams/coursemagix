<?php if ($__env->exists('user.partials.rtl-style')) echo $__env->make('user.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Instructors')); ?></h4>
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
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <div class="card-title d-inline-block"><?php echo e(__('Instructors')); ?></div>
            </div>

            <div class="col-lg-3">
              <?php if ($__env->exists('user.partials.languages')) echo $__env->make('user.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
              <a href="<?php echo e(route('user.create_instructor')); ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> <?php echo e(__('Add Instructor')); ?></a>

              <button class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete" data-href="<?php echo e(route('user.bulk_delete_instructor')); ?>">
                <i class="flaticon-interface-5"></i> <?php echo e(__('Delete')); ?>

              </button>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($instructors) == 0): ?>
                <h3 class="text-center mt-3"><?php echo e(__('NO INSTRUCTOR FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Image')); ?></th>
                        <th scope="col"><?php echo e(__('Name')); ?></th>
                        <th scope="col"><?php echo e(__('Occupation')); ?></th>

                        <?php if($themeInfo->theme_version == 2 ||  $themeInfo->theme_version == 4 || $themeInfo->theme_version == 6): ?>
                          <th scope="col"><?php echo e(__('Featured')); ?></th>
                        <?php endif; ?>

                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($instructor->id); ?>">
                          </td>
                          <td>
                            <img src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE,$instructor->image,$userBs)); ?>" alt="instructor image" width="45">
                          </td>
                          <td><?php echo e($instructor->name); ?></td>
                          <td><?php echo e($instructor->occupation); ?></td>

                          <?php if($themeInfo->theme_version == 2 ||  $themeInfo->theme_version == 4 || $themeInfo->theme_version == 6): ?>
                            <td>
                              <form id="featuredForm-<?php echo e($instructor->id); ?>" class="d-inline-block" action="<?php echo e(route('user.instructor.update_featured', ['id' => $instructor->id])); ?>" method="post">
                                
                                <?php echo csrf_field(); ?>
                                <select class="form-control form-control-sm <?php echo e($instructor->is_featured == 1 ? 'bg-success' : 'bg-danger'); ?>" name="is_featured" onchange="document.getElementById('featuredForm-<?php echo e($instructor->id); ?>').submit()">
                                  <option value="1" <?php echo e($instructor->is_featured == 1 ? 'selected' : ''); ?>>
                                    <?php echo e(__('Yes')); ?>

                                  </option>
                                  <option value="0" <?php echo e($instructor->is_featured == 0 ? 'selected' : ''); ?>>
                                    <?php echo e(__('No')); ?>

                                  </option>
                                </select>
                              </form>
                            </td>
                          <?php endif; ?>

                          <td>
                            <a class="btn btn-secondary btn-sm mr-1" href="<?php echo e(route('user.edit_instructor', ['id' => $instructor->id, 'language' => request()->input('language')])); ?>">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                            </a>

                            <a class="btn btn-success btn-sm mr-1" href="<?php echo e(route('user.instructor.social_links', ['id' => $instructor->id])); ?>">
                              <span class="btn-label">
                                <i class="fas fa-share-alt"></i>
                              </span>
                            </a>

                            <form class="deleteform d-inline-block" action="<?php echo e(route('user.delete_instructor', ['id' => $instructor->id])); ?>" method="post">
                              
                              <?php echo csrf_field(); ?>
                              <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/instructor/index.blade.php ENDPATH**/ ?>