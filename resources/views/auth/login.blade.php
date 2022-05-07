<!doctype html>
<html lang="en">
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
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('flexy/assets/images/favicon.png')}}">
    <title>Inventory Login Page</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('https://blog.shipper.id/wp-content/uploads/2021/06/fulfillment.jpeg');"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Masuk <strong>ke Inventory</strong></h3>
            <p class="mb-4">Masukkan email dan password yang terdaftar</p>
            @if($message=Session::get('error'))
              <div class="alert bg-teal" role="alert">
                <p align="center" style="color: red">  <em class="fa fa-lg fa-close">&nbsp;</em>  {{$message}}</p>
              </div>
            @endif
            <form action="{{url('masuk')}}" method="post">
                @csrf
              <div class="form-group first">
                <label for="username">Email</label>
                <input type="email" class="form-control" placeholder="email@gmail.com" id="username" name="email" required>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
              </div>
              
              <div class="d-flex mb-5 align-items-center">

                <span class="ml-auto"><a href="#" onclick="return alert('Silahkan hubungi admin untuk mendapatkan password baru!')" class="forgot-pass">Lupa password?</a></span> 
              </div>

              <input type="submit" value="Masuk" class="btn btn-block btn-info">

            </form>
          </div>
        </div>
      </div>
    </div>   
  </div>
    <script src="{{url('page_login/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('page_login/js/popper.min.js')}}"></script>
    <script src="{{url('page_login/js/bootstrap.min.js')}}"></script>
    <script src="{{url('page_login/js/main.js')}}"></script>
  </body>
</html>