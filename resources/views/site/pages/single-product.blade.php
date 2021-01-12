@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
<section class="breadcrumbs-custom">
    <div class="parallax-container breadcrumbs_section">
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h1 class="breadcrumbs-custom-title">{{$product->translate($current_language)->name}}</h1>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('products')}}">Shop</a></li>
                <li class="active">{{$product->translate($current_language)->name}}</li>
            </ul>
        </div>
    </div>
</section>
<!-- Single Product-->
<section class="section section-xxl section-first bg-default">
    <div class="container">
        <div class="row row-30">
            <div class="col-lg-6">
                @if($product->images)
                <div class="slick-vertical slick-product">
                    <div class="slick-slider carousel-parent" id="carousel-parent" data-items="1" data-swipe="true" data-child="#child-carousel" data-for="#child-carousel">
{{--                        @foreach($product->images as $key => $image)--}}
                        <div class="item">
                            <div class="slick-product-figure">
                                <img src="{{asset('uploads/'.$product->image)}}" alt="{{$product->translate($current_language)->name}}" width="530" height="480"/>
                            </div>
                        </div>
{{--                        @endforeach--}}
                    </div>
                    <div class="slick-slider child-carousel slick-nav-1" id="child-carousel" data-arrows="true" data-items="3" data-sm-items="3" data-md-items="3" data-lg-items="3" data-xl-items="3" data-xxl-items="3" data-md-vertical="true" data-for="#carousel-parent">
                        {{--@foreach($product->images as $key => $image)--}}
                        <div class="item">
                            <div class="slick-product-figure">
                                <img src="{{asset('uploads/'.$product->image)}}" alt="{{$product->translate($current_language)->name}}" width="530" height="480"/>
                            </div>
                        </div>
{{--                        @endforeach--}}
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="single-product">
                    <h3 class="text-transform-none font-weight-medium">{{$product->translate($current_language)->name}}</h3>
                    <div class="group-md group-middle">
                        <div class="single-product-price">{{$product->price}} AZN</div>
                        <div class="single-product-rating">
                            <span class="icon mdi mdi-star"> </span>
                            <span class="icon mdi mdi-star"> </span>
                            <span class="icon mdi mdi-star"> </span>
                            <span class="icon mdi mdi-star"> </span>
                            <span class="icon mdi mdi-star-half"> </span>
                        </div>
                    </div>
                    <hr class="hr-gray-100">
                    @if($productAttributes)
                    <ul class="list list-description">
                        @foreach($productAttributes as $productAttribute)
                        @if(isset($attributes[$productAttribute->id]))
                        <li>
                            <span>{{$productAttribute->translate($current_language)->name}}:</span>
                            <span>{{$attributes[$productAttribute->id][0]['name']}}</span>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    @endif
                    <div class="group-xs group-middle">
                        <div class="product-stepper">
                            <label>
                                <input class="form-input qyt_{{$product->id}}" type="number" data-zeros="true" value="1" min="1" max="1000">
                            </label>
                        </div>
                        <div>
                            <button class="button button-lg button-secondary button-zakaria add-to-cart" data-id="{{$product->id}}" data-type="1">Add to cart</button>
                        </div>
                    </div>
                    <hr class="hr-gray-100">
                    <div class="group-xs group-middle"><span class="list-social-title">Share</span>
                        <div>
                            <ul class="list-inline list-social list-inline-sm">
                                <li><a class="icon mdi mdi-facebook" href="#"> </a></li>
                                <li><a class="icon mdi mdi-twitter" href="#"> </a></li>
                                <li><a class="icon mdi mdi-instagram" href="#"> </a></li>
                                <li><a class="icon mdi mdi-google-plus" href="#"> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap tabs-->
        <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-1">
            <!-- Nav tabs-->
            <div class="nav-tabs-wrap">
                <ul class="nav nav-tabs nav-tabs-1">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active show" href="#tabs-1-2" data-toggle="tab">Additional information</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#tabs-1-3" data-toggle="tab">Delivery and payment</a>
                    </li>
                </ul>
            </div>
            <!-- Tab panes-->
            <div class="tab-content tab-content-1">
                <div class="tab-pane active show" id="tabs-1-2">
                    <div class="single-product-info">
                        <div class="unit unit-spacing-md flex-column flex-sm-row align-items-sm-center">
                            <div class="unit-left"><span class="icon icon-80 mdi mdi-information-outline"> </span></div>
                            <div class="unit-body">
                                {!!  $product->translate($current_language)->description !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-1-3">
                    <div class="single-product-info">
                        <div class="unit unit-spacing-md flex-column flex-sm-row align-items-sm-center">
                            <div class="unit-left"><span class="icon icon-80 mdi mdi-truck-delivery"> </span></div>
                            <div class="unit-body">
                                <p>Lorem ipsum dolor sit amet, has mutat labores nostrum ei. Duo te blandit erroribus, ut sea ipsum nonumy, mel no ignota accusamus gloriatur. Id has habeo regione, explicari hendrerit reprimique cum teLorem ipsum dolor sit amet, has mutat labores nostrum ei. Duo te blandit erroribus, ut sea ipsum nonumy, mel no ignota accusamus gloriatur. Id has habeo regione, explicari hendrerit reprimique cum te</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if($featuredProducts != null)
<section class="section section-xl section-last bg-primary-2">
    <div class="container">
        <h4 class="font-weight-sbold">Featured Products</h4>
        <div class="row row-lg row-30 row-lg-50 justify-content-center">
            @foreach($featuredProducts as $key => $featuredProduct)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <article class="product wow fadeInRight">
                        <div class="product-body">
                            <div class="product-figure">
                                <img src="{{asset('uploads/'.$featuredProduct->image)}}" alt="{{$featuredProduct->translate($current_language)->name}}" width="148" height="128"/>
                            </div>
                            <h5 class="product-title">
                                <a href="{{route('product', [$featuredProduct->translate($current_language)->slug])}}">{{$featuredProduct->translate($current_language)->name}}</a>
                            </h5>
                            <div class="product-price-wrap">
                                @if($featuredProduct->old_price != null)
                                    <div class="product-price product-price-old">${{$featuredProduct->old_price}}</div>
                                @endif
                                <div class="product-price">${{$featuredProduct->price}}</div>
                            </div>
                        </div>
                        @if($featuredProduct->is_sale)
                            <span class="product-badge product-badge-sale">Sale</span>
                        @endif
                        <div class="product-button-wrap">
                            <div class="product-button">
                                <a class="button button-gray-14 button-zakaria fl-bigmug-line-search74" href="{{route('product', [$featuredProduct->translate($current_language)->slug])}}"> </a>
                            </div>
                            <div class="product-button">
                                <button class="button button-primary-2 button-zakaria fl-bigmug-line-shopping202 add-to-cart" data-id="{{$featuredProduct->id}}" data-type="2"> </button>
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