@extends('user.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('user.partials.rtl-style')

@section('content')

    <div class="page-header">
        <h4 class="page-title">
            @if($themeInfo->theme_version != 6)
            {{ __('Features Section') }}
            @else
            {{ __('Video Section') }}
            @endif

        </h4>
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
                <a href="#">
                    @if($themeInfo->theme_version != 6)
                    {{ __('Features Section') }}
                    @else
                    {{ __('Video Section') }}
                    @endif
                </a>
            </li>
        </ul>
    </div>

    @if ($themeInfo->theme_version == 1 || $themeInfo->theme_version == 4 ||  $themeInfo->theme_version == 5 || $themeInfo->theme_version == 6 )
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="card-title">

                                    @if($themeInfo->theme_version != 6)
                                    {{ __('Features Section') }}
                                    @else
                                    {{ __('Video Section') }}
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <form id="featureSectionForm"
                                      action="{{ route('user.home_page.update_feature_section_image') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="theme_version" value="{{ $themeInfo->theme_version }}">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="col-12 mb-2">
                                                    <label for="image"><strong>{{ __('Image') . '*' }}</strong></label>
                                                </div>
                                                <div class="col-md-12 showImage mb-3">
                                                    <img
                                                        src="{{\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE,$data->features_section_image,$userBs)}}"
                                                        alt="..."
                                                        class="img-thumbnail">
                                                </div>
                                                <input type="file" name="features_section_image" id="image"
                                                       class="form-control">
                                                <p id="errfeatures_section_image" class="mt-2 mb-0 text-danger em"></p>
                                                <p class="text-warning mb-0">Upload 625 X 810 image for best quality</p>
                                            </div>
                                           @if($themeInfo->theme_version == 4 || $themeInfo->theme_version == 5  || $themeInfo->theme_version == 6 )
                                            <div class="form-group">
                                                    <label for="">
                                                        <strong>
                                                        @if($themeInfo->theme_version == 4  || $themeInfo->theme_version == 5 || $themeInfo->theme_version == 6 )
                                                        {{'Video'}}
                                                        @endif
                                                        {{ __('Url')}}
                                                        @if($themeInfo->theme_version == 1  || $themeInfo->theme_version == 2 || $themeInfo->theme_version == 3 )
                                                        {{'*'}}
                                                        @endif
                                                        </strong>
                                                </label>
                                                    <input type="text" name="url" placeholder="Enter Url" class="form-control" value="{{ $data->feature_url }}">
                                                    <p id="errurl" class="mt-2 mb-0 text-danger em"></p>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" id="submitFeatureSectionBtn" class="btn btn-success">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($themeInfo->theme_version != 6)
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title">{{ __('Features') }}</div>
                        </div>

                        <div class="col-lg-3">
                            @includeIf('user.partials.languages')
                        </div>

                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a href="#" data-toggle="modal" data-target="#createModal"
                               class="btn btn-primary btn-sm float-lg-right float-left"><i
                                    class="fas fa-plus"></i> {{ __('Add Feature') }}</a>

                            <button class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete"
                                    data-href="{{ route('user.home_page.bulk_delete_feature') }}">
                                <i class="flaticon-interface-5"></i> {{ __('Delete') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if (count($features) == 0)
                                <h3 class="text-center mt-2">{{ __('NO FEATURE FOUND') . '!' }}</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                        <tr>
                                            <th scope="col">
                                                <input type="checkbox" class="bulk-check" data-val="all">
                                            </th>

                                            @if ($themeInfo->theme_version == 3)
                                                <th scope="col">{{ __('Icon') }}</th>
                                            @endif

                                            @if ($themeInfo->theme_version == 4 || $themeInfo->theme_version == 5)
                                                <th scope="col">{{ __('Image') }}</th>
                                            @endif
                                            @if ($themeInfo->theme_version != 5)
                                            <th scope="col">{{ __('Title') }}</th>
                                            @endif
                                            <th scope="col">{{ __('Serial Number') }}</th>
                                            <th scope="col">{{ __('Actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($features as $feature)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="bulk-check"
                                                           data-val="{{ $feature->id }}">
                                                </td>

                                                @if($themeInfo->theme_version == 3)
                                                    <td>
                                                        @if (is_null($feature->icon))
                                                            -
                                                        @else
                                                            <i class="{{ $feature->icon }}"></i>
                                                        @endif
                                                    </td>
                                                @endif

                                                @if ($themeInfo->theme_version == 4 || $themeInfo->theme_version == 5)
                                                <td>
                                                    <img
                                                    src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE,$feature->image,$userBs) }}"
                                                    alt="client" width="50">
                                                </td>
                                                 @endif

                                                 @if($themeInfo->theme_version != 5)
                                                <td>
                                                    {{ strlen($feature->title) > 30 ? mb_substr($feature->title, 0, 30, 'UTF-8') . '...' : $feature->title }}
                                                </td>
                                                @endif
                                                <td>{{ $feature->serial_number }}</td>
                                                <td>
                                                    <a class="btn btn-secondary btn-sm mr-1 editbtn" href="#"
                                                       data-toggle="modal" data-target="#editModal"
                                                       data-id="{{ $feature->id }}"
                                                       data-background_color="{{ $feature->background_color }}"
                                                       data-icon="{{ $feature->icon }}"
                                                       data-feature_title="{{ $feature->title }}"
                                                       data-text="{{ $feature->text }}"
                                                       data-serial_number="{{ $feature->serial_number }}"
                                                       @if($themeInfo->theme_version == 4 ||  $themeInfo->theme_version == 5 || $themeInfo->theme_version == 6)
                                                             data-image="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE,$feature->image,$userBs) }}"
                                                        @else
                                                             data-image=""
                                                        @endif
                                                       >
                                                        <span class="btn-label">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                        {{ __('Edit') }}
                                                    </a>

                                                    <form class="deleteform d-inline-block"
                                                          action="{{ route('user.home_page.delete_feature', ['id' => $feature->id]) }}"
                                                          method="post">

                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                                        <span class="btn-label">
                                                        <i class="fas fa-trash"></i>
                                                        </span>
                                                            {{ __('Delete') }}
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

                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    @endif


    {{-- create modal --}}
    @include('user.home-page.feature-section.create')

    {{-- edit modal --}}
    @include('user.home-page.feature-section.edit')
@endsection
