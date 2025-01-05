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
        <title>PayUrDues - Welcome</title>

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
    <body class="dashboard">

        <header class="px-3 px-md-5">
            <nav class="d-flex justify-content-between align-items-center py-4">
                <div class="d-flex gap-1 align-items-center">
                    <div class="association-logo_img">
                        <img src="{{asset('assets/img/svg/Ellipse 2.svg')}}" alt="PayUrDues">
                    </div>
                    <div class="div">
                        <p class="mb-0 header-title">Hello  {{ $student->first_name }},  {{ $student->other_names }}</p>
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

                    <div class="dashboard-content_balance row row-cols-1 row-cols-md-2  mb-4" style="box-sizing: border-box;">
                       
                        <div class="col">
                            <div class="balance-card due-available">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="balance-card_subtitle fw-light">Total dues</p>
                                    <p class="fw-semibold">{{ $countDue }}</p>
                                </div>
                                <p class="balance-card_title mt-2 fw-medium">₦{{ number_format($totalAmount, 2) }}</p>
                            </div>
                        </div>

                        <div class="col">
                            <div class="balance-card due-paid">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="balance-card_subtitle fw-light">Dues Paid</p>
                                    <p class="fw-semibold">{{ $TransactionCount }}</p>
                                </div>
                                <p class="balance-card_title mt-2 fw-medium">₦{{ number_format($paidDues, 2) }}</p>
                            </div>
                        </div>

                    </div>

                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Oops!</strong> {{ Session::get('error')}}
                    </div>
                    @endif
                    @if(Session::has('success'))
        
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Congrats!</strong>  {{ Session::get('success') }}
                    </div>
                    @endif
                    
                    @if(!$dues->isEmpty()) 
                        <div class="dashboard-content_details my-5 col">
                            <div class="payable-dues">

                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="fw-medium fs-5">Payable Dues</p>
                                    <a href="#" class="gradient-link" style="font-size: 70%;">See all</a>
                                </div>

                                <div class="d-flex flex-wrap flex-md-nowrap gap-2 g-md-3">

                                    @foreach ($dues as $due)

                                        <div class="payable-dues_card col-12 col-md-6 col-lg-4">
                                            <div class="row g-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="fw-bold">Due Name</p>
                                                    <p class="text-end">{{ $due->name }}</p>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="fw-bold">Period</p>
                                                    <p class="text-end">Basic dues</p>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="fw-bold">Price</p>
                                                    <p class="text-end">₦{{ number_format($due->amount, 2) }}</p>
                                                </div>

                                                <div class="form-check mt-3 d-flex gap-2 align-items-center">
                                                    {{-- <input class="form-check-input" type="checkbox" value="" name="select">
                                                    <label class="form-check-label" for="select">Select Dues</label> --}}

                                                       

                                                    @if($due->id == '1')
                                                        <button type="button" class="btn btn-pay-gradient w-100 mt-3 modal-button pay-now-btn"
                                                        
                                                        onclick="window.location.href='https://flutterwave.com/pay/facmassdueee'">
                                                            Pay Now 
                                                        </button>
                                                    @endif
                                                       
                                                    @if($due->id =='3')
                                                        <button type="button" class="btn btn-pay-gradient w-100 mt-3 modal-button pay-now-btn"
                                                        
                                                        onclick="window.location.href='https://flutterwave.com/pay/facmassdueee'">
                                                            Pay Now
                                                        </button>

                                                    @endif


                                                    @if(($due->id== '2') || ($due->id== '4'))

                                                        <button type="button" class="btn btn-pay-gradient w-100 mt-3 modal-button pay-now-btn" onclick="makePayment({{$student->levelduestatus === 'paid' ? 1200:3900 }}, '{{ $student->first_name }}', '{{ $student->id }}', '{{ json_encode($student->levelduestatus === 'paid' ? ['2'] : ['2', '4']) }}','{{  $student->matric_no }}')">Pay Now</button>


                            

                                                    @endif 


                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                    {{-- <div class="payable-dues_card col-12 col-md-6 col-lg-4">
                                        <div class="row g-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-bold">Due Name</p>
                                                <p class="text-end">Basic dues</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-bold">Period</p>
                                                <p class="text-end">Basic dues</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-bold">Price</p>
                                                <p class="text-end">₦2,500</p>
                                            </div>

                                            <div class="form-check mt-3 d-flex gap-2 align-items-center">
                                                <input class="form-check-input" type="checkbox" value="" name="select">
                                                <label class="form-check-label" for="select">Select Dues</label>
                                            </div>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    @endif
                    @if(!$Transactions->isEmpty()) 
                        <div class="dashboard-content_details my-5 col">

                            <div class="paid-dues">

                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="fw-medium fs-5">Paid Dues</p>
                                    <a href="#" class="gradient-link" style="font-size: 70%;">See all</a>
                                </div>

                                <div class="d-flex flex-wrap flex-md-nowrap gap-2 g-md-3">

                                    @foreach ($Transactions as $Transaction)

                                        <div class="payable-dues_card col-12 col-md-6 col-lg-4">
                                            <div class="row g-2">
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

                                                <div class="form-check mt-3 d-flex gap-2 align-items-center">
                                                    <a href="{{ route('receipt.show', ['trans_id' => $Transaction->trans_id]) }}" class="btn btn-pay-gradient w-100 mt-3 pay-now-btn">
                                                        View Receipt
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endif
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

       
        <script src="https://checkout.flutterwave.com/v3.js"></script>
        <script>

            
            function makePayment(amount, studentName,studentId, dueId,form_no) {
                FlutterwaveCheckout({
                    public_key: "{{ env('flw_PUBLIC_KEY') }}",
                    tx_ref: "txref-" + new Date().getTime(), // Use a unique transaction reference
                    amount:100 ,
                    currency: "NGN",
                    payment_options: "banktransfer",
                    meta: {
                        source: "duepayment",
                        form_no: "form_no",
                        due_id: dueId // Add due ID to meta for backend processing
                    },
                    customer: {
                        email: "payurdues.com.ng@gmail.com", // Use student's email
                        phone_number: "{{ $student->phone_number }}", // Use student's phone number
                        name: studentName, // Use student's name
                    },
                    customizations: {
                        title: studentName + "Facmas fee & Facmas Prospectus Fee",
                        description: "Payment for " + studentName,
                        logo: "https://www.payurdues.com.ng/assets/img/svg/logo.svg",
                    },
                    callback: function (data) {
                        console.log("Payment callback:", data);
                        // Handle payment success response
                        // if (data.status === "completed") {
                        //     window.location.href = "{{ route('payment.callback') }}?tx_ref=" + data.tx_ref + "&transaction_id=" + data.transaction_id + "&status=" + data.status + "&due_id=" + dueId + "&form_no=" + form_no;
                        // }

                        if (data.status === "completed") {
                            const form = document.createElement("form");
                            form.method = "POST";
                            form.action = "{{ route('payment.callback') }}";

                            // Add CSRF token for Laravel
                            const csrfInput = document.createElement("input");
                            csrfInput.type = "hidden";
                            csrfInput.name = "_token";
                            csrfInput.value = "{{ csrf_token() }}";
                            form.appendChild(csrfInput);

                            // Append data fields
                            const fields = {
                                tx_ref: data.tx_ref,
                                transaction_id: data.transaction_id,
                                status: data.status,
                                due_id: dueId,
                                amount: amount,
                                student_id: studentId,
                                form_no: form_no
                            };

                            for (const [key, value] of Object.entries(fields)) {
                                const input = document.createElement("input");
                                input.type = "hidden";
                                input.name = key;
                                input.value = value;
                                form.appendChild(input);
                            }

                            document.body.appendChild(form);
                            form.submit();
                        }

                    },
                    onclose: function() {
                        console.log("Payment cancelled!");
                    }
                });
            }
        </script>
    </body>
</html>