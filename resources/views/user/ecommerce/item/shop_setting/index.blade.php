@extends('user.layout')

@php
$selLang = \App\Models\User\Language::where('code', request()->input('language'))->first();
$langs = \App\Models\User\Language::where('user_id', Auth::guard('web')->user()->id)->get();
@endphp
@if (!empty($selLang) && $selLang->rtl == 1)
    @section('styles')
        <style>
            form:not(.modal-form) input,
            form:not(.modal-form) textarea,
            form:not(.modal-form) select,
            select[name='language'] {
                direction: rtl;
            }

            form:not(.modal-form) .note-editor.note-frame .note-editing-area .note-editable {
                direction: rtl;
                text-align: right;
            }

        </style>
    @endsection
@endif

@section('content')
    <div class="page-header">
        <h4 class="page-title">Shipping Charge</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('user-dashboard') }}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Shop Management</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Shipping Charges</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block">Shipping Charge</div>
                        </div>
                        <div class="col-lg-3">
                            @if (!empty($langs))
                                <select name="language" class="form-control"
                                    onchange="window.location='{{ url()->current() . '?language=' }}'+this.value">
                                    <option value="" selected disabled>Select a Language</option>
                                    @foreach ($langs as $lang)
                                        <option value="{{ $lang->code }}"
                                            {{ $lang->code == request()->input('language') ? 'selected' : '' }}>
                                            {{ $lang->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                                data-target="#createModal"><i class="fas fa-plus"></i> Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($shippings) == 0)
                                <h3 class="text-center">No Shipping Charge</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Title</th>
                                                <th scope="col">Text</th>
                                                <th scope="col">Charge</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($shippings as $key => $shipping)
                                                <tr>
                                                    <td>
                                                        {{ $shipping->title }}
                                                    </td>
                                                    <td>
                                                        {{ $shipping->text }}
                                                    </td>

                                                    <td>
                                                        {{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}{{ $shipping->charge }}{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}
                                                    </td>

                                                    <td>
                                                        <a class="btn btn-secondary btn-sm editbtn"
                                                            href="{{ route('user.shipping.edit', $shipping->id) . '?language=' . request()->input('language') }}">
                                                            <span class="btn-label">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                            Edit
                                                        </a>
                                                        <form class="deleteform d-inline-block"
                                                            action="{{ route('user.shipping.delete') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="shipping_id"
                                                                value="{{ $shipping->id }}">
                                                            <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                                                <span class="btn-label">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="d-inline-block mx-auto">
                            {{ $shippings->appends(['language' => request()->input('language')])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Create Service Category Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Shipping Charge</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="ajaxForm" class="modal-form" action="{{ route('user.shipping.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">{{ __('Language') }} <span class="text-danger">*</span></label>
                            <select id="language" name="user_language_id" class="form-control">
                                <option value="" selected disabled>{{ __('Select a language') }}</option>
                                @foreach ($langs as $lang)
                                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                            <p id="erruser_language_id" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="" placeholder="Enter title">
                            <p id="errtitle" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Sort Text <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="text" value="" placeholder="Enter text">
                            <p id="errtext" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Charge ({{$userBs->base_currency_symbol}}) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control ltr" name="charge" value="" placeholder="Enter charge">
                            <p id="errcharge" class="mb-0 text-danger em"></p>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            // make input fields RTL
            $("select[name='language_id']").on('change', function() {
                $(".request-loader").addClass("show");
                let url = "{{ url('/') }}/admin/rtlcheck/" + $(this).val();
                console.log(url);
                $.get(url, function(data) {
                    $(".request-loader").removeClass("show");
                    if (data == 1) {
                        $("form.modal-form input").each(function() {
                            if (!$(this).hasClass('ltr')) {
                                $(this).addClass('rtl');
                            }
                        });
                        $("form.modal-form select").each(function() {
                            if (!$(this).hasClass('ltr')) {
                                $(this).addClass('rtl');
                            }
                        });
                        $("form.modal-form textarea").each(function() {
                            if (!$(this).hasClass('ltr')) {
                                $(this).addClass('rtl');
                            }
                        });
                        $("form.modal-form .nicEdit-main").each(function() {
                            $(this).addClass('rtl text-right');
                        });

                    } else {
                        $("form.modal-form input, form.modal-form select, form.modal-form textarea")
                            .removeClass('rtl');
                        $("form.modal-form .nicEdit-main").removeClass('rtl text-right');
                    }
                })
            });
        });
    </script>
@endsection
