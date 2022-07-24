<div class="header header-light head-shadow">
    <div class="container">
        <!-- <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ route('home') }}">
                    <img src="{{ getImageUrl($setting->logo) }}" class="log img img-fluid" style='max-height:90px' alt="hamro school" />
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li class="{{ request()->route()->getName() == 'home' ? 'active' : null}}"><a href="{{ route('home') }}">Home<span class="submenu-indicator"></span></a>
                    </li>

                    <li class="{{ request()->route()->getName() == 'search' ? 'active' : null}}"><a href="{{ route('search') }}">School<span class="submenu-indicator"></span></a></li>
                    <li><a href="{{ route('coming.soon') }}">Teacher<span class="submenu-indicator"></span></a></li>
                    <li><a href="{{ route('coming.soon') }}">Student<span class="submenu-indicator"></span></a></li>
                    <li><a href="{{ route('coming.soon') }}">News<span class="submenu-indicator"></span></a></li>
                    <li><a href="{{ route('coming.soon') }}">Articles<span class="submenu-indicator"></span></a></li>
                    <li><a href="{{ route('coming.soon') }}">Vacancy<span class="submenu-indicator"></span></a></li>
                </ul>
                <ul class="nav-menu nav-menu-social align-to-right">


                    <li class="login_click search">
                        {!! Form::model(request()->all(), ['route' => 'search', 'method' => 'get', 'class' => 'form-inline addons']) !!}
                        {!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder' => 'Search School']) !!}
                        <button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
                        {!! Form::close() !!}
                    </li>

                    @if(request()->route()->getName() != 'auth.login')
                    <li class="login_click bg-black">
                        <a href="{{ route('auth.login') }}">Sign in</a>
                    </li>
                    @endif
                </ul>

            </div>
        </nav> -->

        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <a class="nav-brand" href="{{ route('home') }}">
                <img src="{{ getImageUrl($setting->logo) }}" class="log img img-fluid" style='max-height:90px' alt="hamro school" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-header">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ request()->route()->getName() == 'home' ? 'active' : null}}"><a class="nav-link" href="{{ route('home') }}">Home<span class="submenu-indicator"></span></a>
                    </li>

                    <li class="nav-item {{ request()->route()->getName() == 'search' ? 'active' : null}}"><a class="nav-link" href="{{ route('search') }}">School<span class="submenu-indicator"></span></a></li>
                    <li class='nav-item'><a class="nav-link" href="{{ route('coming.soon') }}">Teacher<span class="submenu-indicator"></span></a></li>
                    <li class='nav-item'><a class="nav-link" href="{{ route('coming.soon') }}">Student<span class="submenu-indicator"></span></a></li>
                    <li class='nav-item'><a class="nav-link" href="{{ route('coming.soon') }}">News<span class="submenu-indicator"></span></a></li>
                    <li class='nav-item'><a class="nav-link" href="{{ route('coming.soon') }}">Articles<span class="submenu-indicator"></span></a></li>
                    <li class='nav-item'><a class="nav-link" href="{{ route('coming.soon') }}">Vacancy<span class="submenu-indicator"></span></a></li>
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
                {!! Form::model(request()->all(), ['route' => 'search', 'method' => 'get', 'class' => 'form-inline addons']) !!}
                {!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder' => 'Search School']) !!}
                <button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
                {!! Form::close() !!}

                @if(request()->route()->getName() != 'auth.login')
                
                    <a class='btn btn-dark ml-1' href="{{ route('auth.login') }}">Sign in</a>
               
                @endif

            </div>
        </nav>


    </div>
</div>