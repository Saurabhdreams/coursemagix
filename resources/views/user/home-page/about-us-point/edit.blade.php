@extends('user.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('About Us Section') }}</h4>
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
                <a href="#">{{ __('Home Page') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('About Us Section Point') }}</a>
            </li>
            <li class="nav-item">
              <a href="#">{{ __('Edit') }}</a>
          </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-title">{{ __('About Us Points') }}</div>
                        </div>
                        <div class="col-lg-4">
                            <a href="{{ route('user.home_page.about_us_section', ['language' => request()->input('language')])}}" 
                                class="btn btn-primary btn-sm float-lg-right float-left"><i class="fas fa-backward"></i>
                                {{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-8 m-auto">

                            <div class="card">
                                <div class="card-body">
                                    <form id="ajaxEditForm"
                                        action="{{ route('user.home_page.update_about-us-point',['id' => $point->id]) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="">{{ __('Icon') }} **</label>
                                            <div class="btn-group d-block">
                                                <button type="button" class="btn btn-primary iconpicker-component"><i
                                                        class="{{ $point->icon }}" id="inicon"></i></button>
                                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                                    data-selected="fa-car" data-toggle="dropdown">
                                                </button>
                                                <div class="dropdown-menu"></div>
                                            </div>
                                            <input id="inputIcon" type="hidden" name="about_us_point_icon" value="{{ $point->icon }}">
                                            <div class="mt-2">
                                                <small>{{ __('NB: click on the dropdown icon to select a about us point icon.') }}</small>
                                            </div>
                                            <p id="errErr_about_us_point_icon" class="mt-2 mb-0 text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ __('Title') . '*' }}</label>
                                            <input type="text" class="form-control" value="{{ $point->title }}" name="about_us_point_title"
                                                placeholder="Enter Title">
                                            <p id="editErr_about_us_point_title" class="mt-1 mb-0 text-danger em"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ __('Text') . '*' }}</label>
                                            <textarea type="text" class="form-control"  name="about_us_point_text" placeholder="Enter Text" value="{{ $point->text }}"
                                                rows="5">{{ $point->text }}</textarea>
                                            <p id="editErr_about_us_point_text" class="mt-1 mb-0 text-danger em"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">{{ __('Serial Number') . '*' }}</label>
                                            <input type="number" class="form-control ltr" name="serial_number"
                                                placeholder="Enter Serial Number" value="{{$point->serial_number}}">
                                            <p id="editErr_serial_number" class="mt-1 mb-0 text-danger em"></p>
                                            <p class="text-warning mt-2 mb-0">
                                                <small>{{ __('The higher the serial number is, the later the testimonial will be shown.') }}</small>
                                            </p>
                                        </div>

                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button id="updateBtn" type="button" class="btn btn-primary ">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
