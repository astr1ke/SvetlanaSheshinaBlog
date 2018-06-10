<header class="general-header header-layout-one">
    <div class="general-header-inner">
        <div class="header-top-wrapper">
            <div class="header-top-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="search">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <input type="search" placeholder="Search ..........">
                            </div>
                        </div>
                        <!-- // col -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="social-networks">
                                <ul class="social-links">
                                        @if (\Illuminate\Support\Facades\Auth::check())
                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                <a style="margin-right: 50px" href="/admin">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                                                <a style="margin-right: 50px" href="/logout">Выйти</a>
                                            @else
                                                <a style="margin-right: 50px">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                                                <a style="margin-right: 50px" href="/logout">Выйти</a>
                                            @endif
                                        @else
                                            <a style="margin-right: 50px" href="/login">Войти на сайт</a>
                                        @endif
                                    <li><a href="facebook.com"></a></li>
                                    <li><a href="twitter.com"></a></li>
                                    <li><a href="instagram.com"></a></li>
                                    <li><a href="youtube.com"></a></li>
                                    <li><a href="snapchat.com"></a></li>
                                </ul>
                            </div>
                            <!-- // social-networks -->
                        </div>
                        <!-- // col -->
                    </div>
                    <!-- // row -->
                </div>
                <!-- // container -->
            </div>
            <!-- // header-top-inner -->
        </div>
        <!-- // header-top-wrapper -->
        <div class="container">
            <div class="site-info">
                <h1 class="site-title">Welcome to my Blog</h1>
                <!--  <img src="./assets/dist/img/logo.png" alt="logo"> -->
            </div>
            <!-- // site-info -->
        </div>
        <!-- // container -->
        <nav class="main-nav layout-one">
            <div id="main-nav" class="stellarnav">
                <ul>
                    <li><a href="/">Home Layout</a>
                        <ul>
                            <li>
                            <li><a href="index.php">Home Layout One</a></li>
                            <li><a href="index-two.php">Home Layout Two</a></li>
                            <li><a href="index-three.php">Home Layout Three</a></li>
                            <li><a href="index-four.php">Home Layout Four</a></li>
                            <li><a href="index-four-full-width.php">Home Layout Four + Full Width</a></li>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Single Page layout</a>
                        <ul>
                            <li><a href="single-page-layout-one.php">Single Page Layout One</a></li>
                            <li><a href="single-page-layout-two.php">Single Page Layout Two + Image</a></li>
                            <li><a href="single-page-layout-two-video.php">Single Page Layout Two + Video</a></li>
                            <li><a href="single-page-layout-three.php">Single Page Layout Three</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Pages</a>
                        <ul>
                            <li>
                            <li><a href="404.php">404 page</a></li>
                            <li><a href="#">Single Page</a>
                                <ul>
                                    <li><a href="single-page-layout-one.php">Single Page Layout One</a></li>
                                    <li><a href="single-page-layout-two.php">Single Page Layout Two + Image</a></li>
                                    <li><a href="single-page-layout-two-video.php">Single Page Layout Two + Video</a></li>
                                    <li><a href="single-page-layout-three.php">Single Page Layout Three</a></li>
                                </ul>
                            </li>
                            <li><a href="search.php">Search Page</a></li>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Lifestyle</a></li>
                    <li><a href="#">Health</a></li>
                    <li><a href="/articleCreate">Добавить ст.</a></li>

                </ul>
            </div>
            <!-- .stellar-nav -->
        </nav>
    </div>
    <!-- // general-header-inner -->
</header>