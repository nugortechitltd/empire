<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">


<!-- Mirrored from html.phoenixcoded.net/empire/bootstrap/default/pages_authentication_register-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 13:38:33 GMT -->
<head>
    <title>Empire | B4+ admin template</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Empire is one of the unique admin template built on top of Bootstrap 4 framework. It is easy to customize, flexible code styles, well tested, modern & responsive are the topmost key factors of Empire Dashboard Template" />
    <meta name="keywords" content="bootstrap admin template, dashboard template, backend panel, bootstrap 4, backend template, dashboard template, saas admin, CRM dashboard, eCommerce dashboard">
    <meta name="author" content="Codedthemes" />
    <link rel="icon" type="image/x-icon" href="{{asset('backend/img/favicon.ico')}}">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{asset('backend/fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/open-iconic.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/feather.css')}}">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap-material.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/shreerang-material.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/uikit.css')}}">

    <!-- Libs -->
    <link rel="stylesheet" href="{{asset('backend/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('backend/css/pages/authentication.css')}}">
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Content ] Start -->
    <div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container px-4" style="background-image: url('{{asset('backend/img/bg/21.jpg')}}');">
        <div class="ui-bg-overlay bg-dark opacity-25"></div>

        <div class="authentication-inner py-5">

            <div class="card">
                <div class="p-4 p-sm-5">
                    <!-- [ Logo ] Start -->
                    <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
                        <div class="ui-w-60">
                            <div class="w-100 position-relative">
                                <img src="{{asset('backend/img/logo-dark.png')}}" alt="Brand Logo" class="img-fluid">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- [ Logo ] End -->

                    <h5 class="text-center text-muted font-weight-normal mb-4">Create an Account</h5>

                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}"> 
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Your name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Your email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            <div class="clearfix"></div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">Sign Up</button>
                        <div class="text-light small mt-4">
                            By clicking "Sign Up", you agree to our
                            <a href="javascript:void(0)">terms of service and privacy policy</a>. We’ll occasionally send you account related emails.
                        </div>
                    </form>
                    <!-- [ Form ] End -->

                </div>
                <div class="card-footer py-3 px-4 px-sm-5">
                    <div class="text-center text-muted">
                        Already have an account?
                        <a href="{{route('login')}}">Sign In</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- / Content -->

    <!-- Core scripts -->
    <script src="{{asset('backend/js/pace.js')}}"></script>
    <script src="{{asset('backend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('backend/libs/popper/popper.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.js')}}"></script>
    <script src="{{asset('backend/js/sidenav.js')}}"></script>
    <script src="{{asset('backend/js/layout-helpers.js')}}"></script>
    <script src="{{asset('backend/js/material-ripple.js')}}"></script>

    <!-- Libs -->
    <script src="{{asset('backend/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <!-- Demo -->
    {{-- <script src="{{asset('backend/js/demo.js')}}"></script><script src="{{asset('backend/js/analytics.js')}}"></script> --}}
</body>


<!-- Mirrored from html.phoenixcoded.net/empire/bootstrap/default/pages_authentication_register-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 13:38:33 GMT -->
</html>
