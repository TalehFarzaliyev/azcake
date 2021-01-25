@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
<section class="breadcrumbs-custom">
    <div class="parallax-container breadcrumbs_section">
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h1 class="breadcrumbs-custom-title">Cart Page</h1>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('products')}}">Shop</a></li>
                <li class="active">Cart Page</li>
            </ul>
        </div>
    </div>
</section>
<!-- Shopping Cart-->
<section class="section section-xl bg-default" id="cart-section">
    <div class="container">
        <!-- shopping-cart-->
        <div class="table-custom-responsive">
            <table class="table-custom table-cart">
                <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>

                        <td>
                            <a class="table-cart-figure" href="{{ route('product', optional($product->associatedModel)->slug) }}">
                                <img src="{{ asset('uploads/'.optional($product->associatedModel)->image) }}" alt="" width="146" height="132"></a>
                            <a class="table-cart-link" href="{{ route('product', optional($product->associatedModel)->slug) }}">{{ $product->name }} {{ $product->attributes['product_attribute'] ? '('.$product->attributes['product_attribute']->name.')' : '' }}</a></td>
                        <td>{{ $product->price }} AZN</td>
                        <td>
                            <div class="table-cart-stepper">
                                <div class="stepper ">
                                    <input readonly class="form-input stepper-input" id="product_quantity_{{ $product->id }}" type="number" data-zeros="true" value="{{ $product->quantity }}" min="1" max="1000">
                                    <span  class="stepper-arrow up up_product_quantity" title="{{ $product->id }}" ></span>
                                    <span class="stepper-arrow down up_product_down" title="{{ $product->id }}" ></span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $product->price*$product->quantity }} AZN</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="group-xl group-justify justify-content-center justify-content-md-between">
            <div>
{{--                <form class="ch-form ch-mailform ch-form-inline ch-form-coupon">--}}
{{--                    <div class="form-wrap">--}}
{{--                        <input class="form-input form-input-inverse" id="coupon-code" type="text" name="text">--}}
{{--                        <label class="form-label" for="coupon-code">Coupon code</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-button">--}}
{{--                        <button class="button button-lg button-primary button-zakaria" type="submit">Apply</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
            </div>
            <div>
                <div class="group-xl group-middle">
                    <div>
                        <div class="group-md group-middle">
{{--                            <div class="heading-5 font-weight-medium text-gray-500">@lang('Total')</div>--}}
                            <div class="heading-3 font-weight-normal"><span>{{ \Cart::getTotalQuantity() }}</span> AZN</div>
                        </div>
                    </div><a class="button button-lg button-primary button-zakaria" href="{{route('checkout')}}">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('footer')

@endpush