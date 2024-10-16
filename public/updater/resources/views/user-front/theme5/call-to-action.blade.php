@if ($secInfo->call_to_action_section_status == 1)

    <section class="action-banner ptb-100 bg-img bg-cover"
        data-bg-image="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ACTION_SECTION_IMAGE, $callToActionInfo->background_image ?? '', $userBs) }}">
        <div class="container">
            <div class="row justify-content-center gx-xl-5">
                <div class="col-lg-6">
                    <div class="content-title text-center" data-aos="fade-up">
                        <h2 class="title color-white mb-0">
                            {{ !empty($callToActionInfo) ? $callToActionInfo->second_title : '' }}
                        </h2>
                        <div class="btn-groups justify-content-center mt-25">
                            @if (!empty($callToActionInfo->first_button) && !empty($callToActionInfo->first_button_url))
                                <a href="{{ $callToActionInfo->first_button_url }}"
                                    class="btn btn-lg btn-secondary radius-sm"
                                    title="{{ $callToActionInfo->first_button }}"
                                    target="_self">{{ $callToActionInfo->first_button }}</a>
                            @endif
                            @if (!empty($callToActionInfo->second_button) && !empty($callToActionInfo->second_button_url))
                                <a href="{{ $callToActionInfo->second_button_url }}"
                                    class="btn btn-lg btn-primary radius-sm"
                                    title="{{ $callToActionInfo->second_button }}"
                                    target="_self">{{ $callToActionInfo->second_button }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
