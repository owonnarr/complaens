@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="offset-2 col-md-3" >
            @if($image)
            <img src=" <?php echo (!empty($image)) ? '/storage/images/'.$image->image : asset('no.png') ?>" alt="" class="img-responsive" />
            <div class="caption">
                <h3><?php echo (!empty($image)) ? $image->name : "Без названия" ?></h3>
                <p><?php echo (!empty($image)) ? $image->description : "Без описания" ?></p>
                <hr>
                <h5>Поделиться в соц.сетях</h5>
                <?php if ($share) {echo $share;}  ?>
            @endif
            </div>
                <a href="{{ route('uploads') }}" class="btn btn-success">ЗАГРУЗИТЬ СВОЕ ИЗОБРАЖЕНИЕ</a>
        </div>

    </div>

@endsection