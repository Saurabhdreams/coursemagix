@if ($secInfo->fun_facts_section_status == 1)

    <div class="feature-cards mtn-50" data-aos="fade-up">
        <div class="container">
            <div class="wrapper bg-white shadow-md radius-md px-30 pt-30">
                <div class="row">
                    @foreach ($countInfos as $countInfo)
                        <div class="col-sm-6 col-lg-3 mb-30">
                            <div class="card text-center bg-none">
                                <div class="card-icon mx-auto mb-15">
                                    <img class="lazyload"
                                        data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FUN_FACT_SECTION_IMAGE, $countInfo->image ?? '', $userBs) }}"
                                        alt="Image">
                                </div>
                                <div class="card-content">
                                    <span class="h3 font-medium mb-2"><span
                                            class="counter">{{ $countInfo->amount }}</span>{{ $countInfo->symbol }}</span>
                                    <p class="card-text lh-1">{{ $countInfo->title }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endif
