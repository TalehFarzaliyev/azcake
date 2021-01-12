@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
<section class="breadcrumbs-custom">
    <div class="parallax-container breadcrumbs_section">
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h1 class="breadcrumbs-custom-title">Grid Shop</h1>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('products')}}">Shop</a></li>
                <li class="active">Grid Shop</li>
            </ul>
        </div>
    </div>
</section>
<section class="section section-xxl bg-primary-2 text-md-left">
    <div class="container">
        <div class="row row-50">
            <div class="col-lg-4 col-xl-3">
                <div class="aside row row-30 row-md-50 justify-content-md-between">

                    <form class="filterForm" id="filterForm" action="" method="get">
                        <input type="hidden" class="ch-range-input-value-1" name="start" value="{{$start}}"/>
                        <input type="hidden" class="ch-range-input-value-2" name="end" value="{{$end}}"/>
                        <input type="hidden" class="query-filter" name="query" value="{{$query}}"/>
                        <input type="hidden" class="sort-filter" name="sort" value="{{$sort}}"/>
                        <input type="hidden" class="count-filter" name="count" value="{{$count}}"/>
                        <div class="category-inputs">
                            @if(count($selectedCategories) > 0)
                                @foreach($selectedCategories as $selectedCategory)
                                    <input type="hidden" name="category[]" value="{{$selectedCategory}}"/>
                                @endforeach
                            @endif
                        </div>
                    </form>

                    <div class="aside-item col-12">
                        <h6 class="aside-title">Filter by Price</h6>
                        <div class="ch-range"
                             data-min="0"
                             data-max="999"
                             data-min-diff="100"
                             data-start="[{{$start}}, {{$end}}]"
                             data-step="1"
                             data-tooltip="false"
                             data-input=".ch-range-input-value-1"
                             data-input-2=".ch-range-input-value-2">
                        </div>
                        <div class="group-xs group-justify">
                            <div>
                                <button class="button button-sm button-secondary button-zakaria button-filter">Filter</button>
                            </div>
                            <div>
                                <div class="ch-range-wrap">
                                    <div class="ch-range-title">Price:</div>
                                    <div class="ch-range-form-wrap"><span>$</span>
                                        <label>
                                            <input class="ch-range-input ch-range-input-value-1" type="text">
                                        </label>
                                    </div>
                                    <div class="ch-range-divider"></div>
                                    <div class="ch-range-form-wrap"><span>$</span>
                                        <label>
                                            <input class="ch-range-input ch-range-input-value-2" type="text">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aside-item col-sm-6 col-md-5 col-lg-12">
                        @if($categories)
                            <h6 class="aside-title">Categories</h6>
                            <ul class="list-shop-filter">
                                @foreach($categories as $category)
                                    <li>
                                        <label class="checkbox-inline">
                                            <input name="category[]" class="category" value="{{$category->id}}" @if(in_array($category->id, $selectedCategories)) checked="checked" @endif type="checkbox">
                                            {{$category->translate($current_language)->name ?? '-'}}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="ch-search form-search form-custom">
                            <div class="form-wrap">
                                <input class="form-input" id="search-form" value="{{$query}}" type="text" autocomplete="off">
                                <label class="form-label" for="search-form">Məhsul axtar..</label>
                                <button class="button-search fl-bigmug-line-search74"> </button>
                            </div>
                        </div>
                    </div>
                    @if($popularProducts)
                    <div class="aside-item col-sm-6 col-lg-12">
                        <h6 class="aside-title">Popular products</h6>
                        <div class="row row-10 row-lg-20 gutters-10">
                            @foreach($popularProducts as $key => $popularProduct)
                            <div class="col-4 col-sm-6 col-md-12">
                                <article class="product-minimal">
                                    <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                                        <div class="unit-left">
                                            <a class="product-minimal-figure" href="{{route('product', [$popularProduct->translate($current_language)->slug])}}">
                                                <img src="{{asset('uploads/'.$popularProduct->image)}}" alt="{{$popularProduct->translate($current_language)->name}}" width="106" height="104"/>
                                            </a>
                                        </div>
                                        <div class="unit-body">
                                            <p class="product-minimal-title">
                                                <a href="{{route('product', [$popularProduct->translate($current_language)->slug])}}">{{$popularProduct->translate($current_language)->name}}</a>
                                            </p>
                                            <p class="product-minimal-price">${{$popularProduct->price}}</p>
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
            <div class="col-lg-8 col-xl-9">
                <div class="product-top-panel group-md">
                    <div>
                        <div class="group-sm group-middle">
                            <div class="product-top-panel-sorting">
                                <label>
                                    <select class="sort">
                                        <option value="0" @if($sort == 0) selected @endif>Ən yenilər</option>
                                        <option value="1" @if($sort == 1) selected @endif>Bahadan ucuza</option>
                                        <option value="2" @if($sort == 2) selected @endif>Ucuzdan bahaya</option>
                                        <option value="3" @if($sort == 3) selected @endif>Ən çox satan</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="group-sm group-middle">
                            <div class="product-top-panel-sorting">
                                <label>
                                    <select class="paginate-count">
                                        <option value="12" @if($count == 12) selected @endif>12</option>
                                        <option value="24" @if($count == 24) selected @endif>24</option>
                                        <option value="36" @if($count == 36) selected @endif>36</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-30 row-lg-50">
                    @if($products)
                    @foreach($products as $key => $product)
                    <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">
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

    let category = [];

    $(document).on('change', '#search-form', function () {
        if ($('.query-filter').val($(this).val())) {
            $('#filterForm').submit();
        }
    });
    $(document).on('change', '.sort', function () {
        if ($('.sort-filter').val($(this).val())) {
            $('#filterForm').submit();
        }
    });
    $(document).on('change', '.paginate-count', function () {
        if ($('.count-filter').val($(this).val())) {
            $('#filterForm').submit();
        }
    });
    $(document).on('change', '.category', function () {
        let inputs = '';
        $('.category').each(function (index, value){
            if ($(value).is(':checked')) {
                inputs += '<input type="hidden" name="category[]" value="'+parseInt($(value).val())+'"/>';
            }
        });
        $('.category-inputs').html(inputs);

        $('#filterForm').submit();
    });
    $(document).on('click', '.button-search', function () {
        $('#filterForm').submit();
    });
    $(document).on('click', '.button-filter', function () {
        $('#filterForm').submit();
    });
</script>
@endpush