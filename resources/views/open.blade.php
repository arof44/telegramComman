<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url('page_login/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{url('page_login/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('page_login/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{url('page_login/css/style.css')}}">
    <link rel="icon" type="image/png" sizes="20x20" href="{{url('flexy/assets/images/kios-sahabat-tani.png')}}">
    <title>Inventory Kios Sahabat Tani</title>
    <!-- Styles -->
    <style>
        html,
        body {
            /* background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0; */
            background-image: url('flexy/assets/images/opening.jpeg');
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="bg order-1 order-md-2" style="background-image: url('flexy/assets/images/opening.jpeg');"></div>
    <div class="flex-center position-ref full-height">
        <!-- @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif -->

        <div class="content">
            <div>
                <span class="badge rounded-pill bg-light">
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <br><br>
                        <img src="{{url('flexy/assets/images/kios-sahabat-tani.png')}}" alt="homepage" class="dark-logo" width="180" height="180" />
                    </b>
                    <div class="title m-b-md">
                        &nbsp; Kios Sahabat Tani &nbsp;
                    </div>
                    <div class="links">
                        <a href="{{url('/login')}}">
                            <br><button type="button" class="btn btn-success">Login Admin</button>
                        </a>
                        <a href="{{url('/welcome')}}">
                            <button type="button" class="btn btn-info">Halaman Owner</button>
                        </a>
                    </div>
                    <br><br><br><br><br>
                </span>
            </div>
        </div>
    </div>
</body>

</html>