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
                    <input type="text" name="_token" value="{{ csrf_token() }}" hidden>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название фотографии</label>
                        <input type="text" class="form-control" name="title" placeholder="название фотографии" value="{{ old('title') }}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Описание фотографии</label>
                        <textarea type="text" class="form-control" name="decription" placeholder="описание фотографии" required>{{ old('decription') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" id="file">
                        @if($errors->has('image'))
                            <p>{{ $errors->first('image') }}</p>
                        @endif
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