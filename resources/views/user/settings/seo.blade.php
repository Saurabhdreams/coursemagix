@extends('user.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('user.partials.rtl-style')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('SEO Informations') }}</h4>
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
                <a href="#">{{ __('Basic Settings') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('SEO Informations') }}</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form
                    action="{{ route('user.basic_settings.update_seo_informations') }}"
                    method="post"
                >
                    @csrf
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card-title">{{ __('Update SEO Informations') }}</div>
                            </div>

                            <div class="col-lg-3">
                                @includeIf('user.partials.languages')
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-5 pb-5">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Meta Keywords For Home Page') }}</label>
                                    <input
                                        class="form-control"
                                        name="home_meta_keywords"
                                        value="{{ $data->home_meta_keywords }}"
                                        placeholder="Enter Meta Keywords"
                                        data-role="tagsinput"
                                    >
                                    @if ($errors->has('home_meta_keywords'))
                                        <div class="help-block with-errors text-danger">{{$errors->first('home_meta_keywords')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Meta Description For Home Page') }}</label>
                                    <textarea
                                        class="form-control"
                                        name="home_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    >{{ $data->home_meta_description }}</textarea>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Meta Keywords For Courses Page') }}</label>
                                    <input
                                        class="form-control"
                                        name="courses_meta_keywords"
                                        value="{{ $data->courses_meta_keywords }}"
                                        placeholder="Enter Meta Keywords"
                                        data-role="tagsinput"
                                    >
                                    @if ($errors->has('courses_meta_keywords'))
                                        <div class="help-block with-errors text-danger">{{$errors->first('courses_meta_keywords')}}</div>
                                     @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Meta Description For Courses Page') }}</label>
                                    <textarea
                                        class="form-control"
                                        name="courses_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    >{{ $data->courses_meta_description }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Meta Keywords For Instructors Page') }}</label>
                                    <input
                                        class="form-control"
                                        name="instructors_meta_keywords"
                                        value="{{ $data->instructors_meta_keywords }}"
                                        placeholder="Enter Meta Keywords"
                                        data-role="tagsinput"
                                    >
                                    @if ($errors->has('instructors_meta_keywords'))
                                        <div class="help-block with-errors text-danger">{{$errors->first('instructors_meta_keywords')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Meta Description For Instructors Page') }}</label>
                                    <textarea
                                        class="form-control"
                                        name="instructors_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    >{{ $data->instructors_meta_description }}</textarea>
                                </div>
                            </div>
                            @php
                                $user = Auth::guard('web')->user();
                                if (!empty($user)) {
                                    $permissions = \App\Http\Helpers\UserPermissionHelper::packagePermission($user->id);
                                    $permissions = json_decode($permissions, true);
                                }
                            @endphp
                            @if (!empty($permissions) && in_array('Blog', $permissions))
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Meta Keywords For Blog Page') }}</label>
                                        <input
                                            class="form-control"
                                            name="blogs_meta_keywords"
                                            value="{{ $data->blogs_meta_keywords }}"
                                            placeholder="Enter Meta Keywords"
                                            data-role="tagsinput"
                                        >
                                        @if ($errors->has('blogs_meta_keywords'))
                                            <div class="help-block with-errors text-danger">{{$errors->first('blogs_meta_keywords')}}</div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Meta Description For Blog Page') }}</label>
                                        <textarea
                                            class="form-control"
                                            name="blogs_meta_description"
                                            rows="5"
                                            placeholder="Enter Meta Description"
                                        >{{ $data->blogs_meta_description }}</textarea>
                                    </div>
                                </div>
                            @endif

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Meta Keywords For FAQ Page') }}</label>
                                    <input
                                        class="form-control"
                                        name="faqs_meta_keywords"
                                        placeholder="Enter Meta Keywords"
                                        value="{{ $data->faqs_meta_keywords }}"
                                        data-role="tagsinput"
                                    >
                                    @if ($errors->has('faqs_meta_keywords'))
                                        <div class="help-block with-errors text-danger">{{$errors->first('faqs_meta_keywords')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Meta Description For FAQ Page') }}</label>
                                    <textarea
                                        class="form-control"
                                        name="faqs_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    >{{ $data->faqs_meta_description }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Meta Keywords For Contact Page') }}</label>
                                    <input
                                        class="form-control"
                                        name="contact_meta_keywords"
                                        placeholder="Enter Meta Keywords"
                                        value="{{ $data->contact_meta_keywords }}"
                                        data-role="tagsinput"
                                    >
                                    @if ($errors->has('contact_meta_keywords'))
                                        <div class="help-block with-errors text-danger">{{$errors->first('contact_meta_keywords')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Meta Description For Contact Page') }}</label>
                                    <textarea
                                        class="form-control"
                                        name="contact_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    >{{ $data->contact_meta_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Meta Keywords For Login Page') }}</label>
                                    <input
                                        class="form-control"
                                        name="login_meta_keywords"
                                        placeholder="Enter Meta Keywords"
                                        value="{{ $data->login_meta_keywords }}"
                                        data-role="tagsinput"
                                    >
                                    @if ($errors->has('login_meta_keywords'))
                                        <div class="help-block with-errors text-danger">{{$errors->first('login_meta_keywords')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Meta Description For Login Page') }}</label>
                                    <textarea
                                        class="form-control"
                                        name="login_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    >{{ $data->login_meta_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Meta Keywords For Sign Up Page') }}</label>
                                    <input
                                        class="form-control"
                                        name="sign_up_meta_keywords"
                                        placeholder="Enter Meta Keywords"
                                        value="{{ $data->sign_up_meta_keywords }}"
                                        data-role="tagsinput"
                                    >
                                    @if ($errors->has('sign_up_meta_keywords'))
                                        <div class="help-block with-errors text-danger">{{$errors->first('sign_up_meta_keywords')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Meta Description For Sign Up Page') }}</label>
                                    <textarea
                                        class="form-control"
                                        name="sign_up_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    >{{ $data->sign_up_meta_description }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Meta Keywords For Forget Password Page') }}</label>
                                    <input
                                        class="form-control"
                                        name="forget_password_meta_keywords"
                                        placeholder="Enter Meta Keywords"
                                        value="{{ $data->forget_password_meta_keywords }}"
                                        data-role="tagsinput"
                                    >
                                    @if ($errors->has('forget_password_meta_keywords'))
                                        <div class="help-block with-errors text-danger">{{$errors->first('forget_password_meta_keywords')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Meta Description For Forget Password Page') }}</label>
                                    <textarea
                                        class="form-control"
                                        name="forget_password_meta_description"
                                        rows="5"
                                        placeholder="Enter Meta Description"
                                    >{{ $data->forget_password_meta_description }}</textarea>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button
                                        type="submit"
                                        class="btn btn-success {{ $data == null ? 'd-none' : '' }}"
                                    >{{ __('Update') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
