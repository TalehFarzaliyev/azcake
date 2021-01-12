<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>AzCake</title>
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="Tehzeeb - Responsive Cake Shop Template">
    <meta name="keywochs" content="AzCake, Cake Shop, corporate, business, Shop">
    <meta name="author" content="Azcake">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
    <!-- favicon -->
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="icon" href="{{ asset('front/images/logo.png') }}" type="image/x-icon">

    <!--fonts-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;display=swap">

    <!--Style-->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/toastr.min.css') }}">

    <!--Color Switcher Mockup-->
    <link rel="stylesheet" href="{{ asset('front/dist/color-default.css') }}">
    <link rel="stylesheet" href="{{ asset('front/dist/color-switcher.css') }}">
    @stack('header')
    <style>
        .page{
            opacity: 1 !important;
        }
    </style>
</head>
<body>
<!-- preloader -->
{{--    <div class="preloader">--}}
{{--        <div class="preloader-body">--}}
{{--            <div class="cssload-bell">--}}
{{--                <div class="cssload-circle">--}}
{{--                    <div class="cssload-inner"></div>--}}
{{--                </div>--}}
{{--                <div class="cssload-circle">--}}
{{--                    <div class="cssload-inner"></div>--}}
{{--                </div>--}}
{{--                <div class="cssload-circle">--}}
{{--                    <div class="cssload-inner"></div>--}}
{{--                </div>--}}
{{--                <div class="cssload-circle">--}}
{{--                    <div class="cssload-inner"></div>--}}
{{--                </div>--}}
{{--                <div class="cssload-circle">--}}
{{--                    <div class="cssload-inner"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<!-- page -->
    <div class="page">
        @include('site.particles._header')
        @yield('content')
        @include('site.particles._footer')
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="{{ asset('front/js/core.min.js') }}"></script>
    <script src="{{ asset('front/dist/color-switcher.js') }}"></script>
    <script src="{{ asset('front/dist/colorJS.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    <script src="{{ asset('front/js/toastr.min.js') }}"></script>
    <script type="text/javascript">
        let cart = [];

        $(function () {
            if (localStorage.cart)
            {
                cart = JSON.parse(localStorage.cart);
                showCart();
            }
        });

        $(document).on('click', '.add-to-cart', function (){
            let productId = $(this).data('id');
            let type = $(this).data('type');
            let singleQyt = 0;

            if (type === 1) {
                singleQyt = $('.qyt_'+productId).val();
            } else if(type === 2) {
                if ( $(".cartInput_" + productId).val() === undefined ) {
                    singleQyt = 1;
                } else {
                    singleQyt = $('.cartInput_'+productId).val();
                }
            }

            $.ajax({
                type: "POST",
                url: '/az/add-to-cart',
                data: {productId: productId, _token: $('meta[name="csrf-token"]').attr('content')},
                success: function(data) {
                    if (data.status) {

                        for (let i in cart) {
                            if(cart[i].Number === data.product.id)
                            {
                                if (type === 1) {
                                    cart[i].Qyt = parseInt(cart[i].Qyt) + parseInt(singleQyt);
                                } else if(type === 2) {
                                    cart[i].Qyt = (singleQyt >= 1) ? parseInt(singleQyt) + 1 : 1;
                                }

                                showCart();
                                saveCart();
                                showMessage('success', 'This product add to cart');
                                return;
                            }
                        }

                        if ($('.cartInput_'+productId).val() === undefined) {
                            singleQyt = 1;
                        }

                        let item = {
                            Number: data.product.id,
                            Name: data.product.name,
                            Price: data.product.price,
                            Qyt: parseInt(singleQyt),
                            Picture: 'http://127.0.0.1:8000/uploads/'+data.product.picture,
                            Slug: data.product.slug
                        };
                        cart.push(item);
                        saveCart();
                        showCart();
                        showMessage('success', 'This product add to cart');
                    } else {
                        alert(data.message);
                    }
                }
            });
        });

        $(document).on('change', '.table-cart-stepper input.form-input', function () {
            let cartQty = $(this).val();

            let productId = $(this).attr('data-target');

            if (cartQty < 1) {
                $(this).val(1);
            }

            for (let i in cart) {
                if(cart[i].Number === parseInt(productId))
                {
                    cart[i].Qyt = parseInt($(this).val());
                    showCart();
                    saveCart();
                    $("[data-target|='"+productId+"']").attr('autofocus');
                    return;
                }
            }
        });

        $(document).on('click', '.remove-cart', function () {
            let index = $(this).data('id');
            cart.splice(index,1);
            showCart();
            saveCart();
            showMessage('warning', 'This product remove from basket');
        });

        function showMessage(type, message) {
            toastr.options.progressBar = true;
            toastr.options.showMethod = 'slideDown';
            toastr.options.closeEasing = 'swing';
            toastr.options.closeHtml = '<button><i class="fa fa-power-off"> </i></button>';
            if (type === 'success') {
                toastr.success(message);
            } else if(type === 'warning') {
                toastr.warning(message);
            } else {
                toastr.error(message);
            }
        }

        function saveCart() {
            if ( window.localStorage)
            {
                localStorage.cart = JSON.stringify(cart);
            }
        }

        function showCart() {

            $('.ch-navbar-basket span').text(cart.length);

            if (cart.length === 0) {
                $(".cart-inline").css("visibility", "hidden");
                $("#cart-section").css("visibility", "hidden");
                return;
            }

            $('.cart-inline').css("visibility", "visible");
            $('#cart-section').css("visibility", "visible");

            $('.cart-inline-body').empty();
            $('.cart-list-body').empty();

            let total = 0;
            let countProduct = 0;

            for (let i in cart) {
                let item = cart[i];
                let row = `
                <div class="cart-inline-item">
                    <div class="unit unit-spacing-sm align-items-center">
                        <div class="unit-left">
                            <a class="cart-inline-figure" href="`+item.Slug+`">
                                <img src="`+item.Picture+`" alt="" width="100" height="90"/>
                            </a>
                        </div>
                        <div class="unit-body">
                            <h6 class="cart-inline-name">
                                <a href="`+item.Slug+`"> `+ item.Name +` </a>
                                <button class="btn btn-sm remove-cart pull-right" data-id="`+i+`">
                                    <i class="fa fa-trash"> </i>
                                </button>
                            </h6>
                            <div>
                                <div class="group-xs group-middle">
                                    <div class="table-cart-stepper">
                                        <input class="form-input cartInput_`+ item.Number+`" type="number" data-zeros="true" value="`+ item.Qyt +`" data-target="` +item.Number+ `" min="1" max="1000"/>
                                    </div>
                                    <h6 class="cart-inline-title"> `+ item.Price +` </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
                $(".cart-inline-body").append(row);


                let row2 = `<tr>
                    <td>
                        <a class="table-cart-figure" href="#">
                            <img src="`+item.Picture+`" alt="" width="146" height="132"/>
                        </a>
                        <a class="table-cart-link" href="#"> `+item.Name+` </a></td>
                    <td>$`+item.Price+`</td>
                    <td>
                        <div class="table-cart-stepper">
                            <input class="form-input" type="number" data-zeros="true" value="`+item.Qyt+`" data-target="` +item.Number+ `" min="1" max="1000">
                        </div>
                    </td>
                    <td>$`+item.Price * item.Number+`</td>
                </tr>`;

                countProduct += parseInt(item.Qyt);
                total += (parseFloat(item.Price) * parseInt(item.Qyt));

                $(".cart-list-body").append(row2);
            }
            $('.cart-inline-title.countProduct span').text(countProduct);
            $('.cart-inline-title.total span').text(total);
            $('.heading-3 span').text(total);
        }
    </script>
    @stack('footer')
</body>
</html>