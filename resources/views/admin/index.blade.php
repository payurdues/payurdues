@extends('layout.adminDashboard')

@section('title', 'Admin Dashboard')



@section('content')

    <div class="dashboard-content">



        <div class="dashboard-content_header d-flex justify-content-between align-items-center">
            <h1 class="dashboard-content_heading">Associations</h1>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Link</th>
                            <th>Provider</th>
                            {{-- <th>No of dues paid</th> --}}
                            {{-- <th>Last dues paid</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($associations as $association)
                            <tr onclick="window.location.href='{{ route('admin.association.show', $association->id) }}'" style="cursor:pointer">
                                <td> {{ $association->name}}</td>
                                <td>{{ $association->email}}</td>
                                <td> {{ $association->link}}</td>
                                <td> {{ $association->provider}}</td>
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
    <div class="modal fade" id="addAssociation" tabindex="-1" aria-labelledby="addAssociationLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content p-3 py-5 p-md-5">

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close mb-3 border rounded-md p-1" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('admin.assoc_store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="registerAssocModalLabel">Register Association</h5>

                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Link</label>
                                <input type="text" name="link" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">About</label>
                                <input type="text" name="about" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Contact Person Name</label>
                                <input type="text" name="contact_person_name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Contact Person Phone</label>
                                <input type="text" name="contact_person_phone" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Bank Code</label>
                                <input type="text" name="bank_code" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Bank Name</label>
                                <input type="text" name="bank_name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Bank Account Number</label>
                                <input type="text" name="bank_account_no" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Bank Account Name</label>
                                <input type="text" name="bank_account_name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Provider</label>
                                <input type="text" name="provider" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Approval Document</label>
                                <input type="file" name="approval_doc" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit"
                                class="d-flex align-items-center justify-content-center gap-1 btn-pay-gradient">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>






@endsection

@push('script')
@endpush
