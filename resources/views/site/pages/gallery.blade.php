@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
<section class="breadcrumbs-custom">
    <div class="parallax-container breadcrumbs_section">
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h1 class="breadcrumbs-custom-title">Gallery</h1>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Gallery</li>
            </ul>
        </div>
    </div>
</section>
<section class="section section-xl bg-default">
    <div class="container-fluid isotope-wrap isotope-custom-2">
        <div class="isotope-filters">
            <button class="isotope-filters-toggle button button-sm button-icon button-icon-right button-default-outline" data-custom-toggle=".isotope-filters-list" data-custom-toggle-disable-on-blur="true" data-custom-toggle-hide-on-blur="true"><span class="icon mdi mdi-chevron-down"></span>Filter</button>
            <div class="isotope-filters-list-wrap">
                <ul class="isotope-filters-list">
                    <li><a class="active" href="#" data-isotope-filter="*">View all</a></li>
                    @if($galleryCategories)
                        @foreach($galleryCategories as $galleryCategory)
                            <li>
                                <a href="#" data-isotope-filter="Type {{$galleryCategory->id}}">{{$galleryCategory->translate($current_language)->name}}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        @if($galleries)
        <div class="row row-30 isotope" data-lightgallery="group">
            @foreach($galleries as $gallery)
            <div class="col-sm-6 col-md-6 col-xl-4 isotope-item" data-filter="Type {{$gallery->gallery_category_id}}">
                <article class="thumbnail-classic block-1">
                    <div class="thumbnail-classic-figure">
                        <img src="{{asset('uploads/'.$gallery->image)}}" alt="" width="370" height="315"/>
                    </div>
                    <div class="thumbnail-classic-caption">
                        <div>
                            <h5 class="thumbnail-classic-title">
                                <a href="{{route('product', [$gallery->product->translate($current_language)->slug])}}">{{$gallery->product->translate($current_language)->name}}</a>
                            </h5>
                            <div class="thumbnail-classic-price">${{$gallery->product->price}}</div>
                            <div class="thumbnail-classic-button-wrap">
                                <div class="thumbnail-classic-button">
                                    <a class="button button-gray-6 button-zakaria fl-bigmug-line-search74" href="{{asset('uploads/'.$gallery->image)}}" data-lightgallery="item">
                                        <img src="{{asset('uploads/'.$gallery->image)}}" alt="" width="370" height="315"/>
                                    </a>
                                </div>
                                <div class="thumbnail-classic-button">
                                    <button class="button button-secondary-3 button-zakaria fl-bigmug-line-shopping202 add-to-cart" data-id="{{$gallery->product->id}}" data-type="2"> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection