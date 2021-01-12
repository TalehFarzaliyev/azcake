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
                <tbody class="cart-list-body"> </tbody>
            </table>
        </div>
        <div class="group-xl group-justify justify-content-center justify-content-md-between">
            <div>
                <form class="ch-form ch-mailform ch-form-inline ch-form-coupon">
                    <div class="form-wrap">
                        <input class="form-input form-input-inverse" id="coupon-code" type="text" name="text">
                        <label class="form-label" for="coupon-code">Coupon code</label>
                    </div>
                    <div class="form-button">
                        <button class="button button-lg button-primary button-zakaria" type="submit">Apply</button>
                    </div>
                </form>
            </div>
            <div>
                <div class="group-xl group-middle">
                    <div>
                        <div class="group-md group-middle">
                            <div class="heading-5 font-weight-medium text-gray-500">Total</div>
                            <div class="heading-3 font-weight-normal">$<span>0</span> </div>
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