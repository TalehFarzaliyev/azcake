<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand wmin-0 mr-5">
        <a href="{{ route('admin.dashboard') }}" class="d-inline-block">
        </a>
    </div>
    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5" ></i>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            @include('admin.particles.navbar._language')
            @include('admin.particles.navbar._user-profile')
        </ul>
    </div>
</div>
