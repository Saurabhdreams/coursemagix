@extends('user-front.common.layout')
@section('pageHeading')
    {{ $keywords['My_Orders'] ?? __('My Orders') }}
@endsection

@section('content')
    @includeIf('user-front.common.partials.breadcrumb', [
        'breadcrumb' => $bgImg->breadcrumb,
        'title' => $keywords['My_Orders'] ?? __('My Orders'),
    ])

    <!-- Start User Enrolled Course Section -->
    <section class="user-dashboard">
        <div class="container">
            <div class="row">
                @includeIf('user-front.common.customer.common.side-navbar')
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="user-profile-details mb-40">
                                <div class="account-info">
                                    <div class="title mb-2">
                                        <h4>{{ $keywords['My_Orders'] ?? __('My Orders') }}</h4>
                                    </div>
                                    <div class="main-info">
                                        <div class="main-table">
                                            <div class="table-responsive">
                                                <table id="order_table"
                                                    class="dataTables_wrapper table-striped dt-bootstrap4"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ $keywords['order_number'] ?? __('order number') }}</th>
                                                            <th>{{ $keywords['date'] ?? __('date') }}</th>
                                                            <th>{{ $keywords['total'] ?? __('total') }}</th>
                                                            <th>{{ $keywords['status'] ?? __('status') }}</th>
                                                            <th>{{ $keywords['action'] ?? __('action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($orders)
                                                            @foreach ($orders as $order)
                                                                <tr>
                                                                    <td>{{ $order->order_number }}</td>
                                                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                                                    <td>{{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}
                                                                        {{ $order->total }}
                                                                        {{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}
                                                                    </td>
                                                                    <td> <span
                                                                            class="front-status-btn {{ $order->order_status }}">{{ $order->order_status }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('customer.orders-details', ['id' => $order->id, getParam()]) }}"
                                                                            class="btn base-bg">{{ $keywords['details'] ?? __('Details') }}</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr class="text-center">
                                                                <td colspan="4">
                                                                    {{ $keywords['no_items'] ?? __('No Items found!') }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User Enrolled Course Section -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#order_table').DataTable({
                ordering: false
            });
        });
    </script>
@endsection
