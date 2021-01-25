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


        $('[data-dropdown-class="select-inline-dropdown"]').on('change',function (){
            var base_url = window.location.origin;
            console.log(base_url)
            window.location.href = base_url+'/'+$(this).val();
            console.log($(this).val());
        })

        cart_update()



        $('.add-to-cart').on('click', function (){
            console.log($(this).data('id'))
            $.ajax({
                type: "POST",
                url: '{{ route('cart.store') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: $(this).data('id')
                },
                success: function(data) {
                    if (data.status) {
                        cart_update()
                        // alert('Səbətə məhsul əlavə edildi.')
                        showMessage('success', 'This product add to cart');
                    } else {
                        alert(data.message);
                    }
                }
            });
        });

        $('.add-to-cart-kubpro').on('click', function (){
            var form = $('#single-product').serialize();
            $.ajax({
                type: "POST",
                url: '{{ route('cart.store') }}',
                data: form,
                success: function(data) {
                    if (data.status) {
                        cart_update()
                        // alert('Səbətə məhsul əlavə edildi.')
                        showMessage('success', 'This product add to cart');
                    } else {
                        alert(data.message);
                    }
                }
            });
        });

        function cart_update(){


            $.ajax({
                type: "GET",
                url: '{{ route('cart.jsonCart') }}',
                success: function(data) {
                    $('#quantity_cart_inline').html(data.quantity);
                    $('#quantity_countProduct').html(data.quantity);
                    $('#total_header').html(data.total);
                    $('#header_cart_body').html(data.product_html);
                }
            });
        }


        $('.up_product_quantity').on('click', function (){
            var id = $(this).attr('title');

            var product_quantity = $('#product_quantity_'+id).val();

            changeQuantity({
                id: id,
                _token: '{{ csrf_token() }}',
                quantity: 1,
            });
        });

        $('.up_product_down').on('click', function (){
            var id = $(this).attr('title');
            var product_quantity = $('#product_quantity_'+id).val();
            changeQuantity({
                id: id,
                quantity: -1,
                _token: '{{ csrf_token() }}',
            });
        });

        function changeQuantity(data){
            $.ajax({
                type: "POST",
                url: '{{ route('cart.changeQuantity') }}',
                data: data,
                success: function(data) {
                    if (data.status) {
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                }
            });
        }



        function onch_quantity(q,id){
            console.log(id);
            console.log(q);
            changeQuantity({
                id: id,
                quantity: q,
                _token: '{{ csrf_token() }}',
            });
        }

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

    </script>
    @stack('footer')
</body>
</html>