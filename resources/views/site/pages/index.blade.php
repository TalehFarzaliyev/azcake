@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
    @if($homeSliders)
    <section class="section swiper-container swiper-slider swiper-slider-4" data-loop="true" data-effect="fade">
        <div class="swiper-wrapper">
            @foreach($homeSliders as $key => $homeSlider)
            <div class="swiper-slide swiper-slide-1" data-slide-bg="{{asset('uploads/'.$homeSlider->image)}}">
                <div class="swiper-slide-caption section-md text-sm-left">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 col-md-7">
                                <h1 class="swiper-title-1" data-caption-animate="fadeInLeft" data-caption-delay="100">{{$homeSlider->translate($current_language)->name}}</h1>
                                <h6 class="swiper-title-2 text-width-medium" data-caption-animate="fadeInLeft" data-caption-delay="250">{{$homeSlider->translate($current_language)->description}}</h6>
                                <div class="button-wrap" data-caption-animate="fadeInLeft" data-caption-delay="400"><a class="button button-sm button-primary button-zakaria" href="{{$homeSlider->translate($current_language)->slug}}">{{$homeSlider->translate($current_language)->button_text}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </section>
    @endif
    <section class="section section-xxl section-xxl-2 bg-default text-md-left">
        <div class="container">
            <div class="row row-70 row-lg-70 justify-content-center align-items-md-center">
                <div class="col-xl-12">
                    <div class="row row-30 margin_top50">
                        <div class="col-md-4 col-lg-4 wow fadeInLeft" data-wow-delay=".2s">
                            <article class="box-icon-creative">
                                <div class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
                                    <div class="unit-left">
                                        <div class="box-icon-creative-icon restaurant-icon-27"></div>
                                    </div>
                                    <div class="unit-body">
                                        <h4 class="box-icon-creative-title"><a href="#">Free Shipping</a></h4>
                                        <p class="box-icon-creative-text">Enjoy our fast &amp; free delivery</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4 col-lg-4 wow fadeInLeft" data-wow-delay=".1s">
                            <article class="box-icon-creative">
                                <div class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
                                    <div class="unit-left">
                                        <div class="box-icon-creative-icon restaurant-icon-22"></div>
                                    </div>
                                    <div class="unit-body">
                                        <h4 class="box-icon-creative-title"><a href="#">Fresh &amp; Tasty</a></h4>
                                        <p class="box-icon-creative-text">Only the freshest ingredients</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4 col-lg-4 wow fadeInLeft">
                            <article class="box-icon-creative">
                                <div class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
                                    <div class="unit-left">
                                        <div class="box-icon-creative-icon restaurant-icon-23"></div>
                                    </div>
                                    <div class="unit-body">
                                        <h4 class="box-icon-creative-title"><a href="#">Made with love</a></h4>
                                        <p class="box-icon-creative-text">Prepared with care for our clients</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- New Flavors-->
    @if($homeProducts)
    <section class="section section-xxl bg-primary-2">
        <div class="container">
            <h2 class="text-transform-capitalize wow fadeScale">Our Products</h2>
            <div class="row row-lg row-30 row-lg-50">
                @foreach($homeProducts as $key => $homeProduct)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <article class="product wow fadeInRight">
                        <div class="product-body">
                            <div class="product-figure">
                                <img src="{{asset('uploads/'.$homeProduct->image)}}" alt="{{$homeProduct->translate($current_language)->name}}" width="148" height="128"/>
                            </div>
                            <h5 class="product-title">
                                <a href="{{route('product', [$homeProduct->translate($current_language)->slug])}}">{{$homeProduct->translate($current_language)->name}}</a>
                            </h5>
                            <div class="product-price-wrap">
                                @if($homeProduct->old_price != null )
                                    <div class="product-price product-price-old">${{$homeProduct->old_price}}</div>
                                @endif
                                <div class="product-price">${{$homeProduct->price}}</div>
                            </div>
                        </div>
                        @if($homeProduct->is_sale)
                        <span class="product-badge product-badge-sale">Sale</span>
                        @endif
                        <div class="product-button-wrap">
                            <div class="product-button">
                                <a class="button button-gray-14 button-zakaria fl-bigmug-line-search74" href="{{route('product', [$homeProduct->translate($current_language)->slug])}}"> </a>
                            </div>
                            <div class="product-button">
                                <button class="button button-primary-2 button-zakaria fl-bigmug-line-shopping202 add-to-cart" data-id="{{$homeProduct->id}}" data-type="2"> </button>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection