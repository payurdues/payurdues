<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tag -->
        <meta charset="UTF-8">
        <meta name="author" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="" />
        <meta name="description" content="" />

        <!-- favicon -->
        <link rel="shortcut icon" href="{{asset('assets/img/favicons/favicon.png')}}" />
        <link rel="apple-touch-icon" href="{{asset('assets/img/favicons/apple-touch-icon-57x57.png')}}" />
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/img/favicons//apple-touch-icon-72x72.png')}}" />
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/img/favicons/apple-touch-icon-114x114.png')}}" />

        <!-- Title -->
        <title>PayUrDues - @yield('title')</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Data Table CSS -->
        <link href="{{asset('assets/css/datatables.min.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">

    </head>
    <body class="member">

        <div class="member-container container d-flex justify-content-between align-baseline">
            <div class="col col-md-6 p-4 py-5 mx-2 mx-md-0">
                
                <div class="">
                    <div class="nav-logo d-flex align-items-center">
                        <img src="{{asset('assets/img/svg/logo.svg')}}" class="nav-logo_img" alt="Pay Your Dues">
                        <span class="nav-logo_text ms-2">PayUrDues</span>
                    </div>
                    <br>
                    <p class="member-container_title">Login</p>
                    <br>
                    <p class="member-container_subtitle">Login to your association Dashboard and pay your dues</p>
                    <br>
                </div>
                <div class="modal-form">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form action="{{ route('association.login') }}" method="POST">
                        @csrf
                        <div class="text-start mb-3">
                            <label for="identifier" class="form-label fw-bold">Email or Phone Number:</label>
                            <input type="text" class="form-control ps-3" name="identifier" id="identifier" placeholder="Enter your email">
                        </div>


                        <div class="text-start mb-3">
                            <label for="first_name" class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control ps-3" name="password" id="password" placeholder="Enter Your Password">
                        </div>

                        <input type="submit" value="Login" class="btn btn-pay-gradient w-100 mt-3 modal-button">

                    </form>
                </div>
            </div>
            <div class="col-4 d-none d-md-block">

            </div>
        </div>

        

        
        
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        
      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     
      <!-- Data Table JS-->
      <script src="{{asset('assets/js/datatables.min.js')}}"></script>

      <!-- Custom JS -->
      <script src="{{asset('assets/js/main.js')}}"></script>
      
        
    </body>
</html>