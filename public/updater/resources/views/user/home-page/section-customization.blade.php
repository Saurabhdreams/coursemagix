@extends('user.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">{{ __('Section Customization') }}</h4>
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
        <a href="#">{{ __('Section Customization') }}</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form action="{{ route('user.home_page.update_section_status') }}" method="POST">
          
          @csrf
          <div class="card-header">
            <div class="card-title d-inline-block">{{ __('Update Sections') }}</div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                @if ($themeInfo->theme_version == 1 || $themeInfo->theme_version == 3 ||  $themeInfo->theme_version == 4 || $themeInfo->theme_version == 5 || $themeInfo->theme_version == 6)
                  <div class="form-group">
                    <label>{{ __('Course Categories Section Status') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="course_categories_section_status" value="1" class="selectgroup-input" {{ $sectionInfo->course_categories_section_status == 1 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Enable') }}</span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="course_categories_section_status" value="0" class="selectgroup-input" {{ $sectionInfo->course_categories_section_status == 0 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Disable') }}</span>
                      </label>
                    </div>
                    @error('course_categories_section_status')
                      <p class="mb-0 text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                @endif

                @if ($themeInfo->theme_version == 1 || $themeInfo->theme_version == 2 || $themeInfo->theme_version == 5)
                  <div class="form-group">
                    <label>{{ __('Call To Action Section Status') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="call_to_action_section_status" value="1" class="selectgroup-input" {{ $sectionInfo->call_to_action_section_status == 1 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Enable') }}</span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="call_to_action_section_status" value="0" class="selectgroup-input" {{ $sectionInfo->call_to_action_section_status == 0 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Disable') }}</span>
                      </label>
                    </div>
                    @error('call_to_action_section_status')
                      <p class="mb-0 text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                @endif


                @if ($themeInfo->theme_version == 4 || $themeInfo->theme_version == 5 || $themeInfo->theme_version == 6)
                <div class="form-group">
                  <label>{{ __('Courses Section Status') }}</label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="courses_section_status" value="1" class="selectgroup-input" {{ $sectionInfo->courses_section_status == 1 ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ __('Enable') }}</span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="courses_section_status" value="0" class="selectgroup-input" {{ $sectionInfo->courses_section_status == 0 ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ __('Disable') }}</span>
                    </label>
                  </div>
                  @error('call_to_action_section_status')
                    <p class="mb-0 text-danger">{{ $message }}</p>
                  @enderror
                </div>
                @endif

                <div class="form-group">
                  <label>{{ __('Featured Courses Section Status') }}</label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="featured_courses_section_status" value="1" class="selectgroup-input" {{ $sectionInfo->featured_courses_section_status == 1 ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ __('Enable') }}</span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="featured_courses_section_status" value="0" class="selectgroup-input" {{ $sectionInfo->featured_courses_section_status == 0 ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ __('Disable') }}</span>
                    </label>
                  </div>
                  @error('featured_courses_section_status')
                    <p class="mb-0 text-danger">{{ $message }}</p>
                  @enderror
                </div>
           
                <div class="form-group">
                  <label>{{ __('Features Section Status') }}</label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="features_section_status" value="1" class="selectgroup-input" {{ $sectionInfo->features_section_status == 1 ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ __('Enable') }}</span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="features_section_status" value="0" class="selectgroup-input" {{ $sectionInfo->features_section_status == 0 ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ __('Disable') }}</span>
                    </label>
                  </div>
                  @error('features_section_status')
                    <p class="mb-0 text-danger">{{ $message }}</p>
                  @enderror
                </div>
                

                @if ($themeInfo->theme_version == 1 || $themeInfo->theme_version == 2  )
                  <div class="form-group">
                    <label>{{ __('Video Section Status') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="video_section_status" value="1" class="selectgroup-input" {{ $sectionInfo->video_section_status == 1 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Enable') }}</span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="video_section_status" value="0" class="selectgroup-input" {{ $sectionInfo->video_section_status == 0 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Disable') }}</span>
                      </label>
                    </div>
                    @error('video_section_status')
                      <p class="mb-0 text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                @endif

                <div class="form-group">
                  <label>{{ __('Fun Facts Section Status') }}</label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="fun_facts_section_status" value="1" class="selectgroup-input" {{ $sectionInfo->fun_facts_section_status == 1 ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ __('Enable') }}</span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="fun_facts_section_status" value="0" class="selectgroup-input" {{ $sectionInfo->fun_facts_section_status == 0 ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ __('Disable') }}</span>
                    </label>
                  </div>
                  @error('fun_facts_section_status')
                    <p class="mb-0 text-danger">{{ $message }}</p>
                  @enderror
                </div>

                @if ($themeInfo->theme_version != 3)
                  <div class="form-group">
                    <label>{{ __('Testimonials Section Status') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="testimonials_section_status" value="1" class="selectgroup-input" {{ $sectionInfo->testimonials_section_status == 1 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Enable') }}</span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="testimonials_section_status" value="0" class="selectgroup-input" {{ $sectionInfo->testimonials_section_status == 0 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Disable') }}</span>
                      </label>
                    </div>
                    @error('testimonials_section_status')
                      <p class="mb-0 text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                @endif

                @if ($themeInfo->theme_version != 2)
                  <div class="form-group">
                    <label>{{ __('Newsletter Section Status') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="newsletter_section_status" value="1" class="selectgroup-input" {{ $sectionInfo->newsletter_section_status == 1 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Enable') }}</span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="newsletter_section_status" value="0" class="selectgroup-input" {{ $sectionInfo->newsletter_section_status == 0 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Disable') }}</span>
                      </label>
                    </div>
                    @error('newsletter_section_status')
                      <p class="mb-0 text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                @endif

                @if ($themeInfo->theme_version == 2 || $themeInfo->theme_version == 4 || $themeInfo->theme_version == 6)
                  <div class="form-group">
                    <label>{{ __('Featured Instructors Section Status') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="featured_instructors_section_status" value="1" class="selectgroup-input" {{ $sectionInfo->featured_instructors_section_status == 1 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Enable') }}</span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="featured_instructors_section_status" value="0" class="selectgroup-input" {{ $sectionInfo->featured_instructors_section_status == 0 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Disable') }}</span>
                      </label>
                    </div>
                    @error('featured_instructors_section_status')
                      <p class="mb-0 text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                @endif

                @if ($themeInfo->theme_version == 3 || $themeInfo->theme_version == 4)
                  <div class="form-group">
                    <label>{{ __('About Us Section Status') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="about_us_section_status" value="1" class="selectgroup-input" {{ $sectionInfo->about_us_section_status == 1 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Enable') }}</span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="about_us_section_status" value="0" class="selectgroup-input" {{ $sectionInfo->about_us_section_status == 0 ? 'checked' : '' }}>
                        <span class="selectgroup-button">{{ __('Disable') }}</span>
                      </label>
                    </div>
                    @error('about_us_section_status')
                      <p class="mb-0 text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  @endif
                  @if ($themeInfo->theme_version == 3)
                    @php
                        $user = Auth::guard('web')->user();
                        if (!empty($user)) {
                            $permissions = \App\Http\Helpers\UserPermissionHelper::packagePermission($user->id);
                            $permissions = json_decode($permissions, true);
                        }
                    @endphp
                    @if (!empty($permissions) && in_array('Blog', $permissions))
                        <div class="form-group">
                            <label>{{ __('Latest Blog Section Status') }}</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="latest_blog_section_status" value="1"
                                           class="selectgroup-input" {{ $sectionInfo->latest_blog_section_status == 1 ? 'checked' : '' }}>
                                    <span class="selectgroup-button">{{ __('Enable') }}</span>
                                </label>

                                <label class="selectgroup-item">
                                    <input type="radio" name="latest_blog_section_status" value="0"
                                           class="selectgroup-input" {{ $sectionInfo->latest_blog_section_status == 0 ? 'checked' : '' }}>
                                    <span class="selectgroup-button">{{ __('Disable') }}</span>
                                </label>
                            </div>
                            @error('latest_blog_section_status')
                            <p class="mb-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                @endif

                <div class="form-group">
                  <label>{{ __('Footer Section Status') }}</label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="footer_section_status" value="1" class="selectgroup-input" {{ $sectionInfo->footer_section_status == 1 ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ __('Enable') }}</span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="footer_section_status" value="0" class="selectgroup-input" {{ $sectionInfo->footer_section_status == 0 ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ __('Disable') }}</span>
                    </label>
                  </div>
                  @error('footer_section_status')
                    <p class="mb-0 text-danger">{{ $message }}</p>
                  @enderror
                </div>
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
