@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="offset-2 col-md-3" >
            <img src=" <?php echo (!empty($image)) ? '/storage/images/'.$image->image : asset('no.png') ?>" alt="" class="img-responsive" />
            <div class="caption">
                <h3><?php echo (!empty($image)) ? $image->name : "Без названия" ?></h3>
                <p><?php echo (!empty($image)) ? $image->description : "Без описания" ?></p>
            </div>
        </div>
    </div>

@endsection