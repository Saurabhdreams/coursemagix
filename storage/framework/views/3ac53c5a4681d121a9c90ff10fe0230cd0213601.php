<?php
    use App\Http\Helpers\UserPermissionHelper;
    use App\Models\User\Language;
    use Illuminate\Support\Facades\Auth;
    $default = Language::where('is_default', 1)->first();
    $user = Auth::guard('web')->user();
    $package = UserPermissionHelper::currentPackage($user->id);
    if (!empty($user)) {
      $permissions = UserPermissionHelper::packagePermission($user->id);
      $permissions = json_decode($permissions, true);
    }
?>

<?php $__env->startSection('content'); ?>
    <div class="mt-2 mb-4">
        <h2 class="pb-2"><?php echo e(__('Welcome back')); ?>, <?php echo e(Auth::guard('web')->user()->first_name); ?> <?php echo e(Auth::guard('web')->user()->last_name); ?>!</h2>
    </div>

    <?php if(is_null($package)): ?>
        <?php
            $pendingMemb = \App\Models\Membership::query()->where([
                ['user_id', '=', Auth::id()],
                ['status',0]
            ])->whereYear('start_date', '<>', '9999')->orderBy('id', 'DESC')->first();
            $pendingPackage = isset($pendingMemb) ? \App\Models\Package::query()->findOrFail($pendingMemb->package_id):null;
        ?>

        <?php if($pendingPackage): ?>
            <div class="alert alert-warning">
                <?php echo e(__('You have requested a package which needs an action (Approval / Rejection) by Admin. You will be notified via mail once an action is taken.')); ?>

            </div>
            <div class="alert alert-warning">
                <strong><?php echo e(__('Pending Package')); ?>: </strong> <?php echo e($pendingPackage->title); ?> 
                <span class="badge badge-secondary"><?php echo e($pendingPackage->term); ?></span>
                <span class="badge badge-warning"><?php echo e(__('Decision Pending')); ?></span>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">
                <?php echo e(__('Your membership is expired. Please purchase a new package / extend the current package.')); ?>

            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="row justify-content-center align-items-center mb-1">
            <div class="col-12">
                <div class="alert border-left border-primary text-dark">
                    <?php if($package_count >= 2): ?>
                        <?php if($next_membership->status == 0): ?>
                            <strong class="text-danger"><?php echo e(__('You have requested a package which needs an action (Approval / Rejection) by Admin. You will be notified via mail once an action is taken.')); ?></strong><br>
                        <?php elseif($next_membership->status == 1): ?>
                            <strong class="text-danger"><?php echo e(__('You have another package to activate after the current package expires. You cannot purchase / extend any package, until the next package is activated')); ?></strong><br>
                        <?php endif; ?>
                    <?php endif; ?>

                    <strong><?php echo e(__('Current Package')); ?>: </strong> <?php echo e($current_package->title); ?> 
                    <span class="badge badge-secondary"><?php echo e($current_package->term); ?></span>
                    <?php if($current_membership->is_trial == 1): ?>
                        (<?php echo e(__('Expire Date')); ?>: <?php echo e(Carbon\Carbon::parse($current_membership->expire_date)->format('M-d-Y')); ?>)
                        <span class="badge badge-primary"><?php echo e(__('Trial')); ?></span>
                    <?php else: ?>
                        (<?php echo e(__('Expire Date')); ?>: <?php echo e($current_package->term === 'lifetime' ? "Lifetime" : Carbon\Carbon::parse($current_membership->expire_date)->format('M-d-Y')); ?>)
                    <?php endif; ?>

                    <?php if($package_count >= 2): ?>
                        <div>
                            <strong><?php echo e(__('Next Package To Activate')); ?>: </strong> <?php echo e($next_package->title); ?> <span class="badge badge-secondary"><?php echo e($next_package->term); ?></span>
                            <?php if($current_package->term != 'lifetime' && $current_membership->is_trial != 1): ?> 
                                (
                                <?php echo e(__('Activation Date')); ?>: 
                                <?php echo e(Carbon\Carbon::parse($next_membership->start_date)->format('M-d-Y')); ?>, 
                                <?php echo e(__('Expire Date')); ?>: <?php echo e($next_package->term === 'lifetime' ?  "Lifetime" : Carbon\Carbon::parse($next_membership->expire_date)->format('M-d-Y')); ?>)
                            <?php endif; ?>   
                            <?php if($next_membership->status == 0): ?>
                                <span class="badge badge-warning"><?php echo e(__('Decision Pending')); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <a class="card card-stats card-round" href="<?php echo e(route('user.home_page.testimonials_section',['language' => $default->code])); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-file-certificate"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category"><?php echo e(__('Testimonials')); ?></p>
                                <h4 class="card-title"><?php echo e($testimonials); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a class="card card-stats card-warning card-round" href="<?php echo e(route('user.course_management.courses', ['language' => $default->code])); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-book-alt"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category"><?php echo e(__('Courses')); ?></p>
                                <h4 class="card-title"><?php echo e($courses); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a class="card card-stats card-info card-round" href="<?php echo e(route('user.instructors', ['language' => $default->code])); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category"><?php echo e(__('Instructors')); ?></p>
                                <h4 class="card-title"><?php echo e($instructors); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php if(!empty($permissions) && in_array('Blog', $permissions)): ?>
        <div class="col-sm-6 col-md-4">
            <a class="card card-stats card-primary card-round" href="<?php echo e(route('user.blog_management.categories', ['language' => $default->code])); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-list-alt"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category"><?php echo e(__('Blog Categories')); ?></p>
                                <h4 class="card-title"><?php echo e($blog_categories); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a class="card card-stats card-success card-round" href="<?php echo e(route('user.blog_management.blogs', ['language' => $default->code])); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-blog"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category"><?php echo e(__('Blogs')); ?></p>
                                <h4 class="card-title"><?php echo e($blogs); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>

        <?php if(!empty($permissions) && in_array('Advertisement', $permissions)): ?>
        <div class="col-sm-6 col-md-4">
            <a class="card card-stats card-secondary card-round" href="<?php echo e(route('user.advertisements')); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-file-medical-alt"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category"><?php echo e(__('Advertisement')); ?></p>
                                <h4 class="card-title"><?php echo e($advertisements); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>
        <?php if(!empty($permissions) && in_array('Coupon', $permissions)): ?>
            <div class="col-sm-6 col-md-4">
                <a class="card card-stats card-secondary card-round" href="<?php echo e(route('user.course_management.coupons')); ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-coins"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category"><?php echo e(__('Coupon')); ?></p>
                                    <h4 class="card-title"><?php echo e($coupons); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endif; ?>
        <?php if(!empty($permissions) && in_array('Follow/Unfollow', $permissions)): ?>
        <div class="col-sm-6 col-md-4">
            <a class="card card-stats card-default card-round" href="<?php echo e(route('user.follower.list')); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-poll-people"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category"><?php echo e(__('Followers')); ?></p>
                                <h4 class="card-title"><?php echo e($followers); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>
        <?php if(!empty($permissions) && in_array('Follow/Unfollow', $permissions)): ?>
        <div class="col-sm-6 col-md-4">
            <a class="card card-stats card-primary card-round" href="<?php echo e(route('user.following.list')); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-people-carry"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category"><?php echo e(__('Followings')); ?></p>
                                <h4 class="card-title"><?php echo e($followings); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <h4 class="card-title"><?php echo e(__('Recent Payment Logs')); ?></h4>
                            </div>
                            <p class="card-category">
                                <?php echo e(__('10 latest payment logs')); ?>

                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if(count($memberships) == 0): ?>
                                    <h3 class="text-center"><?php echo e(__('NO PAYMENT LOG FOUND')); ?></h3>
                                    <?php else: ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped mt-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><?php echo e(__('Transaction Id')); ?></th>
                                                    <th scope="col"><?php echo e(__('Amount')); ?></th>
                                                    <th scope="col"><?php echo e(__('Payment Status')); ?></th>
                                                    <th scope="col"><?php echo e(__('Actions')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(strlen($membership->transaction_id) > 30 ? mb_substr($membership->transaction_id, 0, 30, 'UTF-8') . '...' : $membership->transaction_id); ?></td>
                                                    <?php
                                                    $bex = json_decode($membership->settings)
                                                    ?>
                                                    <td>
                                                        <?php if($membership->price == 0): ?>
                                                        <?php echo e(__('Free')); ?>

                                                        <?php else: ?>
                                                        <?php echo e(format_price($membership->price)); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($membership->status == 1): ?>
                                                        <h3 class="d-inline-block badge badge-success"><?php echo e(__('Success')); ?></h3>
                                                        <?php elseif($membership->status == 0): ?>
                                                        <h3 class="d-inline-block badge badge-warning"><?php echo e(__('Pending')); ?></h3>
                                                        <?php elseif($membership->status == 2): ?>
                                                        <h3 class="d-inline-block badge badge-danger"><?php echo e(__('Rejected')); ?></h3>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($membership->name !== "anonymous")): ?>
                                                        <a class="btn btn-sm btn-info" href="#" data-toggle="modal"
                                                            data-target="#detailsModal<?php echo e($membership->id); ?>"><?php echo e(__('Detail')); ?></a>
                                                        <?php else: ?>
                                                        -
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="detailsModal<?php echo e($membership->id); ?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Owner Details')); ?>

                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h3 class="text-warning"><?php echo e(__('Member details')); ?></h3>
                                                                <label><?php echo e(__('Name')); ?></label>
                                                                <p><?php echo e($membership->user->first_name.' '.$membership->user->last_name); ?></p>
                                                                <label><?php echo e(__('Email')); ?></label>
                                                                <p><?php echo e($membership->user->email); ?></p>
                                                                <label><?php echo e(__('Phone')); ?></label>
                                                                <p><?php echo e($membership->user->phone_number); ?></p>
                                                                <h3 class="text-warning"><?php echo e(__('Payment details')); ?></h3>
                                                                <p><strong
                                                                    ><?php echo e(__('Cost')); ?>: </strong> <?php echo e($membership->price == 0 ? "Free" : $membership->price); ?>

                                                                </p>
                                                                <p><strong
                                                                    ><?php echo e(__('Currency')); ?>: </strong> <?php echo e($membership->currency); ?>

                                                                </p>
                                                                <p><strong
                                                                    ><?php echo e(__('Method')); ?>: </strong> <?php echo e($membership->payment_method); ?>

                                                                </p>
                                                                <h3 class="text-warning"><?php echo e(__('Package Details')); ?></h3>
                                                                <p><strong
                                                                    ><?php echo e(__('Title')); ?>: </strong><?php echo e(!empty($membership->package) ? $membership->package->title : ''); ?>

                                                                </p>
                                                                <p><strong
                                                                    ><?php echo e(__('Term')); ?>: </strong> <?php echo e(!empty($membership->package) ? $membership->package->term : ''); ?>

                                                                </p>
                                                                <p><strong ><?php echo e(__('Start Date')); ?>: </strong><?php echo e(\Illuminate\Support\Carbon::parse($membership->start_date)->format('M-d-Y')); ?>

                                                                </p>
                                                                <p><strong ><?php echo e(__('Expire Date')); ?>: </strong><?php echo e(\Illuminate\Support\Carbon::parse($membership->expire_date)->format('M-d-Y')); ?>

                                                                </p>
                                                                <p>
                                                                    <strong ><?php echo e(__('Purchase Type')); ?>: </strong>
                                                                    <?php if($membership->is_trial == 1): ?>
                                                                    <?php echo e(__('Trial')); ?>

                                                                    <?php else: ?>
                                                                    <?php echo e($membership->price == 0 ? __('Free') : __('Regular')); ?>

                                                                    <?php endif; ?>
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                    <?php echo e(__('Close')); ?>

                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($permissions) && in_array('Follow/Unfollow', $permissions)): ?>
        <div class="col-lg-6">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <h4 class="card-title"><?php echo e(__('Latest Followings')); ?></h4>
                            </div>
                            <p class="card-category">
                                <?php echo e(__('10 latest followings')); ?>

                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped mt-3">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?php echo e(__('Image')); ?></th>
                                                <th scope="col"><?php echo e(__('User name')); ?></th>
                                                <th scope="col"><?php echo e(__('Actions')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><img src="<?php echo e(asset('assets/front/img/user/'.$user->photo)); ?>" alt="" width="40"></td>
                                                    <td><?php echo e(strlen($user->username) > 30 ? mb_substr($user->username, 0, 30, 'UTF-8') . '...' : $user->username); ?></td>
                                                    <td>
                                                        <a target="_blank" class="btn btn-secondary btn-sm" href="<?php echo e(route('front.user.detail.view', $user->username)); ?>">
                                                          <span class="btn-label">
                                                            <i class="fas fa-eye"></i>
                                                          </span>
                                                          <?php echo e(__('View')); ?>

                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="<?php echo e(route('user.unfollow', $user->id)); ?>">
                                                            <?php echo e(__('Unfollow')); ?>

                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coursemagix\resources\views/user/dashboard.blade.php ENDPATH**/ ?>