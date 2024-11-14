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
        <title>PayUrDues - Receipt</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link href="{{asset('assets/css/datatables.min.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">

    </head>
    <body class="dashboard">

        <header class="px-3 px-md-5">
            <nav class="d-flex justify-content-between align-items-center py-4">
                <a href="index.html" class="d-flex gap-2 align-items-center d-md-none">
                    <img src="{{asset('assets/img/svg/ArrowLeft.svg')}}" alt="PayUrDues">
                    <p class="mb-0 header-title">Receipt</p>
                </a>
                <div class="d-md-flex d-none gap-3 align-items-center">
                    <div class="association-logo_img">
                        <img src="{{asset('assets/img/svg/Ellipse 2.svg')}}" alt="PayUrDues">
                    </div>
                    <div class="div">
                        <p class="mb-0 header-title">Hello  {{ $student_name }}</p>
                        <p class="mb-0 header-subtitle">You have some dues to pay, we are here to help you</p>
                    </div>
                </div>
                <div class="nav-social d-flex gap-3 align-items-center">
                    <button class="d-flex justify-content-center align-items-center d-md-none toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive" >
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 6h18M3 12h18M3 18h18" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>

                </div>
            </nav>
        </header>


        <section class="main-content flex-grow-1">
            <div class="px-4 px-lg-5 h-100 d-flex mt-md-5 mt-4 gap-4">
                
                <!-- Start Sidebar -->
                <div class="sidebar mt-md-4 offcanvas-md offcanvas-end" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                    <div class="offcanvas-header d-flex d-md-none justify-content-between mb-4 align-items-center">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="{{asset('assets/img/svg/Ellipse 1.svg')}}" alt="PayUrDues" height="40" width="auto">
                            <p class="mb-0">{{$student_name}} </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                      </div>
                        
                    @include('student.sidebar')
                   
                </div>
                <!-- End Start Sidebar -->


                <div class="dashboard-content">

                    <div class="dashboard-content_details mb-5 px-md-5 col">

                        <div class="payable-dues row g-3 px-md-5">

                            <div class="col-12 text-center mt-4">
                                <p class="fw-semibold fs-4">Receipt</p>
                                <p class="fw-light lightTextColor">Generated {{$date}}</p>
                            </div>

                            <div class="col-12">
                                <div class="association-logo-box">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="col-auto flex-shrink-0">
                                            <div class="association-logo_img">
                                                <img src="{{asset('assets/img/svg/Ellipse 2.svg')}}" alt="PayUrDues">
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <p class="fw-bold">{{$associationName}}</p>
                                            <p class="fw-light">{{$associationEmail}}</p>
                                            <p class="fw-light">{{$associationContact}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="row g-2 g-md-4 px-2 px-md-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-bold">Payer Name</p>
                                                <p class="text-end lightTextColor">{{$student_name}}</p>
                                            </div>
    
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-bold">Level</p>
                                                <p class="text-end lightTextColor">{{$level}}</p>
                                            </div>
    
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-bold">Dues Name</p>
                                                <p class="text-end lightTextColor">{{$due_name}}</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-bold">Status</p>
                                                <p class="text-end lightTextColor">{{ $successMessage}}</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-bold">Transaction ID</p>
                                                <p class="text-end lightTextColor">{{$trans_id}}</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-bold">Date</p>
                                                <p class="text-end lightTextColor">{{$date}}</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-bold">Amount</p>
                                                <p class="text-end fw-bold">₦{{$amount}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="payable-dues_card">
                                    
                                    <div class="d-flex justify-content-between">
                                        <div class="nav-logo d-flex align-items-center justify-content-between">
                                            <img src="{{asset('assets/img/svg/logo.svg')}}" class="nav-logo_img" alt="Pay Your Dues">
                                            <span class="nav-logo_text ms-2">PayUrDues</span>
                                        </div>
    
                                        <div class="d-flex justify-content-between align-items-center">
                                            <img src="{{asset('assets/img/svg/bar-code.svg')}}" alt="PayUrDues">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <a href="#" id="print-receipt-btn" class="btn btn-pay-gradient modal-button col-11 col-md-7 mt-3 px-5">Print Receipt</a>
                            </div>
                            


                        </div>
                    </div>
            </div>
        </section>

        

        
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
       
        <!-- Data Table JS-->
        <script src="{{asset('assets/js/datatables.min.js')}}"></script>

        <!-- Custom JS -->
        <script src="{{asset('assets/js/main.js')}}"></script>
        
        <script>
            // Attach click event listener to the "Print Receipt" button
            document.getElementById('print-receipt-btn').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior
                window.print(); // Trigger the print dialog
            });
        </script>
    </body>
</html>