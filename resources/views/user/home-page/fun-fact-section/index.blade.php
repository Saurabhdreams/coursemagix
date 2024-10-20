@extends('user.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('user.partials.rtl-style')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Fun Facts Section') }}</h4>
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
                <a href="#">{{ __('Fun Facts Section') }}</a>
            </li>
        </ul>
    </div>

    @if ($themeInfo->theme_version == 5 || $themeInfo->theme_version == 6)
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card-title">{{ __('Update Fun Facts Section') }}</div>
                            </div>

                            <div class="col-lg-2">
                                @includeIf('user.partials.languages')
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <form id="featureSectionForm"
                                    action="{{ route('user.home_page.update_fun_facts_section', ['language' => request()->input('language')]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if ($themeInfo->theme_version == 1 || $themeInfo->theme_version == 2 || $themeInfo->theme_version == 4)
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-12 mb-2">
                                                        <label
                                                            for="image"><strong>{{ __('Background Image') . '*' }}</strong></label>
                                                    </div>

                                                    
                                                    <div class="col-md-12 showBackgroundImage mb-3">
                                                        <img src="{{ isset($data->background_image) ? \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FUN_FACT_SECTION_IMAGE, $data->background_image, $userBs) : asset('assets/tenant/image/default.jpg') }}"
                                                            alt="..." class="img-thumbnail">
                                                    </div>
                                                    <input type="file" name="background_image" id="backgroundImage"
                                                        class="form-control" required>
                                                    <p id="errbackground_image" class="mt-2 mb-0 text-danger em"></p>
                                                    <p class="text-warning mb-0">Upload 1920 X 755 image for best quality</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @if ($themeInfo->theme_version == 1 || $themeInfo->theme_version == 2 || $themeInfo->theme_version == 3)  
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">{{ __('Title') }}</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ empty($data->title) ? '' : $data->title }}"
                                                    placeholder="Enter Section Title">
                                            </div>
                                        </div>
                                    </div>
                                @endif

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

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title">{{ __('Counter Informations') }}</div>
                        </div>

                        <div class="col-lg-3">
                            @includeIf('user.partials.languages')
                        </div>

                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a href="#" data-toggle="modal" data-target="#createModal"
                                class="btn btn-primary btn-sm float-lg-right float-left"><i class="fas fa-plus"></i>
                                {{ __('Add') }}</a>

                            <button class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete"
                                data-href="{{ route('user.home_page.bulk_delete_counter_info') }}">
                                <i class="flaticon-interface-5"></i> {{ __('Delete') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if (count($countInfos) == 0)
                                <h3 class="text-center mt-2">{{ __('NO INFORMATION FOUND') . '!' }}</h3>
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

                                                @if($themeInfo->theme_version == 4 || $themeInfo->theme_version == 5 || $themeInfo->theme_version == 6 )
                                                  <th scope="col">{{ __('Image') }}</th>
                                                @endif

                                                <th scope="col">{{ __('Title') }}</th>
                                                @if($themeInfo->theme_version != 5)
                                                <th scope="col">{{ __('Amount') }}</th>
                                                @endif

                                                @if ($themeInfo->theme_version == 4 || $themeInfo->theme_version == 6 )
                                                <th scope="col">{{ __('Symbol') }}</th>
                                                @endif
                                                <th scope="col">{{ __('Serial Number') }}</th>
                                                <th scope="col">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($countInfos as $countInfo)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="bulk-check"
                                                            data-val="{{ $countInfo->id }}">
                                                    </td>

                                                    @if ($themeInfo->theme_version == 3)
                                                        <td>
                                                            @if (is_null($countInfo->icon))
                                                                -
                                                            @else
                                                                <i class="{{ $countInfo->icon }}"></i>
                                                            @endif
                                                        </td>
                                                    @endif

                                                    @if($themeInfo->theme_version == 4  || $themeInfo->theme_version == 5  || $themeInfo->theme_version == 6)
                                                     <td>
                                                        <img
                                                        src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FUN_FACT_SECTION_IMAGE,$countInfo->image,$userBs) }}"
                                                        alt="client" width="50">
                                                     </td>
                                                    @endif

                                                    <td>
                                                        {{ strlen($countInfo->title) > 30 ? mb_substr($countInfo->title, 0, 30, 'UTF-8') . '...' : $countInfo->title }}
                                                    </td>

                                                    @if ($themeInfo->theme_version != 5)
                                                        <td>{{ $countInfo->amount }}</td>
                                                    @endif

                                                    @if ($themeInfo->theme_version == 4 || $themeInfo->theme_version == 6 )
                                                    <td>{{ $countInfo->symbol }}</td>
                                                    @endif

                                                    <td>{{ $countInfo->serial_number }}</td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm mr-1 editbtn" href="#"
                                                            data-toggle="modal" data-target="#editModal"
                                                            data-id="{{ $countInfo->id }}"
                                                            data-icon="{{ $countInfo->icon }}"
                                                            data-color="{{ $countInfo->color }}"
                                                            data-title="{{ $countInfo->title }}"
                                                            data-amount="{{ $countInfo->amount }}"
                                                            data-symbol="{{ $countInfo->symbol }}"
                                                            @if($themeInfo->theme_version == 4 || $themeInfo->theme_version == 5 || $themeInfo->theme_version == 6)
                                                             data-image="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FUN_FACT_SECTION_IMAGE,$countInfo->image,$userBs) }}"
                                                            @else
                                                             data-image=""
                                                            @endif
                                                            data-serial_number="{{ $countInfo->serial_number }}">
                                                            <span class="btn-label">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                            {{ __('Edit') }}
                                                        </a>

                                                        <form class="deleteform d-inline-block"
                                                            action="{{ route('user.home_page.delete_counter_info', ['id' => $countInfo->id]) }}"
                                                            method="post">

                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm deletebtn">
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

    {{-- create modal --}}
    @include('user.home-page.fun-fact-section.create')

    {{-- edit modal --}}
    @include('user.home-page.fun-fact-section.edit')
@endsection
