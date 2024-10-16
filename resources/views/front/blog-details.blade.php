@extends('front.layout')

@section('pagename')
    - {{__('Blog Details')}}
@endsection

@section('meta-description', !empty($blog) ? $blog->meta_keywords : '')
@section('meta-keywords', !empty($blog) ? $blog->meta_description : '')

@section('og-meta')
    <meta property="og:image" content="{{asset('assets/front/img/blogs/'.$blog->main_image)}}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">
@endsection

@section('breadcrumb-title')
    {{strlen($blog->title) > 30 ? mb_substr($blog->title, 0, 30) . '...' : $blog->title}}
@endsection
@section('breadcrumb-link')
    {{__('Blog Details')}}
@endsection

@section('content')

    <!--====== BLOG DETAILS PART START ======-->

    <!-- Blog Details Start -->
    <div class="blog-details-area pt-120 pb-90">
        <div class="container">
            <div class="row justify-content-center gx-xl-5">
                <div class="col-lg-8">
                    <div class="blog-description mb-50">
                        <article class="item-single">
                            <div class="image">
                                <div class="lazy-container aspect-ratio-16-9">
                                    <img class="lazyload lazy-image" src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}"
                                         data-src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="Blog Image">
                                </div>
                            </div>
                            <div class="content">
                                <ul class="info-list">
                                    <li><i class="fal fa-user"></i>{{__('Admin')}}</li>
                                    <li><i class="fal fa-calendar"></i>{{\Carbon\Carbon::parse($blog->created_at)->format("F j, Y")}}</li>
                                    <li><i class="fal fa-tag"></i><a
                                        href="{{route('front.blogs', ['category'=>$blog->bcategory->id])}}">{{$blog->bcategory->name}}</a></li>
                                </ul>
                                <h3 class="title">
                                    {{$blog->title}}
                                </h3>
                                <div class="summernote-content">
                                    {!! replaceBaseUrl($blog->content) !!}
                                </div>
                            </div>
                            <div class="blog-social">
                                <div class="shop-social d-flex align-items-center">
                                    <span>{{__('Share')}} :</span>
                                    <ul>
                                        <li class="p-1"><a href="//www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="p-1"><a href="//twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}"><i class="fab fa-twitter"></i></a></li>
                                        <li class="p-1"><a href="//www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title={{$blog->title}}"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </article>


                    </div>
                    <div class="blog-details-comment mt-5">
                        <div class="comment-lists">
                            <div id="disqus_thread"></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    @includeIf('front.partials.blog-sidebar')
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details End -->



    <!--====== BLOG DETAILS PART ENDS ======-->


@endsection

@if($bs->is_disqus == 1)
    @section('scripts')
    <script>
        "use strict";
        (function() {
            var d = document, s = d.createElement('script');
            s.src = '//{{$bs->disqus_shortname}}.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.  || d.body).appendChild(s);
        })();
    </script>
    @endsection
@endif
