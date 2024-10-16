@extends('front.layout')

@section('pagename')
    - {{ __('FAQs') }}
@endsection

@section('meta-description', !empty($seo) ? $seo->faqs_meta_description : '')
@section('meta-keywords', !empty($seo) ? $seo->faqs_meta_keywords : '')

@section('breadcrumb-title')
    {{ __('FAQs') }}
@endsection
@section('breadcrumb-link')
    {{ __('FAQs') }}
@endsection

<style>
.icon-toggle {
    margin-left: auto;
    font-size: 14px;
    margin-left: 10px;
}
</style>

@section('content')

<!--====== Start faqs-section ======-->
<div id="faq" class="faq-area pt-120 pb-90">
    <div class="container">
        <div class="accordion" id="faqAccordion">
            <div class="row justify-content-center">
                <div class="col-lg-8 has-time-line" data-aos="fade-right">
                    <div class="row">
                        @foreach ($faqs as $key => $faq)
                            <div class="col-12">
                                <div class="accordion-item">
                                    <h6 class="accordion-header" id="heading{{ $key }}">
                                        <button class="accordion-button {{ $key == 0 ? '' : 'collapsed' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}"
                                            aria-expanded="{{ $key == 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $key }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h6>
                                    <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $key }}" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End faqs-section ======-->
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const faqAccordion = document.getElementById('faqAccordion');

        faqAccordion.addEventListener('show.bs.collapse', function (event) {
            const button = event.target.previousElementSibling.querySelector('.icon-toggle');
            button.innerText = '-';
        });

        faqAccordion.addEventListener('hide.bs.collapse', function (event) {
            const button = event.target.previousElementSibling.querySelector('.icon-toggle');
            button.innerText = '+';
        });
    });
</script>
