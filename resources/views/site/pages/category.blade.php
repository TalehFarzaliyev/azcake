@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
<section class="breadcrumbs-custom">
    <div class="parallax-container breadcrumbs_section">
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h1 class="breadcrumbs-custom-title">{{$category->translate($current_language)->name}}</h1>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="#">Category</a></li>
                <li class="active">{{$category->translate($current_language)->name}}</li>
            </ul>
        </div>
    </div>
</section>
<section class="section section-xxl bg-primary-2 text-md-left">
    <div class="container">
        <div class="row row-50">
            <div class="col-lg-12 col-xl-12">
                <form class="operationForm" action="" method="get">
                    <div class="product-top-panel group-md">
                        <div>
                            <div class="group-sm group-middle">
                                <div class="product-top-panel-sorting">
                                    <label>
                                        <select name="sort" class="sort">
                                            <option value="0" @if($sort == 0) selected @endif>Ən yenilər</option>
                                            <option value="1" @if($sort == 1) selected @endif>Bahadan ucuza</option>
                                            <option value="2" @if($sort == 2) selected @endif>Ucuzdan bahaya</option>
                                            <option value="2" @if($sort == 3) selected @endif>Ən çox satan</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="group-sm group-middle">
                                <div class="product-top-panel-sorting">
                                    <label>
                                        <select name="count" class="paginate-count">
                                            <option value="12" @if($count == 3) selected @endif>12</option>
                                            <option value="24" @if($count == 3) selected @endif>24</option>
                                            <option value="36" @if($count == 3) selected @endif>36</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row row-30 row-lg-50">
                    @if($products)
                        @foreach($products as $key => $product)
                            <div class="col-sm-6 col-md-3 col-lg-6 col-xl-3">
                                <article class="product wow fadeInRight">
                                    <div class="product-body">
                                        <div class="product-figure">
                                            <img src="{{asset('uploads/'.$product->image)}}" alt="{{$product->translate($current_language)->name}}" width="148" height="128"/>
                                        </div>
                                        <h5 class="product-title">
                                            <a href="{{route('product', [$product->translate($current_language)->slug])}}">{{$product->translate($current_language)->name}}</a>
                                        </h5>
                                        <div class="product-price-wrap">
                                            @if($product->old_price != null)
                                                <div class="product-price product-price-old">${{$product->old_price}}</div>
                                            @endif
                                            <div class="product-price">${{$product->price}}</div>
                                        </div>
                                    </div>
                                    @if($product->is_sale)
                                        <span class="product-badge product-badge-sale">Sale</span>
                                    @endif
                                    <div class="product-button-wrap">
                                        <div class="product-button">
                                            <a class="button button-gray-14 button-zakaria fl-bigmug-line-search74" href="{{route('product', [$product->translate($current_language)->slug])}}"> </a>
                                        </div>
                                        <div class="product-button">
                                            <button class="button button-primary-2 button-zakaria fl-bigmug-line-shopping202 add-to-cart" data-id="{{$product->id}}" data-type="2"> </button>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="pagination-wrap">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('footer')
<script type="text/javascript">
    $(document).on('change', '.sort', function () {
        $('.operationForm').submit();
    });

    $(document).on('change', '.paginate-count', function () {
        $('.operationForm').submit();
    });
</script>
@endpush