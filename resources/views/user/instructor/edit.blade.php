@extends('user.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('user.partials.rtl-style')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Edit Instructor') }}</h4>
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
                <a href="#">{{ __('Instructors') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Edit Instructor') }}</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">
                        {{ __('Edit Instructor') }}
                    </div>
                    <a class="btn btn-info btn-sm float-right d-inline-block"
                       href="{{ route('user.instructors', ['language' => request()->input('language')]) }}">
            <span class="btn-label">
              <i class="fas fa-backward" ></i>
            </span>
                        {{ __('Back') }}
                    </a>
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <form id="ajaxEditForm"
                                  action="{{ route('user.update_instructor', ['id' => $instructor->id]) }}"
                                  method="POST" enctype="multipart/form-data">
                                
                                @csrf

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label for="image"><strong>{{ __('Image') }}<span class="text-danger">*</span></strong></label>
                                            </div>
                                            <div class="col-md-12 showImage mb-3">
                                                <img
                                                    src="{{isset($instructor->image) ? \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE,$instructor->image,$userBs) : asset('assets/tenant/image/default.jpg')}}"
                                                    alt="..."
                                                    class="img-thumbnail">
                                            </div>
                                            <input type="file" name="image" id="image" class="form-control">
                                            <p id="editErr_image" class="mt-2 mb-0 text-danger em"></p>
                                            <p class="text-warning mb-0">{{__('Upload 370 X 370 image for best quality')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>{{ __('Name') }}<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                  maxlength="35" placeholder="Enter Instructor Name" value="{{ $instructor->name }}">
                                            <p id="editErr_name" class="mt-2 mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>{{ __('Occupation') }}<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="occupation"
                                                   placeholder="Enter Instructor Occupation"
                                                   value="{{ $instructor->occupation }}">
                                            <p id="editErr_occupation" class="mt-2 mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group pb-0">
                                            <label>{{ __('Description') }}<span class="text-danger">*</span></label>
                                            <textarea class="form-control summernote" name="description"
                                                      placeholder="Enter Instructor Description"
                                                      data-height="300">{{ $instructor->description }}</textarea>
                                            <p id="editErr_description" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success" id="updateBtn">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
