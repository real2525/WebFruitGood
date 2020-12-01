<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

   {{-- Login checkout --}}
     <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('public/frontend/login-checkout/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/frontend/login-checkout/css/style.css')}}">
    {{-- End Login checkout --}}
</head>
<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register</h2>
                        <form action="{{URL::to('/add-customer')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="customer_name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="customer_email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="customer_password" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="customer_phone" id="phone" placeholder="Your Phone"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('public/frontend/login-checkout/images/signup-image.jpg')}}" alt="sing up image"></figure>
                        <a href="{{URL::to('/login-checkout')}}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>


    </div>

       {{-- Login checkout --}}
    <script src="{{asset('public/frontend/login-checkout/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/login-checkout/js/main.js')}}"></script>
    {{-- End Login checkout --}}
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>