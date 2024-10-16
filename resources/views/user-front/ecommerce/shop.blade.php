@extends('user-front.common.layout')
@section('style')
    @include('user-front.ecommerce.partials.styles')
@endsection

@section('tab-title')
    {{ $keywords['Shop'] ?? 'Shop' }}
@endsection
@php
    Config::set('app.timezone', $userBs->timezoneinfo->timezone ?? '');
@endphp
@section('meta-description', !empty($userSeo) ? $userSeo->shop_meta_description : '')
@section('meta-keywords', !empty($userSeo) ? $userSeo->shop_meta_keywords : '')
@section('page-name')
    {{ $keywords['Shop'] ?? 'Shop' }}
@endsection
@section('br-name')
    {{ $keywords['Shop'] ?? 'Shop' }}
@endsection
@section('content')

    <!------=== breadcum---------->
    @includeIf('user-front.common.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => $pageHeading->shop_page_title ?? 'Shop' ])

    <!--====== Shop Section Start ======-->
    <section class="shop-page-wrap section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 order-1">
                    <div class="row shop-top-bar justify-content-between">
                        <div class="col-lg-3 col-6 col-tiny-12">
                            <div class="product-search">
                                <input type="search" class="input-search" name="search"
                                    value="{{ request()->input('search') ? request()->input('search') : '' }}"
                                    placeholder="{{ $keywords['Search_your_keyword'] ?? __('Search your keyword') }}">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-lg-2 col-6 col-tiny-12">
                            <div class="product-shorting">
                                <select class="form-select" name="type" id="type_sort">
                                    <option value="0" disabled selected>{{ $keywords['Sort_By'] ?? 'Sort By' }}
                                    </option>
                                    <option value="new" {{ request('type') == 'new' ? 'selected' : '' }}>
                                        {{ $keywords['Latest'] ?? 'Latest' }}
                                    </option>
                                    <option value="old" {{ request('type') == 'old' ? 'selected' : '' }}>
                                        {{ $keywords['Oldest'] ?? 'Oldest' }}
                                    </option>
                                    <option value="high-to-low" {{ request('type') == 'high-to-low' ? 'selected' : '' }}>
                                        {{ $keywords['Price_Hight_to_Low'] ?? 'Price:Hight-to-Low' }}</option>
                                    <option value="low-to-high" {{ request('type') == 'low-to-high' ? 'selected' : '' }}>
                                        {{ $keywords['Price_Low_to_High'] ?? 'Price:Low-to-High' }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-10 order-3 order-lg-2">
                    <div class="shop-sidebar">
                        <div class="widget product-cat-widget">
                            <h4 class="widget-title">{{ $keywords['Category'] ?? 'Category' }}</h4>
                            <ul>
                                <li class="">
                                    <a href="{{ route('front.user.shop', getParam()) }}"
                                        class="category-id cursor-pointer">
                                        <div class="single-list-category d-flex justify-content-between align-items-center">
                                            <div class="category-text">
                                                <h6
                                                    class="title {{ request()->input('category') == '' ? 'active-search' : '' }} ">
                                                    {{ $keywords['All'] ?? 'All' }} </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('front.user.shop', getParam()) . '?category=' . urlencode($category->slug) }}"
                                            class="category-id cursor-pointer {{ request()->input('category') == $category->slug ? 'active-search' : '' }}">{{ $category->name }}</a>
                                        @if (request()->input('category') == $category->slug)
                                            @if ($category->subcategories->count() > 0)
                                                <ul class="ml-20">
                                                    @foreach ($category->subcategories as $sub)
                                                        <li>
                                                            <a href="{{ route('front.user.shop', getParam()) . '?category=' . urlencode($category->slug) . '&subcategory=' . urlencode($sub->slug) }}"
                                                                class="subcategory-id cursor-pointer {{ request('subcategory') == $sub->slug ? 'active-search' : '' }}"><i
                                                                    class="fa fa-angle-right"></i>
                                                                {{ $sub->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget product-filter-widget">
                            <div class="form-check">
                                <input class="form-check-input sale"
                                    {{ (request()->input('sale') == 'all' ? 'checked' : request()->input('sale') == '') ? 'checked' : '' }}
                                    value="all" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    {{ $keywords['All'] ?? 'All' }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input sale"
                                    {{ request()->input('sale') == 'flash' ? 'checked' : '' }} value="flash"
                                    type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    {{ $keywords['Flash_Sale'] ?? 'Flash Sale' }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input sale"
                                    {{ request()->input('sale') == 'onsale' ? 'checked' : '' }} value="onsale"
                                    type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    {{ $keywords['On_Sale'] ?? 'On Sale' }}
                                </label>
                            </div>
                        </div>

                        <div class="widget product-filter-widget">
                            <h4 class="widget-title">{{ $keywords['Filter_By_Price'] ?? 'Filter By Price' }}</h4>
                            <div id="slider-range" class="slider-range"></div>
                            <div class="range">
                                <input type="text" min="0"
                                    value="{{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}{{ request()->input('minprice') ?: $min_price ?? 0 }}{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}"
                                    name="minprice" id="amount1" readonly />
                                <input type="text" min="0"
                                    value="{{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}{{ request()->input('maxprice') ?: $max_price ?? 0 }}{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}"
                                    name="maxprice" id="amount2" readonly />
                                <button class="filter-button main-btn main-btn-2 template-btn"
                                    type="submit">{{ $keywords['Filter'] ?? 'Filter' }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-2 order-lg-2">
                    @include('user-front.ecommerce.include.product')
                </div>
            </div>
        </div>
    </section>
    <!--====== Shop Section End ======-->
    <form id="searchForm" class="d-none" action="{{ route('front.user.shop', getParam()) }}" method="get">
        <input type="hidden" id="search" name="search"
            value="{{ !empty(request()->input('search')) ? request()->input('search') : '' }}">
        <input type="hidden" id="minprice" name="minprice"
            value="{{ !empty(request()->input('minprice')) ? request()->input('minprice') : '' }}">
        <input type="hidden" id="maxprice" name="maxprice"
            value="{{ !empty(request()->input('maxprice')) ? request()->input('maxprice') : '' }}">
        <input type="hidden" name="category"
            value="{{ !empty(request()->input('category')) ? request()->input('category') : null }}">
        <input type="hidden" name="subcategory"
            value="{{ !empty(request()->input('subcategory')) ? request()->input('subcategory') : null }}">
        <input type="hidden" name="sale" id="sale"
            value="{{ !empty(request()->input('sale')) ? request()->input('sale') : null }}">
        <input type="hidden" name="type" id="type"
            value="{{ !empty(request()->input('type')) ? request()->input('type') : 'new' }}">
        <button id="searchButton" type="submit"></button>
    </form>
    {{-- Variation Modal Starts --}}
    @includeIf('user-front.ecommerce.partials.variation-modal')
    {{-- Variation Modal Ends --}}

@endsection

@section('script')
    @include('user-front.ecommerce.partials.scripts')

    <script>
        $(document).ready(function() {
            $('#type_sort').niceSelect('destroy');
        });
    </script>
    <script>
        $(document).ready(function() {
            const items = document.querySelectorAll('.ui-slider-range');
            for (let i = 0; i < items.length; i++) {
                if (i != 0) {
                    items[i].className = '';
                    items[i].className = '';
                }
            }
        });
    </script>
    <script>
        var maxprice = 0;
        var minprice = 0;

        var min_price = {{ $min_price ?? 0 }};
        var max_price = {{ $max_price ?? 0 }};

        var typeSort = '';
        var category = '';
        var attributes = '';
        var review = '';
        var search = '';
        var countryId = '';
        var stateId = '';
        var cityId = '';




        $(document).on('click', '.filter-button', function() {
            let filterval1 = $('#amount1').val();
            let filterval2 = $('#amount2').val();
            minprice = filterval1.replace('$', '');
            maxprice = filterval2.replace('$', '');
            $('#maxprice').val(maxprice);
            $('#minprice').val(minprice);
            $('#searchButton').click();
        });

        $(document).on('change', '#type_sort', function() {
            typeSort = $(this).val();
            $('#type').val(typeSort);
            $('#searchButton').click();
        })
        $(document).on('change', '.sale', function() {
            sale = $(this).val();
            $('#sale').val(sale);
            $('#searchButton').click();
        })
        $(document).ready(function() {
            typeSort = $('#type_sort').val();
            $('#type').val(typeSort);
        })
        $(document).on('click', '.review_val', function() {
            review = $(".review_val:checked").val();
            $('#review').val(review);
            $('#searchButton').click();
        })
        $(document).on('change', '.input-search', function(e) {
            var key = e.which;
            search = $('.input-search').val();
            $('#search').val(search);
            $('#searchButton').click();
            return false;
        })
    </script>
    @php
        $selMinPrice = request()->input('minprice') ? request()->input('minprice') : $min_price;
        $selMaxPrice = request()->input('maxprice') ? request()->input('maxprice') : $max_price;
    @endphp
    <script>
        $(document).ready(function() {
            'use strict';
            $(".slider-range").slider({
                range: true,
                min: {{ $min_price }},
                max: {{ $max_price }},
                values: [{{ $selMinPrice }}, {{ $selMaxPrice }}],
                slide: function(event, ui) {
                    $("#amount1").val(
                        `{{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}` +
                        ui.values[0] + ".00" +
                        `{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}`
                    );
                    $("#amount2").val(
                        `{{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}` +
                        ui.values[1] + ".00" +
                        `{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}`
                    );
                }
            });
        });
    </script>
@endsection
