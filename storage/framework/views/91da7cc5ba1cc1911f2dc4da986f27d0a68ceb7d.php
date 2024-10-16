<?php $__env->startSection('style'); ?>
    <?php echo $__env->make('user-front.ecommerce.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta-description', !empty($userSeo) ? $userSeo->cart_meta_description : ''); ?>
<?php $__env->startSection('meta-keywords', !empty($userSeo) ? $userSeo->cart_meta_keywords : ''); ?>

<?php $__env->startSection('tab-title'); ?>
    <?php echo e($keywords['Cart'] ?? 'Cart'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-name'); ?>
    <?php echo e($keywords['Cart'] ?? 'Cart'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('br-name'); ?>
    <?php echo e($keywords['Cart'] ?? 'Cart'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!------=== breadcum---------->
      <?php if ($__env->exists('user-front.common.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->cart_page_title ?? 'cart' ])) echo $__env->make('user-front.common.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->cart_page_title ?? 'cart' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="cart-area-section section-gap">
        <div class="container clearfix">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div id="refreshDiv">
                        <div class="cart-block">
                            <ul class="total-item-info">
                                <?php
                                    $cartTotal = 0;
                                    $countitem = 0;
                                    if ($cart) {
                                        foreach ($cart as $p) {
                                            $cartTotal += $p['total'];
                                            $countitem += $p['qty'];
                                        }
                                    }
                                ?>
                                <li><strong><?php echo e($keywords['Total_Items'] ?? 'Total Items'); ?>:</strong> <strong
                                        class="cart-item-view"><?php echo e($cart ? $countitem : 0); ?></strong></li>
                                <li><strong><?php echo e($keywords['Cart_Total'] ?? 'Cart Total'); ?> :</strong> <strong
                                        class="cart-total-view"><?php echo e($userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : ''); ?><?php echo e($cartTotal); ?><?php echo e($userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : ''); ?></strong>
                                </li>
                            </ul>
                            <div class="table-outer table-responsive">
                                <?php if($cart != null): ?>
                                    <table class="cart-table">
                                        <thead class="cart-header">
                                            <tr>
                                                <th class="prod-column"><?php echo e($keywords['Item'] ?? 'Item'); ?></th>
                                                <th class="hide-column"></th>
                                                <th><?php echo e($keywords['Quantity'] ?? __('Quantity')); ?></th>
                                                <th class="price"><?php echo e($keywords['Price'] ?? __('Price')); ?></th>
                                                <th><?php echo e($keywords['Total'] ?? __('Total')); ?></th>
                                                <th><?php echo e($keywords['Remove'] ?? __('Remove')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $id = $item['id'];
                                                    $product = App\Models\Ecommerce\UserItem::find($item['id']);
                                                ?>
                                                <tr class="remove<?php echo e($key); ?>">
                                                    <td colspan="2" class="prod-column">
                                                        <div class="column-box">
                                                            <div class="product-image">
                                                                <a target="_blank"
                                                                    href="<?php echo e(route('front.user.item_details', ['slug' => $item['slug'], getParam()])); ?>">
                                                                    <img src="<?php echo e($item ? asset('assets/front/img/user/items/thumbnail/' . $product->thumbnail) : 'https://via.placeholder.com/350x350'); ?>"
                                                                        class="lazy">
                                                                </a>
                                                            </div>
                                                            <div class="title pl-0">
                                                                <input type="hidden" value="<?php echo e($id); ?>"
                                                                    class="product_id">
                                                                <a target="_blank"
                                                                    href="<?php echo e(route('front.user.item_details', ['slug' => $item['slug'], getParam()])); ?>">
                                                                    <h3 class="prod-title">
                                                                        <?php echo e(strlen($item['name']) > 32 ? mb_substr($item['name'], 0, 32, 'UTF-8') . '...' : $item['name']); ?>

                                                                    </h3>
                                                                </a>
                                                                <div class="variation-content">

                                                                    <strong>
                                                                        <?php echo e($keywords['Item_price'] ?? __('Item Price')); ?>:
                                                                    </strong>
                                                                    <?php echo e($userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : ''); ?>

                                                                    <?php echo e($item['product_price']); ?>

                                                                    <?php echo e($userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : ''); ?>


                                                                    <?php if(!empty($item['variations'])): ?>
                                                                        <h6>
                                                                            <?php echo e($keywords['Variations'] ?? __('Variations')); ?>:
                                                                        </h6>
                                                                        <?php
                                                                            $v_total = 0;
                                                                        ?>
                                                                        <?php $__currentLoopData = $item['variations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <table class="variation-table">
                                                                                <tr>
                                                                                    <td class="">
                                                                                        <strong><?php echo e($k); ?> :
                                                                                    </td>
                                                                                    <td><?php echo e($itm['name']); ?>: </td>
                                                                                    <td><?php echo e($userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : ''); ?>

                                                                                        <?php echo e($itm['price']); ?>

                                                                                        <?php echo e($userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : ''); ?>

                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <?php
                                                                                $v_total += $itm['price'];
                                                                            ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="qty crt-qty">
                                                        <div class="quantity-input">
                                                            <div class="quantity-down" id="quantityDown">
                                                                <i class="fal fa-minus"></i>
                                                            </div>
                                                            <input class="cart_qty" type="text"
                                                                value="<?php echo e($item['qty']); ?>" name="quantity">
                                                            <div class="quantity-up" id="quantityUP">
                                                                <i class="fal fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="price cart_price">
                                                        <div class="variation-content">
                                                            <p>
                                                                <strong><?php echo e($keywords['item'] ?? __('Item')); ?>:</strong>
                                                                <?php echo e($userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : ''); ?><span><?php echo e($item['variations'] ? $item['total'] - $v_total * $item['qty'] : $item['product_price'] * $item['qty']); ?></span><?php echo e($userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : ''); ?>

                                                            </p>
                                                            <?php if(!empty($item['variations'])): ?>
                                                                <p>
                                                                    <strong><?php echo e(__('Variation')); ?>:</strong>
                                                                    <?php echo e($userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : ''); ?><span><?php echo e($v_total * $item['qty']); ?></span><?php echo e($userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : ''); ?>

                                                                </p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                    <td class="sub-total">
                                                        <?php echo e($userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : ''); ?><?php echo e($item['total']); ?><?php echo e($userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : ''); ?>

                                                    </td>
                                                    <td>
                                                        <div class="remove">
                                                            <div class="checkbox">
                                                                <span class="fas fa-times cursor-pointer item-remove"
                                                                    rel="<?php echo e($id); ?>"
                                                                    data-href="<?php echo e(route('front.cart.item.remove', ['uid' => $key, getParam()])); ?>"></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <div class="bg-light py-5 text-center">
                                        <h3 class="text-uppercase"><?php echo e($keywords['Cart_is_empty'] ?? __('Cart is empty')); ?>

                                        </h3>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row cart-middle">
                <?php if($cart != null): ?>
                    <div class="col-lg-12">
                        <div class="update-cart">
                            <button class="cart-btn" id="updateCart"
                                data-href="<?php echo e(route('front.user.cart.update', getParam())); ?>"><span><?php echo e($keywords['Update'] ?? __('Update')); ?>

                                    <?php echo e($keywords['Cart'] ?? __('Cart')); ?></span></button>
                            <a class="cart-btn"
                                href="<?php echo e(route('front.user.checkout', getParam())); ?>"><span><?php echo e($keywords['Checkout'] ?? __('Checkout')); ?></span></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('user-front.ecommerce.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-front.common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/ecommerce/cart.blade.php ENDPATH**/ ?>