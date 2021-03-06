<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-primary">
    <div class="container">
        <h1 class="app-header">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Social Network') }}
            </a>
        </h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <!-- Vue Search Component -->
            <vue-search url="{{ url('/') }}"></vue-search>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-fw fa-sign-in-alt mr-1"></i>@lang('main.login')
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-fw fa-user-plus mr-1 app-user-plus-icon"></i>@lang('main.register')
                            </a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link app-thubnail-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="app-thubnail-wrapper">
                                @include('layouts.profile-pic', ['user' => Auth::user()])
                            </span>&nbsp;<span>{!! shortName(onlyName(Auth::user()->name, false)) !!}</span> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            @include('layouts.locale')
                            
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('getWithSlug', ['id' => Hashids::encode(Auth::user()->id), 'slug' => Auth::user()->slug]) }}">
                                <i class="fas fa-fw fa-user mr-2"></i>@lang('main.profile')
                            </a>

                            <a class="dropdown-item" href="{{ route('profile.edit', ['id' => Auth::user()->slug]) }}">
                                <i class="fas fa-fw fa-user-edit mr-2"></i>@lang('main.profile_edit')
                            </a>

                            @if( (auth()->user() && auth()->user()->role === 'superadmin') || (auth()->user() && auth()->user()->role === 'admin') )
                                <a class="dropdown-item" href="{{ route('admin') }}">
                                    <i class="fas fa-fw fa-user-cog mr-2"></i>@lang('main.admin')</a>
                                </a>
                            @endif

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-fw fa-sign-out-alt mr-2"></i>@lang('main.logout')
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
