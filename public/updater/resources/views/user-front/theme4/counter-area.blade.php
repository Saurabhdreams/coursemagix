@if ($secInfo->fun_facts_section_status == 1)

    <div class="counter-area counter-area_v1 pt-100 pb-70 bg-img bg-cover"
        @if (!empty($factData->background_image)) data-bg-image="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FUN_FACT_SECTION_IMAGE, $factData->background_image ?? '', $userBs) }}"  @else data-bg-image="{{ asset('assets/tenant/image/static/fun_fact_bg.jpeg') }} " @endif>
        <div class="overlay opacity-90 bg-primary"></div>
        @if (count($countInfos) == 0)
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <h5>
                            {{ $keywords['no_information_found'] ?? __('No Information Found') }}
                        </h5>
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="counter-inner">
                    <div class="row">
                        @foreach ($countInfos as $countInfo)
                            <div class="col-sm-6 col-lg-3 mb-30" data-aos="fade-up">
                                <div class="card text-center bg-none">
                                    <div class="card-icon mx-auto mb-15">
                                        <img class="lazyload"
                                            data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FUN_FACT_SECTION_IMAGE, $countInfo->image ?? '', $userBs) }}"
                                            alt="Image">
                                    </div>
                                    <div class="card-content">
                                        <span class="h3 font-medium color-white mb-2"><span
                                                class="counter">{{ $countInfo->amount }}</span>{{ $countInfo->symbol }}</span>
                                        <p class="card-text color-white lh-1">{{ $countInfo->title }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="arrows d-none d-lg-block">
                        @foreach ($countInfos as $countInfo)
                            @if ($loop->last)
                            @else
                                <img class="arrow lazyload"
                                    data-src="{{ asset('assets/front/theme_4_5_6/assets/images/icon/line-arrow.png') }}"
                                    alt="Image">
                            @endif
                        @endforeach


                    </div>
                </div>
            </div>
        @endif
    </div>
@endif
