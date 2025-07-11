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
        <link rel="shortcut icon" href="../assets/img/favicons/favicon.png" />
        <link rel="apple-touch-icon" href="../assets/img/favicons/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="../assets/img/favicons//apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="../assets/img/favicons/apple-touch-icon-114x114.png" />

        <!-- Title -->
        <title>PayUrDues - Payment Summary</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Data Table CSS -->
        <link href="../assets/css/datatables.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/style.css" rel="stylesheet">
        <link href="../assets/css/responsive.css" rel="stylesheet">

    </head>
    <body class="dashboard">

        <header class="px-3 px-md-5">
            <nav class="d-flex justify-content-between align-items-center py-4">
                <a href="{{ url()->previous() }}" class="d-flex gap-2 align-items-center d-md-none">
                    <img src="../assets/img/svg/ArrowLeft.svg" alt="PayUrDues">
                    <p class="mb-0 header-title">History</p>
                </a>
                <div class="d-md-flex d-none gap-3 align-items-center">
                    <div class="association-logo_img">
                        <img src="../assets/img/svg/Ellipse 2.svg" alt="PayUrDues">
                    </div>
                    <div class="div">
                        <p class="mb-0 header-title">Hello {{ $student->first_name }},  {{ $student->other_names }}</p>
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
              
                <div class="sidebar mt-md-4 offcanvas-md offcanvas-end" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                    <div class="offcanvas-header d-flex d-md-none justify-content-between mb-4 align-items-center">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="{{asset('assets/img/svg/Ellipse 1.svg')}}" alt="PayUrDues" height="40" width="auto">
                            <p class="mb-0">{{ $student->first_name }},  {{ $student->other_names }} </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                      </div>
                    
                      @include('student.sidebar')
                </div>

                <div class="dashboard-content">

                    <div class="dashboard-content_header gap-4 mb-4 d-flex justify-content-around justify-content-md-end align-items-center" >
                        <div class="col-auto">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    All Categories
                                </a>
                                <ul class="dropdown-menu custom-dropdown-menu">
                                    <li><a class="dropdown-item custom-dropdown-item" href="#">All Status</a></li>
                                    <li><a class="dropdown-item custom-dropdown-item" href="#">Successful</a></li>
                                    <li><a class="dropdown-item custom-dropdown-item" href="#">Pending</a></li>
                                    <li><a class="dropdown-item custom-dropdown-item" href="#">Failed</a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-auto">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    All Status
                                </a>
                                <ul class="dropdown-menu custom-dropdown-menu">
                                    <li><a class="dropdown-item custom-dropdown-item" href="#">Basic Due</a></li>
                                    <li><a class="dropdown-item custom-dropdown-item" href="#">Basic Due</a></li>
                                    
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="dashboard-content_details mb-5 col">

                        <div class="payable-dues row g-3 px-md-3">

                            <div class="col">
                                <div class="row row-cols-1 row-cols-md-2 ">
                                    @foreach ($Transactions as $Transaction)
                                        <div class="col">
                                            <div class="payable-dues_card">
                                                <div class="row g-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="fw-bold">Due Name</p>
                                                        <p class="text-end">{{ $Transaction->due->name }}</p>
                                                    </div>
            
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="fw-bold">Period</p>
                                                        <p class="text-end">Basic dues</p>
                                                    </div>
            
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="fw-bold">Price</p>
                                                        <p class="text-end">₦{{ number_format($Transaction->due->amount, 2) }}</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="fw-bold">Status</p>
                                                        <p class="text-end">{{ $Transaction->status }}</p>
                                                    </div>

                                                    <div class="col text-end">
                                                        <a href="{{ route('receipt.show', ['trans_id' => $Transaction->trans_id]) }}" class="gradient-link text-end">
                                                            View Receipt >
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
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
        <script src="../assets/js/datatables.min.js"></script>

        <!-- Custom JS -->
        <script src="../assets/js/main.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {

                const dropdownMenus = document.querySelectorAll('.custom-dropdown-menu');

                dropdownMenus.forEach(dropdownMenu => {
                    dropdownMenu.addEventListener('click', (event) => {

                        if (event.target.classList.contains('custom-dropdown-item')) {

                            const currentlySelected = dropdownMenu.querySelector('.selected');
                            if (currentlySelected) {
                                currentlySelected.classList.remove('selected');
                            }


                            event.target.classList.add('selected');
                        }
                    });
                });
            });


        </script>
        
    </body>
</html>