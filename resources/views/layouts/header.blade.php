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
                                            <script src="//ulogin.ru/js/ulogin.js"></script>
                                            <a id="uLogin" data-ulogin="display=panel;theme=classic;fields=first_name,last_name,email,photo_big,city,photo;
                                            providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri={{'http://'. $_SERVER['HTTP_HOST']}}/ulogin;
                                            mobilebuttons=0;"></a>
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
                <h1 class="site-title">Svetlana Chechina Blog</h1>
                <!--  <img src="./assets/dist/img/logo.png" alt="logo"> -->
            </div>
            <!-- // site-info -->
        </div>
        <!-- // container -->
        <nav class="main-nav layout-one">
            <div id="main-nav" class="stellarnav">
                <ul>
                    <li><a href="/">Главная</a></li>

                    <li><a href="/about">Обо мне</a></li>

                    <li><a href="/articleCatalog">Каталог статей</a>
                        <ul>
                            <li><a>По категориям</a>
                                <ul>
                                    <?php
                                    $categoriesAll = \App\categorie::all();
                                    ?>
                                    @foreach($categoriesAll as $cat)
                                        <li><a href="/categorie/{{$cat->id}}">{{$cat->name}}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                            <li><a href="/">Все статьи</a></li>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/gallery">Галерея</a></li>
                    <li><a href="/files">Файлы</a></li>
                    <li><a href="/articleCreate">Добавить ст.</a></li>

                </ul>
            </div>
            <!-- .stellar-nav -->
        </nav>
    </div>
    <!-- // general-header-inner -->
</header>