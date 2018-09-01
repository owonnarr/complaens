@extends('layouts.app')

@section('content')
    <div class="col-md12" style="border-top: 1px #eee solid; border-radius: 4px; padding: 10px;">
        <div class="container">

            <div class="offset-2 col-md-3" >
                <img src="{{asset('no.png')}}" alt="ALT NAME" class="img-responsive" />
                <div class="caption">
                    <h3>Header Name</h3>
                    <p>Description</p>
                </div>
            </div>
            <div class="col-md-4" >
                <form id="form" action="{{route('uploads')}}" method="POST" enctype="multipart/form-data">
                    <input type="text" name="_token" value="{{ csrf_token()}}" hidden>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Название фотографии</label>
                        <input type="text" class="form-control" name="name" placeholder="название фотографии" value="{{ old('title') }}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Описание фотографии</label>
                        <textarea type="text" class="form-control" name="description" placeholder="описание фотографии" required>{{ old('decription') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" id="file">
                        @if($errors->has('image'))
                            <p>{{ $errors->first('image') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="watermark">Водяной знак</label>
                        <input type="text" class="form-control" name="watermark" placeholder="введите текст">
                        <div class="radio">
                            <label style="font-family: 'Arial'"><input type="radio" name="font" value="arial">Шрифт Arial</label>
                        </div>
                        <div class="radio">
                            <label style="font-family: 'Courier'"><input type="radio" name="font" value="Courier">Шрифт Courier</label>
                        </div>
                        <div class="radio">
                            <label style="font-family: 'Roboto bold'"><input type="radio" name="font" value="Roboto-Bold">Шрифт Roboto bold</label>
                        </div>
                        <label for="settings">Настройки водяного знака</label>
                        <div class="radio">
                            <label style="color: blue"><input type="radio" name="color" value="002480">Цвет синий</label>
                        </div>
                        <div class="radio">
                            <label style="color: black"><input type="radio" name="color" value="000000">Цвет черный</label>
                        </div>
                        <div class="radio">
                            <label style="color: red"><input type="radio" name="color" value="e50017">Цвет красный</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        ЗАГРУЗИТЬ
                    </button>
                </form>
            </div>

        </div>
    </div>

    </div>
@endsection