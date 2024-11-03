
@extends('layout.facultyDashboard')

@section('title', 'Dues')



@section('content')
                

    <div class="dashboard-content">
        
        <div class="dashboard-content_header px-md-3 d-flex justify-content-between align-items-center">
            <div class="">
                <h1 class="dashboard-content_heading">Dues</h1>
                <p class="dashboard-content_paragraph">24 Members</p>
            </div>
            
            <div class="">
                <a href="members.html" class="d-flex align-items-center justify-content-center gap-1 btn-pay-gradient" data-bs-toggle="modal" data-bs-target="#createDue">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.6875 6C10.6875 6.14918 10.6282 6.29226 10.5227 6.39775C10.4173 6.50324 10.2742 6.5625 10.125 6.5625H6.5625V10.125C6.5625 10.2742 6.50324 10.4173 6.39775 10.5227C6.29226 10.6282 6.14918 10.6875 6 10.6875C5.85082 10.6875 5.70774 10.6282 5.60225 10.5227C5.49676 10.4173 5.4375 10.2742 5.4375 10.125V6.5625H1.875C1.72582 6.5625 1.58274 6.50324 1.47725 6.39775C1.37176 6.29226 1.3125 6.14918 1.3125 6C1.3125 5.85082 1.37176 5.70774 1.47725 5.60225C1.58274 5.49676 1.72582 5.4375 1.875 5.4375H5.4375V1.875C5.4375 1.72582 5.49676 1.58274 5.60225 1.47725C5.70774 1.37176 5.85082 1.3125 6 1.3125C6.14918 1.3125 6.29226 1.37176 6.39775 1.47725C6.50324 1.58274 6.5625 1.72582 6.5625 1.875V5.4375H10.125C10.2742 5.4375 10.4173 5.49676 10.5227 5.60225C10.6282 5.70774 10.6875 5.85082 10.6875 6Z" fill="white"/>
                    </svg>        
                    <p class="text-light">Create a due</p>
                </a>
            </div>
        </div>

        <div class="dashboard-content_details mt-5">
            <div class="table-responsive">
                <table class="table table-hover" id="viewDueTable">
                    <thead>
                        <tr class="table-light text-center">
                            <th>Dues Name</th>
                            {{-- <th>Period</th> --}}
                            <th>Price</th>
                            <th>Available for</th>
                            <th>Payment Made</th>
                            <th>Income</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($selectDue as $due)    
                            <tr data-bs-toggle="modal" data-bs-target="#viewDue">
                                <td> {{ $due->name }}</td>
                                {{-- <td>Jan2024 - Jul 2024</td> --}}
                                <td>₦{{ number_format($due->amount, 2) }}</td>
                                <td>
                                    {{ implode(', ', json_decode($due->payable_departments)) }}
                                </td>
                                <td>10</td>
                                <td>₦40,000</td>
                            </tr>
                        @endforeach
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

    <!-- View Due Modal -->
    <div class="modal fade" id="viewDue" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewDueLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content p-3 py-5 p-md-5">
                        
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close mb-3 border rounded-md p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mx-1 mx-md-3">
                    <div class="modal-text-2 text-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="modal-paragraph-1">Due Name</p>
                            <p class="modal-paragraph px-4 text-end">Basic Due</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="modal-paragraph-1">Period</p>
                            <p class="modal-paragraph px-4 text-end">Jan 2024 - Jul 2024</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="modal-paragraph-1">Price</p>
                            <p class="modal-paragraph px-4 text-end">₦4000</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="modal-paragraph-1">Payment Made</p>
                            <p class="modal-paragraph px-4 text-end">300</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="modal-paragraph-1">Income</p>
                            <p class="modal-paragraph px-4 text-end">₦4000</p>
                        </div>
                        
                    </div>

                    <div class="modal-table table-responsive mt-3">
                        <table class="table table-hover" id="viewDuePayerTable">
                            <thead>
                                <tr class="table-light text-center">
                                    <th>Matric No</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Gender</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2130120029</td>
                                    <td>Sulaimon Yusuf</td>
                                    <td>300</td>
                                    <td>Male</td>
                                    <td>₦4000</td>
                                    <td>paid</td>
                                    <td>Nip_23hf..</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    
                </div>
                        
            </div>
        </div>
    </div>

    <!-- Create due modal -->
    <div class="modal fade" id="createDue" tabindex="-1" aria-labelledby="createDueLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content p-3 py-5 p-md-4 py-md-3">
                        
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close mb-3 border rounded-md p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mx-1 mx-md-3 row justify-content-center">
                    <div class="modal-text text-center col-md-8">
                        <p class="modal-heading-2">Create a payable due</p>
                        <p class="modal-paragraph">In few steps, let us help you collect your association due</p>
                    </div>

                    <div class="modal-form col-md-8">
                        <form action="">
                            <div class="text-start mb-3">
                                <label for="duesName" class="form-label fw-medium mb-1">Dues Name</label>
                                <input type="text" class="form-control ps-3" name="duesName" id="duesName" placeholder="Enter Dues name">
                            </div>

                            <div class="text-start mb-3">
                                <label for="duesPrice" class="form-label fw-medium mb-1">Enter Dues Price</label>
                                <input type="text" class="form-control ps-3" name="duesPrice" id="duesPrice" placeholder="Enter Dues price">
                            </div>

                            <div class="text-start mb-3">
                                <label for="dueAvailability" class="form-label fw-medium mb-1">Available for</label>
                                <select type="text" class="form-select ps-3" name="dueAvailability" id="dueAvailability" placeholder="All">
                                    <option value="">All</option>
                                    <option value="">100</option>
                                    <option value="">200</option>
                                    <option value="">300</option>
                                    <option value="">400</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label fw-medium mb-2">Period</label>
                                <div class="d-flex gap-3">
                                    <div class="col d-flex align-items-center gap-2 text-start">
                                        <label for="startDate" class="form-label fw-normal mb-1" style="font-size: 12px;">From</label>
                                        <input type="date" class="form-control ps-3" name="startDate" id="startDate">
                                    </div>

                                    <div class="col d-flex align-items-center gap-2 text-start">
                                        <label for="endDate" class="form-label fw-normal mb-1" style="font-size: 12px;">to</label>
                                        <input type="date" class="form-control ps-3" name="endDate" id="endDate" >
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Join Waitlist" class="btn btn-pay-gradient w-100 mt-3 modal-button">

                        </form>
                    </div>
                </div>
                        
            </div>
        </div>
    </div>
        
        
@endsection

@push('script')


@endpush
