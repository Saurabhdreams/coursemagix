@extends('user.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('user.partials.rtl-style')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Section Titles') }}</h4>
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
                <a href="#">{{ __('Section Titles') }}</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form
                    action="{{ route('user.home_page.update_section_title', ['language' => request()->input('language')]) }}"
                    method="post">
                    @csrf
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card-title">{{ __('Update Section Titles') }}</div>
                            </div>

                            <div class="col-lg-2">
                                @includeIf('user.partials.languages')
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                @if (
                                    $themeInfo->theme_version == 1 ||
                                        $themeInfo->theme_version == 4 ||
                                        $themeInfo->theme_version == 5 ||
                                        $themeInfo->theme_version == 6)
                                    <div class="form-group">
                                        <label>{{ __('Category Section Title') }}</label>
                                        <input class="form-control" name="category_section_title"
                                            value="{{ empty($data->category_section_title) ? '' : $data->category_section_title }}"
                                            placeholder="Enter Category Section Title">
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>{{ __('Featured Courses Section Title') }}</label>
                                    <input class="form-control" name="featured_courses_section_title"
                                        value="{{ empty($data->featured_courses_section_title) ? '' : $data->featured_courses_section_title }}"
                                        placeholder="Enter Featured Courses Section Title">
                                </div>
                                @if ($themeInfo->theme_version == 4 || $themeInfo->theme_version == 5 || $themeInfo->theme_version == 6)
                                    <div class="form-group">
                                        <label>{{ __(' Courses Section Title') }}</label>
                                        <input class="form-control" name="course_section_title"
                                            value="{{ empty($data->course_section_title) ? '' : $data->course_section_title }}"
                                            placeholder="Enter Courses Section Title">
                                    </div>
                                @endif

                                @if ($themeInfo->theme_version == 2 || $themeInfo->theme_version == 4 || $themeInfo->theme_version == 6)
                                    <div class="form-group">
                                        <label>{{ __('Featured Instructors Section Title') }}</label>
                                        <input class="form-control" name="featured_instructors_section_title"
                                            value="{{ empty($data->featured_instructors_section_title) ? '' : $data->featured_instructors_section_title }}"
                                            placeholder="Enter Featured Instructors Section Title">
                                    </div>
                                @endif

                                @if (
                                    $themeInfo->theme_version == 2 ||
                                        $themeInfo->theme_version == 4 ||
                                        $themeInfo->theme_version == 5 ||
                                        $themeInfo->theme_version == 6)
                                    <div class="form-group">
                                        <label>{{ __('Testimonials Section Title') }}</label>
                                        <input class="form-control" name="testimonials_section_title"
                                            value="{{ empty($data->testimonials_section_title) ? '' : $data->testimonials_section_title }}"
                                            placeholder="Enter Testimonials Section Title">
                                    </div>
                                @endif

                                @if ($themeInfo->theme_version == 3 || $themeInfo->theme_version == 4)
                                    <div class="form-group">
                                        <label>{{ __('Features Section Title') }}</label>
                                        <input class="form-control" name="features_section_title"
                                            value="{{ empty($data->features_section_title) ? '' : $data->features_section_title }}"
                                            placeholder="Enter Features Section Title">
                                    </div>
                                    @if ($themeInfo->theme_version == 3 )
                                    <div class="form-group">
                                        <label>{{ __('Blog Section Title') }}</label>
                                        <input class="form-control" name="blog_section_title"
                                            value="{{ empty($data->blog_section_title) ? '' : $data->blog_section_title }}"
                                            placeholder="Enter Blog Section Title">
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
