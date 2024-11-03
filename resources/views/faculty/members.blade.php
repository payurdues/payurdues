@extends('layout.facultyDashboard')

@section('title', 'Members')



@section('content')

    <div class="dashboard-content">
        
        <div class="dashboard-content_header px-md-3 d-flex justify-content-between align-items-center">
            <div class="">
                <h1 class="dashboard-content_heading">Members</h1>
                <p class="dashboard-content_paragraph">24 Members</p>
            </div>
            
            <div class="">
                <a href="members.html" class="d-flex align-items-center justify-content-center gap-1 btn-pay-gradient" data-bs-toggle="modal" data-bs-target="#addMember">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.6875 6C10.6875 6.14918 10.6282 6.29226 10.5227 6.39775C10.4173 6.50324 10.2742 6.5625 10.125 6.5625H6.5625V10.125C6.5625 10.2742 6.50324 10.4173 6.39775 10.5227C6.29226 10.6282 6.14918 10.6875 6 10.6875C5.85082 10.6875 5.70774 10.6282 5.60225 10.5227C5.49676 10.4173 5.4375 10.2742 5.4375 10.125V6.5625H1.875C1.72582 6.5625 1.58274 6.50324 1.47725 6.39775C1.37176 6.29226 1.3125 6.14918 1.3125 6C1.3125 5.85082 1.37176 5.70774 1.47725 5.60225C1.58274 5.49676 1.72582 5.4375 1.875 5.4375H5.4375V1.875C5.4375 1.72582 5.49676 1.58274 5.60225 1.47725C5.70774 1.37176 5.85082 1.3125 6 1.3125C6.14918 1.3125 6.29226 1.37176 6.39775 1.47725C6.50324 1.58274 6.5625 1.72582 6.5625 1.875V5.4375H10.125C10.2742 5.4375 10.4173 5.49676 10.5227 5.60225C10.6282 5.70774 10.6875 5.85082 10.6875 6Z" fill="white"/>
                    </svg>        
                    <p class="text-light">Add Members</p>
                </a>
            </div>
        </div>

        <div class="dashboard-content_details mt-5 d-flex align-items-baseline gap-3">
            <div class="p-4 dashboard-content_details_filter d-none d-md-block col-2">
                <p class="lead fw-bold fs-5 mb-4">Filter</p>

                <div class="item">
                    <p class="">Level</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="100">
                        <label class="form-check-label" for="100">100</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="200">
                        <label class="form-check-label" for="200">200</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="300">
                        <label class="form-check-label" for="300">300</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="400">
                        <label class="form-check-label" for="400">400</label>
                    </div>
                </div>

                <div class="item">
                    <p class="">Dues paid</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="basic">
                        <label class="form-check-label" for="basic">Basic Dues</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="Secretarial">
                        <label class="form-check-label" for="Secretarial">Secretarial Fee</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="sug">
                        <label class="form-check-label" for="sug">SUG Levy</label>
                    </div>  
                </div>

            </div>

            <div class="table-responsive col">
                <table class="table table-hover" id="members">
                    <thead>
                        <tr class="table-light text-center">
                            <th>Matric No</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Gender</th>
                            <th>No of dues paid</th>
                            <th>Last dues paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#viewMember">
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Modal -->
        <!-- Add Member Modal -->
    <div class="modal fade" id="addMember" tabindex="-1" aria-labelledby="addMemberLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content p-3 py-5 p-md-5">
                        
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close mb-3 border rounded-md p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mx-1 mx-md-3">
                    <div class="modal-text text-center">
                        <p class="modal-heading-2">Add Members link</p>
                        <p class="modal-paragraph px-4">Send the link below to your members to onboard new members</p>
                    </div>

                    <a class="modal-link my-4" href="">https://payurdues.com/Adeleke-association/members onboarding</a>

                    <a href="#" class="btn btn-pay-gradient w-100 mt-3 modal-button">Copy link</a>
                    <a href="#" class="btn btn-pay-gradient-outline w-100 mt-2 modal-button">Add Manually</a>
                </div>
                        
            </div>
        </div>
    </div>

    <!-- View Member Modal -->
    <div class="modal fade" id="viewMember" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewMemberLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content p-3 py-5 p-md-5">
                        
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close mb-3 border rounded-md p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mx-1 mx-md-3">
                    <div class="modal-text-2 text-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="modal-paragraph-1">Matric No</p>
                            <p class="modal-paragraph px-4 text-end">2130120029</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="modal-paragraph-1">Name</p>
                            <p class="modal-paragraph px-4 text-end">Sulaimon Yusuf</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="modal-paragraph-1">Gender</p>
                            <p class="modal-paragraph px-4 text-end">Malw</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="modal-paragraph-1">Level</p>
                            <p class="modal-paragraph px-4 text-end">300</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="modal-paragraph-1">No of Dues paid</p>
                            <p class="modal-paragraph px-4 text-end">2</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="modal-paragraph-1">Total Amount of dues paid</p>
                            <p class="modal-paragraph px-4 text-end">₦4000</p>
                        </div>
                    </div>

                    <div class="modal-table table-responsive mt-3">
                        <table class="table table-hover" id="viewMemberTable">
                            <thead>
                                <tr class="table-light text-center">
                                    <th>Dues name</th>
                                    <th>Amount</th>
                                    <th>Date Paid</th>
                                    <th>Period</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Basic Due</td>
                                    <td>₦4000</td>
                                    <td>16 Feb, 2024</td>
                                    <td>Jan 2024-Jul 2024</td>
                                    <td>paid</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    
                </div>
                        
            </div>
        </div>
    </div>

@endsection

@push('script')


@endpush

    
            
        
        
    