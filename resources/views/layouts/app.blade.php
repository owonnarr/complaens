<!DOCTYPE html>
<html lang="ru" prefix="og: //ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if($image)
    <meta property="og:image" content=" {{ getenv('APP_URL').'/storage/images/'.$image->image }} " />
    <meta property="og:title" content="{{ $image->name }}" />
    <meta property="og:url" content="{{ getenv('APP_URL').'/show/'.$image->id }}" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />
    @endif
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Тестовое задание</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid" style="padding: 0px; margin: 0px">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <span style="font-size: 24px;">Complaens</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        @yield('content')
    </div>

<!-- Scripts -->
    <script  src = " https://code.jquery.com/jquery-3.1.1.min.js " ></script >
    <script  src = " {{asset ('js / share.js')}} " > </script >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/validate.js') }}"></script>

</body>
</html>
