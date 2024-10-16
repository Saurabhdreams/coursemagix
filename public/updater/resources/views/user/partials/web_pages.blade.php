
@if (!is_null($package))
    @if (!empty($permissions) && in_array('Ecommerce', $permissions))
        {{-- Shop Management --}}
        <li
            class="nav-item
    @if (request()->path() == 'user/shop/category') active
    @elseif(request()->path() == 'user/shop/subcategory') active
    @elseif(request()->is('user/shop/subcategory/*/edit')) active
    @elseif(request()->is('user/shop/category/*/edit')) active
    @elseif(request()->path() == 'user/shop/item') active
    @elseif(request()->routeIs('user.item.type')) active
    @elseif(request()->is('user/shop/item/*/edit')) active
    @elseif(request()->path() == 'user/shop/item/all/orders') active
    @elseif(request()->path() == 'user/shop/item/pending/orders') active
    @elseif(request()->path() == 'user/shop/item/processing/orders') active
    @elseif(request()->path() == 'user/shop/item/completed/orders') active
    @elseif(request()->path() == 'user/shop/item/rejected/orders') active
    @elseif(request()->routeIs('user.item.variations')) active
    @elseif(request()->routeIs('user.item.create')) active
    @elseif(request()->routeIs('user.item.details')) active
    @elseif(request()->path() == 'user/shop/coupon') active
    @elseif(request()->routeIs('user.coupon.edit')) active
    @elseif(request()->path() == 'user/shop/shipping') active
    @elseif(request()->routeIs('user.shipping.edit')) active
    @elseif(request()->routeIs('user.item.settings')) active
    @elseif(request()->path() == 'user/shop/item/orders/report') active @endif">
            <a data-toggle="collapse" href="#shopManagement">
                <i class="fas fa-store-alt"></i>
                <p>Shop Management</p>
                <span class="caret"></span>
            </a>
            <div class="collapse
    @if (request()->path() == 'user/shop/category') show
    @elseif(request()->path() == 'user/shop/subcategory') show
    @elseif(request()->is('user/shop/subcategory/*/edit')) show
    @elseif(request()->is('user/shop/category/*/edit')) show
    @elseif(request()->routeIs('user.item.type')) show
    @elseif(request()->path() == 'user/shop/item') show
    @elseif(request()->is('user/shop/item/*/edit')) show
    @elseif(request()->path() == 'user/shop/item/all/orders') show
    @elseif(request()->path() == 'user/shop/item/pending/orders') show
    @elseif(request()->path() == 'user/shop/item/processing/orders') show
    @elseif(request()->path() == 'user/shop/item/completed/orders') show
    @elseif(request()->path() == 'user/shop/item/rejected/orders') show
    @elseif(request()->routeIs('user.item.create')) show
    @elseif(request()->routeIs('user.item.details')) show
    @elseif(request()->path() == 'user/shop/coupon') show
    @elseif(request()->routeIs('user.coupon.edit')) show
    @elseif(request()->routeIs('user.item.variations')) show
    @elseif(request()->path() == 'user/shop/shipping') show
    @elseif(request()->routeIs('user.shipping.edit')) show
    @elseif(request()->routeIs('user.item.settings')) show
    @elseif(request()->path() == 'user/shop/item/orders/report') show @endif"
                id="shopManagement">
                <ul class="nav nav-collapse">
                    <li class="@if (request()->routeIs('user.item.settings')) active @endif">
                        <a href="{{ route('user.item.settings') }}">
                            <span class="sub-item">Settings</span>
                        </a>
                    </li>
                    <li
                        class="
        @if (request()->path() == 'user/shop/shipping') active
        @elseif(request()->routeIs('user.shipping.edit')) active @endif">
                        <a href="{{ route('user.shipping.index') . '?language=' . $default->code }}">
                            <span class="sub-item">Shipping Charges</span>
                        </a>
                    </li>
                    <li
                        class="
    @if (request()->path() == 'user/shop/coupon') active
    @elseif(request()->routeIs('user.coupon.edit')) active
    @elseif (request()->path() == 'user/shop/category') active
    @elseif(request()->path() == 'user/shop/category/*/edit') active
    @elseif(request()->path() == 'user/shop/subcategory') active
    @elseif(request()->path() == 'user/shop/subcategory/*/edit') active
    @elseif(request()->path() == 'user/shop/item') active
    @elseif(request()->is('user/shop/subcategory/*/edit')) active @endif">
                        <a href="{{ route('user.coupon.index') }}">
                            <span class="sub-item">{{ __('Coupons') }}</span>
                        </a>
                    </li>
                    <li class="submenu">
                        <a data-toggle="collapse" href="#productManagement"
                            aria-expanded="{{ request()->path() == 'user/category' || request()->path() == 'user/subcategory' || request()->is('user/category/*/edit') || request()->is('user/subcategory/*/edit') || request()->routeIs('user.item.type') || request()->routeIs('user.item.variations') || request()->routeIs('user.item.create') || request()->routeIs('user.item.index') || request()->routeIs('user.item.edit') ? 'true' : 'false' }}">
                            <span class="sub-item">{{ __('Manage Items') }}</span>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                @if (request()->path() == 'user/shop/category') show
                @elseif(request()->is('user/shop/category/*/edit')) show
                @elseif(request()->path() == 'user/shop/subcategory') show
                @elseif(request()->is('user/shop/subcategory/*/edit')) show
                @elseif(request()->routeIs('user.item.type')) show
                @elseif(request()->routeIs('user.item.variations')) show
                @elseif(request()->routeIs('user.item.create')) show
                @elseif(request()->routeIs('user.item.index')) show
                @elseif(request()->routeIs('user.item.edit')) show @endif"
                            id="productManagement" style="">
                            <ul class="nav nav-collapse subnav">
                                <li
                                    class="
                        @if (request()->path() == 'user/shop/category') active
                        @elseif(request()->is('user/shop/category/*/edit')) active @endif">
                                    <a href="{{ route('user.itemcategory.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">{{ __('Categories') }}</span>
                                    </a>
                                </li>
                                <li
                                    class="
                        @if (request()->path() == 'user/shop/subcategory') active
                        @elseif(request()->is('user/shop/subcategory/*/edit')) active @endif">
                                    <a href="{{ route('user.itemsubcategory.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">{{ __('Subcategories') }}</span>
                                    </a>
                                </li>
                                <li
                                    class="
                        @if (request()->routeIs('user.item.type')) active
                        @elseif(request()->routeIs('user.item.create')) active @endif">
                                    <a href="{{ route('user.item.type') }}">
                                        <span class="sub-item">Add Item</span>
                                    </a>
                                </li>
                                <li
                                    class="
                        @if (request()->path() == 'user/shop/item') active
                        @elseif(request()->is('user/shop/item/*/edit')) active
                        @elseif(request()->routeIs('user.item.variations')) active @endif">
                                    <a href="{{ route('user.item.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">Items</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="submenu">
                        <a data-toggle="collapse" href="#manageOrders"
                            aria-expanded="{{ request()->routeIs('user.all.item.orders') || request()->routeIs('user.pending.item.orders') || request()->routeIs('user.processing.item.orders') || request()->routeIs('user.completed.item.orders') || request()->routeIs('user.rejected.item.orders') || request()->routeIs('user.item.details') || request()->path() == 'admin/product/orders/report' ? 'true' : 'false' }}">
                            <span class="sub-item">Manage Orders</span>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
    @if (request()->routeIs('user.all.item.orders')) show
    @elseif(request()->routeIs('user.pending.item.orders')) show
    @elseif(request()->routeIs('user.processing.item.orders')) show
    @elseif(request()->routeIs('user.completed.item.orders')) show
    @elseif(request()->routeIs('user.rejected.item.orders')) show
    @elseif(request()->routeIs('user.item.details')) show
    @elseif(request()->path() == 'user/shop/item/orders/report') show @endif"
                            id="manageOrders" style="">
                            <ul class="nav nav-collapse subnav">
                                <li class="@if (request()->path() == 'user/shop/item/all/orders') active @endif">
                                    <a href="{{ route('user.all.item.orders') }}">
                                        <span class="sub-item">All Orders</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'user/shop/item/pending/orders') active @endif">
                                    <a href="{{ route('user.pending.item.orders') }}">
                                        <span class="sub-item">Pending Orders</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'user/shop/item/processing/orders') active @endif">
                                    <a href="{{ route('user.processing.item.orders') }}">
                                        <span class="sub-item">Processing Orders</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'user/shop/item/completed/orders') active @endif">
                                    <a href="{{ route('user.completed.item.orders') }}">
                                        <span class="sub-item">Completed Orders</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'user/shop/item/rejected/orders') active @endif">
                                    <a href="{{ route('user.rejected.item.orders') }}">
                                        <span class="sub-item">Rejected Orders</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'user/shop/item/orders/report') active @endif">
                                    <a href="{{ route('user.orders.report') }}">
                                        <span class="sub-item">Report</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        {{-- -End Shop Management --}}
    @endif
@endif
