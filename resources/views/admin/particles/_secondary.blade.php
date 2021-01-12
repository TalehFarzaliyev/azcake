<div class="navbar navbar-expand-md navbar-light">
    <div class="text-center d-md-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                data-target="#navbar-navigation">
            <i class="icon-unfold mr-2"> </i>
            Navigation
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-navigation">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="navbar-nav-link {{ request()->routeIs('admin.dashboard')  ? 'active' : ''}}">
                    <i class="icon-home4 mr-2"> </i>
                    {{ __('messages.dashboard') }}
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('admin.filemanager') }}" class="navbar-nav-link {{ request()->routeIs('admin.filemanager.*')  ? 'active' : ''}}">
                    <i class="icon-cog mr-2"> </i>
                    {{ __('messages.filemanager') }}
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.menu.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.menu.*')  ? 'active' : ''}}">
                    <i class="icon-cog mr-2"> </i>
                    {{ __('messages.menu') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.product.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.product.*')  ? 'active' : ''}}">
                    <i class="icon-cog mr-2"></i>
                    {{ __('messages.product') }}
                </a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('admin.product_category.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.product_category.*')  ? 'active' : ''}}">--}}
{{--                    <i class="icon-cog mr-2"></i>--}}
{{--                    {{ __('messages.product-category') }}--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-item">
                <a href="{{ route('admin.product_attribute.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.product_attribute.*')  ? 'active' : ''}}">
                    <i class="icon-cog mr-2"></i>
                    {{ __('messages.product-attribute') }}
                </a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('admin.subscriber.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.subscriber.*')  ? 'active' : ''}}">--}}
{{--                    <i class="icon-cog mr-2"> </i>--}}
{{--                    {{ __('messages.subscriber') }}--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="nav-item">
                <a href="{{ route('admin.faq.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.faq.*')  ? 'active' : ''}}">
                    <i class="icon-cog mr-2"> </i>
                    {{ __('messages.faq') }}
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.post.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.post.*')  ? 'active' : ''}}">
                    <i class="icon-cog mr-2"> </i>
                    {{ __('messages.post') }}
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.page.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.page.*')  ? 'active' : ''}}">
                    <i class="icon-cog mr-2"> </i>
                    {{ __('messages.page') }}
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.category.*')  ? 'active' : ''}}">
                    <i class="icon-cog mr-2"> </i>
                    {{ __('messages.category') }}
                </a>
            </li>

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('admin.service.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.service.*')  ? 'active' : ''}}">--}}
{{--                    <i class="icon-cog mr-2"> </i>--}}
{{--                    {{ __('messages.service') }}--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('admin.portfolio.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.portfolio.*')  ? 'active' : ''}}">--}}
{{--                    <i class="icon-cog mr-2"> </i>--}}
{{--                    {{ __('messages.portfolio') }}--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('admin.testimonial.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.testimonial.*')  ? 'active' : ''}}">--}}
{{--                    <i class="icon-cog mr-2"> </i>--}}
{{--                    {{ __('messages.testimonial') }}--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="nav-item">
                <a href="{{ route('admin.contact.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.contact.*')  ? 'active' : ''}}">
                    <i class="icon-cog mr-2"> </i>
                    {{ __('messages.contact') }}
                </a>
            </li>

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('admin.team.index') }}" class="navbar-nav-link {{ request()->routeIs('admin.team.*')  ? 'active' : ''}}">--}}
{{--                    <i class="icon-cog mr-2"> </i>--}}
{{--                    {{ __('messages.team') }}--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle {{request()->routeIs('admin.language.*')  ? 'active' : ''}}" data-toggle="dropdown">
                    <i class="icon-sphere mr-2"> </i>
                    {{ __('messages.localization') }}
                </a>

                <div class="dropdown-menu">
                    <a href="{{route('admin.language.index')}}" class="dropdown-item {{ request()->routeIs('admin.language.*') ? 'active' : '' }}"><i class="icon-grid6"> </i> {{__('messages.language')}}</a>
                </div>

            </li>


            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle {{(request()->routeIs('admin.user.*')) ? 'active' : ''}}" data-toggle="dropdown">
                    <i class="icon-users4 mr-2"> </i>
                    {{ __('messages.user') }}
                </a>

                <div class="dropdown-menu">
                    <a href="{{route('admin.user.index')}}" class="dropdown-item {{ request()->routeIs('admin.user.*') ? 'active' : '' }}"><i class="icon-grid6"> </i> {{__('messages.user')}}</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle {{(request()->routeIs('admin.role.*')) ? 'active' : ''}}" data-toggle="dropdown">
                    <i class="icon-collaboration mr-2"> </i>
                    {{ __('messages.group') }}
                </a>

                <div class="dropdown-menu">
                    <a href="{{route('admin.role.index')}}" class="dropdown-item {{ request()->routeIs('admin.role.*') ? 'active' : '' }}"><i class="icon-grid6"> </i> {{__('messages.role')}}</a>
                </div>
            </li>


            <li class="nav-item">
                <a href="{{route('admin.setting')}}" class="navbar-nav-link {{ request()->routeIs('admin.setting')  ? 'active' : ''}}">
                    <i class="icon-cog mr-2"> </i>
                    {{ __('messages.setting') }}
                </a>
            </li>


        </ul>
    </div>
</div>
