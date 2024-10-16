<?php
    use App\Http\Helpers\UserPermissionHelper;
    use Illuminate\Support\Facades\Auth;
    $user = Auth::guard('web')->user();
    $package = UserPermissionHelper::currentPackage($user->id);
    if (!empty($user)) {
      $permissions = UserPermissionHelper::packagePermission($user->id);
      $permissions = json_decode($permissions, true);
      $featured_course_count = \App\Http\Helpers\LimitCheckerHelper::currentFeaturedCourseCount(Auth::guard('web')->user()->id);//getting currently added featured course by user
      $featured_course_limit = \App\Http\Helpers\LimitCheckerHelper::featuredCourseLimit(Auth::guard('web')->user()->id);//featured course limit count of current package
      $course_count = \App\Http\Helpers\LimitCheckerHelper::currentCourseCount(Auth::guard('web')->user()->id);//getting currently added course by user
      $course_limit = \App\Http\Helpers\LimitCheckerHelper::courseLimit(Auth::guard('web')->user()->id);//course limit count of current package
    }
?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Courses')); ?></h4>
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
        <a href="#"><?php echo e(__('Courses')); ?></a>
      </li>
    </ul>
  </div>
  <?php if($course_count > $course_limit): ?>
      <div class="row justify-content-center align-items-center mb-1">
          <div class="col-12">
              <div class="alert border-left border-primary text-dark">
                  <strong class="text-danger"><?php echo e(__("Buttons are disabled, because you have more course ($course_count) than your current package course limit ($course_limit).")); ?></strong><br>
              </div>
          </div>
      </div>
  <?php endif; ?>
  <?php if($featured_course_count > $featured_course_limit): ?>
      <div class="row justify-content-center align-items-center mb-1">
          <div class="col-12">
              <div class="alert border-left border-primary text-dark">
                  <strong class="text-danger">
                    <?php echo e(__("You cannot make any course feature right now. Your featured courses limit exceeds")); ?> <br>  
                    <?php echo e(__("Number of your current featured courses")); ?>: (<?php echo e($featured_course_count); ?>). <br> 
                    <?php echo e(__("Your current package featured course limit")); ?>: (<?php echo e($featured_course_limit); ?>)<br>
                  </strong>
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
              <div class="card-title d-inline-block">
                <?php echo e(__('Courses') . ' (' . $language->name . ' ' . __('Language') . ')'); ?>

              </div>
            </div>

            <div class="col-lg-3">
              <?php if ($__env->exists('user.partials.languages')) echo $__env->make('user.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
              <?php if($course_count > $course_limit): ?>
                <a class="btn btn-secondary btn-sm mr-1 float-right disabled-btn" disabled
                  href="javascript:void(0)">
                  <span class="btn-label">
                    <i class="fas fa-edit"></i>
                  </span>
                  <?php echo e(__('Add Course')); ?>

                </a>
              <?php else: ?>
                <a href="<?php echo e(route('user.course_management.create_course')); ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> <?php echo e(__('Add Course')); ?></a>
              <?php endif; ?>

              <button class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete" data-href="<?php echo e(route('user.course_management.bulk_delete_course')); ?>">
                <i class="flaticon-interface-5"></i> <?php echo e(__('Delete')); ?>

              </button>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($courses) == 0): ?>
                <h3 class="text-center mt-2"><?php echo e(__('NO COURSE FOUND') . '!'); ?></h3>
              <?php else: ?>
                <?php
                  $position = $currencyInfo->base_currency_symbol_position;
                  $symbol = $currencyInfo->base_currency_symbol;
                ?>

                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Title')); ?></th>
                        <th scope="col"><?php echo e(__('Category')); ?></th>
                        <th scope="col"><?php echo e(__('Instructor')); ?></th>
                        <th scope="col"><?php echo e(__('Price')); ?></th>
                        <th scope="col"><?php echo e(__('Status')); ?></th>
                        <th scope="col"><?php echo e(__('Featured')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($course->id); ?>">
                          </td>
                          <td width="20%">
                            <?php echo e($course->title); ?>

                          </td>
                          <td>
                            <?php echo e($course->category); ?>

                          </td>
                          <td><?php echo e($course->instructorName); ?></td>
                          <td>
                            <?php if($course->pricing_type == 'free'): ?>
                              <?php echo e(__('Free')); ?>

                            <?php else: ?>
                              <?php echo e($position == 'left' ? $symbol : ''); ?><?php echo e($course->current_price); ?><?php echo e($position == 'right' ? $symbol : ''); ?>

                            <?php endif; ?>
                          </td>
                          <td>
                            <form id="statusForm-<?php echo e($course->id); ?>" class="d-inline-block" action="<?php echo e(route('user.course_management.course.update_status', ['id' => $course->id, 'language' => request()->input('language')])); ?>" method="post">
                              
                              <?php echo csrf_field(); ?>
                              <select class="form-control form-control-sm <?php echo e($course->status == 'draft' ? 'bg-warning text-dark' : 'bg-primary'); ?>" name="status" onchange="document.getElementById('statusForm-<?php echo e($course->id); ?>').submit()">
                                <option value="draft" <?php echo e($course->status == 'draft' ? 'selected' : ''); ?>>
                                  <?php echo e(__('Draft')); ?>

                                </option>
                                <option value="published" <?php echo e($course->status == 'published' ? 'selected' : ''); ?>>
                                  <?php echo e(__('Published')); ?>

                                </option>
                              </select>
                            </form>
                          </td>
                          <td>
                              
                            <form id="featuredForm-<?php echo e($course->id); ?>" class="d-inline-block" action="<?php echo e(route('user.course_management.course.update_featured', ['id' => $course->id])); ?>" method="post">
                                
                                <?php echo csrf_field(); ?>
                                <select class="form-control form-control-sm <?php echo e($course->is_featured == 'yes' ? 'bg-success' : 'bg-danger'); ?>" name="is_featured" onchange="document.getElementById('featuredForm-<?php echo e($course->id); ?>').submit()">
                                    <option value="yes" <?php echo e($course->is_featured == 'yes' ? 'selected' : ''); ?>>
                                        <?php echo e(__('Yes')); ?>

                                    </option>
                                    <option value="no" <?php echo e($course->is_featured == 'no' ? 'selected' : ''); ?>>
                                        <?php echo e(__('No')); ?>

                                    </option>
                                </select>
                            </form>
                              
                          </td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e(__('Select')); ?>

                              </button>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <?php if($course_count > $course_limit): ?>
                                    <a type="button" href="javascript:void(0);" class="dropdown-item disabled-btn" disabled>
                                      <?php echo e(__('Information')); ?>

                                    </a>
                                  <?php else: ?>
                                      <a href="<?php echo e(route('user.course_management.edit_course', ['id' => $course->id])); ?>" class="dropdown-item">
                                          <?php echo e(__('Information')); ?>

                                      </a>
                                  <?php endif; ?>

                                <a href="<?php echo e(route('user.course_management.course.modules', ['id' => $course->id, 'language' => request()->input('language')])); ?>" class="dropdown-item">
                                  <?php echo e(__('Curriculum')); ?>

                                </a>

                                <a href="<?php echo e(route('user.course_management.course.faqs', ['id' => $course->id, 'language' => $defaultLang->code])); ?>" class="dropdown-item">
                                  <?php echo e(__('FAQs')); ?>

                                </a>

                                <a href="<?php echo e(route('user.course_management.course.thanks_page', ['id' => $course->id])); ?>" class="dropdown-item">
                                  <?php echo e(__('Thanks Page')); ?>

                                </a>
                                <?php if(!empty($permissions) && in_array('Course Completion Certificate',$permissions)): ?>
                                <a href="<?php echo e(route('user.course_management.course.certificate_settings', ['id' => $course->id])); ?>" class="dropdown-item">
                                  <?php echo e(__('Certificate Settings')); ?>

                                </a>
                                <?php endif; ?>
                                
                                <a target="_blank" href="<?php echo e(route('customer.my_course.curriculum', [Auth::guard('web')->user()->username, 'id' => $course->id, 'lesson_id' => $course->lesson_id])); ?>" class="dropdown-item">
                                  <?php echo e(__('Preview')); ?>

                                </a>

                                <form class="deleteform d-block" action="<?php echo e(route('user.course_management.delete_course', ['id' => $course->id])); ?>" method="post">
                                  
                                  <?php echo csrf_field(); ?>
                                  <button type="submit" class="btn btn-sm deletebtn">
                                    <?php echo e(__('Delete')); ?>

                                  </button>
                                </form>
                              </div>
                            </div>
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

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/curriculum/course/index.blade.php ENDPATH**/ ?>