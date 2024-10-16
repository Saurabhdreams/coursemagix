
<?php if(!is_null($package)): ?>
    <?php if(!empty($permissions) && in_array('Ecommerce', $permissions)): ?>
        
        <li
            class="nav-item
    <?php if(request()->path() == 'user/shop/category'): ?> active
    <?php elseif(request()->path() == 'user/shop/subcategory'): ?> active
    <?php elseif(request()->is('user/shop/subcategory/*/edit')): ?> active
    <?php elseif(request()->is('user/shop/category/*/edit')): ?> active
    <?php elseif(request()->path() == 'user/shop/item'): ?> active
    <?php elseif(request()->routeIs('user.item.type')): ?> active
    <?php elseif(request()->is('user/shop/item/*/edit')): ?> active
    <?php elseif(request()->path() == 'user/shop/item/all/orders'): ?> active
    <?php elseif(request()->path() == 'user/shop/item/pending/orders'): ?> active
    <?php elseif(request()->path() == 'user/shop/item/processing/orders'): ?> active
    <?php elseif(request()->path() == 'user/shop/item/completed/orders'): ?> active
    <?php elseif(request()->path() == 'user/shop/item/rejected/orders'): ?> active
    <?php elseif(request()->routeIs('user.item.variations')): ?> active
    <?php elseif(request()->routeIs('user.item.create')): ?> active
    <?php elseif(request()->routeIs('user.item.details')): ?> active
    <?php elseif(request()->path() == 'user/shop/coupon'): ?> active
    <?php elseif(request()->routeIs('user.coupon.edit')): ?> active
    <?php elseif(request()->path() == 'user/shop/shipping'): ?> active
    <?php elseif(request()->routeIs('user.shipping.edit')): ?> active
    <?php elseif(request()->routeIs('user.item.settings')): ?> active
    <?php elseif(request()->path() == 'user/shop/item/orders/report'): ?> active <?php endif; ?>">
            <a data-toggle="collapse" href="#shopManagement">
                <i class="fas fa-store-alt"></i>
                <p>Shop Management</p>
                <span class="caret"></span>
            </a>
            <div class="collapse
    <?php if(request()->path() == 'user/shop/category'): ?> show
    <?php elseif(request()->path() == 'user/shop/subcategory'): ?> show
    <?php elseif(request()->is('user/shop/subcategory/*/edit')): ?> show
    <?php elseif(request()->is('user/shop/category/*/edit')): ?> show
    <?php elseif(request()->routeIs('user.item.type')): ?> show
    <?php elseif(request()->path() == 'user/shop/item'): ?> show
    <?php elseif(request()->is('user/shop/item/*/edit')): ?> show
    <?php elseif(request()->path() == 'user/shop/item/all/orders'): ?> show
    <?php elseif(request()->path() == 'user/shop/item/pending/orders'): ?> show
    <?php elseif(request()->path() == 'user/shop/item/processing/orders'): ?> show
    <?php elseif(request()->path() == 'user/shop/item/completed/orders'): ?> show
    <?php elseif(request()->path() == 'user/shop/item/rejected/orders'): ?> show
    <?php elseif(request()->routeIs('user.item.create')): ?> show
    <?php elseif(request()->routeIs('user.item.details')): ?> show
    <?php elseif(request()->path() == 'user/shop/coupon'): ?> show
    <?php elseif(request()->routeIs('user.coupon.edit')): ?> show
    <?php elseif(request()->routeIs('user.item.variations')): ?> show
    <?php elseif(request()->path() == 'user/shop/shipping'): ?> show
    <?php elseif(request()->routeIs('user.shipping.edit')): ?> show
    <?php elseif(request()->routeIs('user.item.settings')): ?> show
    <?php elseif(request()->path() == 'user/shop/item/orders/report'): ?> show <?php endif; ?>"
                id="shopManagement">
                <ul class="nav nav-collapse">
                    <li class="<?php if(request()->routeIs('user.item.settings')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('user.item.settings')); ?>">
                            <span class="sub-item">Settings</span>
                        </a>
                    </li>
                    <li
                        class="
        <?php if(request()->path() == 'user/shop/shipping'): ?> active
        <?php elseif(request()->routeIs('user.shipping.edit')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('user.shipping.index') . '?language=' . $default->code); ?>">
                            <span class="sub-item">Shipping Charges</span>
                        </a>
                    </li>
                    <li
                        class="
    <?php if(request()->path() == 'user/shop/coupon'): ?> active
    <?php elseif(request()->routeIs('user.coupon.edit')): ?> active
    <?php elseif(request()->path() == 'user/shop/category'): ?> active
    <?php elseif(request()->path() == 'user/shop/category/*/edit'): ?> active
    <?php elseif(request()->path() == 'user/shop/subcategory'): ?> active
    <?php elseif(request()->path() == 'user/shop/subcategory/*/edit'): ?> active
    <?php elseif(request()->path() == 'user/shop/item'): ?> active
    <?php elseif(request()->is('user/shop/subcategory/*/edit')): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('user.coupon.index')); ?>">
                            <span class="sub-item"><?php echo e(__('Coupons')); ?></span>
                        </a>
                    </li>
                    <li class="submenu">
                        <a data-toggle="collapse" href="#productManagement"
                            aria-expanded="<?php echo e(request()->path() == 'user/category' || request()->path() == 'user/subcategory' || request()->is('user/category/*/edit') || request()->is('user/subcategory/*/edit') || request()->routeIs('user.item.type') || request()->routeIs('user.item.variations') || request()->routeIs('user.item.create') || request()->routeIs('user.item.index') || request()->routeIs('user.item.edit') ? 'true' : 'false'); ?>">
                            <span class="sub-item"><?php echo e(__('Manage Items')); ?></span>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                <?php if(request()->path() == 'user/shop/category'): ?> show
                <?php elseif(request()->is('user/shop/category/*/edit')): ?> show
                <?php elseif(request()->path() == 'user/shop/subcategory'): ?> show
                <?php elseif(request()->is('user/shop/subcategory/*/edit')): ?> show
                <?php elseif(request()->routeIs('user.item.type')): ?> show
                <?php elseif(request()->routeIs('user.item.variations')): ?> show
                <?php elseif(request()->routeIs('user.item.create')): ?> show
                <?php elseif(request()->routeIs('user.item.index')): ?> show
                <?php elseif(request()->routeIs('user.item.edit')): ?> show <?php endif; ?>"
                            id="productManagement" style="">
                            <ul class="nav nav-collapse subnav">
                                <li
                                    class="
                        <?php if(request()->path() == 'user/shop/category'): ?> active
                        <?php elseif(request()->is('user/shop/category/*/edit')): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.itemcategory.index') . '?language=' . $default->code); ?>">
                                        <span class="sub-item"><?php echo e(__('Categories')); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="
                        <?php if(request()->path() == 'user/shop/subcategory'): ?> active
                        <?php elseif(request()->is('user/shop/subcategory/*/edit')): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.itemsubcategory.index') . '?language=' . $default->code); ?>">
                                        <span class="sub-item"><?php echo e(__('Subcategories')); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="
                        <?php if(request()->routeIs('user.item.type')): ?> active
                        <?php elseif(request()->routeIs('user.item.create')): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.item.type')); ?>">
                                        <span class="sub-item">Add Item</span>
                                    </a>
                                </li>
                                <li
                                    class="
                        <?php if(request()->path() == 'user/shop/item'): ?> active
                        <?php elseif(request()->is('user/shop/item/*/edit')): ?> active
                        <?php elseif(request()->routeIs('user.item.variations')): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.item.index') . '?language=' . $default->code); ?>">
                                        <span class="sub-item">Items</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="submenu">
                        <a data-toggle="collapse" href="#manageOrders"
                            aria-expanded="<?php echo e(request()->routeIs('user.all.item.orders') || request()->routeIs('user.pending.item.orders') || request()->routeIs('user.processing.item.orders') || request()->routeIs('user.completed.item.orders') || request()->routeIs('user.rejected.item.orders') || request()->routeIs('user.item.details') || request()->path() == 'admin/product/orders/report' ? 'true' : 'false'); ?>">
                            <span class="sub-item">Manage Orders</span>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
    <?php if(request()->routeIs('user.all.item.orders')): ?> show
    <?php elseif(request()->routeIs('user.pending.item.orders')): ?> show
    <?php elseif(request()->routeIs('user.processing.item.orders')): ?> show
    <?php elseif(request()->routeIs('user.completed.item.orders')): ?> show
    <?php elseif(request()->routeIs('user.rejected.item.orders')): ?> show
    <?php elseif(request()->routeIs('user.item.details')): ?> show
    <?php elseif(request()->path() == 'user/shop/item/orders/report'): ?> show <?php endif; ?>"
                            id="manageOrders" style="">
                            <ul class="nav nav-collapse subnav">
                                <li class="<?php if(request()->path() == 'user/shop/item/all/orders'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.all.item.orders')); ?>">
                                        <span class="sub-item">All Orders</span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/shop/item/pending/orders'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.pending.item.orders')); ?>">
                                        <span class="sub-item">Pending Orders</span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/shop/item/processing/orders'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.processing.item.orders')); ?>">
                                        <span class="sub-item">Processing Orders</span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/shop/item/completed/orders'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.completed.item.orders')); ?>">
                                        <span class="sub-item">Completed Orders</span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/shop/item/rejected/orders'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.rejected.item.orders')); ?>">
                                        <span class="sub-item">Rejected Orders</span>
                                    </a>
                                </li>
                                <li class="<?php if(request()->path() == 'user/shop/item/orders/report'): ?> active <?php endif; ?>">
                                    <a href="<?php echo e(route('user.orders.report')); ?>">
                                        <span class="sub-item">Report</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user/partials/web_pages.blade.php ENDPATH**/ ?>