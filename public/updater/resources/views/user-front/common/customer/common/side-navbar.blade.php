@php
    $shopSettings = App\Models\Ecommerce\UserShopSetting::where('user_id', $user->id)->first();
@endphp
<div class="col-lg-3">
    <div class="user-sidebar">
        <ul class="links">
            <li>
                <a href="{{ route('customer.dashboard', getParam()) }}"
                    class="{{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">{{ $keywords['dashboard'] ?? __('Dashboard') }}</a>
            </li>

            <li>
                <a href="{{ route('customer.my_courses', getParam()) }}"
                    class="{{ request()->routeIs('customer.my_courses') ? 'active' : '' }}">{{ $keywords['my_courses'] ?? __('My Courses') }}</a>
            </li>

            @if (!empty($packagePermissions) && in_array('Ecommerce', $packagePermissions))
                @if ($shopSettings->is_shop == 1 && $shopSettings->catalog_mode == 0)
                    <li>
                        <a href="{{ route('customer.my_orders', getParam()) }}"
                            class="{{ request()->routeIs('customer.my_orders') || request()->routeIs('customer.orders-details') ? 'active' : '' }}">{{ $keywords['My_Orders'] ?? __('My Orders') }}</a>
                    </li>
                @endif
                <li>
                    <a class=" @if (request()->routeIs('customer.wishlist')) active @endif"
                        href="{{ route('customer.wishlist', getParam()) }}">
                        {{ $keywords['My_Wishlist'] ?? __('My Wishlist') }}</a>
                </li>

                <li>
                    <a href="{{ route('customer.shpping-details', getParam()) }}"
                        class="@if (request()->routeIs('customer.shpping-details')) active @endif">
                        {{ $keywords['Shipping_Details'] ?? __('Shipping Details') }}</a>
                </li>
                <li>
                    <a href="{{ route('customer.billing-details', getParam()) }}"
                        class="@if (request()->routeIs('customer.billing-details')) active @endif">
                        {{ $keywords['Billing_Details'] ?? __('Billing Details') }}</a>
                </li>

            @endif

            <li>
                <a href="{{ route('customer.purchase_history', getParam()) }}" target="_blank">
                    {{ $keywords['Purchase_History'] ?? __('Purchase History') }}
                </a>
            </li>

            <li>
                <a href="{{ route('customer.edit_profile', getParam()) }}"
                    class="{{ request()->routeIs('customer.edit_profile') ? 'active' : '' }}">{{ $keywords['edit_profile'] ?? __('Edit Profile') }}</a>
            </li>

            <li>
                <a href="{{ route('customer.change_password', getParam()) }}"
                    class="{{ request()->routeIs('customer.change_password') ? 'active' : '' }}">{{ $keywords['change_password'] ?? __('Change Password') }}</a>
            </li>

            <li>
                <a href="{{ route('customer.logout', getParam()) }}">{{ $keywords['logout'] ?? __('Logout') }}</a>
            </li>
        </ul>
    </div>
</div>
