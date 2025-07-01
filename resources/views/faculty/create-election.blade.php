@extends('layout.facultyDashboard')

@section('title', 'Voting')



    @section('content')
                

        <div class="dashboard-content">
            
            <div class="dashboard-content_header mb-4 d-none d-md-flex justify-content-between align-items-center ps-3 mt-3 mt-md-5">
                <a href="{{ route('election_index') }}" class="d-flex gap-3 align-items-center">
                    <img src="../assets/img/svg/ArrowLeft.svg" alt="PayUrDues">
                    <h4 class="dashboard-content_heading">Create a new election</h4>
                </a>
            </div>

            <div class="dashboard-content_details mb-5 col">
                
                <div class="row justify-content-between gx-5 flex-lg-row-reverse">
                    <div class="col-lg-5">
                        <div class="payable-dues_card">
                            <div class="stepper d-md-flex gap-md-5 flex-lg-column">
                                <div class="step active mb-5 mb-md-0 mb-lg-4">
                                    <div class="rounded-5 circle">1</div>
                                    <div class="content">
                                        <h4>Create your Election details</h4>
                                        <p>Create basic details of the election</p>
                                    </div>
                                </div>

                                <div class="step inactive mb-3">
                                    <div class="rounded-5 circle">2</div>
                                    <div class="content">
                                        <h4>Create Category</h4>
                                        <p>Create voting</p>
                                    </div>
                                </div>
        
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="payable-dues_card">
                            <div class="modal-form mt-0 p-3">

                                <form action="{{ route('elections.store') }}" method="POST">
                                    @csrf

                                    <div class="my-4 mb-5 text-center">
                                        <p class="member-container_title mb-1">Create Your Election details</p>
                                        <p class="member-container_subtitle">Enter basic details of the election</p>
                                    </div>

                                    <div class="text-start mb-3">
                                        <label for="title" class="form-label fw-bold">Title</label>
                                        <input type="text" class="form-control ps-3" name="title" id="title" placeholder="Enter the Voting Title" required>
                                    </div>

                                    <div class="text-start mb-3">
                                        <label for="voting_date" class="form-label fw-bold">Voting Date</label>
                                        <input type="date" class="form-control ps-3" name="voting_date" id="voting_date" required>
                                    </div>

                                    <div class="text-start mb-3">
                                        <label for="voting_time" class="form-label fw-bold">Voting Time</label>
                                        <input type="time" class="form-control ps-3" name="voting_time" id="voting_time" required>
                                    </div>

                                    <div class="text-start mb-3">
                                        <label for="voting_period" class="form-label fw-bold">Voting Period (Hrs)</label>
                                        <input type="number" class="form-control ps-3" name="voting_period" id="voting_period" placeholder="Voting period in hrs" required>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn d-block btn-pay-gradient w-75 mx-auto modal-button">Continue</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    

                </div>
                
            </div>
        </div>
        


        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
       
        <!-- Data Table JS-->
        <script src="../assets/js/datatables.min.js"></script>

        <!-- Custom JS -->
        <script src="../assets/js/main.js"></script> 
    @endsection

@push('script')


@endpush
