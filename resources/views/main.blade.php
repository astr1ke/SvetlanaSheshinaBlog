@extends('layouts.layout')
@section('content')

    <div class="container">
        <div class="main-post-area-wrapper main-post-area-layout-one">
            <div class="main-post-area-inner">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="main-post-area-holder">
                            @foreach($articles as $article)
                                <article class="post-details-holder wow  fadeInUp">
                                    <div class="post-image">
                                        <img src="{{$article->image}}" alt="....">
                                    </div>
                                    <!-- // post image -->
                                    <div class="post-title">
                                        <h2>{{$article->title}}</h2>
                                    </div>
                                    <!-- // post-title -->
                                    <div class="post-the-content clearfix layout-one-first-letter">

                                    <?php   $txt = preg_replace ('/<img.*>/Uis', '', $article->text);
                                    $txt = preg_replace('/\s{2,}/', '', $txt);
                                    $txt = mb_strimwidth($txt,0,300,'...')
                                    ?> <!---  обрезаем колво символов для превью статей на главной --->

                                        <p>{!!$txt!!}</p>
                                    </div>
                                    <!-- // post-the-content -->
                                    <div class="post-permalink">
                                        <a href="/article/{{$article->id}}">Читать далее</a>
                                    </div>
                                    <!-- // post-permalink -->
                                    <div class="post-meta-and-share">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="post-author">
                                                    <span class="post-author"><a href="#">Sparkle Themes</a></span>
                                                </div>
                                            </div>
                                            <!-- // col 4 -->
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="post-share">
                                                    <div class="share"></div>
                                                </div>
                                            </div>
                                            <!-- // col 4 -->
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="post-comment-count">
                                                    <span class="post-comment-count"><a href="#">0 Comment</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                        @endforeach

                        <!-- <article class="post-details-holder wow  fadeInUp">
                            <div class="post-image">
                                <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/G_JtNhTzg5s?rel=0&amp;showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                            </div>

                            <div class="post-title">
                                <h2>This might be your video VBLOG post. You can add video from any website</h2>
                            </div>

                            <div class="post-the-content clearfix layout-one-first-letter">
                                <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...
                                </p>
                            </div>

                            <div class="post-permalink">
                                <a href="#">Continue Reading</a>
                            </div>

                            <div class="post-meta-and-share">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="post-author">
                                            <span class="post-author"><a href="#">Sparkle Themes</a></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="post-share">
                                            <div class="share"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="post-comment-count">
                                            <span class="post-comment-count"><a href="#">17 Comment</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article> -->
                        </div>
                    </div>

                    <!--СайдБар-->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <aside class="sidebar">
                            <div class="sidebar-inner">
                                <div class="widget widget-about-me wow fadeInUp">
                                    <div class="widget-content">
                                        <div class="widget-about-me-profile">
                                            <img src="{{asset('images')}}/profile.jpeg" alt="...">
                                        </div>
                                        <div class="widget-extra-info-holder">
                                            <div class="widget-author-name">
                                                <h3>Anuj Subedi</h3>
                                                <span class="author-profession">Ghost Blogger</span>
                                            </div>
                                            <div class="widget-author-bio">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                            </div>
                                            <div class="widget-author-social">
                                                <ul class="social-links">
                                                    <li><a href="https://facebook.com"></a></li>
                                                    <li><a href="https://twitter.com"></a></li>
                                                    <li><a href="https://instagram.com"></a></li>
                                                    <li><a href="https://youtube.com"></a></li>
                                                    <li><a href="https://snapchat.com"></a></li>
                                                </ul>
                                            </div>
                                            <div class="widget-author-signature">
                                                <img src="{{asset('images')}}/signature-one.jpg" alt="...">
                                            </div>
                                        </div>
                                        <!-- // widget-extra-info-holder -->
                                    </div>
                                    <!-- // widget-content -->
                                </div>
                                <!-- // widget -->
                                <div class="widget widget-social-links wow fadeInUp">
                                    <div class="widget-content">
                                        <div class="widget-title">
                                            <h2>I'M social</h2>
                                        </div>
                                        <div class="widget-extra-info-holder">
                                            <div class="widget-social-links">
                                                <ul class="social-links-list">
                                                    <li class="facebook-link">
                                                        <a href="http://facebook.com" class="clearfix" target="_blank">
                                                            Facebook
                                                            <span class="social-icon">
                                                        <i class="fa fa-facebook"></i>
                                                         </span>
                                                        </a>
                                                    </li>
                                                    <li class="twitter-link">
                                                        <a href="http://twitter.com" class="clearfix" target="_blank">
                                                            Twitter
                                                            <span class="social-icon">
                                                                <i class="fa fa-twitter"></i>
                                                         </span>
                                                        </a>
                                                    </li>
                                                    <li class="googleplus-link">
                                                        <a href="http://plus.google.com" class="clearfix" target="_blank">
                                                            Google Plus
                                                            <span class="social-icon">
                                                                <i class="fa fa-google-plus"></i>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="instagram-link">
                                                        <a href="http://instagram.com" class="clearfix" target="_blank">
                                                            Instagram
                                                            <span class="social-icon">
                                                                <i class="fa fa-instagram"></i>
                                                                 </span>
                                                        </a>
                                                    </li>
                                                    <li class="linkedin-link">
                                                        <a href="http://linkedin.com" class="clearfix" target="_blank">
                                                            Linked In
                                                            <span class="social-icon">
                                                             <i class="fa fa-linkedin"></i>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="youtube-link">
                                                        <a href="http://youtube.com" class="clearfix" target="_blank">
                                                            Youtube
                                                            <span class="social-icon">
                                                             <i class="fa fa-youtube"></i>
                                                         </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- // widget-extra-info-holder -->
                                    </div>
                                    <!-- // widget-content -->
                                </div>
                                <!-- // widget -->

                                <div class="widget widget-recent-posts wow fadeInUp">
                                    <div class="widget-content">
                                        <div class="widget-title">
                                            <h2>Recent posts</h2>
                                        </div>
                                        <div class="widget-extra-info-holder">
                                            <div class="widget-recent-posts">
                                                <div class="widget-rpag-gallery-container">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <img src="{{asset('images')}}/post-five.jpeg" alt="...">
                                                            <div class="mask"></div>
                                                            <div class="slide-content">
                                                                <div class="post-title">
                                                                    <h5><a href="#">That Evening At Bali Beach Was Wounderful Then Any Other Mornings</a></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="{{asset('images')}}/post-six.jpeg" alt="...">
                                                            <div class="mask"></div>
                                                            <div class="slide-content ">
                                                                <div class="post-title">
                                                                    <h5><a href="#">That Evening At Bali Beach Was Wounderful Then Any Other Mornings</a></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="{{asset('images')}}/post-seven.jpeg" alt="...">
                                                            <div class="mask"></div>
                                                            <div class="slide-content ">
                                                                <div class="post-title">
                                                                    <h5><a href="#">That Evening At Bali Beach Was Wounderful Then Any Other Mornings</a></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="{{asset('images')}}/post-four.jpeg" alt="...">
                                                            <div class="mask"></div>
                                                            <div class="slide-content ">
                                                                <div class="post-title">
                                                                    <h5><a href="#">That Evening At Bali Beach Was Wounderful Then Any Other Mornings</a></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="{{asset('images')}}/post-three.jpeg" alt="...">
                                                            <div class="mask"></div>
                                                            <div class="slide-content">
                                                                <div class="post-title">
                                                                    <h5><a href="#">That Evening At Bali Beach Was Wounderful Then Any Other Mornings</a></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-pagination"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="widget widget-popular-post wow fadeInUp">
                                    <div class="widget-content">
                                        <div class="widget-title">
                                            <h2>Popular Posts</h2>
                                        </div>
                                        <div class="widget-extra-info-holder">
                                            <div class="widget-posts">
                                                <div class="post-thumb">
                                                    <img src="{{asset('images')}}/one.jpg" alt=".....">
                                                </div>
                                                <div class="post-title">
                                                    <h5><a href="#">That Evening At Bali Beach Was Wounderful Then Any Other Mornings</a></h5>
                                                </div>
                                                <div class="post-view-count post-meta">
                                                    <p>1277 <span>Views</span></p>
                                                </div>
                                            </div>
                                            <!-- // widget-post -->
                                            <div class="widget-posts">
                                                <div class="post-thumb">
                                                    <img src="{{asset('images')}}/five.jpg" alt=".....">
                                                </div>
                                                <div class="post-title">
                                                    <h5><a href="#">5 Reasons Why Ladies Prefer To Have Brown Hair And Black Dress</a></h5>
                                                </div>
                                                <div class="post-view-count post-meta">
                                                    <p>865 <span>Views</span></p>
                                                </div>
                                            </div>
                                            <!-- // widget-post -->
                                            <div class="widget-posts">
                                                <div class="post-thumb">
                                                    <img src="{{asset('images')}}/four.jpg" alt=".....">
                                                </div>
                                                <div class="post-title">
                                                    <h5><a href="#">This post has just gone viral with many views</a></h5>
                                                </div>
                                                <div class="post-view-count post-meta">
                                                    <p>721 <span>Views</span></p>
                                                </div>
                                            </div>
                                            <!-- // widget-post -->
                                            <div class="widget-posts">
                                                <div class="post-thumb">
                                                    <img src="{{asset('images')}}/two.jpg" alt=".....">
                                                </div>
                                                <div class="post-title">
                                                    <h5><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h5>
                                                </div>
                                                <div class="post-view-count post-meta">
                                                    <p>234 <span>Views</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget widget-facebook-page-box wow fadeInUp">
                                    <div class="widget-content">
                                        <div class="widget-title">
                                            <h2>Facebook page</h2>
                                        </div>
                                        <div class="widget-extra-info-holder">
                                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsparklewpthemes%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=298774560483441" width="300" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget widget-category wow fadeInUp">
                                    <div class="widget-content">
                                        <div class="widget-title">
                                            <h2>Category</h2>
                                        </div>
                                        <div class="widget-extra-info-holder">
                                            <ul class="widget-category-listings">
                                                <li><a href="#">Lifestyle</a></li>
                                                <li><a href="#">Health</a></li>
                                                <li><a href="#">Article</a></li>
                                                <li><a href="#">Travel</a></li>
                                                <li><a href="#">Uncategorised</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>


                <!--Пагинация-->
                <div class="pagination_holder">
                    <ul class="pagination">
                        <li class="disabled"><a href="#">«</a></li>
                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="instafeed" class="instafeed owl-carousel feed-carousel">

    </div>
@endsection