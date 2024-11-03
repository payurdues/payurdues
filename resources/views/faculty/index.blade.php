@extends('layout.facultyDashboard')

@section('title', 'Dashboard')



@section('content')

    <div class="dashboard-content">
        
        <div class="dashboard-content_header d-flex justify-content-between align-items-center">
            <h1 class="dashboard-content_heading">Members</h1>
            <div class="dashboard-content_search d-flex gap-2">
                <div class="position-relative dashboard-content_search-box d-none d-md-flex">
                    <input type="text" class="form-control" placeholder="Search">
                    <img src="/assets/img/svg/search.svg" class="position-absolute top-50 start-0 translate-middle-y ms-3" alt="">
                </div>
                <a href="#" class="d-flex dashboard-content_search-img">
                    <img src="/assets/img/svg/filter.svg" alt="">
                </a>
            </div>
        </div>

        <div class="dashboard-content_details mb-4">
            <div class="table-responsive">
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
                        <tr>
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr>
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr>
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr>
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr>
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr>
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr>
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr>
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr>
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr>
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr>
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr>
                            <td>2130120029</td>
                            <td>Sulaimon Yusuf Ayomide</td>
                            <td>HND 1</td>
                            <td>Male</td>
                            <td>3</td>
                            <td>₦4,000-Basic dues</td>
                        </tr>
                        <tr>
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

@endsection

@push('script')


@endpush


        
        
  