@extends('user.layout')

@php
    $symbol = $currencyInfo->base_currency_symbol;
@endphp

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Edit Course') }}</h4>
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
                <a href="#">{{ __('Course Management') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a
                    href="{{ route('user.course_management.courses', ['language' => $defaultLang->code]) }}">{{ __('Courses') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Edit Course') }}</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">{{ __('Edit Course') }}</div>
                    <a class="btn btn-info btn-sm float-right d-inline-block"
                        href="{{ route('user.course_management.courses', ['language' => $defaultLang->code]) }}">
                        <span class="btn-label">
                            <i class="fas fa-backward"></i>
                        </span>
                        {{ __('Back') }}
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="alert alert-danger pb-1 dis-none" id="courseErrors">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <ul></ul>
                            </div>

                            <form id="courseForm"
                                action="{{ route('user.course_management.update_course', ['id' => $course->id]) }}"
                                method="POST" enctype="multipart/form-data">

                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label
                                                    for="image"><strong>{{ __('Thumbnail Image') . '*' }}</strong></label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <img src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE, $course->thumbnail_image, $userBs) }}"
                                                    alt="..." class="img-thumbnail" id="uploaded-thumb-img">
                                            </div>
                                            <input type="file" name="thumbnail_image" id="thumb-img-input"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-1">
                                    <label for="">{{ __('Introduction Video') . '*' }}</label>
                                    <input type="url" class="form-control" name="video_link"
                                        placeholder="Enter Video Link" value="{{ $course->video_link }}">
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label
                                                    for="image"><strong>{{ __('Cover Image') . '*' }}</strong></label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <img src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_COVER_IMAGE, $course->cover_image, $userBs) }}"
                                                    alt="..." class="img-thumbnail" id="uploaded-cover-img">
                                            </div>
                                            <input type="file" name="cover_image" id="cover-img-input"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-1">
                                    <label for="">{{ __('Pricing Type') . '*' }}</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="pricing_type" value="free"
                                                class="selectgroup-input"
                                                {{ $course->pricing_type == 'free' ? 'checked' : '' }}>
                                            <span class="selectgroup-button">{{ __('Free') }}</span>
                                        </label>

                                        <label class="selectgroup-item">
                                            <input type="radio" name="pricing_type" value="premium"
                                                class="selectgroup-input"
                                                {{ $course->pricing_type == 'premium' ? 'checked' : '' }}>
                                            <span class="selectgroup-button">{{ __('Premium') }}</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row {{ $course->pricing_type == 'free' ? 'd-none' : '' }}" id="price-input">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Current Price') }}({{ $symbol }})*</label>
                                            <input type="number" step="0.01" name="current_price"
                                                placeholder="Enter Current Price" class="form-control"
                                                value="{{ $course->current_price }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Previous Price') }}({{ $symbol }})</label>
                                            <input type="number" step="0.01" name="previous_price"
                                                placeholder="Enter Previous Price" class="form-control"
                                                value="{{ $course->previous_price }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="">
                                    @php
                                        
                                        function convertTimeToInteger($time)
                                        {
                                            $datetime1 = new DateTime('00:00:00');
                                            $datetime2 = new DateTime($time);
                                            $interval = $datetime1->diff($datetime2);
                                            $seconds = $interval->h * 3600 + $interval->i * 60 + $interval->s;
                                            return $seconds;
                                        }
                                        
                                    @endphp

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>{{ __('Duration Time') }} - ({{ __('second') }}) *</label>
                                            <input type="number" name="duration_time" class="form-control duration"
                                                placeholder="Enter Duration Second"
                                                value="{{ convertTimeToInteger($course->duration) }}" required>
                                                @php
                                                  $time = explode(":",$course->duration);
                                                @endphp
                                                
                                            <span class="timeConvert text-sm text-warning">
                                                @if(array_key_exists(0,$time))
                                                    {{$time[0]}} {{__('h')}} :
                                                @endif
                                                @if(array_key_exists(1,$time))
                                                {{$time[1]}} {{__('m')}} :
                                                @endif
                                                @if(array_key_exists(2,$time))
                                                {{$time[2]}} {{__('s')}}
                                                @endif
                                            </span>

                                        </div>
                                    </div>
                                    {{-- @if ($userBs->theme_version == 4 || $userBs->theme_version == 5 || $userBs->theme_version == 6) --}}
                                    {{-- <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>{{ __('Total Lessions') }} *</label>
                                                <input type="number" placeholder="Enter Total Lessions"
                                                    class="form-control" name="lessions" value="{{ $course->lessions }}"
                                                    required>
                                            </div>
                                        </div> --}}
                                    {{-- @endif --}}

                                </div>

                                <div id="accordion" class="mt-3">
                                    @foreach ($languages as $language)
                                        @php
                                            $courseData = $language
                                                ->courseInformation()
                                                ->where('user_id', Auth::guard('web')->user()->id)
                                                ->where('course_id', $course->id)
                                                ->first();
                                        @endphp

                                        <div class="version">
                                            <div class="version-header" id="heading{{ $language->id }}">
                                                <h5 class="mb-0">
                                                    <button type="button" class="btn btn-link" data-toggle="collapse"
                                                        data-target="#collapse{{ $language->id }}"
                                                        aria-expanded="{{ $language->is_default == 1 ? 'true' : 'false' }}"
                                                        aria-controls="collapse{{ $language->id }}">
                                                        {{ $language->name . __(' Language') }}
                                                        {{ $language->is_default == 1 ? '(Default)' : '' }}
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapse{{ $language->id }}"
                                                class="collapse {{ $language->is_default == 1 ? 'show' : '' }}"
                                                aria-labelledby="heading{{ $language->id }}" data-parent="#accordion">
                                                <div class="version-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div
                                                                class="form-group {{ $language->rtl == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Title') . '*' }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="{{ $language->code }}_title"
                                                                    placeholder="Enter Title"
                                                                    value="{{ is_null($courseData) ? '' : $courseData->title }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div
                                                                class="form-group {{ $language->rtl == 1 ? 'rtl text-right' : '' }}">
                                                                @php
                                                                    $categories = \App\Models\User\Curriculum\CourseCategory::where('language_id', $language->id)
                                                                        ->where('user_id', \Illuminate\Support\Facades\Auth::guard('web')->user()->id)
                                                                        ->where('status', 1)
                                                                        ->orderByDesc('id')
                                                                        ->get();
                                                                @endphp

                                                                <label for="">{{ __('Category') . '*' }}</label>
                                                                <select name="{{ $language->code }}_category_id"
                                                                    class="form-control">
                                                                    @if (is_null($courseData))
                                                                        <option selected disabled>
                                                                            {{ __('Select Category') }}</option>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}">
                                                                                {{ $category->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    @else
                                                                        <option disabled>{{ __('Select Category') }}
                                                                        </option>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}"
                                                                                {{ $courseData->course_category_id == $category->id ? 'selected' : '' }}>
                                                                                {{ $category->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div
                                                                class="form-group {{ $language->rtl == 1 ? 'rtl text-right' : '' }}">
                                                                @php
                                                                    $instructors = \App\Models\User\Teacher\Instructor::query()
                                                                        ->where('user_id', \Illuminate\Support\Facades\Auth::guard('web')->user()->id)
                                                                        ->where('language_id', $language->id)
                                                                        ->orderByDesc('id')
                                                                        ->get();
                                                                @endphp

                                                                <label for="">{{ __('Instructor') . '*' }}</label>
                                                                <select name="{{ $language->code }}_instructor_id"
                                                                    class="form-control mb-2">
                                                                    @if (is_null($courseData))
                                                                        <option selected disabled>
                                                                            {{ __('Select Instructor') }}</option>
                                                                        @foreach ($instructors as $instructor)
                                                                            <option value="{{ $instructor->id }}">
                                                                                {{ $instructor->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    @else
                                                                        <option disabled>{{ __('Select Instructor') }}
                                                                        </option>

                                                                        @foreach ($instructors as $instructor)
                                                                            <option value="{{ $instructor->id }}"
                                                                                {{ $courseData->instructor_id == $instructor->id ? 'selected' : '' }}>
                                                                                {{ $instructor->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>

                                                                <a href="{{ route('user.instructors', ['language' => $defaultLang->code]) }}"
                                                                    target="_blank" id="instructor-link"
                                                                    class="text-warning">
                                                                    {{ __('Click this link to add a new instructor') . '.' }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div
                                                                class="form-group {{ $language->rtl == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Features') . '*' }}</label>
                                                                <textarea class="form-control" name="{{ $language->code }}_features" placeholder="Enter Course Features"
                                                                    rows="7">{{ is_null($courseData) ? '' : $courseData->features }}</textarea>
                                                                <p class="text-warning mt-1 mb-0">
                                                                    {{ __('To seperate the features, enter a new line after each feature.') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div
                                                                class="form-group {{ $language->rtl == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Description') . '*' }}</label>
                                                                <textarea class="form-control summernote" name="{{ $language->code }}_description"
                                                                    placeholder="Enter Course Description" data-height="300">{{ is_null($courseData) ? '' : replaceBaseUrl($courseData->description, 'summernote') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div
                                                                class="form-group {{ $language->rtl == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Meta Keywords') }}</label>
                                                                <input class="form-control"
                                                                    name="{{ $language->code }}_meta_keywords"
                                                                    placeholder="Enter Meta Keywords"
                                                                    data-role="tagsinput"
                                                                    value="{{ is_null($courseData) ? '' : $courseData->meta_keywords }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div
                                                                class="form-group {{ $language->rtl == 1 ? 'rtl text-right' : '' }}">
                                                                <label>{{ __('Meta Description') }}</label>
                                                                <textarea class="form-control" name="{{ $language->code }}_meta_description" rows="5"
                                                                    placeholder="Enter Meta Description">{{ is_null($courseData) ? '' : $courseData->meta_description }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" form="courseForm" class="btn btn-success">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/tenant/js/partial.js') }}"></script>
    <script>
        $(document).on('change', '.duration', function() {
            const that = $(this);
            let time = that.val();
            let totalSeconds = parseInt(time);
            $(".timeConvert").text(toTime(totalSeconds));

            function toTime(totalSeconds) {
                var hours = Math.floor(totalSeconds / 3600); // Calculate the hour component
                var minutes = Math.floor((totalSeconds % 3600) / 60); // Calculate the minute component
                var seconds = totalSeconds % 60; // Calculate the second component
                // Format the time as HH:MM:SS
                var time = hours.toString().padStart(2, '0') + ' h ' + ':' + minutes.toString().padStart(2, '0') +
                    ' m ' + ':' + seconds.toString().padStart(2, '0') + ' s';

                return time;
            }

        });
    </script>
@endsection
