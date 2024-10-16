

<!-- Footer Area -->
<footer class="footer-area">
    @if ($bs->top_footer_section == 1)
        <div class="footer-top pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="footer-widget" data-aos="fade-up" data-aos-delay="100">
                    <div class="navbar-brand">
                        <a href="index.html">
                            <img src="{{asset('assets/front/img/' . $bs->footer_logo)}}" alt="Logo">
                        </a>
                    </div>
                    <p>{{$bs->footer_text}}</p>
                    <div class="social-link">


                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer-widget" data-aos="fade-up" data-aos-delay="200">
                    @php
                        $ulinks = App\Models\Ulink::where('language_id',$currentLang->id)->orderby('id','desc')->get();
                    @endphp
                    <h3>{{$bs->useful_links_title}}</h3>
                    <ul class="footer-links">
                        @foreach ($ulinks as $ulink)
                            <li><a href="{{$ulink->url}}">{{$ulink->name}}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="footer-widget" data-aos="fade-up" data-aos-delay="400">
                    <h3> {{ $bs->contact_info_title }}</h3>

                    <ul class="info-list">
                        <li>
                            <i class="fal fa-map-marker-alt"></i>
                            <span>{{ $be->contact_addresses }}</span>
                        </li>
                        <li>
                            @php
                                $phones = explode(',', $be->contact_numbers);
                            @endphp
                            <i class="fal fa-phone"></i>
                            @foreach ($phones as $phone)
                                <a href="tel:{{$phone}}">{{ $phone }}</a>
                                @if (!$loop->last)
                                   , 
                                @endif
                            @endforeach
                        </li>
                        <li>
                            @php
                                $mails = explode(',', $be->contact_mails);
                            @endphp
                            <i class="fal fa-envelope"></i>
                            @foreach ($mails as $mail)
                                <a href="mailto:{{$mail}}">{{ $mail }}</a>
                                @if (!$loop->last)
                                   , 
                                @endif
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="footer-widget" data-aos="fade-up" data-aos-delay="500">
                    <h3>{{$bs->newsletter_title}}</h3>
                    <p>{{$bs->newsletter_subtitle}}</p>
                    <form id="footerSubscriber" action="{{route('front.subscribe')}}" method="POST" class="subscribeForm">
                        @csrf
                        <div class="input-group">
                            <input name="email" class="form-control" placeholder="{{ __("Enter Your Email") }}" type="text" required="" autocomplete="off">
                            <button class="btn btn-sm primary-btn" type="submit">{{ __("Subscribe") }}</button>
                        </div>
                        <p id="erremail" class="text-danger mb-0 err-email"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @endif
    @if ($bs->copyright_section == 1)
        <div class="copy-right-area">
            <div class="container">
                <div class="copy-right-content">
                    @if($bs->copyright_section ==1)
                        <span>
                        {!! replaceBaseUrl($bs->copyright_text) !!}
                    </span>
                    @endif
                </div>
            </div>
        </div>
    @endif
</footer>
<!-- Footer Area -->
