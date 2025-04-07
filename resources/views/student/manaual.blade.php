<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="" />
        <meta name="description" content="" />

        <link rel="shortcut icon" href="{{asset('assets/img/favicons/favicon.png')}}" />
        <link rel="apple-touch-icon" href="{{asset('assets/img/favicons/apple-touch-icon-57x57.png')}}" />
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/img/favicons/apple-touch-icon-72x72.png')}}" />
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/img/favicons/apple-touch-icon-114x114.png')}}" />

        <title>PayUrDues - @yield('title')</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{asset('assets/css/datatables.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    </head>
    <body class="member">
        <div class="member-container container d-flex justify-content-between align-baseline">
            <div class="col col-md-6 p-4 py-5 mx-2 mx-md-0">
                <div class="nav-logo d-flex align-items-center">
                    <img src="{{asset('assets/img/svg/logo.svg')}}" class="nav-logo_img" alt="Pay Your Dues">
                    <span class="nav-logo_text ms-2">PayUrDues</span>
                </div>
                <br>
                <p class="member-container_title">Payment Status</p>
                <br>
                <p class="member-container_subtitle">Here is the summary of your payment transaction.</p>
                <br>
          
                <div class="modal-form">
                <form action="{{ route('manual.callback') }}" method="POST">
                    @csrf  
                    <div class="text-start mb-3">
                        <label for="tx_ref" class="form-label fw-bold">Tx ref</label>
                        <input type="text" class="form-control ps-3" name="tx_ref" id="tx_ref" placeholder="tx_ref">
                    </div>

                    <div class="text-start mb-3">
                        <label for="status" class="form-label fw-bold">Status</label>
                        <select class="form-control ps-3" name="status" id="status" multiple>
                            <option value="completed">completed</option>
                        </select>
                    </div>

                    <div class="text-start mb-3">
                        <label for="due_id" class="form-label fw-bold">Matric Number or Form Number</label>
                        <select class="form-control ps-3" name="due_id[]" id="due_id" multiple>
                            <option value="2">2</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="text-start mb-3">
                        <label for="form_no" class="form-label fw-bold">form_no/Matric No</label>
                        <input type="text" class="form-control ps-3" name="form_no" id="form_no" placeholder="Matric Number or Form Number">
                    </div>



                    
                    <button type="submit" class="btn btn-pay-gradient w-100 mt-3 modal-button">Confirm Payment</button>
                </form>
                </div>
                
            </div>
        </div>
      
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('assets/js/datatables.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>
