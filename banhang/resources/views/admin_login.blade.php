<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login V1</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Login_checkout======================================================================================-->  
  <link rel="icon" type="image/png" href="{{asset('public/frontend/image/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/main.css')}}">
<!--End Login Ckeckout=====================================================================================-->
</head>
<body>
<form id="loginform" action="{{URL::to('/admin-dashboard')}}" method="post" >
  {{csrf_field()}}
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="{{asset('public/frontend/image/img-01.png')}}" alt="IMG">
        </div>
        <form class="login100-form validate-form">
          <span class="login100-form-title">
            Admin Login
          </span>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="admin_name" placeholder="Username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="admin_password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
            <br>
            <?php
                    $message = Session::get('message');
                    if ($message) {
                       echo '<span class="error_text" >'.$message.'</span>';
                       Session::put('message',null);
                    }
            ?>
          </div>
        </form>
      </div>
    </div>
  </div>
</form>

  
    <!--=== Login checkout =============================================================================-->  
      <script src="{{asset('public/frontend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
      <script src="{{asset('public/frontend/vendor/bootstrap/js/popper.js')}}"></script>
      <script src="{{asset('public/frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
      <script src="{{asset('public/frontend/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
      <script src="{{asset('public/frontend/vendor/tilt/tilt.jquery.min.js')}}"></script>
      <script >
        $('.js-tilt').tilt({
          scale: 1.1
        })
      </script>
    <!--Login Checkout==============================================================================-->
      <script src="{{asset('public/frontend/js/main-logincheckout.js')}}"></script>


</body>
</html>