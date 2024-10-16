<?php
    $shopSettings = App\Models\Ecommerce\UserShopSetting::where('user_id', $user->id)->first();
?>
<div class="col-lg-3">
    <div class="user-sidebar">
        <ul class="links">
            <li>
                <a href="<?php echo e(route('customer.dashboard', getParam())); ?>"
                    class="<?php echo e(request()->routeIs('customer.dashboard') ? 'active' : ''); ?>"><?php echo e($keywords['dashboard'] ?? __('Dashboard')); ?></a>
            </li>

            <li>
                <a href="<?php echo e(route('customer.my_courses', getParam())); ?>"
                    class="<?php echo e(request()->routeIs('customer.my_courses') ? 'active' : ''); ?>"><?php echo e($keywords['my_courses'] ?? __('My Courses')); ?></a>
            </li>

            <?php if(!empty($packagePermissions) && in_array('Ecommerce', $packagePermissions)): ?>
                <?php if($shopSettings->is_shop == 1 && $shopSettings->catalog_mode == 0): ?>
                    <li>
                        <a href="<?php echo e(route('customer.my_orders', getParam())); ?>"
                            class="<?php echo e(request()->routeIs('customer.my_orders') || request()->routeIs('customer.orders-details') ? 'active' : ''); ?>"><?php echo e($keywords['My_Orders'] ?? __('My Orders')); ?></a>
                    </li>
                <?php endif; ?>
                <li>
                    <a class=" <?php if(request()->routeIs('customer.wishlist')): ?> active <?php endif; ?>"
                        href="<?php echo e(route('customer.wishlist', getParam())); ?>">
                        <?php echo e($keywords['My_Wishlist'] ?? __('My Wishlist')); ?></a>
                </li>

                <li>
                    <a href="<?php echo e(route('customer.shpping-details', getParam())); ?>"
                        class="<?php if(request()->routeIs('customer.shpping-details')): ?> active <?php endif; ?>">
                        <?php echo e($keywords['Shipping_Details'] ?? __('Shipping Details')); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('customer.billing-details', getParam())); ?>"
                        class="<?php if(request()->routeIs('customer.billing-details')): ?> active <?php endif; ?>">
                        <?php echo e($keywords['Billing_Details'] ?? __('Billing Details')); ?></a>
                </li>

            <?php endif; ?>

            <li>
                <a href="<?php echo e(route('customer.purchase_history', getParam())); ?>" target="_blank">
                    <?php echo e($keywords['Purchase_History'] ?? __('Purchase History')); ?>

                </a>
            </li>

            <li>
                <a href="<?php echo e(route('customer.edit_profile', getParam())); ?>"
                    class="<?php echo e(request()->routeIs('customer.edit_profile') ? 'active' : ''); ?>"><?php echo e($keywords['edit_profile'] ?? __('Edit Profile')); ?></a>
            </li>

            <li>
                <a href="<?php echo e(route('customer.change_password', getParam())); ?>"
                    class="<?php echo e(request()->routeIs('customer.change_password') ? 'active' : ''); ?>"><?php echo e($keywords['change_password'] ?? __('Change Password')); ?></a>
            </li>

            <li>
                <a href="<?php echo e(route('customer.logout', getParam())); ?>"><?php echo e($keywords['logout'] ?? __('Logout')); ?></a>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/common/customer/common/side-navbar.blade.php ENDPATH**/ ?>