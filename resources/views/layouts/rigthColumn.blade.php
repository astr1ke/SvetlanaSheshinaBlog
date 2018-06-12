<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <aside class="sidebar">
        <div class="sidebar-inner">

            @include('layouts.aboutMe')
            <div class="widget widget-social-links wow fadeInUp">
                <div class="widget-content">
                    <div class="widget-title">
                        <h2>I'M social</h2>
                    </div>
                    <div class="widget-extra-info-holder">
                        <div class="widget-social-links">
                            <ul class="social-links-list">
                                <li class="odnoklassniki-link">
                                    <a href="https://ok.ru/profile/235174410453" class="clearfix" target="_blank">
                                        Одноклассники
                                        <span class="social-icon">
                                                        <i class="fa fa-odnoklassniki"></i>
                                                         </span>
                                    </a>
                                </li>
                                <li class="vk-link">
                                    <a href="https://vk.com/id317133258" class="clearfix" target="_blank">
                                        ВКонтакте
                                        <span class="social-icon">
                                                                <i class="fa fa-vk"></i>
                                                         </span>
                                    </a>
                                </li>
                                <li class="instagram-link">
                                    <a href="http://instagram.com" class="clearfix" target="_blank">
                                        Инстаграмм
                                        <span class="social-icon">
                                                                <i class="fa fa-instagram"></i>
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
                        <h2>Последние новости</h2>
                    </div>
                    <div class="widget-extra-info-holder">
                        <div class="widget-recent-posts">
                            <div class="widget-rpag-gallery-container">
                                <div class="swiper-wrapper">

                                    <?php
                                        $articlesRecent = \App\article::all()->sortByDesc('created_at');
                                        $i=1;
                                    ?>
                                    @foreach($articlesRecent as $articleRecent)
                                        @if($i<=5)
                                        <?php $i++?>
                                        <div class="swiper-slide">
                                            <img src="{{$articleRecent->image}}" alt="..." style="height: 200px">
                                            <div class="mask"></div>
                                            <div class="slide-content">
                                                <div class="post-title">
                                                    <h5><a href="#">{{$articleRecent->title}}</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endIf
                                    @endforeach

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
                        <h2>Популярные статьи</h2>
                    </div>
                    <div class="widget-extra-info-holder">
                        <?php
                            $popArticles = \App\article::all()->sortByDesc('views');
                            $i=1;
                        ?>
                        @foreach($popArticles as $popArticle)
                            @if($i<=4)
                            <?php $i++?>
                            <div class="widget-posts">
                                <div class="post-thumb">
                                    <img src="{{$popArticle->image}}" alt=".....">
                                </div>
                                <div class="post-title">
                                    <h5><a href="/article/{{$popArticle->id}}">{{$popArticle->title}}</a></h5>
                                </div>
                                <div class="post-view-count post-meta">
                                    <p>{{$popArticle->views}} <span>Просмотр(ов)</span></p>
                                </div>
                            </div>
                            @endif
                        @endforeach

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