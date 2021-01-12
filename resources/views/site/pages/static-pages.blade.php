@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
<section class="breadcrumbs-custom">
    <div class="parallax-container breadcrumbs_section">
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h1 class="breadcrumbs-custom-title">{{$page->translate($current_language)->title}}</h1>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">{{$page->translate($current_language)->title}}</li>
            </ul>
        </div>
    </div>
</section>
<section class="section section-xxl bg-default text-md-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                {!! $page->translate($current_language)->description !!}
            </div>
        </div>
    </div>
</section>
@endsection