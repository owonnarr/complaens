@extends('layouts.app')
@section('content')
    <div class="offset-4 col-md-4">
        <ul style="padding-top: 20px; font-size: 18px">
            <li>Размер фото до 500 кб.</li>
            <li>Имя у каждого изображения</li>
            <li>Описание у каждого изображения</li>
            <li>Неограниченное кол-во загрузок</li>
        </ul>
        <div class="offset-3 col-md-6">
            <a style="text-align: center" href="{{ route('uploads') }}" class="btn btn-success">ЗАГРУЗИТЬ ФОТО</a>
        </div>
    </div>
@endsection