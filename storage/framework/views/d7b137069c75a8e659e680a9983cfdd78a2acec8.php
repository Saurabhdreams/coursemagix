<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h4 class="page-title"><?php echo e(__('Social Medias')); ?></h4>
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
                <a href="#"><?php echo e(__('Social Medias')); ?></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-title d-inline-block"><?php echo e(__('Social Medias')); ?></div>
                        </div>

                        <div class="col-lg-4 mt-2 mt-lg-0">
                            <a href="#" data-toggle="modal" data-target="#createModal"
                               class="btn btn-primary btn-sm float-lg-right float-left"><i
                                    class="fas fa-plus"></i> <?php echo e(__('Add')); ?></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(count($socials) == 0): ?>
                                <h3 class="text-center mt-2"><?php echo e(__('NO SOCIAL MEDIA FOUND') . '!'); ?></h3>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"><?php echo e(__('Icon')); ?></th>
                                            <th scope="col"><?php echo e(__('URL')); ?></th>
                                            <th scope="col"><?php echo e(__('Serial Number')); ?></th>
                                            <th scope="col"><?php echo e(__('Actions')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><i class="<?php echo e($media->icon); ?>"></i></td>
                                                <td><?php echo e($media->url); ?></td>
                                                <td><?php echo e($media->serial_number); ?></td>
                                                <td>
                                                    <a class="btn btn-secondary btn-sm mr-1 editbtn" href="#"
                                                       data-toggle="modal" data-target="#editModal"
                                                       data-id="<?php echo e($media->id); ?>" data-icon="<?php echo e($media->icon); ?>"
                                                       data-url="<?php echo e($media->url); ?>"
                                                       data-serial_number="<?php echo e($media->serial_number); ?>">
                                                          <span class="btn-label">
                                                            <i class="fas fa-edit"></i>
                                                          </span>
                                                        <?php echo e(__('Edit')); ?>

                                                    </a>

                                                    <form class="deleteform d-inline-block"
                                                          action="<?php echo e(route('user.social.delete')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="social_id" value="<?php echo e($media->id); ?>">
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

    
    <?php echo $__env->make('user.settings.social-media.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('user.settings.social-media.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/settings/social-media/index.blade.php ENDPATH**/ ?>