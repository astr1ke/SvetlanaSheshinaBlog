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

                                                        <?php
                                                            $us = \App\User::find($articles->user_id);
                                                            if(isset($us)){
                                                            $user = $us -> name;
                                                            $ava =$us -> avatar;
                                                            }
                                                        ?>

                                                        @if(isset($ava))
                                                            <img src="{{asset('storage').'/'.$ava}}" alt="...." style="max-height: 50px; max-width: 50px">
                                                            <span><a href="#">{{$user}}</a></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- // col -->
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="posted-date">
                                                        <span><a>{{ is_object($articles->created_at) ? $articles->created_at->format('d  F  Y  в  H:i') : ''}}</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-the-content" style="word-wrap:break-word">
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
                        @include('layouts.rigthColumn')
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('modules/comments/js')}}/comment-reply.js"></script>
    <script type="text/javascript" src="{{asset('modules/comments/js')}}/comment-scripts.js"></script>
@endsection