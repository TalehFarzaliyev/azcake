<footer class="section footer-modern footer-modern-2">
    <div class="footer-modern-body section-xl">
        <div class="container">
            <div class="row row-40 row-md-50 justify-content-xl-between">
                <div class="col-md-10 col-lg-3 col-xl-4 wow fadeInRight">
                    <div class="inset-xl-right-70 block-1">
                        <div class="footer-classic-brand">
                            <a href="{{route('home')}}">
                                <img class="footer-default" src="{{asset('front/images/logo.png')}}" alt="" />
                            </a>
                        </div>
                        <p class="footer-classic-text">{{$settings['footer_message_'.$current_language]->value}}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-7 col-lg-5 wow fadeInRight" data-wow-delay=".1s">
                    <h5 class="footer-modern-title"></h5>
{{--                    <ul class="footer-modern-list footer-modern-list-2 d-sm-inline-block d-md-block">--}}
{{--                        @if($footerMenus)--}}
{{--                            @foreach($footerMenus as $footerMenu)--}}
{{--                            <li>--}}
{{--                                <a href="{{$footerMenu->translate($current_language)->slug}}">{{$footerMenu->translate($current_language)->name}}</a>--}}
{{--                            </li>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
{{--                        @if($footerCategories)--}}
{{--                            @foreach($footerCategories as $footerCategory)--}}
{{--                            <li>--}}
{{--                                <a href="{{$footerCategory->translate($current_language)->slug}}">{{$footerCategory->translate($current_language)->name}}</a>--}}
{{--                            </li>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
{{--                    </ul>--}}
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay=".2s">
                    <h5 class="footer-modern-title">{{__('general.get_in_tocuh')}}</h5>
                    <ul class="contacts-creative">
                        <li>
                            <div class="unit unit-spacing-sm flex-column flex-md-row">
                                <div class="unit-left"><span class="icon mdi mdi-map-marker"> </span></div>
                                <div class="unit-body">
                                    <a href="#">{{$settings['address_'.$current_language]->value}}</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="unit unit-spacing-sm flex-column flex-md-row">
                                <div class="unit-left"><span class="icon mdi mdi-phone"> </span></div>
                                <div class="unit-body"><a href="tel:{{$settings['phone']->value}}">{{$settings['phone']->value}}</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="unit unit-spacing-sm flex-column flex-md-row">
                                <div class="unit-left"><span class="icon mdi mdi-email-outline"> </span></div>
                                <div class="unit-body"><a href="#">{{$settings['email']->value}}</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-modern-panel text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-copyright">
                        <p>Copyright © {{date('Y')}} <a href="http://azcake.az">Azcake</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-payment-icon">
                        <a href="#">
                            <img src="{{asset('front/images/about/paymentimg.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>