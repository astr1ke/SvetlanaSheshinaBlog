@extends('layouts.layout')

@section('styles')

    <script src="/modules/ckeditor/ckeditor.js"></script>
    <style type="text/css">
        .fld {
            background: whitesmoke;
            border-radius: 3px;
            padding: 10px;
            width: max-content;

        }

        .fld2 {
            background: whitesmoke;
            border-radius: 3px;
            padding: 15px;
            width: max-content;
            height: 82px;
            margin-bottom: 15px;
            margin-top: 15px;
        }

    </style>
@endsection

@section('content')
    <div class="general-single-page-layout single-page-layout-one" style="margin-bottom: 100px">
        <div class="single-page-wrapper">
            <div class="single-page-inner">
                <div class="container">
                    <div class="row">
                            <p><h3 id="ca">Создание статьи<br/></h3></p>

                            <!------- Список ошибок формы ------->
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Упс! Что-то пошло не так!</strong>
                                    <br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form id="form" class="blocks" action="/articleCreate" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="fld">
                                    <p>
                                        <label >Заголовок:</label>
                                        <input type="text" class="text" name="title" />
                                    </p>
                                    <p>
                                        <label >Категория:</label>
                                        <select class="sel" name="categorie_id" size="1">\
                                            <?php $i=0 ?>
                                            @foreach($categories as $cat)
                                                @if($i==0)
                                                    <option selected value='{{$cat->id}}'>{{$cat->name}}</option>
                                                    <?php $i++ ?>
                                                @else
                                                    <option value='{{$cat->id}}'>{{$cat->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </p>
                                </div>
                                <br/>
                                <p class="area">
                                    <textarea class="text" name="text" id="text" rows="10" cols="80"></textarea>
                                </p>
                                <div class="fld2">
                                    <p>
                                        <label id="lp">Фото для заголовка:</label>
                                        <input id="img" type="file"  name="image">
                                    </p>
                                    <script>
                                        CKEDITOR.replace('text')
                                    </script>
                                </div>
                                <input type="hidden" name = "user_id" value="{{\Illuminate\Support\Facades\Auth::user()}}" />
                                <p>
                                    <label>&nbsp;</label>
                                    <input type="submit" class="btn" value="Опубликовать" />
                                </p>

                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/modules/ckeditor/ckeditor.js"></script>
@endsection