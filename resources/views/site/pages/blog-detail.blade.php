@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
    <section class="breadcrumbs-custom">
        <div class="parallax-container breadcrumbs_section">
            <div class="breadcrumbs-custom-body parallax-content context-dark">
                <div class="container">
                    <h1 class="breadcrumbs-custom-title">Blog List</h1>
                </div>
            </div>
        </div>
        <div class="breadcrumbs-custom-footer">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('blog')}}">Blog</a></li>
                    <li class="active">Blog List</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section section-xl bg-default text-md-left">
        <div class="container">
            <div class="row row-50 row-md-60">
                <div class="col-lg-8 col-xl-9">
                    <div class="inset-xl-right-70">
                        <div class="col-12">
                            <article class="post post-modern-1 box-xxl">
                                <div class="post-modern-panel">
                                    <div><a class="post-modern-tag" href="#">{{ optional($blog->category)->name }}</a></div>
                                    <div>
                                        <time class="post-modern-time" datetime="2020-09-08">{{ $blog->created_at }}</time>
                                    </div>
                                </div>
                                <h3 class="post-modern-title">25 Useful Tips for Baking Delicious Cakes</h3>
                                <div class="post-modern-figure"><img src="{{asset('uploads/'.$blog->image)}}" alt="" width="800" height="394">
                                </div>
                                {!! $blog->description !!}
                            </article>
                            <!-- Quote Classic-->

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="aside row row-30 row-md-50 justify-content-md-between">
                        <div class="aside-item col-12">
                            <!--<div class="team-info box-sm">
                                <a class="team-info-figure" href="#">
                                    <img src="{{asset('front/images/blog/post-author.jpg')}}" alt="" width="123" height="123"/>
                                </a>
                                <h6 class="team-info-title"><a href="#">Lorem Ipsum</a></h6>
                                <p class="team-info-text">Lorem Ipsum is simply dummy text of the printing</p>
                            </div>-->
                            <form class="ch-search form-search" action="" method="GET">
                                <div class="form-wrap">
                                    <label class="form-label" for="search-form">Search blog...</label>
                                    <input class="form-input" id="search-form" type="text" name="s" autocomplete="off">
                                    <button class="button-search fl-bigmug-line-search74" type="submit"> </button>
                                </div>
                            </form>
                        </div>
                        @if(count($categories) > 0)
                        <div class="aside-item col-sm-6 col-md-5 col-lg-12">
                            <h6 class="aside-title">Categories</h6>
                            <ul class="list-categories">
                                @foreach($categories as $key => $category)
                                <li>
                                    <a href="#">{{$category->translate($current_language)->name}}</a>
                                    <span class="list-categories-number">({{count($category->posts)}})</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(count($lastPosts) > 0)
                        <div class="aside-item col-sm-6 col-lg-12">
                            <h6 class="aside-title">Latest Posts</h6>
                            <div class="row row-20 row-lg-30 gutters-10">
                                @foreach($lastPosts as $key => $lastPost)
                                <div class="col-6 col-lg-12">
                                    <article class="post post-minimal">
                                        <div class="unit unit-spacing-sm flex-column flex-lg-row align-items-lg-center">
                                            <div class="unit-left">
                                                <a class="post-minimal-figure" href="{{route('blog-detail', $lastPost->translate($current_language)->slug)}}">
                                                    <img src="{{asset('front/images/blog/post-mini-1.jpg')}}" alt="{{route('blog-detail', $lastPost->translate($current_language)->name)}}" width="106" height="104"/>
                                                </a>
                                            </div>
                                            <div class="unit-body">
                                                <p class="post-minimal-title">
                                                    <a href="{{route('blog-detail', $lastPost->translate($current_language)->slug)}}">
                                                        {{$lastPost->translate($current_language)->name}}
                                                    </a>
                                                </p>
                                                <div class="post-minimal-time">
                                                    <time datetime="2020-03-15">{{ $lastPost->created_at ? $lastPost->created_at->diffForHumans() : '-'}}</time>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection