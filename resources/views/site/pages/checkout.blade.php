@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
    <section class="breadcrumbs-custom">
        <div class="parallax-container breadcrumbs_section">
            <div class="breadcrumbs-custom-body parallax-content context-dark">
                <div class="container">
                    <h1 class="breadcrumbs-custom-title">Checkout</h1>
                </div>
            </div>
        </div>
        <div class="breadcrumbs-custom-footer">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="grid-shop.html">Shop</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </section>
    <form action="{{ route('cart.postCheckout') }}" method="post">
        @csrf
            @if($products->count())
        <!-- Section checkout form-->
        <section class="section section-sm section-first bg-default text-md-left">
            <div class="container">
                <div class="row row-50 justify-content-center">
                    <div class="col-md-10 col-lg-6">
                        <h3 class="font-weight-medium">@lang('Istifadəçi Məlumatları')</h3>
                        <div class="ch-form ch-mailform form-checkout">
                            <div class="row row-30">
                                <div class="col-sm-6">
                                    <div class="form-wrap">
                                        <input class="form-input @error('first_name') form-control-has-validation @enderror" id="checkout-first-name-1" type="text" name="first_name" value="{{ old('first_name') }}" data-constraints="@Required"/>
                                        @error('first_name')
                                        <span class="form-validation">{{ $message }}</span>
                                        @enderror
                                        <label class="form-label" for="checkout-first-name-1">@lang('First Name')</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-wrap">
                                        <input class="form-input @error('last_name') form-control-has-validation @enderror" id="checkout-last-name-1" type="text" name="last_name" value="{{ old('last_name') }}" data-constraints="@Required"/>
                                        @error('last_name')
                                        <span class="form-validation">{{ $message }}</span>
                                        @enderror
                                        <label class="form-label" for="checkout-last-name-1">@lang('Last Name')</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-wrap">
                                        <input class="form-input @error('phone') form-control-has-validation @enderror" id="checkout-last-name-1" type="text" name="phone" value="{{ old('phone') }}" data-constraints="@Required"/>
                                        @error('phone')
                                        <span class="form-validation">{{ $message }}</span>
                                        @enderror
                                        <label class="form-label" for="checkout-last-name-1">@lang('Phone')</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-wrap">
                                        <input class="form-input @error('address') form-control-has-validation @enderror" id="checkout-address-1" type="text" name="address" data-constraints="@Required"/>
                                        @error('address')
                                        <span class="form-validation">{{ $message }}</span>
                                        @enderror
                                        <label class="form-label" for="checkout-address-1">@lang('Address')</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-lg-6">
                        <h3 class="font-weight-medium">@lang('Sifariş Məlumatları')</h3>
                        <div class="ch-form ch-mailform form-checkout">
                            <div class="row row-30">
                                <div class="col-12">
                                    <div class="form-wrap">
                                        <textarea placeholder="SİFARİŞLƏ BAĞLI XÜSUSİ İSTƏK"  class="form-input @error('special_text') form-control-has-validation @enderror" name="special_text" id="" cols="30" rows="15" style="margin-top: 0px; margin-bottom: 0px; height: 151px;"></textarea>
                                        @error('special_text')
                                        <span class="form-validation">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shopping Cart-->
        <section class="section section-sm bg-default text-md-left" id="cart-section">
            <div class="container">
                <h3 class="font-weight-medium">Your shopping cart</h3>
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
                                            <span class="stepper-arrow up up_product_quantity" title="{{ $product->id }}" ></span>
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
            </div>
        </section>
        <!-- Section Payment-->
        <section class="section section-sm section-last bg-default text-md-left">
            <div class="container">
                <div class="row row-50 justify-content-center">
                    <div class="col-md-10 col-lg-6">
                        <h3 class="font-weight-medium">@lang('Credit Cart Detail')</h3>
                        <div class="ch-form ch-mailform form-checkout">
                            <div class="row row-30">
                                <div class="col-sm-12">
                                    <div class="form-wrap">
                                        <input class="form-input " id="checkout-last-name-1" type="text" name="card_name" value="{{ old('card_name') }}" data-constraints="@Required"/>
                                        <label class="form-label" for="checkout-last-name-1">@lang('Credit Cart Name')</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-wrap">
                                        <input class="form-input" id="checkout-last-name-1" type="text" name="card_number" value="{{ old('card_number') }}" data-constraints="@Required"/>
                                        <label class="form-label" for="checkout-last-name-1">@lang('Credit Cart Number')</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-wrap">
                                        <input class="form-input" id="checkout-first-name-1" type="text" name="due_date" value="{{ old('due_date') }}" data-constraints="@Required"/>
                                        <label class="form-label" for="checkout-first-name-1">@lang('Due Date')</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-wrap">
                                        <input class="form-input" id="checkout-last-name-1" type="text" name="cvc" value="{{ old('cvc') }}" data-constraints="@Required"/>
                                        <label class="form-label" for="checkout-last-name-1">@lang('CVC')</label>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-lg-6">
                        <h3 class="font-weight-medium">Cart total</h3>
                        <div class="table-custom-responsive">
                            <table class="table-custom table-custom-primary table-checkout">
                                <tbody>
                                <tr>
                                    <td>@lang('Cart Subtotal')</td>
                                    <td class="heading-3"><span>{{ \Cart::getTotalQuantity() }}</span> AZN</td>
                                </tr>
                                <tr>
                                    <td>@lang('Shipping')</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>@lang('Total')</td>
                                    <td class="heading-3"><span>{{ \Cart::getTotalQuantity() }}</span> AZN</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="group-xl group-justify justify-content-center justify-content-md-between">
                    <div>
                    </div>
                    <div>
                        <div class="group-xl group-middle">
                            <div>

                            </div><button class="button button-lg button-primary button-zakaria" >@lang('Tamamla')</button>
                        </div>
                    </div>
                </div>

            </div>
        </section>
                @else
                <div class="alert alert-danger mt-5 mb-5">@lang('Səbətinizdə heçbir məhsul yoxdur')</div>
        @endif
    </form>

@endsection