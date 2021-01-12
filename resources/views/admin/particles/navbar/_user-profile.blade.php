
<li class="nav-item dropdown dropdown-user">
    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
        <img src="{{asset('assets/global_assets/images/placeholders/user.png')}}" class="rounded-circle mr-2" height="34" alt="{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}">
        <span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
    </a>

    <div class="dropdown-menu dropdown-menu-right">
        <a href="#" class="dropdown-item"><i class="icon-cog5"> </i> {{ __('messages.account') }}</a>
        <a class="dropdown-item"  href="{{ route('admin.logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-switch2"> </i>
            {{ __('messages.logout') }}</a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" >
            @csrf
        </form>
    </div>
</li>
