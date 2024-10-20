@extends('user-front.common.layout')
@section('style')
    @include('user-front.ecommerce.partials.styles')
@endsection

@section('pageHeading')
    {{ $keywords['Billing_Details'] ?? __('Billing Details') }}
@endsection

@section('content')
    @includeIf('user-front.common.partials.breadcrumb', [
        'breadcrumb' => $bgImg->breadcrumb,
        'title' => $keywords['Billing_Details'] ?? __('Billing Details'),
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
                                    <div class="title mb-3">
                                        <h4>{{ $keywords['Billing_Details'] ?? __('Billing Details') }}</h4>
                                    </div>
                                    <div class="edit-info-area">
                                        <form action="{{ route('customer.billing-update', getParam()) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <input type="text" class="form_control"
                                                        placeholder="{{ $keywords['first_name'] ?? __('First Name') }}"
                                                        name="billing_fname"
                                                        value="{{ convertUtf8(Auth::guard('customer')->user()->billing_fname) }}">
                                                    @error('billing_fname')
                                                        <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <input type="text" class="form_control"
                                                        placeholder="{{ $keywords['last_name'] ?? __('Last Name') }}"
                                                        name="billing_lname"
                                                        value="{{ convertUtf8(Auth::guard('customer')->user()->billing_lname) }}">
                                                    @error('billing_lname')
                                                        <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <input type="email" class="form_control"
                                                        placeholder="{{ $keywords['email'] ?? __('Email') }}"
                                                        name="billing_email"
                                                        value="{{ convertUtf8(Auth::guard('customer')->user()->billing_email) }}">
                                                    @error('billing_email')
                                                        <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <input type="text" class="form_control"
                                                        placeholder="{{ $keywords['phone'] ?? __('Phone') }}"
                                                        name="billing_number"
                                                        value="{{ convertUtf8(Auth::guard('customer')->user()->billing_number) }}">
                                                    @error('billing_number')
                                                        <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <input type="text" class="form_control"
                                                        placeholder="{{ $keywords['city'] ?? __('City') }}"
                                                        name="billing_city"
                                                        value="{{ convertUtf8(Auth::guard('customer')->user()->billing_city) }}">
                                                    @error('billing_city')
                                                        <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <input type="text" class="form_control"
                                                        placeholder="{{ $keywords['state'] ?? __('State') }}"
                                                        name="billing_state"
                                                        value="{{ convertUtf8(Auth::guard('customer')->user()->billing_state) }}">
                                                    @error('billing_state')
                                                        <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <input type="text" class="form_control"
                                                        placeholder="{{ $keywords['country'] ?? __('Country') }}"
                                                        name="billing_country"
                                                        value="{{ convertUtf8(Auth::guard('customer')->user()->billing_country) }}">
                                                    @error('billing_country')
                                                        <p class="text-danger mb-2">{{ convertUtf8($message) }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <textarea name="billing_address" class="form_control" placeholder="{{ $keywords['Address'] ?? __('Address') }}">{{ convertUtf8(Auth::guard('customer')->user()->billing_address) }}</textarea>
                                                    @error('billing_address')
                                                        <p class="text-danger">{{ convertUtf8($message) }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-button">
                                                        <button type="submit"
                                                            class="btn btn-form">{{ $keywords['Submit'] ?? __('Submit') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
    @include('user-front.ecommerce.partials.scripts')
@endsection
