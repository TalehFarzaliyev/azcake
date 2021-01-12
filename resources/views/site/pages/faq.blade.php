@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
<section class="breadcrumbs-custom">
    <div class="parallax-container breadcrumbs_section">
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h1 class="breadcrumbs-custom-title">FAQ</h1>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">FAQ</li>
            </ul>
        </div>
    </div>
</section>
@if($faqs)
<section class="section section-sm section-last bg-default">
    <div class="container">
        <div class="cach-group-custom cach-group-corporate" id="accochion1" role="tablist" aria-multiselectable="false">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($faqs as $key => $faq)
                    <article class="cach cach-custom cach-corporate">
                        <div class="cach-header" role="tab">
                            <div class="cach-title">
                                <a class="collapsed" id="accochion1-cach-head-{{$faq->id}}" data-toggle="collapse" data-parent="#accochion1" href="#accochion1-cach-body-{{$faq->id}}" aria-controls="accochion1-cach-body-{{$faq->id}}" aria-expanded="false" role="button">
                                    {{$faq->translate($current_language)->title}}
                                    <div class="cach-arrow">
                                        <div class="icon"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="collapse" id="accochion1-cach-body-{{$faq->id}}" aria-labelledby="accochion1-cach-head-{{$faq->id}}" data-parent="#accochion1" role="tabpanel">
                            <div class="cach-body">
                                <p>{!! $faq->translate($current_language)->description !!}</p>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection