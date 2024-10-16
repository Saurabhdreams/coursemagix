@if ($secInfo->newsletter_section_status == 1)
    <section class="newsletter-area">
        <div class="container">
            <div class="newsletter-inner ptb-60 px-3 px-lg-5 radius-lg bg-img bg-cover"
                data-bg-image="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_NEWSLETTER_SECTION_IMAGE, $newsletterData->background_image ?? '', $userBs) }}"
                data-aos="fade-up">
                <div class="overlay opacity-80 bg-primary"></div>
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="content-title text-center">
                            <h2 class="title mb-30 color-white">
                                {{ !empty($newsletterData->title) ? $newsletterData->title : '' }}
                            </h2>
                            <div class="newsletter-form mx-auto">
                                <form id="newsletterForm" class="subscriptionForm"
                                    action="{{ route('front.user.subscriber', getParam()) }}" method="POST">
                                    @csrf
                                    <div class="input-inline p-2 bg-white radius-sm">
                                        <input class="form-control border-0"
                                            placeholder="{{ $keywords['Enter_Email_Address'] ?? __('Enter Your Email Address') }}"
                                            type="email" name="email" required="" autocomplete="off">
                                        <button class="btn btn-lg btn-primary radius-sm" type="submit"
                                            aria-label="button">{{ $keywords['Subscribe'] ?? __('Subscribe') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
