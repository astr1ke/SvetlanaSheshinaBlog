@extends('layouts.layout')
@section('content')

    <div class="container">
        <div class="main-post-area-wrapper main-post-area-layout-one">
            <div class="main-post-area-inner">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="main-post-area-holder">
                                <?php
                                    $oldValue = \App\aboutMe::find(1);
                                ?>
                                <form action="/admin/aboutMeEdit" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h3>Редактирование информации о себе</h3>
                                    <p><br></p><p><br></p>

                                    <p><label for="foto">Измените Фото</label></p>
                                    <input type="file" name="foto" >
                                    <p><br></p>

                                    <p><label for="name">Измените имя</label></p>
                                    <input type="text" name="name" value="{{$oldValue->name}}">
                                    <p><br></p>

                                    <p><label for="title">Измените описание</label></p>
                                    <input type="text" name="title" value="{{$oldValue->title}}">
                                    <p><br></p>

                                    <p><label for="text">Измените текст</label></p>
                                    <textarea name="text" cols="70" rows="5">{{$oldValue->text}}</textarea>
                                    <p><br></p>

                                    <p><input type="submit" name="submit" value="Подтвердить"></p>

                                </form>
                            </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <aside class="sidebar">
                            <div class="sidebar-inner">

                            @include('layouts.aboutMe')
                            </div>
                        </aside>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection