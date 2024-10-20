@extends('user.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('user.partials.rtl-style')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('About Us Section') }}</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{route('user-dashboard')}}">
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
                <a href="#">{{ __('About Us Section') }}</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-title">{{ __('Update About Us Section') }}</div>
                        </div>
                        <div class="col-lg-4">
                            @includeIf('user.partials.languages')
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <form id="aboutUs"
                                  action="{{ route('user.home_page.update_about_us_section', ['language' => request()->input('language')]) }}"
                                  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label for="image"><strong>{{ __('Image') . '*' }}</strong></label>
                                            </div>
                                            <div class="col-md-12 showImage mb-3">
                                                <img
                                                    src="{{isset($data->image) ? \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ABOUT_US_SECTION_IMAGE,$data->image,$userBs) : asset('assets/tenant/image/default.jpg')}}"
                                                    alt="..."
                                                    class="img-thumbnail">
                                            </div>
                                            <input type="file" name="image" id="image" class="form-control">
                                            <p id="errimage" class="mt-2 mb-0 text-danger em"></p>
                                            <p class="text-warning mb-0">Upload 520 X 620 image for best quality</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('Title') }}</label>
                                    <input type="text" class="form-control" name="title"
                                           value="{{ empty($data->title) ? '' : $data->title }}"
                                           placeholder="Enter About Us Section Title">
                                    <p id="errtitle" class="mt-2 mb-0 text-danger em"></p>
                                </div>

                                @if($userBs->theme_version != 4)
                                <div class="form-group">
                                    <label for="">{{ __('Subtitle') }}</label>
                                    <input type="text" class="form-control" name="subtitle"
                                           value="{{ empty($data->subtitle) ? '' : $data->subtitle }}"
                                           placeholder="Enter About Us Section Subtitle">
                                    <p id="errsubtitle" class="mt-2 mb-0 text-danger em"></p>
                                </div>
                                @endif

                                <div class="form-group">
                                    <label for="">{{ __('Text') }}</label>
                                    <textarea class="form-control" name="text" placeholder="Enter About Us Section Text"
                                              rows="5">{{ empty($data->text) ? '' : $data->text }}</textarea>
                                    <p id="errtext" class="mt-2 mb-0 text-danger em"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" id="submitAboutUs" class="btn btn-success">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if($userBs->theme_version == 4)
    <!---- About us Points ---->
    @include('user.home-page.about-us-point.index')
    {{-- create modal --}}
    @include('user.home-page.about-us-point.create')
    @endif
@endsection
