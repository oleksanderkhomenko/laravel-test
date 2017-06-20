<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('js/jquery.tablesorter.pager.js') }}"></script>

        <!-- Styles -->
        <style>
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .container {
                margin-top: 30px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
        <div>
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/categories') }}">Admin Pannel</a>
                </div>
            @endif

            <!-- <div class="content">
                sdfsdf
            </div> -->
            @yield('content')
        </div>
    </body>
</html>
