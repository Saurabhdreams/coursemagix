<?php
$userDefaultLang = \App\Models\User\Language::where([
    ['user_id',\Illuminate\Support\Facades\Auth::guard('web')->user()->id],
    ['is_default',1]
])->first();
?>
<?php if(!empty($userDefaultLang) && $userDefaultLang->rtl == 1): ?>
<?php $__env->startSection('styles'); ?>
<style>
    form:not(.modal-form) input,
    form:not(.modal-form) textarea,
    form:not(.modal-form) select,
    select[name='userLanguage'] {
        direction: rtl;
    }
    form:not(.modal-form) .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
    }
</style>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
   <h4 class="page-title"><?php echo e(__('Following List')); ?></h4>
   <ul class="breadcrumbs">
      <li class="nav-home">
         <a href="<?php echo e(route('user.following.list')); ?>">
         <i class="flaticon-home"></i>
         </a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#"><?php echo e(__('Following Page')); ?></a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#"><?php echo e(__('Following')); ?></a>
      </li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-lg-4">
                  <div class="card-title d-inline-block"><?php echo e(__('Following')); ?></div>
               </div>
               <div class="col-lg-3">
               </div>
               <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-lg-12">
                 <?php if(is_null($userDefaultLang)): ?>
                       <h3 class="text-center"><?php echo e(__('NO LANGUAGE FOUND')); ?></h3>
                   <?php else: ?>
                       <?php if(count($users) == 0): ?>
                           <h3 class="text-center"><?php echo e(__('NO FOLLOWING USER FOUND')); ?></h3>
                       <?php else: ?>
                           <div class="table-responsive">
                               <table class="table table-striped mt-3">
                                   <thead>
                                   <tr>
                                       <th scope="col"><?php echo e(__('Image')); ?></th>
                                       <th scope="col"><?php echo e(__('Username')); ?></th>
                                       <th scope="col"><?php echo e(__('Email')); ?></th>
                                       <th scope="col"><?php echo e(__('Actions')); ?></th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <tr>
                                           <td><img src="<?php echo e(asset('assets/front/img/user/'.$user->photo)); ?>" alt="" width="80"></td>
                                           <td><?php echo e(strlen($user->username) > 30 ? mb_substr($user->username, 0, 30, 'UTF-8') . '...' : $user->username); ?></td>
                                           <td><?php echo e($user->email); ?></td>
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
                       <?php endif; ?>
                   <?php endif; ?>
               </div>
            </div>
         </div>
         <div class="card-footer">
            <div class="row">
               <div class="d-inline-block mx-auto">
                   <?php if(count($users) > 0): ?>
                        <?php echo e($users->links()); ?>

                   <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/following/index.blade.php ENDPATH**/ ?>