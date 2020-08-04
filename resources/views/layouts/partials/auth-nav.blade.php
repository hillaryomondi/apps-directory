<ul class="navbar-nav ml-auto">
    @auth
        @can('backend.browse')
            <li class="nav-item bg-light mr-2">
                <a class="nav-link" href="{{route('backend')}}">Admin</a>
            </li>
        @endcan
        <li class="nav-item mr-2">
            <a class="nav-link btn btn-secondary" href="{{route('home')}}">{{auth()->user()->name}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-pill px-4 text-white btn btn-danger" href="{{route('logout')}}">Logout</a>
        </li>

    @else
        <li class="nav-item">
            <a class="nav-link btn btn-info text-white rounded-pill px-4" href="{{route('login')}}"><i class="fa fa-sign-in"></i>Sign in</a>
        </li>
    @endauth
</ul>
