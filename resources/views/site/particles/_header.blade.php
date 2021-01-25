<header class="section page-header">
    <!-- RD Navbar-->
    <div class="header-top">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6">

                    @if(get_menus(2)->count())
                        <div class="topbar-left text-left">
                            <ul>
                                @foreach(get_menus(2) as $key => $topMenu)
                                    <li @if($topMenu->children->count() > 0) class="dropdown" @endif>
                                        <a
                                                @if($topMenu->children->count() > 0)
                                                class="dropdown-toggle nav-link cursor-pointer"
                                                id="dropdownMenu{{$key}}"
                                                data-toggle="dropdown"
                                                aria-haspopup="false"
                                                aria-expanded="true"
                                                @endif
                                                href="{{ $topMenu->page ? route('page', $topMenu->page->slug) : ($topMenu->category ? ($topMenu->category->is_product ?  route('category',$topMenu->category->slug) : route('blog.category',$topMenu->category->slug))  : url($topMenu->route)) }}"
                                        >

                                            {{ $topMenu->page ? $topMenu->page->title : ($topMenu->category ? $topMenu->category->name :  __($topMenu->lang)) }}
                                            @if($topMenu->children->count() > 0)
                                                <span class="caret"> </span>
                                            @endif
                                        </a>
                                        @if($topMenu->children->count() > 0)
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{$key}}">
                                                @foreach($topMenu->children as $secret => $child)
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ $topMenu->page ? route('page', $topMenu->page->slug) : ($topMenu->category ? route('category',$topMenu->category->slug) : url($topMenu->route)) }}">
                                                            {{ $child->page ? $child->page->title : ($child->category ? $child->category->name :  __($child->lang)) }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <ul class="login-main">
                        @if(auth()->guard('customer')->user())
                        <li class="dropdown">
                            <a class="dropdown-toggle cursor-pointer" id="dropdownMenuUser" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true" href="#">
                                {{auth()->guard('customer')->user()->first_name}} {{auth()->guard('customer')->user()->last_name}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuUser">
                                <li class="nav-item">
                                    <a href="{{route('profile')}}">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('logout')}}">Logout</a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li>
                            <a href="{{route('login')}}" class="mr-3">@lang('Login')</a>
                            <a href="{{route('register')}}">@lang('Register')</a>
                        </li>
                        @endif
                    </ul>
                    <div class="footer-social clearfix">
                        <ul class="footer-social-icons">
                            <li><a href="{{$settings['facebook']->value}}"><i class="fa fa-facebook-square"> </i></a></li>
                            <li><a href="{{$settings['instagram']->value}}"><i class="fa fa-instagram"> </i></a></li>
                            <li><a href="{{$settings['pinterest']->value}}"><i class="fa fa-pinterest"> </i></a></li>
                            <li><a href="{{$settings['youtube']->value}}"><i class="fa fa-youtube"> </i></a></li>
                        </ul>
                        <div class="ch-navbar-fixed-element-2 select-inline">
                            <label>
                                <select data-dropdown-class="select-inline-dropdown">
                                    @foreach($languages as $key => $value)
                                    <option @if($current_language == $value->code) selected @endif value="{{$value->code}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ch-navbar-wrap">
        <nav class="ch-navbar ch-navbar-classic" data-layout="ch-navbar-fixed" data-sm-layout="ch-navbar-fixed" data-md-layout="ch-navbar-fixed" data-md-device-layout="ch-navbar-fixed" data-lg-layout="ch-navbar-static" data-lg-device-layout="ch-navbar-fixed" data-xl-layout="ch-navbar-static" data-xl-device-layout="ch-navbar-static" data-xxl-layout="ch-navbar-static" data-xxl-device-layout="ch-navbar-static" data-lg-stick-up-offset="100px" data-xl-stick-up-offset="100px" data-xxl-stick-up-offset="100px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="ch-navbar-main-outer">
                <div class="ch-navbar-main">
                    <!-- RD Navbar Panel-->
                    <div class="ch-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button class="ch-navbar-toggle" data-ch-navbar-toggle=".ch-navbar-nav-wrap"><span> </span></button>
                        <!-- RD Navbar Brand-->
                        <div class="ch-navbar-brand">
                            <!--Brand-->
                            <a href="{{route('home')}}">
                                <img class="logo-default" src="{{asset('front/images/logo.png')}}" alt="Logo" />
                            </a>
                        </div>
                    </div>
                    @if(get_menus(1)->count())
                    <div class="ch-navbar-nav-wrap">
                        <ul class="ch-navbar-nav">
                            @foreach(get_menus(1) as $key => $bottomMenu)
                            <li class="ch-nav-item active">
                                <a class="ch-nav-link" href="{{ $bottomMenu->page ? route('page', $bottomMenu->page->slug) : ($bottomMenu->category ? ($bottomMenu->category->is_product ? route('category',$bottomMenu->category->slug) : route('blog.category',$bottomMenu->category->slug)) : url($bottomMenu->route)) }}">
                                    {{ $bottomMenu->page ? $bottomMenu->page->title : ($bottomMenu->category ? $bottomMenu->category->name :  __($bottomMenu->lang)) }}

                                </a>
                                @if($bottomMenu->children->count() > 0)
                                <ul class="ch-menu ch-navbar-dropdown">
                                    @foreach($bottomMenu->children as $secret => $child)
                                    <li class="ch-dropdown-item active">
                                        <a class="ch-dropdown-link" href="{{ $child->page ? route('page', $child->page->slug) : ($child->category ? route('category',$child->category->slug) : url($child->route)) }}">
                                            {{ $child->page ? $child->page->title : ($child->category ? $child->category->name :  __($child->lang)) }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="ch-navbar-main-element">
                        <!-- RD Navbar Search-->
                        <div class="ch-navbar-search ch-navbar-search-2">
                            <button class="ch-navbar-search-toggle ch-navbar-fixed-element-3" data-ch-navbar-toggle=".ch-navbar-search">
                                <span ></span>
                            </button>
                            <form class="ch-search" action="#" data-search-live="ch-search-results-live" method="GET">
                                <div class="form-wrap">
                                    <input class="ch-navbar-search-form-input form-input" id="ch-navbar-search-form-input" type="text" name="s" autocomplete="off"/>
                                    <label class="form-label" for="ch-navbar-search-form-input">Search...</label>
                                    <div class="ch-search-results-live" id="ch-search-results-live"></div>
                                    <button class="ch-search-form-submit fl-bigmug-line-search74" type="submit"> </button>
                                </div>
                            </form>
                        </div>
                        <!-- RD Navbar Basket-->
                        <div class="ch-navbar-basket-wrap">
                            <button class="ch-navbar-basket fl-bigmug-line-shopping202" data-ch-navbar-toggle=".cart-inline"><span id="quantity_cart_inline">0</span>
                            </button>
                            <div class="cart-inline">
                                <div class="cart-inline-header">
                                    <h5 class="cart-inline-title countProduct">In cart:<span id="quantity_countProduct"> 0</span> Products</h5>
                                    <h6 class="cart-inline-title total">Total price: <span id="total_header">0</span> AZN</h6>
                                </div>
                                <div class="cart-inline-body" id="header_cart_body"></div>
                                <div class="cart-inline-footer">
                                    <div class="group-sm">
                                        <a class="button button-default-outline-2 button-zakaria" href="{{route('cart')}}">Go to cart</a>
                                        <a class="button button-primary button-zakaria" href="{{route('checkout')}}">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="ch-navbar-basket ch-navbar-basket-mobile fl-bigmug-line-shopping202 ch-navbar-fixed-element-2" href="{{route('cart')}}"><span>2</span></a>
                        <button class="ch-navbar-project-hamburger ch-navbar-project-hamburger-open ch-navbar-fixed-element-1" type="button" data-multitoggle=".ch-navbar-main" data-multitoggle-blur=".ch-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate">
                            <span class="project-hamburger">
                                <span class="project-hamburger-line"> </span>
                                <span class="project-hamburger-line"> </span>
                                <span class="project-hamburger-line"> </span>
                                <span class="project-hamburger-line"> </span>
                            </span>
                        </button>
                    </div>
                    <div class="ch-navbar-project">
                        <div class="ch-navbar-project-header">
                            <button class="ch-navbar-project-hamburger ch-navbar-project-hamburger-close" type="button" data-multitoggle=".ch-navbar-main" data-multitoggle-blur=".ch-navbar-wrap" data-multitoggle-isolate>
                                <span class="project-close">
                                    <span> </span>
                                    <span> </span>
                                </span>
                            </button>
                            <h5 class="ch-navbar-project-title">Our Contacts</h5>
                        </div>
                        <div class="ch-navbar-project-content">
                            <div>
                                <div>
                                    <ul class="contacts-modern">
                                        <li><i class="fa fa-phone"> </i> {{$settings['phone']->value}}</li>
                                        <li><i class="fa fa-envelope"> </i> {{$settings['email']->value}}</li>
                                        <li><i class="fa fa-clock-o"> </i> {{$settings['clock']->value}}</li>
                                    </ul>
                                </div>
                                <div>
                                    <ul class="list-inline list-social list-inline-xl">
                                        <li><a href="{{$settings['facebook']->value}}"><i class="fa fa-facebook-square"> </i></a></li>
                                        <li><a href="{{$settings['instagram']->value}}"><i class="fa fa-instagram"> </i></a></li>
                                        <li><a href="{{$settings['pinterest']->value}}"><i class="fa fa-pinterest"> </i></a></li>
                                        <li><a href="{{$settings['youtube']->value}}"><i class="fa fa-youtube"> </i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>