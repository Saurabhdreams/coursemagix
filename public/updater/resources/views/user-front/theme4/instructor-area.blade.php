@if ($secInfo->featured_instructors_section_status == 1)
    <section class="instructor-area instructor-area_v1 pt-100 pb-70 bg-img bg-cover"
        data-bg-image="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE, $userBs->instructor_bg_image ?? '', $userBs) }}">
        <div class="overlay opacity-85 bg-primary-light"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title">
                            {{ !empty($secTitleInfo->featured_instructors_section_title) ? $secTitleInfo->featured_instructors_section_title : '' }}
                        </h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        @forelse ($instructors->take(3) as $instructor)
                            <div class="col-lg-4 col-sm-6" data-aos="fade-up">
                                <div class="card radius-md mb-30">
                                    <div class="card-img">
                                        <a title="Image" target="_self" class="lazy-container ratio ratio-1-2"
                                            data-toggle="modal"
                                            data-target="#{{ 'staticBackdrop-' . $instructor->id }}">
                                            <img class="lazyload"
                                                data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE, $instructor->image ?? '', $userBs) }}"
                                                alt="{{ $instructor->name }}">
                                        </a>
                                    </div>
                                    <div class="card-content text-center">
                                        <h4 class="card-title lc-1 mb-1">
                                            <a href="javaScript:void(0)" target="_self" title="{{ $instructor->name }}"
                                                data-toggle="modal"
                                                data-target="#{{ 'staticBackdrop-' . $instructor->id }}">
                                                {{ $instructor->name }}
                                            </a>
                                        </h4>
                                        <p class="card-text color-primary font-sm">
                                            {{ $instructor->occupation }}
                                        </p>
                                        @php
                                            $socials = $instructor->socialPlatform;
                                        @endphp
                                        @if (count($socials) > 0)
                                            <div class="social-link justify-content-center">
                                                @foreach ($socials as $social)
                                                    <a href="{{ $social->url }}" target="_blank" title=""><i
                                                            class="{{ $social->icon }}"></i></a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="{{ 'staticBackdrop-' . $instructor->id }}"
                                data-backdrop="false" data-keyboard="false" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                {{ __('Information of') . ' ' . $instructor->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="summernote-content px-3">
                                                {!! replaceBaseUrl($instructor->description, 'summernote') !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary text-secondary"
                                                data-dismiss="modal">{{ __('Close') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @empty
                            <div class="col">
                                <div class="alert alert-secondary">
                                    {{ $keywords['no_featured_instructor_found'] ?? __('No Featured Instructor Found') }}
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- Shapes -->
        <div class="shape">
            <img class="shape-1 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-1.png') }}" alt="Shape">
            <img class="shape-2 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-3.png') }}" alt="Shape">
            <img class="shape-3 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-4.png') }}" alt="Shape">
        </div>
    </section>
@endif
