<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Registered Users')); ?></h4>
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
        <a href="#"><?php echo e(__('Registered Users')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-3">
              <div class="card-title"><?php echo e(__('All Users')); ?></div>
            </div>

            <div class="col-lg-7 offset-lg-2">
              <button class="btn btn-danger btn-sm float-right d-none bulk-delete mr-2 ml-3 mt-1" data-href="<?php echo e(route('user.bulk_delete_user')); ?>">
                <i class="flaticon-interface-5"></i> <?php echo e(__('Delete')); ?>

              </button>

              <form class="float-right" action="<?php echo e(route('user.registered_users')); ?>" method="GET">
                <input name="info" type="text" class="form-control min-w-230" placeholder="Search" value="<?php echo e(!empty(request()->input('info')) ? request()->input('info') : ''); ?>">
              </form>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($users) == 0): ?>
                <h3 class="text-center"><?php echo e(__('NO USER FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Username')); ?></th>
                        <th scope="col"><?php echo e(__('Email ID')); ?></th>
                        <th scope="col"><?php echo e(__('Email Status')); ?></th>
                        <th scope="col"><?php echo e(__('Phone')); ?></th>
                        <th scope="col"><?php echo e(__('Account Status')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($user->id); ?>">
                          </td>
                          <td><?php echo e($user->username); ?></td>
                          <td><?php echo e($user->email); ?></td>
                          <td>
                            <form id="emailForm<?php echo e($user->id); ?>" class="d-inline-block" action="<?php echo e(route('user.email')); ?>" method="post">
                              <?php echo csrf_field(); ?>
                              <select class="form-control form-control-sm <?php echo e(!empty($user->email_verified_at) ? 'bg-success' : 'bg-danger'); ?>" name="email_verified" onchange="document.getElementById('emailForm<?php echo e($user->id); ?>').submit();">
                                  <option value="1" <?php echo e(!empty($user->email_verified_at) ? 'selected' : ''); ?>>Verified</option>
                                  <option value="0" <?php echo e(empty($user->email_verified_at) ? 'selected' : ''); ?>>Unverified</option>
                              </select>
                              <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                              </form>
                          </td>
                          <td><?php echo e(empty($user->contact_number) ? '-' : $user->contact_number); ?></td>
                          <td>
                            <form id="accountStatusForm-<?php echo e($user->id); ?>" class="d-inline-block" action="<?php echo e(route('user.user.update_account_status', ['id' => $user->id])); ?>" method="post">
                              <?php echo csrf_field(); ?>
                              <select class="form-control form-control-sm <?php echo e($user->status == 1 ? 'bg-success' : 'bg-danger'); ?>" name="account_status" onchange="document.getElementById('accountStatusForm-<?php echo e($user->id); ?>').submit()">
                                <option value="1" <?php echo e($user->status == 1 ? 'selected' : ''); ?>>
                                  <?php echo e(__('Active')); ?>

                                </option>
                                <option value="2" <?php echo e($user->status == 0 ? 'selected' : ''); ?>>
                                  <?php echo e(__('Deactive')); ?>

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
                                <a href="<?php echo e(route('user.user_details', ['id' => $user->id])); ?>" class="dropdown-item">
                                  <?php echo e(__('Details')); ?>

                                </a>

                                <a href="<?php echo e(route('user.user.change_password', ['id' => $user->id])); ?>" class="dropdown-item">
                                  <?php echo e(__('Change Password')); ?>

                                </a>
                                <form class="d-block"
                                action="<?php echo e(route('user.secretUserLogin')); ?>"
                                method="post" target="_blank">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="user_id"
                                    value="<?php echo e($user->id); ?>">
                                <button class="dropdown-item" role="button">Secret
                                    Login</button>
                            </form>

                                <form class="deleteform d-block" action="<?php echo e(route('user.user.delete', ['id' => $user->id])); ?>" method="post">
                                  <?php echo csrf_field(); ?>
                                  <button type="submit" class="deletebtn">
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

        <div class="card-footer">
          <div class="row">
            <div class="d-inline-block mx-auto">
              <?php echo e($users->appends(['info' => request()->input('info')])->links()); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/registered-users/index.blade.php ENDPATH**/ ?>