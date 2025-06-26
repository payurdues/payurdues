@extends('layout.facultyDashboard')

@section('title', 'Members')



@section('content')

    <div class="dashboard-content">

        <div class="dashboard-content_header px-md-3 d-flex justify-content-between align-items-center">
            <div class="">
                <h1 class="dashboard-content_heading">Members</h1>
                <p class="dashboard-content_paragraph">{{ $students->count() }} Members</p>
            </div>

            <div class="">
                {{-- <a href="members.html" class="d-flex align-items-center justify-content-center gap-1 btn-pay-gradient" data-bs-toggle="modal" data-bs-target="#addMember">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.6875 6C10.6875 6.14918 10.6282 6.29226 10.5227 6.39775C10.4173 6.50324 10.2742 6.5625 10.125 6.5625H6.5625V10.125C6.5625 10.2742 6.50324 10.4173 6.39775 10.5227C6.29226 10.6282 6.14918 10.6875 6 10.6875C5.85082 10.6875 5.70774 10.6282 5.60225 10.5227C5.49676 10.4173 5.4375 10.2742 5.4375 10.125V6.5625H1.875C1.72582 6.5625 1.58274 6.50324 1.47725 6.39775C1.37176 6.29226 1.3125 6.14918 1.3125 6C1.3125 5.85082 1.37176 5.70774 1.47725 5.60225C1.58274 5.49676 1.72582 5.4375 1.875 5.4375H5.4375V1.875C5.4375 1.72582 5.49676 1.58274 5.60225 1.47725C5.70774 1.37176 5.85082 1.3125 6 1.3125C6.14918 1.3125 6.29226 1.37176 6.39775 1.47725C6.50324 1.58274 6.5625 1.72582 6.5625 1.875V5.4375H10.125C10.2742 5.4375 10.4173 5.49676 10.5227 5.60225C10.6282 5.70774 10.6875 5.85082 10.6875 6Z" fill="white"/>
                    </svg>
                    <p class="text-light">Add Members</p>
                </a> --}}
            </div>
        </div>

        <div class="dashboard-content_details mt-5 d-flex align-items-baseline gap-3">
            <div class="p-4 dashboard-content_details_filter d-none d-md-block col-2">
                <p class="lead fw-bold fs-5 mb-4">Filter</p>

                <form method="GET" action="{{ route('members.index') }}" id="filterForm">
                   <b> <p class="">Level</p></b>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="levels[]" value="100" onchange="document.getElementById('filterForm').submit()">
                        <label class="form-check-label">100</label><br>

                        <input class="form-check-input" type="checkbox" name="levels[]" value="200" onchange="document.getElementById('filterForm').submit()">
                        <label class="form-check-label">200</label><br>

                        <input class="form-check-input" type="checkbox" name="levels[]" value="300" onchange="document.getElementById('filterForm').submit()">
                        <label class="form-check-label">300</label><br>

                        <input class="form-check-input" type="checkbox" name="levels[]" value="400" onchange="document.getElementById('filterForm').submit()">
                        <label class="form-check-label">400</label><br><br>
                    </div>
                    <!-- Repeat for other levels -->

                    <b><p class="">Dues paid</p></b>
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
                    <!-- Repeat for secretarial, sug -->
                </form>

            </div>

            <div class="table-responsive col">
                <table class="table table-hover" id="members">
                    <thead>
                        <tr class="table-light text-center">
                            <th>Matric No</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Department</th>
                            {{-- <th>No of dues paid</th>
                            <th>Last dues paid</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr data-bs-toggle="modal" data-bs-target="#viewMember">

                                <td> {{ $student->form_no ?? $student->matric_no }}</td>
                                <td>{{ $student->first_name }} {{ $student->other_names }}</td>
                                <td> {{ $student->level }}</td>
                                <td> {{ $student->department }}</td>
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
                    <button type="button" class="btn-close mb-3 border rounded-md p-1" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body mx-1 mx-md-3">
                    <div class="modal-text text-center">
                        <p class="modal-heading-2">Add Members link</p>
                        <p class="modal-paragraph px-4">Send the link below to your members to onboard new members</p>
                    </div>

                    <a class="modal-link my-4" href="">https://payurdues.com/Adeleke-association/members
                        onboarding</a>

                    <a href="#" class="btn btn-pay-gradient w-100 mt-3 modal-button">Copy link</a>
                    <a href="#" class="btn btn-pay-gradient-outline w-100 mt-2 modal-button" data-bs-toggle="modal"
                        data-bs-target="#addMemberForm">Add Manually</a>
                    <a href="#" class="btn btn-pay-gradient-outline w-100 mt-2 modal-button" data-bs-toggle="modal"
                        data-bs-target="#uploadFile">Upload CSV File</a>
                </div>

            </div>
        </div>
    </div>

     <div class="modal fade" id="addMemberForm" tabindex="-1" aria-labelledby="addMemberForm"
    aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST"  action="{{ route('students.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMemberFormLabel">Register Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="matricNumber" class="form-label">Matric Number</label>
                        <input type="text" class="form-control" id="matricNumber" name="matric_no" required>
                    </div>
                    <div class="mb-3">
                        <label for="jambNumber" class="form-label">Jamb Registration Number</label>
                        <input type="text" class="form-control" id="jambNumber" name="jamb_reg" required>
                    </div>
                    <div class="mb-3">
                        <label for="formNumber" class="form-label">Form Number</label>
                        <input type="text" class="form-control" id="formNumber" name="form_no" required>
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="otherNames" class="form-label">Other Names</label>
                        <input type="text" class="form-control" id="otherNames" name="other_names" required>
                    </div>
                    <div class="mb-3">
                        <label for="faculty" class="form-label">Faculty</label>
                        <input type="text" class="form-control" id="faculty" name="faculty" required>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <input type="text" class="form-control" id="department" name="department" required>
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <input type="text" class="form-control" id="level" name="level" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="d-flex align-items-center justify-content-center gap-1 btn-pay-gradient">Add Member</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="uploadFile" tabindex="-1" aria-labelledby="uploadFile" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadFileLabel">Upload CSV File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mb-3">
                        <label for="csv_file" class="form-label"></label>
                        <input type="file" name="csv_file" class="form-control" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="d-flex align-items-center justify-content-center gap-1 btn-pay-gradient">Upload File</button>
                    </div>
                </div>
            </form>
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





