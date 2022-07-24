<div class="header header-light head-shadow">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ route('home') }}">
                    <img src="{{ asset('front') }}/assets/img/PabsonBlack.png" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('search') }}">Schools</a></li>
                    <li><a href="#">Teachers</a></li>
                    <li><a href="#">Students</a></li>
                    <li><a href="https://www.pabson.news">News & Articles</a></li>
                    <li><a href="#">Vacancy</a></li>
                    <li><a href="#">Contact</a></li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">

{{--                    <li class="login_click light">--}}
{{--                        <a href="#" data-toggle="modal" data-target="#login">Sign in</a>--}}
{{--                    </li>--}}
                    <li class="login_click light">
                        <a href="{{ route('auth.login') }}">Sign in</a>
                    </li>
                    <!--								<li class="login_click">-->
                    <!--&lt;!&ndash;									<a href="#" data-toggle="modal" data-target="#signup">Sign up</a>&ndash;&gt;-->
                    <!--&lt;!&ndash;									<a href="https://www.hamro.school/register/school">Sign up</a>&ndash;&gt;-->
                    <!--								</li>-->
                </ul>
            </div>
        </nav>

    </div>
</div>
