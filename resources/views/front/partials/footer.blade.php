

<!-- Footer Area -->
<footer class="footer-area">
    @if ($bs->top_footer_section == 1)
        <div class="footer-top pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="footer-widget" data-aos="fade-up" data-aos-delay="100">
                    <div class="navbar-brand">
                        <a href="{{route('front.index')}}">
                            <img src="{{asset('assets/front/img/' . $bs->footer_logo)}}" alt="Logo">
                        </a>
                    </div>
                    <p>{{$bs->footer_text}}</p>
                     <div class="social-link">
                        <a href="https://www.x.com/1XLUniverse" class="mt-3" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" height="24" fill="white"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>                  </a>
                        <a href="https://www.pinterest.com/1XLUniverse"  class="mt-3" target="_blank">
                            <i class="fab fa-pinterest"></i>
                        </a>
                        <a href="https://www.facebook.com/1XLUniverse" class="mt-3" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a href="https://www.instagram.com/1XLUniverse" class="mt-3" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/@1XLUniverse" class="mt-3" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/1XLUniverse" class="mt-3" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://www.medium.com/@1XLUniverse/" class="mt-3" target="_blank">
                            <i class="fab fa-medium"></i>
                        </a>
                        <a href="https://www.reddit.com/user/1XLUniverse/" class="mt-3" target="_blank">
                            <i class="fab fa-reddit"></i>
                        </a>
                        <a href="https://www.quora.com/profile/1XLUniverse/" class="mt-3" target="_blank">
                            <i class="fab fa-quora"></i>
                        </a>
                        <a href="https://www.discord.com/channels/@1XLUniverse/" class="mt-3" target="_blank">
                            <i class="fab fa-discord"></i>
                        </a>
                        <a href="https://whatsapp.com/channel/0029VaLoJ1SLCoX4iyiW0R0c" class="mt-3"  target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.threads.net/@1XLUniverse/" class="mt-3" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" height="24" fill="white">
                              <path d="M331.5 235.7c2.2 .9 4.2 1.9 6.3 2.8c29.2 14.1 50.6 35.2 61.8 61.4c15.7 36.5 17.2 95.8-30.3 143.2c-36.2 36.2-80.3 52.5-142.6 53h-.3c-70.2-.5-124.1-24.1-160.4-70.2c-32.3-41-48.9-98.1-49.5-169.6V256v-.2C17 184.3 33.6 127.2 65.9 86.2C102.2 40.1 156.2 16.5 226.4 16h.3c70.3 .5 124.9 24 162.3 69.9c18.4 22.7 32 50 40.6 81.7l-40.4 10.8c-7.1-25.8-17.8-47.8-32.2-65.4c-29.2-35.8-73-54.2-130.5-54.6c-57 .5-100.1 18.8-128.2 54.4C72.1 146.1 58.5 194.3 58 256c.5 61.7 14.1 109.9 40.3 143.3c28 35.6 71.2 53.9 128.2 54.4c51.4-.4 85.4-12.6 113.7-40.9c32.3-32.2 31.7-71.8 21.4-95.9c-6.1-14.2-17.1-26-31.9-34.9c-3.7 26.9-11.8 48.3-24.7 64.8c-17.1 21.8-41.4 33.6-72.7 35.3c-23.6 1.3-46.3-4.4-63.9-16c-20.8-13.8-33-34.8-34.3-59.3c-2.5-48.3 35.7-83 95.2-86.4c21.1-1.2 40.9-.3 59.2 2.8c-2.4-14.8-7.3-26.6-14.6-35.2c-10-11.7-25.6-17.7-46.2-17.8H227c-16.6 0-39 4.6-53.3 26.3l-34.4-23.6c19.2-29.1 50.3-45.1 87.8-45.1h.8c62.6 .4 99.9 39.5 103.7 107.7l-.2 .2zm-156 68.8c1.3 25.1 28.4 36.8 54.6 35.3c25.6-1.4 54.6-11.4 59.5-73.2c-13.2-2.9-27.8-4.4-43.4-4.4c-4.8 0-9.6 .1-14.4 .4c-42.9 2.4-57.2 23.2-56.2 41.8l-.1 .1z"/>
                          </svg>                </a>

                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-1"></div>
            <div class="col-lg-3 col-md-3 col-sm-6">
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
                        {{-- <li>
                            <i class="fal fa-map-marker-alt"></i>
                            <span>{{ $be->contact_addresses }}</span>
                        </li> --}}
                        {{-- <li>
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
                        </li> --}}
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
            {{-- <div class="col-lg-3 col-md-3 col-sm-6">
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
            </div> --}}
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
