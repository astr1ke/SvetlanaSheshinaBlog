@extends('layouts.layout')

@section('styles')
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('modules/comments/css')}}/comments.css" />
@endsection

@section('content')
    <div class="general-single-page-layout single-page-layout-one">
        <div class="breadcrumb-wrapper">
            <div class="breadcrumb" style="padding: 20px; margin-bottom: 0px; background:url({{asset('images')}}/banner/fon.jpg)">
                <ul class="breadcrumb-listing">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Lifestyle</a></li>
                    <li><a href="#">Post</a></li>
                </ul>
                <div class="mask"></div>
            </div>
        </div>
        <div class="single-page-wrapper">
            <div class="single-page-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="main-post-area-holder">

                                <article class="single-page-details-holder wow fadeInUp">
                                    <div class="post-image">
                                        <img src="{{$articles->image}}" alt="....">
                                    </div>
                                    <div class="single-page-other-information-holder">
                                        <div class="posted-category">
                                            <div class="post-meta-category">
                                                <?php $categorie = \App\categorie::find($articles->categorie_id);
                                                $categorie = $categorie->name;?>
                                                <span><a href="#">{{$categorie}}</a></span>
                                            </div>
                                        </div>
                                        <div class="post-title">
                                            <h2>{{$articles->title}}</h2>
                                        </div>
                                        <!-- // post-title -->
                                        <div class="post-extra-meta">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="post-author">

                                                        <?php $us = \App\User::find($articles->user_id);
                                                        $user = $us -> name;
                                                        $ava =$us -> avatar;
                                                        ?>

                                                        <img src="{{asset('storage').'/'.$ava}}" alt="...." style="max-height: 50px; max-width: 50px">
                                                        <span><a href="#">{{$user}}</a></span>
                                                    </div>
                                                </div>
                                                <!-- // col -->
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="posted-date">
                                                        <span><a href="#">{{ is_object($articles->created_at) ? $articles->created_at->format('d  F  Y  в  H:i') : ''}}</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-the-content">
                                            <p>{!! $articles->text !!}</p>
                                        </div>
                                        <div class="post-share">
                                            <div class="share"></div>
                                        </div>
                                        <div class="tags-meta-and-others clearfix">
                                            <div class="post-tags">
                                                <span><a href="#">{{$categorie}}</a></span>
                                            </div>
                                            <div class="view-count">
                                                <span class="display-view-count"><i class="fa fa-eye" aria-hidden="true"></i>{{$articleViews}} просмотра(ов)</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <div class="related-posts-wrapper">
                                    <div class="related-posts-inner">
                                        <div class="related-post-carousel owl-carousel">

                                            @foreach($articlesAll as $articleOne)
                                            <div class="grid-item item">
                                                <article class="post-details-holder layout-three-post-details-holder wow fadeInUp">
                                                    <div class="post-image">
                                                        <img src="{{$articleOne->image}}" alt="..." style="max-height: 200px">
                                                    </div>

                                                    <div class="post-extra-details">
                                                        <div class="post-title">
                                                            <h2><a href="/article/{{$articleOne->id}}">{{$articleOne->title}}</a></h2>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <div class="comment-area-wrapper">
                                    <div class="comment-area-inner">
                                        <div class="comments">
                                            <div class="comments__list">
                                                <div class="comment-listing-tile">
                                                    <h4>Найдено коментариев: {{$cc}}</h4>
                                                </div>
                                                <div style="padding-bottom: 320px">
                                                    @include('comments.comments_block', ['essence' => $articles])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                                        </div>
                                    </div>

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
                                        </div>
                                    </div>

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
                                                        <img src="{{asset('images')}}/thumb/one.jpg" alt=".....">
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
                                                        <img src="{{asset('images')}}/thumb/two.jpg" alt=".....">
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
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="instafeed" class="instafeed owl-carousel feed-carousel">

    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('modules/comments/js')}}/comment-reply.js"></script>
    <script type="text/javascript" src="{{asset('modules/comments/js')}}/comment-scripts.js"></script>
@endsection