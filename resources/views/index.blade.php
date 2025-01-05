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

         {{-- <link href="{{asset('css/styles.css')}}" rel="stylesheet"/> --}}

        <!-- favicon -->
        <link rel="shortcut icon" href="{{asset('assets/img/favicons/favicon.png')}}" />
        <link rel="apple-touch-icon" href="{{asset('assets/img/favicons/apple-touch-icon-57x57.png')}}" />
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/img/favicons//apple-touch-icon-72x72.png')}}" />
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/img/favicons/apple-touch-icon-114x114.png')}}" />

        <!-- Title -->
        <title>Welcoming</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    </head>
    <body>

        <!-- Hero Starts -->
        <div class="hero">
            <header class="px-3 px-md-5">
                <nav class="d-flex justify-content-between align-items-center py-4">
                    <div class="nav-logo d-flex align-items-center">
                        <img src="{{asset('assets/img/svg/logo.svg')}}" class="nav-logo_img" alt="Pay Your Dues">
                        <span class="nav-logo_text ms-2">PayUrDues</span>
                    </div>
                    <div class="nav-social d-flex gap-2">
                        <a href=""><img src="{{asset('assets/img/svg/twitter.svg')}}" alt=""></a>
                        <a href=""><img src="{{asset('assets/img/svg/linkedin.svg')}}" alt=""></a>
                    </div>
                </nav>
            </header>

            <div class="d-flex justify-content-center align-items-center">
    
                <!-- Hero Content -->
                <div class="col-12 hero-content text-center">
    
                    <!-- Hero Text -->
                    <div class="px-md-5 px-lg-0">
                        <h1 class="hero-content_heading display-2">
                            Simplify Your Association Dues <br/> Payments & Voting system
                        </h1>
        
                        <p class="hero-content_paragraph">
                            Join our waitlist to be the first to experience a secure, easy, and efficient <br /> association  payment & voting system
                        </p>
        
                        <div class="hero-content_button text-center px-2 px-md-0">
                            <a href="" class="btn btn-pay-gradient" data-bs-toggle="modal" data-bs-target="#joinWaitlist">Join waitlist <img src="{{asset('assets/img/svg/ArrowUpRight.svg')}}" alt=""></a>
                        </div>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="joinWaitlist" tabindex="-1" aria-labelledby="joinWaitlistLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-3 py-5 p-md-5">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn-close mb-3 border rounded-md p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body mx-1 mx-md-3">
                                    <div class="modal-text text-center">
                                        <p class="modal-heading">Join our waitlist</p>
                                        <p class="modal-paragraph">Join 64 others that are waiting for this project launch</p>
                                    </div>
                                    <div class="modal-form">
                                        <!-- Form -->
                                        <form id="waitlistForm" action="{{ route('waitlist.form') }}" method="POST">
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <div class="text-start mb-3">
                                                <label for="fullname" class="form-label fw-bold">Full Name</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control ps-3" name="fullname" id="fullname" placeholder="Enter your full name" required>
                                                    <img src="{{ asset('assets/img/svg/User.svg') }}" alt="" class="me-3 position-absolute top-50 end-0 translate-middle-y">
                                                </div>
                                            </div>
                                            <div class="text-start mb-3">
                                                <label for="email" class="form-label fw-bold">Email Address</label>
                                                <div class="position-relative">
                                                    <input type="email" class="form-control ps-3" name="email" id="email" placeholder="Enter your email address" required>
                                                    <img src="{{ asset('assets/img/svg/Envelope.svg') }}" alt="" class="me-3 position-absolute top-50 end-0 translate-middle-y">
                                                </div>
                                            </div>
                                            <div class="text-start mb-3">
                                                <label for="phone" class="form-label fw-bold">Phone Number</label>
                                                <div class="position-relative">
                                                    <input type="number" class="form-control ps-3" name="phone" id="phone" placeholder="Enter your phone number" required>
                                                    <img src="{{ asset('assets/img/svg/Phone.svg') }}" alt="" class="me-3 position-absolute top-50 end-0 translate-middle-y">
                                                </div>
                                            </div>
                                            <div class="text-start mb-3">
                                                <label for="association_name" class="form-label fw-bold">Association Name</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control ps-3" name="association_name" id="association_name" placeholder="Enter your association name" required>
                                                    <img src="{{ asset('assets/img/svg/User.svg') }}" alt="" class="me-3 position-absolute top-50 end-0 translate-middle-y">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-pay-gradient w-100 mt-3 modal-button">Join Waitlist</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="modal fade" id="alreadyInWaitlist" tabindex="-1" aria-labelledby="alreadyInWaitlistLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-3 py-5 p-md-5">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn-close mb-3 border rounded-md p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body mx-1 mx-md-3">
                                    <div class="text-center">
                                        <img src="assets/img/svg/noto_bubble-tea.svg"  class="img-fluid mb-3">
                                        <p class="h1 mt-3">Ops! you already in</p>
                                        <p class="mb-3">Your details are already on the <br class="d-md-none" /> waitlist. Grab a drink and chill!</p>
                                        <a href="/" class="btn btn-pay-gradient mt-3 w-100">Back to home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-3 py-5 p-md-5">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn-close mb-3 border rounded-md p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body mx-1 mx-md-3">
                                    <div class="modal-text text-center">
                                        <img src="assets/img/svg/fxemoji_confetti.svg" alt="" class="img-fluid mb-3">
                                  
                                        <p class="h1 mt-3">Welcome to the Waitlist!</p>
                                        <p class="mb-3">We're excited to have you on board. Sit back, relax, and stay tuned for updates!</p>
                                        <a href="/" class="btn btn-pay-gradient mt-3 w-100">Back to Home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    <!-- Hero Partners -->
                    <div class="hero-partner">
                        <div class="row justify-content-center">
                            <div class="hero-partner_text">
                                <p>Join 64 Others</p>
                            </div>
                            <div class="hero-partner_img d-flex justify-content-center gap-5">
                                <img src="{{asset('assets/img/svg/Ellipse 1.svg')}}" alt="Partners 1">
                                <img src="{{asset('assets/img/svg/Ellipse 2.svg')}}" alt="Partners 2">
                                <img src="{{asset('assets/img/svg/Ellipse 3.svg')}}" alt="Partners 3">
                                <img src="{{asset('assets/img/svg/Ellipse 4.svg')}}" alt="Partners 4">
                                <img src="{{asset('assets/img/svg/Ellipse 5.svg')}}" alt="Partners 5">
                                <img src="{{asset('assets/img/svg/Ellipse 6.svg')}}" alt="Partners 6">
                                <img src="{{asset('assets/img/svg/Ellipse 7.svg')}}" alt="Partners 7">
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
        </div>
        <!-- Hero Ends -->

        <!-- Due Payment start -->
        <section class="coming-soon px-3 px-md-5" style="margin-top: 100px;">
            <div class="d-lg-flex align-items-center justify-content-center px-3">
                <div class="col-lg-6 coming-soon_text pe-md-5">
                    <p class="coming-soon_label">Coming Soon</p>
                    <p class="coming-soon_title">Unlock Efficient Dues <br/>Payments</p>
                    <p class="coming-soon_subtitle mb-3 mb-md-5">Streamline Your Association's Finances with Ease</p>
                </div>

    
                <div class="col-lg-6 coming-soon_box">
                    <div class="row row-cols-1 row-cols-md-2 gy-4">
                        <div class="px-3">
                            <div class="coming-soon_box-card" style="background-color: rgba(129, 62, 149, .1);">
                                <img src="{{asset('assets/img/svg/encryption.svg')}}" class="mb-5" alt="">
                                <p class="coming-soon_box-card-heading mb-3">Secure & Reliable Payment</p>
                                <p class="coming-soon_box-card-paragraph">Protect your transactions with industry-standard encryption.</p>
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="coming-soon_box-card" style="background-color: rgba(62, 143, 149, .1);">
                                <img src="{{asset('assets/img/svg/notification-bell.svg')}}" class="mb-5" alt="">
                                <p class="coming-soon_box-card-heading mb-3">Reminders You Can Count On</p>
                                <p class="coming-soon_box-card-paragraph">Receive timely notifications for upcoming and overdue payments.</p>
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="coming-soon_box-card" style="background-color: rgba(62, 77, 149, .1);">
                                <img src="{{asset('assets/img/svg/history.svg')}}" class="mb-5" alt="">
                                <p class="coming-soon_box-card-heading mb-3">Transparent Payment History</p>
                                <p class="coming-soon_box-card-paragraph">Easily track and access your payment records.</p>
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="coming-soon_box-card" style="background-color: rgba(149, 62, 76, .1);">
                                <img src="{{asset('assets/img/svg/group.svg')}}" class="mb-5" alt="">
                                <p class="coming-soon_box-card-heading mb-3">Intuitive Member Experience</p>
                                <p class="coming-soon_box-card-paragraph">Enjoy a user-friendly interface designed for simplicity.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Due Payment ends -->

        
        <!-- Secure & Transparent Voting start -->
        <section class="coming-soon px-3 px-md-5">
            <div class="d-lg-flex flex-row-reverse align-items-center justify-content-center px-3">
                <div class=" col-lg-6 coming-soon_text ps-lg-5">
                    <p class="coming-soon_label">Coming Soon</p>
                    <p class="coming-soon_title">Introducing Secure & Transparent Voting</p>
                    <p class="coming-soon_subtitle mb-3 mb-md-5">Secure, reliable, and transparent voting solutions for members</p>
                </div>

    
                <div class=" col-lg-6 coming-soon_box">
                    <div class="row row-cols-1 row-cols-md-2 gy-4">
                        <div class="px-3">
                            <div class="coming-soon_box-card" style="background-color: rgba(129, 62, 149, .1);">
                                <img src="{{asset('assets/img/svg/grid.svg')}}" class="mb-5" alt="">
                                <p class="coming-soon_box-card-heading mb-3">Voting Platform</p>
                                <p class="coming-soon_box-card-paragraph">A user-friendly interface for association members to cast votes on important matters</p>
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="coming-soon_box-card" style="background-color: rgba(62, 143, 149, .1);">
                                <img src="{{asset('assets/img/svg/verified.svg')}}" class="mb-5" alt="">
                                <p class="coming-soon_box-card-heading mb-3">Voter Verification</p>
                                <p class="coming-soon_box-card-paragraph">Ensuring only active members with paid dues can participate</p>
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="coming-soon_box-card" style="background-color: rgba(62, 77, 149, .1);">
                                <img src="{{asset('assets/img/svg/safeguard.svg')}}" class="mb-5" alt="">
                                <p class="coming-soon_box-card-heading mb-3">Vote Encryption</p>
                                <p class="coming-soon_box-card-paragraph">Secure and private voting process with transparent results</p>
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="coming-soon_box-card" style="background-color: rgba(149, 62, 76, .1);">
                                <img src="{{asset('assets/img/svg/history-2.svg')}}" class="mb-5" alt="">
                                <p class="coming-soon_box-card-heading mb-3">Voting History</p>
                                <p class="coming-soon_box-card-paragraph">Members can view past voting records and election outcomes</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Secure & Transparent Voting ends -->

        <!-- Launching Soon start-->
        <section class="launching-soon px-3 px-md-5">
            <div class="launching-soon_box row justify-content-center align-items-center">
                <p class="launching-soon_heading">We're launching soon! Stay tuned for updates</p>
                <div class="launching-soon_button text-center">
                    <a href="#" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#joinWaitlist">
                        Join waitlist 
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24" class="arrow-icon">
                                <path d="M5 19l14-14m0 0h-9m9 0v9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </section>
        <!-- Launching Soon Ends-->

        <section class="footer px-3 px-md-5">
            <div class="row justify-content-center align-items-center">

                <div class="footer-logo">
                    <div class="footer-logo mb-4 d-flex justify-content-center align-items-center">
                        <img src="{{asset('assets/img/svg/logo.svg')}}" class="footer-logo_img" alt="Pay Your Dues">
                        <span class="footer-logo_text ms-2">PayUrDues</span>
                    </div>
                </div>

                <div class="footer-text text-center">
                    <p>Get Ready to Simplify Your <br/>Association Dues Payments</p>
                    
                </div>

                <div class="footer-icon">
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#"><img src="{{asset('assets/img/svg/twitter2.svg')}}" alt=""></a>
                        <a href="#"><img src="{{asset('assets/img/svg/telegram.svg')}}" alt=""></a>
                        <a href="#"><img src="{{asset('assets/img/svg/mail.svg')}}" alt=""></a>
                        <a href="#"><img src="{{asset('assets/img/svg/discord.svg')}}" alt=""></a>
                    </div>
                </div>
            </div>

        </section>


        
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Custom JS -->
        <script src="{{asset('assets/js/main.js')}}"></script>


        <script>

            document.getElementById('waitlistForm').addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent default form submission behavior

                const form = e.target;
                const formData = new FormData(form);
                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: formData,
                })
                    .then((response) => response.json())
                    .then((data) => {
                        const joinWaitlistModal = bootstrap.Modal.getInstance(document.getElementById('joinWaitlist'));
                        if (joinWaitlistModal) {
                            joinWaitlistModal.hide();
                        }
                        if (data.status === 'already_exists') {
                            // Insert and show the "already in waitlist" modal
                            document.body.insertAdjacentHTML('beforeend', data.html);
                            const modal = new bootstrap.Modal(document.getElementById('alreadyInWaitlist'));
                            modal.show();
                        } else if (data.status === 'new_user') {
                            // Show the "welcome" modal for new users
                            const welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
                            welcomeModal.show();

                            // Optionally reset the form after submission
                            form.reset();
                        }
                    })
                    .catch((error) => console.error('Error:', error));
            });

        </script>
        
    </body>
</html>