@extends('layout.facultyDashboard')

@section('title', 'Create Election')



@section('content')

        <div class="dashboard-content">
            
            <a href="voting.html" class="d-flex gap-3 align-items-center mt-3 mt-md-5">
                <img src="../assets/img/svg/ArrowLeft.svg" alt="PayUrDues">
                <h5 class="dashboard-content_heading">{{ $election->title }}</h5>
            </a>

            <div class="dashboard-content_header d-md-flex gap-5 justify-content-between align-items-center my-4 px-4">

                <div class="countdown_card">

                    <div class="d-none justify-content-between align-items-center">
                        <p class="fw-bold">Voting Date</p>
                        <p class="text-end election-date">{{ $election->voting_date }}, <br class="d-none d-md-block"/> {{ $election->voting_time }}</p>
                    </div>

                    <div class="d-md-flex justify-content-between text-center text-md-start align-items-center gap-3 col-md-8 col-lg-auto">
                        <p class="fs-6 fw-semibold text-nowrap">Start in</p>
                        <div class="countdown-display text-lg-end fs-3">
                            <span class="text-color-gradient fw-semibold days">00</span> 
                            <span class='fs-small'>Days</span>

                            <span class="text-color-gradient fw-semibold hours">00</span> 
                            <span class='fs-small'>Hrs</span>

                            <span class="text-color-gradient fw-semibold minutes">00</span> 
                            <span class='fs-small'>Min</span>
                                    
                            <span class="text-color-gradient fw-semibold seconds">00</span> 
                            <span class='fs-small'>Sec</span>
                        </div>
                    </div>

                </div>

                <div class="mt-3 mt-md-0">
                    <a href="#" class="d-flex align-items-center text-center justify-content-center gap-1 btn-pay-gradient" data-bs-toggle="modal" data-bs-target="#createCategory">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.6875 6C10.6875 6.14918 10.6282 6.29226 10.5227 6.39775C10.4173 6.50324 10.2742 6.5625 10.125 6.5625H6.5625V10.125C6.5625 10.2742 6.50324 10.4173 6.39775 10.5227C6.29226 10.6282 6.14918 10.6875 6 10.6875C5.85082 10.6875 5.70774 10.6282 5.60225 10.5227C5.49676 10.4173 5.4375 10.2742 5.4375 10.125V6.5625H1.875C1.72582 6.5625 1.58274 6.50324 1.47725 6.39775C1.37176 6.29226 1.3125 6.14918 1.3125 6C1.3125 5.85082 1.37176 5.70774 1.47725 5.60225C1.58274 5.49676 1.72582 5.4375 1.875 5.4375H5.4375V1.875C5.4375 1.72582 5.49676 1.58274 5.60225 1.47725C5.70774 1.37176 5.85082 1.3125 6 1.3125C6.14918 1.3125 6.29226 1.37176 6.39775 1.47725C6.50324 1.58274 6.5625 1.72582 6.5625 1.875V5.4375H10.125C10.2742 5.4375 10.4173 5.49676 10.5227 5.60225C10.6282 5.70774 10.6875 5.85082 10.6875 6Z" fill="white"/>
                        </svg>        
                        <p class="text-light">Create a Category</p>
                    </a>
                </div>

                

                <div class="mt-3 mt-md-0">
                    <a href="#" class="d-flex align-items-center text-center justify-content-center gap-1 btn-pay-gradient" data-bs-toggle="modal" data-bs-target="#createCandidate">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.6875 6C10.6875 6.14918 10.6282 6.29226 10.5227 6.39775C10.4173 6.50324 10.2742 6.5625 10.125 6.5625H6.5625V10.125C6.5625 10.2742 6.50324 10.4173 6.39775 10.5227C6.29226 10.6282 6.14918 10.6875 6 10.6875C5.85082 10.6875 5.70774 10.6282 5.60225 10.5227C5.49676 10.4173 5.4375 10.2742 5.4375 10.125V6.5625H1.875C1.72582 6.5625 1.58274 6.50324 1.47725 6.39775C1.37176 6.29226 1.3125 6.14918 1.3125 6C1.3125 5.85082 1.37176 5.70774 1.47725 5.60225C1.58274 5.49676 1.72582 5.4375 1.875 5.4375H5.4375V1.875C5.4375 1.72582 5.49676 1.58274 5.60225 1.47725C5.70774 1.37176 5.85082 1.3125 6 1.3125C6.14918 1.3125 6.29226 1.37176 6.39775 1.47725C6.50324 1.58274 6.5625 1.72582 6.5625 1.875V5.4375H10.125C10.2742 5.4375 10.4173 5.49676 10.5227 5.60225C10.6282 5.70774 10.6875 5.85082 10.6875 6Z" fill="white"/>
                        </svg>        
                        <p class="text-light">Create a Candidate</p>
                    </a>
                </div>
            </div>

            <div class="dashboard-content_details mb-5 col">
                
                <div class="row row-cols-1 row-cols-lg-2 justify-content-between g-3 g-md-5">

                    <div class="col">
                        <div class="accordion" id="categoryAccordion1">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button py-4 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#category1" aria-expanded="true" aria-controls="category1">
                                    <h4 class="text-color-gradient">President</h4>
                                    </button>
                                </h2>

                                <div id="category1" class="accordion-collapse collapse" data-bs-parent="#categoryAccordion1">
                                    <div class="accordion-body">
                                        <div class="row row-cols-2 g-3">
                                            
                                            <div class="col">
                                                <div class="bg-white mt-3 rounded-4 overflow-hidden">
                                                    <div class="square-image-container">
                                                        <img src="../assets/img/candidate-1.jpg" class="rounded-3 img-thumbnail" alt="...">
                                                    </div>
                                                    <div class="p-4 pt-0 text-center">
                                                        <h4 class="text-color-gradient mb-1">Adewale Ayuba</h3>
                                                        <p class="fs-small fw-light">(AKA Agbawo)</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="bg-white mt-3 rounded-4 overflow-hidden">
                                                    <div class="square-image-container">
                                                        <img src="../assets/img/candidate-2.jpg" class="rounded-3 img-thumbnail" alt="...">
                                                    </div>
                                                    <div class="p-4 pt-0 text-center">
                                                        <h4 class="text-color-gradient mb-1">Adewale Ayuba</h3>
                                                        <p class="fs-small fw-light">(AKA Agbawo)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
                
            </div>

        </div>
          

        <!-- Modal -->

        <!-- Success Modal -->
        <div class="modal fade" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content p-3 py-5 p-md-5">
                            
                    <div class="modal-body mx-1 mx-md-3  text-center">
                        
                        <div class="mb-3">
                            <svg width="72" height="72" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M34.6072 17.3928C34.8519 17.6367 35.0461 17.9265 35.1786 18.2455C35.3111 18.5646 35.3793 18.9067 35.3793 19.2522C35.3793 19.5977 35.3111 19.9398 35.1786 20.2588C35.0461 20.5779 34.8519 20.8677 34.6072 21.1116L22.3572 33.3616C22.1133 33.6063 21.8235 33.8005 21.5045 33.9329C21.1854 34.0654 20.8433 34.1336 20.4978 34.1336C20.1523 34.1336 19.8102 34.0654 19.4912 33.9329C19.1721 33.8005 18.8823 33.6063 18.6384 33.3616L13.3884 28.1116C13.1443 27.8674 12.9506 27.5775 12.8184 27.2585C12.6863 26.9394 12.6183 26.5975 12.6183 26.2522C12.6183 25.9069 12.6863 25.5649 12.8184 25.2459C12.9506 24.9269 13.1443 24.637 13.3884 24.3928C13.6326 24.1486 13.9225 23.9549 14.2415 23.8228C14.5606 23.6906 14.9025 23.6226 15.2478 23.6226C15.5931 23.6226 15.9351 23.6906 16.2541 23.8228C16.5731 23.9549 16.863 24.1486 17.1072 24.3928L20.5 27.7812L30.8928 17.3863C31.137 17.1426 31.4269 16.9495 31.7458 16.818C32.0647 16.6864 32.4064 16.619 32.7514 16.6197C33.0963 16.6203 33.4378 16.6889 33.7562 16.8215C34.0747 16.9542 34.3638 17.1483 34.6072 17.3928ZM47.625 24.5C47.625 29.1726 46.2394 33.7402 43.6435 37.6253C41.0475 41.5105 37.3578 44.5385 33.0409 46.3267C28.724 48.1148 23.9738 48.5826 19.391 47.6711C14.8082 46.7595 10.5986 44.5094 7.29461 41.2054C3.9906 37.9014 1.74053 33.6918 0.828958 29.109C-0.0826175 24.5262 0.385236 19.776 2.17336 15.4591C3.96148 11.1422 6.98955 7.45248 10.8747 4.85653C14.7598 2.26058 19.3274 0.875 24 0.875C30.2636 0.881948 36.2687 3.37323 40.6977 7.80228C45.1268 12.2313 47.6181 18.2364 47.625 24.5ZM42.375 24.5C42.375 20.8658 41.2973 17.3132 39.2783 14.2914C37.2592 11.2696 34.3894 8.91447 31.0318 7.52371C27.6742 6.13295 23.9796 5.76907 20.4152 6.47807C16.8508 7.18707 13.5767 8.93712 11.0069 11.5069C8.43713 14.0767 6.68708 17.3508 5.97808 20.9152C5.26908 24.4796 5.63296 28.1742 7.02372 31.5318C8.41448 34.8894 10.7697 37.7592 13.7914 39.7783C16.8132 41.7973 20.3658 42.875 24 42.875C28.8718 42.8698 33.5425 40.9322 36.9873 37.4873C40.4322 34.0425 42.3698 29.3718 42.375 24.5Z" fill="#008000"/>
                            </svg>
                        </div>

                         <div class="modal-text text-center col-md-10 col-lg-8 mx-auto mt-4">
                            <p class="modal-heading-2 mobile">Your election has been created sucessfully</p>
                            <p class="modal-paragraph">Your election has been created, and voting will be open to members at the specified time</p>
                        </div>

                        <a href="#" class="btn btn-pay-gradient w-75 mt-4 modal-button">Back to Voting Dashboard</a>
                    </div>
                            
                </div>
            </div>
        </div>

        <!-- Create due modal -->
        <div class="modal fade" id="createCategory" tabindex="-1" aria-labelledby="createCategoryLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content p-3 p-md-4 py-md-3">
                            
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close mb-3 border rounded-md p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body mx-1 mx-md-3 row justify-content-center">
                        <div class="modal-text text-center col-md-10">
                            <p class="modal-heading-2 mobile mb-0">Create a various category</p>
                            <p class="modal-paragraph">Create voting Category</p>
                        </div>

                        <div class="modal-form col-md-12">
                             <form action="{{ route('categories.store') }}" method="POST">
                                 @csrf
                                <div class="p-3 border border-p rounded-3">
                                    <div class="text-start mb-3">
                                        <label for="" class="form-label fw-medium mb-1">Category Name</label>
                                        <input type="text" class="form-control ps-3" name="name" id="" placeholder="Enter Category name">
                                    </div>
                                    <input type="hidden" name="election_id" value="{{ $election->id }}"/>
                                </div>

                                <div class="text-center mt-4">
                                        <button type="submit" class="btn d-block btn-pay-gradient w-100 mx-auto modal-button">Continue</button>
                                </div>
                            </form>
                        </div>

                    </div>
                            
                </div>
            </div>
        </div>


         <!-- Create due modal -->
        <div class="modal fade" id="createCandidate" tabindex="-1" aria-labelledby="createCandidateLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content p-3 p-md-4 py-md-3">
                            
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close mb-3 border rounded-md p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body mx-1 mx-md-3 row justify-content-center">
                        <div class="modal-text text-center col-md-10">
                            <p class="modal-heading-2 mobile mb-0">Create a various category</p>
                            <p class="modal-paragraph">Create voting Category</p>
                        </div>

                        <div class="modal-form col-md-12">
                            {{-- <form id="categoryForm">
                                <div class="p-3 border border-p rounded-3">
                                    <div class="text-start mb-3">
                                        <label for="category_id" class="form-label fw-medium mb-1">Select Category</label>
                                        <select class="form-select ps-3" name="category_id" id="category_id">
                                            <option value="">-- Select a Category --</option>
                                            @foreach($election->categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                
                                <div id="candidatesWrapper">
                                
                                
                                </div>

                                <a href="#" id="addCandidateBtn" class="text-color-gradient text-end d-block my-3">Add another Candidate</a>

                                <div id="candidateTableWrapper" class="modal-table table-responsive mt-4 d-none">
                                    <table class="table table-hover" id="candidateTable">
                                        <thead>
                                            <tr class="table-light text-center">
                                                <th>S/N</th>
                                                <th>Full Name</th>
                                                <th>Alias</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>


                                <input type="submit" value="Submit" class="btn btn-pay-gradient w-100 mt-3 modal-button">
                            </form> --}}
                            <form id="categoryForm" method="POST" action="{{ route('candidates.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="p-3 border border-p rounded-3">
                                    <div class="text-start mb-3">
                                        <label for="category_id" class="form-label fw-medium mb-1">Select Category</label>
                                        <select class="form-select ps-3" name="category_id" id="category_id" required>
                                            <option value="">-- Select a Category --</option>
                                            @foreach($election->categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div id="candidatesWrapper"></div>

                                <a href="#" id="addCandidateBtn" class="text-color-gradient text-end d-block my-3">Add another Candidate</a>

                                <div id="candidateTableWrapper" class="modal-table table-responsive mt-4 d-none">
                                    <table class="table table-hover" id="candidateTable">
                                        <thead>
                                            <tr class="table-light text-center">
                                                <th>S/N</th>
                                                <th>Full Name</th>
                                                <th>Alias</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>

                                <input type="submit" value="Submit" class="btn btn-pay-gradient w-100 mt-3 modal-button">
                            </form>

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
        <script src="../assets/js/countdown.js"></script> 
        <script src="../assets/js/candidate.js"></script>
@endsection

@push('script')


@endpush
