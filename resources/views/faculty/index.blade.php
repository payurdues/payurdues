@extends('layout.facultyDashboard')

@section('title', 'Dashboard')



@section('content')

    <div class="dashboard-content">
        <div class="dashboard-content_balance d-flex flex-wrap flex-md-nowrap gap-3 mb-4" style="box-sizing: border-box;">

            <div class="col-lg-4 col-md col-12 balance-card">
                <p class="balance-card_subtitle">Income dues from</p>
                <div class="d-flex align-items-center gap-3 mt-4">
                    <div class="svg-box">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg);">
                            <rect x="24" y="24.2148" width="24" height="23.4297" rx="11.7148"
                                transform="rotate(-180 24 24.2148)" fill="#EBEBEB" />
                            <path
                                d="M15.4431 12.993C15.5395 13.0895 15.5937 13.2202 15.5937 13.3566C15.5937 13.493 15.5395 13.6238 15.4431 13.7202C15.3466 13.8166 15.2159 13.8708 15.0795 13.8708C14.9431 13.8708 14.8123 13.8166 14.7159 13.7202L12.5135 11.5169V16.4359C12.5135 16.5721 12.4594 16.7026 12.3631 16.7989C12.2669 16.8951 12.1363 16.9492 12.0002 16.9492C11.864 16.9492 11.7335 16.8951 11.6372 16.7989C11.541 16.7026 11.4869 16.5721 11.4869 16.4359V11.5169L9.28359 13.7206C9.18716 13.8171 9.05637 13.8712 8.92001 13.8712C8.78364 13.8712 8.65285 13.8171 8.55643 13.7206C8.46 13.6242 8.40582 13.4934 8.40582 13.357C8.40582 13.2207 8.46 13.0899 8.55643 12.9935L11.6362 9.91373C11.6839 9.86587 11.7405 9.8279 11.8029 9.802C11.8653 9.77609 11.9322 9.76276 11.9997 9.76276C12.0673 9.76276 12.1342 9.77609 12.1966 9.802C12.259 9.8279 12.3156 9.86587 12.3633 9.91373L15.4431 12.993ZM8.23605 9.07877H15.7643C15.9004 9.07877 16.031 9.02469 16.1272 8.92843C16.2235 8.83217 16.2776 8.70162 16.2776 8.56548C16.2776 8.42935 16.2235 8.29879 16.1272 8.20253C16.031 8.10627 15.9004 8.05219 15.7643 8.05219L8.23605 8.05219C8.09991 8.05219 7.96936 8.10627 7.8731 8.20253C7.77684 8.29879 7.72276 8.42935 7.72276 8.56548C7.72276 8.70162 7.77684 8.83217 7.8731 8.92843C7.96936 9.02469 8.09991 9.07877 8.23605 9.07877Z"
                                fill="#3A3A3A" />
                        </svg>
                    </div>
                    <p class="balance-card_title">₦{{ number_format($inflow_transaction, 2) }}</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-auto col balance-card ">
                <p class="balance-card_subtitle">Members</p>
                <div class="d-flex align-items-center gap-3 mt-4">
                    <div class="svg-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.719 19.752L16.079 14.628C15.9883 13.9022 15.6355 13.2346 15.0871 12.7506C14.5387 12.2667 13.8324 11.9997 13.101 12H10.897C10.1659 12.0002 9.46004 12.2674 8.91204 12.7513C8.36405 13.2352 8.01162 13.9026 7.92096 14.628L7.27996 19.752C7.24478 20.0335 7.2699 20.3193 7.35364 20.5903C7.43738 20.8614 7.57783 21.1116 7.76567 21.3242C7.9535 21.5368 8.18442 21.707 8.44309 21.8235C8.70176 21.94 8.98226 22.0002 9.26596 22H14.734C15.0176 22.0001 15.298 21.9398 15.5565 21.8232C15.8151 21.7066 16.0459 21.5364 16.2336 21.3238C16.4213 21.1112 16.5617 20.8611 16.6454 20.5901C16.729 20.3191 16.7541 20.0334 16.719 19.752Z"
                                stroke="#3A3A3A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12 8C13.6569 8 15 6.65685 15 5C15 3.34315 13.6569 2 12 2C10.3431 2 9 3.34315 9 5C9 6.65685 10.3431 8 12 8Z"
                                stroke="#3A3A3A" stroke-width="2" />
                            <path
                                d="M4 11C5.10457 11 6 10.1046 6 9C6 7.89543 5.10457 7 4 7C2.89543 7 2 7.89543 2 9C2 10.1046 2.89543 11 4 11Z"
                                stroke="#3A3A3A" stroke-width="2" />
                            <path
                                d="M20 11C21.1046 11 22 10.1046 22 9C22 7.89543 21.1046 7 20 7C18.8954 7 18 7.89543 18 9C18 10.1046 18.8954 11 20 11Z"
                                stroke="#3A3A3A" stroke-width="2" />
                            <path
                                d="M3.99996 14H3.69396C3.22053 13.9999 2.76242 14.1678 2.40114 14.4738C2.03986 14.7798 1.79884 15.204 1.72096 15.671L1.38796 17.671C1.34018 17.9575 1.35538 18.2511 1.43253 18.5311C1.50968 18.8112 1.64692 19.0711 1.83469 19.2928C2.02247 19.5144 2.25628 19.6925 2.51986 19.8146C2.78344 19.9368 3.07046 20 3.36096 20H6.99996M20 14H20.306C20.7794 13.9999 21.2375 14.1678 21.5988 14.4738C21.9601 14.7798 22.2011 15.204 22.279 15.671L22.612 17.671C22.6598 17.9575 22.6445 18.2511 22.5674 18.5311C22.4902 18.8112 22.353 19.0711 22.1652 19.2928C21.9775 19.5144 21.7437 19.6925 21.4801 19.8146C21.2165 19.9368 20.9295 20 20.639 20H17"
                                stroke="#3A3A3A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <p class="balance-card_title">{{ $students->count() }}</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-auto col balance-card">
                <p class="balance-card_subtitle">Created Dues</p>
                <div class="d-flex align-items-center gap-2 mt-4">
                    <div class="svg-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.839 4.00024H7.16C6.633 4.00024 6.179 4.00024 5.804 4.03024C5.409 4.06324 5.015 4.13424 4.637 4.32724C4.07254 4.61486 3.61362 5.07378 3.326 5.63824C3.23791 5.82937 3.18053 6.03322 3.156 6.24224C3.13 6.41624 3.11 6.62224 3.094 6.83924C3.061 7.27524 3.04 7.81424 3.027 8.36124C3 9.45724 3 10.6372 3 11.1972V11.2002C3 11.4655 3.10536 11.7198 3.29289 11.9073C3.48043 12.0949 3.73478 12.2002 4 12.2002C4.26522 12.2002 4.51957 12.0949 4.70711 11.9073C4.89464 11.7198 5 11.4655 5 11.2002C5 10.9202 5 10.4922 5.003 10.0002H19V14.8002C19 15.3772 19 15.7492 18.976 16.0322C18.954 16.3042 18.916 16.4042 18.891 16.4542C18.7951 16.6424 18.6422 16.7954 18.454 16.8912C18.404 16.9162 18.304 16.9542 18.032 16.9762C17.75 17.0002 17.377 17.0002 16.8 17.0002H12C11.7348 17.0002 11.4804 17.1056 11.2929 17.2931C11.1054 17.4807 11 17.735 11 18.0002C11 18.2655 11.1054 18.5198 11.2929 18.7073C11.4804 18.8949 11.7348 19.0002 12 19.0002H16.839C17.366 19.0002 17.821 19.0002 18.195 18.9702C18.59 18.9372 18.984 18.8662 19.362 18.6732C19.9265 18.3856 20.3854 17.9267 20.673 17.3622C20.866 16.9842 20.937 16.5902 20.969 16.1952C21 15.8202 21 15.3652 21 14.8392V8.16024C21 7.63324 21 7.17924 20.97 6.80424C20.937 6.40924 20.866 6.01524 20.673 5.63724C20.3854 5.07278 19.9265 4.61386 19.362 4.32624C18.984 4.13324 18.59 4.06224 18.195 4.03024C17.7432 4.00318 17.2905 3.99318 16.838 4.00024M18.998 8.00024H5.04C5.052 7.62124 5.069 7.27324 5.09 6.98724C5.10227 6.81896 5.12061 6.65119 5.145 6.48424C5.24133 6.32414 5.3806 6.19423 5.547 6.10924C5.597 6.08424 5.697 6.04624 5.969 6.02424C6.25 6.00024 6.623 6.00024 7.2 6.00024H16.8C17.377 6.00024 17.749 6.00024 18.032 6.02424C18.304 6.04624 18.404 6.08424 18.454 6.10924C18.6422 6.20511 18.7951 6.35809 18.891 6.54624C18.916 6.59624 18.954 6.69624 18.976 6.96824C18.996 7.21724 19 7.53524 19 8.00024"
                                fill="#3A3A3A" />
                            <path
                                d="M9.31399 15.8766L8.59399 16.5766C9.04599 17.4296 8.90399 18.5016 8.16499 19.2176L7.01699 20.3316C6.56857 20.7601 5.97222 20.9992 5.35199 20.9992C4.73176 20.9992 4.1354 20.7601 3.68699 20.3316C3.47008 20.1243 3.29744 19.8753 3.17949 19.5994C3.06154 19.3235 3.00073 19.0266 3.00073 18.7266C3.00073 18.4266 3.06154 18.1297 3.17949 17.8538C3.29744 17.578 3.47008 17.3289 3.68699 17.1216L4.40699 16.4236C4.18121 15.9966 4.10084 15.5077 4.17808 15.0309C4.25532 14.5541 4.48595 14.1155 4.83499 13.7816L5.98299 12.6676C6.4314 12.2391 7.02775 12 7.64799 12C8.26822 12 8.86457 12.2391 9.31299 12.6676C9.52989 12.8749 9.70253 13.124 9.82048 13.3998C9.93843 13.6757 9.99924 13.9726 9.99924 14.2726C9.99924 14.5726 9.93843 14.8695 9.82048 15.1454C9.70253 15.4213 9.52989 15.6703 9.31299 15.8776M8.66199 15.2676C8.79605 15.1391 8.90273 14.9848 8.9756 14.814C9.04848 14.6431 9.08605 14.4593 9.08605 14.2736C9.08605 14.0879 9.04848 13.9041 8.9756 13.7333C8.90273 13.5625 8.79605 13.4081 8.66199 13.2796C8.38917 13.0177 8.02565 12.8715 7.64749 12.8715C7.26932 12.8715 6.90581 13.0177 6.63299 13.2796L5.48399 14.3936C5.30225 14.5684 5.17187 14.7896 5.10699 15.0332C5.04212 15.2769 5.04523 15.5336 5.11599 15.7756C5.54715 15.4759 6.06412 15.3245 6.58888 15.3443C7.11363 15.3642 7.61769 15.5541 8.02499 15.8856L8.66199 15.2676ZM7.37399 16.4996C7.12099 16.3125 6.81464 16.2116 6.49999 16.2116C6.18533 16.2116 5.87898 16.3125 5.62599 16.4996C5.87898 16.6867 6.18533 16.7877 6.49999 16.7877C6.81464 16.7877 7.12099 16.6867 7.37399 16.4996ZM4.33699 17.7326C4.20292 17.8611 4.09625 18.0155 4.02337 18.1863C3.95049 18.3571 3.91293 18.5409 3.91293 18.7266C3.91293 18.9123 3.95049 19.0961 4.02337 19.267C4.09625 19.4378 4.20292 19.5921 4.33699 19.7206C4.60981 19.9825 4.97332 20.1287 5.35149 20.1287C5.72965 20.1287 6.09317 19.9825 6.36599 19.7206L7.51499 18.6066C7.89999 18.2336 8.02299 17.7006 7.88299 17.2246C7.45182 17.5244 6.93485 17.6758 6.4101 17.6559C5.88534 17.6361 5.38128 17.4461 4.97399 17.1146L4.33699 17.7326ZM14 12.9996C13.7348 12.9996 13.4804 13.105 13.2929 13.2925C13.1053 13.4801 13 13.7344 13 13.9996C13 14.2648 13.1053 14.5192 13.2929 14.7067C13.4804 14.8943 13.7348 14.9996 14 14.9996H17C17.2652 14.9996 17.5196 14.8943 17.7071 14.7067C17.8946 14.5192 18 14.2648 18 13.9996C18 13.7344 17.8946 13.4801 17.7071 13.2925C17.5196 13.105 17.2652 12.9996 17 12.9996H14Z"
                                fill="#3A3A3A" />
                        </svg>
                    </div>
                    <p class="balance-card_title">{{ $duesCount ?? ""}}</p>
                </div>
            </div>
        </div>
        <div class="dashboard-content_header d-flex justify-content-between align-items-center">
            <h1 class="dashboard-content_heading">Members</h1>
            <div class="dashboard-content_search d-flex gap-2">
                <div class="position-relative dashboard-content_search-box d-none d-md-flex">
                    <input type="text" class="form-control" placeholder="Search">
                    <img src="/assets/img/svg/search.svg" class="position-absolute top-50 start-0 translate-middle-y ms-3"
                        alt="">
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
                            <th>Department</th>
                            {{-- <th>No of dues paid</th> --}}
                            {{-- <th>Last dues paid</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td> {{ $student->form_no ?? $student->matric_no }}</td>
                                <td>{{ $student->first_name }} {{ $student->other_names }}</td>
                                <td> {{ $student->level }}</td>
                                <td> {{ $student->department }}</td>
                                {{-- <td>3</td>
                                <td>₦4,000-Basic dues</td> --}}
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



@endsection

@push('script')
@endpush
