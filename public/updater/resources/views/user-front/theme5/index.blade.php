@extends('user-front.common.layout')

@section('pageHeading')
    {{ $keywords['Home'] ?? 'Home' }}
@endsection

@section('metaKeywords')
    @if (!empty($seoInfo))
        {{ $seoInfo->home_meta_keywords }}
    @endif
@endsection

@section('metaDescription')
    @if (!empty($seoInfo))
        {{ $seoInfo->home_meta_description }}
    @endif
@endsection

@section('content')
    <!-- Home-area start-->
    <section class="hero-banner hero-banner_v2 bg-img bg-cover"
        data-bg-image="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_HERO_SECTION_IMAGE, $heroInfo->background_image ?? '', $userBs) }}">
        <div class="overlay"></div>
        <div class="container">
            <div class="banner-content">
                <h1 class="title mb-30" data-aos="fade-up" data-aos-delay="100">
                    {{ !empty($heroInfo->first_title) ? $heroInfo->first_title : '' }}
                </h1>
                <p class="text color-dark" data-aos="fade-up" data-aos-delay="100">
                    {{ !empty($heroInfo->second_title) ? $heroInfo->second_title : '' }}
                </p>
                <div class="banner-filter-form mt-40" data-aos="fade-up" data-aos-delay="150">
                    <div class="form-wrapper bg-white border p-md-2 radius-md">
                        <form action="{{ route('front.user.courses', getParam()) }}" method="GET">
                            <div class="row align-items-center">
                                <div class="col-md-4 col-sm-6">
                                    <div class="input-group">
                                        <label for="search"><i class="fas fa-search"></i></label>
                                        <input type="text" id="search" class="form-control" name="keyword"
                                            placeholder="{{ $keywords['search_course_here'] ?? __('Search Course Here') }}">
                                        <div class="vr"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="input-group">
                                        <label for="search"><i class="fas fa-th-large"></i></label>
                                        <select class="niceselect" name="category">
                                            <option data-display="{{ $keywords['select_category'] ?? __('Select a Category') }}" value="">
                                                {{ $keywords['select_category'] ?? __('Select a Category') }}
                                            </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->slug }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <button class="btn btn-lg btn-primary radius-sm w-100" type="submit"
                                        aria-label=" {{ $keywords['find_course'] ?? __('Find Course') }}">
                                        {{ $keywords['find_course'] ?? __('Find Course') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home-area end -->

    <!-- Category-area start -->
    @includeIf('user-front.theme5.course-category')
    <!-- Category-area end -->

    <!-- Product-area start -->
    @includeIf('user-front.theme5.featured-coureses')
    <!-- Product-area end -->

    <!-- Action action start -->
    @includeIf('user-front.theme5.call-to-action')
    <!-- Action action end -->

    <!-- Product-area start -->
    @includeIf('user-front.theme5.featured-course-category')
    <!-- Product-area end -->

    <!-- Feature-area start -->
    @includeIf('user-front.theme5.featured-area')
    <!-- Feature-area end -->

    <!-- Testimonial-area start -->
    @includeIf('user-front.theme5.testimonials')
    <!-- Testimonial-area end -->

    <!-- Newsletter-area start -->
    @includeIf('user-front.theme5.newsletter-area')
    <!-- Newsletter-area end -->
@endsection
