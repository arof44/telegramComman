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
    <title>Bank Sampah Daftar Page</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{url('page_login/images/bg_1.jpg')}}');"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Daftar <strong>ke Bank Sampah</strong></h3>
            <p class="mb-4">Isi dengan lengkap form dibawah ini untuk mendaftar menjadi nasabah bank sampah malang</p>
            @if($message=Session::get('error'))
              <div class="alert bg-teal" role="alert">
                <p align="center" style="color: red">  <em class="fa fa-lg fa-close">&nbsp;</em>  {{$message}}</p>
              </div>
            @endif
            <form action="{{url('daftar')}}" method="post">
                @csrf
             <div class="form-group first">
                <label for="username">Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Juan Kartolo" id="username" name="name" required>
              </div>
              <div class="form-group first">
                <label for="username">Alamat Lengkap</label>
                <textarea class="form-control"  name="alamat" placeholder="Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141" required></textarea>
              </div>
              <div class="form-group first">
                <label for="username">Nomor Telepon Yang Bisa Dihubungi</label>
                <input type="text" class="form-control" placeholder="08567169983711" id="username" name="phone" required>
              </div>
              <div class="form-group first">
                <label for="username">Jenis Anggota</label>
                <select class="form-control" name="kelompok">
                    <option value="Individu">Individu</option>
                    <option value="Kelompok">Kelompok</option>
                </select>
              </div>
              <div class="form-group first">
                <label for="username">Kesepakatan Harga</label>
                <select class="form-control" name="jenis_trs">
                    <option value="Langsung">Langsung</option>
                    <option value="Ditabung">Ditabung</option>
                </select>
              </div>
              <div class="form-group first">
                <label for="username">Email</label>
                <input type="email" class="form-control" placeholder="email@gmail.com" id="username" name="email" required>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password" required name="password">
              </div>
              <div class="d-flex mb-5 align-items-center">

                <span class="ml-auto"><a href="{{url('login')}}" class="forgot-pass">Sudah mendaftar? masuk disini</a></span> 
              </div>
              <input type="submit" value="Daftar" class="btn btn-block btn-primary">
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
    <script type="text/javascript">
        
    </script>
  </body>
</html>