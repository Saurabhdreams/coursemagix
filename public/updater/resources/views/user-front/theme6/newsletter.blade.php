@if ($secInfo->newsletter_section_status == 1)
    <section class="newsletter-area">
        <div class="container">
            <div class="newsletter-inner ptb-60 px-3 px-lg-5 radius-lg bg-img bg-cover"data-bg-image="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_NEWSLETTER_SECTION_IMAGE, $newsletterData->background_image ?? '', $userBs) }}"
                data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="content-title">
                            <h2 class="title mb-30">
                                {{ !empty($newsletterData->title) ? $newsletterData->title : '' }}
                            </h2>
                            <div class="newsletter-form">
                                <form id="newsletterForm" class="subscriptionForm"
                                    action="{{ route('front.user.subscriber', getParam()) }}" method="POST">
                                    @csrf
                                    <div class="input-inline bg-white rounded-pill">
                                        <input class="form-control border-0"
                                            placeholder="{{ $keywords['enter_email_here'] ?? __('Enter email here') }}..."
                                            type="email" name="email" required="" autocomplete="off">
                                        <button class="btn btn-lg btn-primary btn-gradient rounded-pill" type="submit"
                                            aria-label="button">{{ $keywords['subscribe'] ?? __('Subscribe') }}</button>
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
