<?php $__env->startSection('content'); ?>
    <?php if(!empty($features) && is_array($features) && in_array('Subdomain', $features)): ?>
        <div class="page-header">
            <h4 class="page-title"><?php echo e(__('Subdomain & Path URL')); ?></h4>
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
                    <a href="#"><?php echo e(__('Domains & URLs')); ?></a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#"><?php echo e(__('Subdomain & Path URL')); ?></a>
                </li>
            </ul>
        </div>
    <?php else: ?>
        <div class="page-header">
            <h4 class="page-title"><?php echo e(__('Path Based URL')); ?></h4>
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
                    <a href="#"><?php echo e(__('Path Based URL')); ?></a>
                </li>
            </ul>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php if(cPackageHasSubdomain(Auth::user())): ?>
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card-title d-inline-block"><?php echo e(__('Subdomain')); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col"><?php echo e(__('Subdomain')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <?php
                                                    $subdomain = strtolower(Auth::user()->username) . "." . env('WEBSITE_HOST');
                                                ?>
                                                <a href="//<?php echo e($subdomain); ?>" target="_blank"><?php echo e($subdomain); ?></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="<?php echo e(cPackageHasSubdomain(Auth::user()) ? 'col-md-6' : 'col-md-12'); ?>">
            <div class="card">
                <div class="card-header card-title">
                    <?php echo e(__('Path Based URL')); ?>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-striped table">
                            <thead>
                            <tr>
                                <th><?php echo e(__('URL')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <?php
                                        $url = env('WEBSITE_HOST') . '/' . Auth::user()->username;
                                    ?>
                                    <a href="//<?php echo e($url); ?>" target="_blank"><?php echo e($url); ?></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/subdomain.blade.php ENDPATH**/ ?>