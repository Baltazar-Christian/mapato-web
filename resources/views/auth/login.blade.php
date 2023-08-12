<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mapato | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
  <style>
    body {
  background-image: url('back.jpg');

}

  </style>
</head>
<body style="  background-image: url('{{ asset('back.jpg') }}');  background-position: center;
background-repeat: no-repeat;
background-size: cover;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand bg-navy navbar-light">
        <!-- Left navbar links -->
        <b><h3 ><a href="index.php" class="text-light"><b><i>Mapato.</i></b></a></h3></b>

</nav>    

<!-- login form -->
<div class="container mt-5">
    <div class="row">
    <div class="col-md-6 float-left mt-5 " >
              <h1 class="text-danger text-center"><b> About <i class="text-white"> Mapato.</i> <hr class="bg-light"></b></h1>
              <div class="text-light bg-navy p-4" style="border-radius:5%;">
                <h4 class=" text-light " >Welcome to <b><i class="text-danger"> Mapato </i></b>.This is a place where you can easily :</h4>
                <ul type="none">
                  <li><h5 class="text-white "><i class="fa fa-arrow-right bg-danger p-1 text-danger" style="border-radius:100%;"></i> Monitor Daily Expenses</h5> </li>
                  <li><h5 class="text-white "><i class="fa fa-arrow-right bg-danger p-1 text-danger" style="border-radius:100%;"></i> Monitor Daily Earnings</h5> </li>
                  <li><h5 class="text-white "><i class="fa fa-arrow-right bg-danger p-1 text-danger" style="border-radius:100%;"></i> Monitor Daily Savings</h5> </li>
                  <li><h5 class="text-white "><i class="fa fa-arrow-right bg-danger p-1 text-danger" style="border-radius:100%;"></i> Monitor Your Debts</h5> </li>
                </ul>
              </div>
        </div>
        <div class="col-md-6 float-right mt-5 ">
            <div class="card card-navy opacity-25" style="opacity:94%;">
                <div class="card-header">
                  <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1"><i class="fa fa-envelope"></i> Email</label>
                      <input  class="form-control" id="exampleInputEmail1"type="email" name="email" :value="old('email')" required autofocus autocomplete="username" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1"><i class="fa fa-lock"></i> Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                      
                      <input type="checkbox" name="" class="form" id="remember" placeholder="Password">
                      <label for="remember">Remember Me</label>
                      
                    </div>
                    <?php
                  if (isset($_GET["request"])){
                  ?>
                <p class="btn btn-danger btn-block disabled mx-auto " style="margin-left:20px;">wrong username or password</p>
                  <?php     
                }

                ?>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="login" class="btn btn-danger">Log In</button>
                    <a href="{{ url('/register')}}" class="btn bg-navy">Create Account</a>
                   
                  </div>

                </form>
              </div>
              <!-- /.card -->
        </div>
        
    </div>
</div>

<footer class="fixed-bottom bg-navy text-center">
  <br>
    <strong>Copyright &copy; @php  echo date('Y'); @endphp <a href="" class="text-danger">TazarChriss</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
 
    </div>
<h1></h1>
  </footer>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
</body>
</html>

