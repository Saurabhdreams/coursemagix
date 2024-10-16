<div class="product-loop row">
    @if (count($items) == 0)
        <div class="not-found-block w-100 d-flex justify-content-center">
            <h2 class="text-muted">{{ $keywords['no_items'] ?? 'No Item Found' }}!</h2>
        </div>
    @endif

    @foreach ($items as $item)
        @php
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
        @endphp
        <div class="col-lg-4 col-sm-6">
            <div class="single-product">
                <div class="product-img">
                    <a class="d-block"
                        href="{{ route('front.user.item_details', ['slug' => $item->slug, getParam()]) }}">
                        <img data-src="{{ asset('assets/front/img/user/items/thumbnail/' . $item->thumbnail) }}"
                            class="lazy" alt="image">
                    </a>
                    @if ($isFlash)
                        <span class="flash-badge"><i class="fas fa-bolt"></i>
                            -{{ $item->flash_percentage }}%</span>
                        @php
                            $n_price = $item->current_price - ($item->flash_percentage * $item->current_price) / 100;
                        @endphp
                    @else
                        @php
                            $n_price = $item->current_price;
                        @endphp
                    @endif
                    @php
                        $dt = Carbon\Carbon::parse($item->end_date);
                        $year = $dt->year;
                        $month = $dt->month;
                        $day = $dt->day;
                        $end_time = Carbon\Carbon::parse($item->end_time);
                        $hour = $end_time->hour;
                        $minute = $end_time->minute;
                        $now = str_replace('+00:00', '.000' . $userBs->timezoneinfo->gmt_offset . '00:00', gmdate('c'));
                    @endphp
                    @if ($isFlash)
                        <div class="product-countdown" data-year="{{ $year }}"
                            data-month="{{ $month }}" data-day="{{ $day }}"
                            data-now="{{ $now }}"
                            data-timezone="{{ $userBs->timezoneinfo->gmt_offset }}"
                            data-hour="{{ $hour }}" data-minute="{{ $minute }}">
                        </div>
                    @endif
                    @if ($item->type == 'physical')
                        @if ($stock == false)
                            <span
                                class="stock-label">{{ $keywords['Out_of_Stock'] ?? 'Out of Stock' }}</span>
                        @endif
                    @endif
                    <div class="product-action">

                        @if (!empty($userShopSetting) && empty($userShopSetting->catalog_mode))
                            <a class="cart-link cursor-pointer ss"
                                data-title="{{ strlen($item->title) > 26 ? mb_substr($item->title, 0, 26, 'UTF-8') . '...' : $item->title }}"
                                data-current_price="{{ $n_price }}"
                                data-flash_percentage="{{ $item->flash_percentage ?? 0 }}"
                                data-item_id="{{ $item->item_id }}"
                                data-variations="{{ json_encode($variations) }}"
                                data-href="{{ route('front.user.add.cart', ['id' => $item->item_id, getParam()]) }}"
                                data-toggle="tooltip" data-placement="top"
                                title="{{ __('Add to Cart') }}"><i
                                    class="far fa-shopping-cart "></i></a>
                        @endif
                        <a class="add-to-wish cursor-pointer" data-item_id="{{ $item->item_id }}"
                            data-href="{{ route('front.user.add.wishlist', ['id' => $item->item_id, getParam()]) }}"
                            data-toggle="tooltip" data-placement="top">
                            @if (!empty($myWishlist) && in_array($item->item_id, $myWishlist))
                                <i class="fa fa-heart"></i>
                            @else
                                <i class="far fa-heart"></i>
                            @endif
                        </a>
                        <a title="{{ __('Details') }}"
                            href="{{ route('front.user.item_details', ['slug' => $item->slug, getParam()]) }}">
                            <i class="far fa-eye"></i>
                        </a>
                    </div>
                </div>
                <div class="product-desc">
                    @if (!empty($userShopSetting) && $userShopSetting->item_rating_system)
                        <div class="rate">
                            <div class="rating" style="width:{{ $item->rating * 20 }}%"></div>
                        </div>
                    @endif
                    <h5 class="title">
                        <a title="{{ $item->title }}"
                            href="{{ route('front.user.item_details', ['slug' => $item->slug, getParam()]) }} ">
                            {{ strlen($item->title) > 20 ? mb_substr($item->title, 0, 20, 'UTF-8') . '...' : $item->title }}
                        </a>
                    </h5>
                    <span class="price">
                        {{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}
                        {{ $n_price }}
                        {{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}
                    </span>
                    @if ($isFlash)
                        <span class="previous-price">
                            {{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}
                            <span>{{ $item->current_price }}</span>
                            {{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}
                        </span>
                    @elseif($item->previous_price > 0)
                        <span class="previous-price">
                            {{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}
                            <span>{{ $item->previous_price }}</span>
                            {{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="pagination-wrap text-center">
    <ul class="pagination justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <nav class="pagination-nav">
                    {{ $items->appends(['minprice' => request()->input('minprice'), 'maxprice' => request()->input('maxprice'), 'category_id' => request()->input('category_id'), 'type' => request()->input('type')])->links() }}
                </nav>
            </div>
        </div>
    </ul>
</div>
