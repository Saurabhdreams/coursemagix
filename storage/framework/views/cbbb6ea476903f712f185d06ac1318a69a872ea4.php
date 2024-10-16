<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" <?php if(request()->cookie('user-theme') == 'dark'): ?> data-background-color="dark2" <?php endif; ?>>
        <a href="<?php echo e(route('front.index')); ?>" class="logo" target="_blank">
        <img src="<?php echo e(\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_LOGO,$userBs->logo,$userBs,'assets/admin/img/propics/blank_user.jpg')); ?>" alt="navbar brand" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
        <i class="icon-menu"></i>
        </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
            <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" <?php if(request()->cookie('user-theme') == 'dark'): ?> data-background-color="dark" <?php endif; ?>>
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <form action="<?php echo e((route('user.theme.change'))); ?>" class="mr-4 form-inline" id="adminThemeForm">
                    <div class="form-group">
                        <div class="selectgroup selectgroup-secondary selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="theme" value="light" class="selectgroup-input" <?php echo e(empty(request()->cookie('user-theme')) || request()->cookie('user-theme') == 'light' ? 'checked' : ''); ?> onchange="document.getElementById('adminThemeForm').submit();">
                                <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-sun"></i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="theme" value="dark" class="selectgroup-input" <?php echo e(request()->cookie('user-theme') == 'dark' ? 'checked' : ''); ?> onchange="document.getElementById('adminThemeForm').submit();">
                                <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-moon"></i></span>
                            </label>
                        </div>
                    </div>
                </form>
                <li>
                    <li class="mr-4">
                        <a class="btn btn-primary btn-sm btn-round" target="_blank"
                            href="<?php echo e(route('front.user.detail.view',Auth::user()->username)); ?>" title="View Website">
                        <i class="fas fa-eye"></i>
                        </a>
                    </li>
                </li>
                <li class="d-flex mr-4">
                    <label class="switch">
                    <input type="checkbox" name="online_status" id="toggle-btn"
                    data-toggle="toggle" data-on="1" data-off="0"
                    <?php if(Auth::user()->online_status == 1): ?> checked <?php endif; ?>
                    >
                    <span class="slider round"></span>
                    </label>
                    <?php if(Auth::user()->online_status == 1): ?>
                        <h5 class="mt-2 ml-2 <?php if(request()->cookie('user-theme') == 'dark'): ?> text-white <?php endif; ?>">
                            <?php echo e(__('Active')); ?>

                        </h5>
                    <?php else: ?>
                        <h5 class="mt-2 ml-2 <?php if(request()->cookie('user-theme') == 'dark'): ?> text-white <?php endif; ?>">
                            <?php echo e(__('Deactive')); ?>

                        </h5>
                    <?php endif; ?>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <?php if(!empty(Auth::user()->photo)): ?>
                            <img src="<?php echo e(asset('assets/front/img/user/'.Auth::user()->photo)); ?>" alt="..."
                                class="avatar-img rounded-circle">
                            <?php else: ?>
                            <img src="<?php echo e(asset('assets/admin/img/propics/blank_user.jpg')); ?>" alt="..."
                                class="avatar-img rounded-circle">
                            <?php endif; ?>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <?php if(!empty(Auth::user()->photo)): ?>
                                        <img src="<?php echo e(asset('assets/front/img/user/'.Auth::user()->photo)); ?>" alt="..."
                                            class="avatar-img rounded">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('assets/admin/img/propics/blank_user.jpg')); ?>" alt="..."
                                            class="avatar-img rounded">
                                        <?php endif; ?>
                                    </div>
                                    <div class="u-text">
                                        <h4><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></h4>
                                        <p class="text-muted"><?php echo e(Auth::user()->email); ?></p>
                                        <a
                                            href="<?php echo e(route('user-profile-update')); ?>"
                                            class="btn btn-xs btn-secondary btn-sm"><?php echo e(__('Edit Profile')); ?></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('user-profile-update')); ?>"><?php echo e(__('Edit Profile')); ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('user.changePass')); ?>"><?php echo e(__('Change Password')); ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('user-logout')); ?>"><?php echo e(__('Logout')); ?></a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/partials/top-navbar.blade.php ENDPATH**/ ?>