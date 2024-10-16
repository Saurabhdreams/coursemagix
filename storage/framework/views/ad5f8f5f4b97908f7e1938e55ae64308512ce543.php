<div class="product-loop row">
    <?php if(count($items) == 0): ?>
        <div class="not-found-block w-100 d-flex justify-content-center">
            <h2 class="text-muted"><?php echo e($keywords['no_items'] ?? 'No Item Found'); ?>!</h2>
        </div>
    <?php endif; ?>

    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $variations = App\Models\Ecommerce\UserItemVariation::where('item_id', $item->item_id)
                ->where('language_id', $userCurrentLang->id)
                ->get();

            $itemstock = $item->stock;
            if (count($variations) == 0) {
                if ($itemstock > 0) {
                    $stock = true;
                } else {
                    $stock = false;
                }
                $variations = null;
            } else {
                $stock = true;
                $tstock = '';
                if (count($variations)) {
                    foreach ($variations as $varkey => $varvalue) {
                        $tstock = array_sum(json_decode($varvalue->option_stock));
                        if ($tstock == 0) {
                            $stock = false;
                        }
                    }
                } else {
                    $stock = true;
                }
            }
            $n_price = $item->current_price - ($item->flash_percentage * $item->current_price) / 100;
            $isFlash = App\Http\Helpers\CheckFlashItem::isFlashItem($item->item_id);
        ?>
        <div class="col-lg-4 col-sm-6">
            <div class="single-product">
                <div class="product-img">
                    <a class="d-block"
                        href="<?php echo e(route('front.user.item_details', ['slug' => $item->slug, getParam()])); ?>">
                        <img data-src="<?php echo e(asset('assets/front/img/user/items/thumbnail/' . $item->thumbnail)); ?>"
                            class="lazy" alt="image">
                    </a>
                    <?php if($isFlash): ?>
                        <span class="flash-badge"><i class="fas fa-bolt"></i>
                            -<?php echo e($item->flash_percentage); ?>%</span>
                        <?php
                            $n_price = $item->current_price - ($item->flash_percentage * $item->current_price) / 100;
                        ?>
                    <?php else: ?>
                        <?php
                            $n_price = $item->current_price;
                        ?>
                    <?php endif; ?>
                    <?php
                        $dt = Carbon\Carbon::parse($item->end_date);
                        $year = $dt->year;
                        $month = $dt->month;
                        $day = $dt->day;
                        $end_time = Carbon\Carbon::parse($item->end_time);
                        $hour = $end_time->hour;
                        $minute = $end_time->minute;
                        $now = str_replace('+00:00', '.000' . $userBs->timezoneinfo->gmt_offset . '00:00', gmdate('c'));
                    ?>
                    <?php if($isFlash): ?>
                        <div class="product-countdown" data-year="<?php echo e($year); ?>"
                            data-month="<?php echo e($month); ?>" data-day="<?php echo e($day); ?>"
                            data-now="<?php echo e($now); ?>"
                            data-timezone="<?php echo e($userBs->timezoneinfo->gmt_offset); ?>"
                            data-hour="<?php echo e($hour); ?>" data-minute="<?php echo e($minute); ?>">
                        </div>
                    <?php endif; ?>
                    <?php if($item->type == 'physical'): ?>
                        <?php if($stock == false): ?>
                            <span
                                class="stock-label"><?php echo e($keywords['Out_of_Stock'] ?? 'Out of Stock'); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="product-action">

                        <?php if(!empty($userShopSetting) && empty($userShopSetting->catalog_mode)): ?>
                            <a class="cart-link cursor-pointer ss"
                                data-title="<?php echo e(strlen($item->title) > 26 ? mb_substr($item->title, 0, 26, 'UTF-8') . '...' : $item->title); ?>"
                                data-current_price="<?php echo e($n_price); ?>"
                                data-flash_percentage="<?php echo e($item->flash_percentage ?? 0); ?>"
                                data-item_id="<?php echo e($item->item_id); ?>"
                                data-variations="<?php echo e(json_encode($variations)); ?>"
                                data-href="<?php echo e(route('front.user.add.cart', ['id' => $item->item_id, getParam()])); ?>"
                                data-toggle="tooltip" data-placement="top"
                                title="<?php echo e(__('Add to Cart')); ?>"><i
                                    class="far fa-shopping-cart "></i></a>
                        <?php endif; ?>
                        <a class="add-to-wish cursor-pointer" data-item_id="<?php echo e($item->item_id); ?>"
                            data-href="<?php echo e(route('front.user.add.wishlist', ['id' => $item->item_id, getParam()])); ?>"
                            data-toggle="tooltip" data-placement="top">
                            <?php if(!empty($myWishlist) && in_array($item->item_id, $myWishlist)): ?>
                                <i class="fa fa-heart"></i>
                            <?php else: ?>
                                <i class="far fa-heart"></i>
                            <?php endif; ?>
                        </a>
                        <a title="<?php echo e(__('Details')); ?>"
                            href="<?php echo e(route('front.user.item_details', ['slug' => $item->slug, getParam()])); ?>">
                            <i class="far fa-eye"></i>
                        </a>
                    </div>
                </div>
                <div class="product-desc">
                    <?php if(!empty($userShopSetting) && $userShopSetting->item_rating_system): ?>
                        <div class="rate">
                            <div class="rating" style="width:<?php echo e($item->rating * 20); ?>%"></div>
                        </div>
                    <?php endif; ?>
                    <h5 class="title">
                        <a title="<?php echo e($item->title); ?>"
                            href="<?php echo e(route('front.user.item_details', ['slug' => $item->slug, getParam()])); ?> ">
                            <?php echo e(strlen($item->title) > 20 ? mb_substr($item->title, 0, 20, 'UTF-8') . '...' : $item->title); ?>

                        </a>
                    </h5>
                    <span class="price">
                        <?php echo e($userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : ''); ?>

                        <?php echo e($n_price); ?>

                        <?php echo e($userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : ''); ?>

                    </span>
                    <?php if($isFlash): ?>
                        <span class="previous-price">
                            <?php echo e($userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : ''); ?>

                            <span><?php echo e($item->current_price); ?></span>
                            <?php echo e($userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : ''); ?>

                        </span>
                    <?php elseif($item->previous_price > 0): ?>
                        <span class="previous-price">
                            <?php echo e($userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : ''); ?>

                            <span><?php echo e($item->previous_price); ?></span>
                            <?php echo e($userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : ''); ?>

                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="pagination-wrap text-center">
    <ul class="pagination justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <nav class="pagination-nav">
                    <?php echo e($items->appends(['minprice' => request()->input('minprice'), 'maxprice' => request()->input('maxprice'), 'category_id' => request()->input('category_id'), 'type' => request()->input('type')])->links()); ?>

                </nav>
            </div>
        </div>
    </ul>
</div>
<?php /**PATH /var/www/vhosts/coursemagix.com/httpdocs/resources/views/user-front/ecommerce/include/product.blade.php ENDPATH**/ ?>