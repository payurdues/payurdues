
@extends('layout.facultyDashboard')

@section('title', 'Transactions')



@section('content')
                

                <div class="dashboard-content">
                    <div class="dashboard-content_header p-0 d-flex justify-content-between align-items-center">
                        <h1 class="dashboard-content_heading">Transactions</h1>
                    </div>

                    <div class="dashboard-content_transaction-box d-block d-md-flex justify-content-between align-items-center">
                        <div class="d-flex gap-4">
                            <a href="#" id="receivedLink" class="fw-semibold">Received</a>
                            <a href="#" id="payoutLink" class="active fw-semibold">Payout</a>
                            
                        </div>


                        {{-- <div class="d-flex gap-3">
                            <div class="position-relative d-flex align-items-center">
                                <select name="" id="" class="form-select">
                                    <option value="90">Past 90 Days</option>
                                    <option value="30">Past 30 Days</option>
                                    <option value="7">Past 7 Days</option>
                                </select>
                                <img src="/assets/img/svg/CalendarDots.svg" alt="" class="ms-3 position-absolute top-50 start-0 translate-middle-y" height="21">
                            </div>
                            <p class="mb-0 ">17 Jun 2024<span class="mx-2 fw-medium">to</span>15 Sep 2024</p>
                        </div> --}}
                        <div class="d-flex gap-3 align-items-center">
                            <form id="search-form" action="{{ route('transactions.search') }}" method="GET" class="d-flex gap-3">
                                <!-- Dropdown for selecting date range -->
                                <div class="position-relative">
                                    <select name="range" id="date-range" class="form-select">
                                        <option value="today">Today</option>
                                        <option value="yesterday">Yesterday</option>
                                        <option value="this_week">This Week</option>
                                        <option value="7">Past 7 Days</option>
                                        <option value="30">Past 30 Days</option>
                                        <option value="90">Past 90 Days</option>
                                        <option value="custom">Custom</option>
                                    </select>
                                    <img src="/assets/img/svg/CalendarDots.svg" alt="Calendar" class="ms-3 position-absolute top-50 start-0 translate-middle-y" height="21">
                                </div>

                                <!-- Display start and end date fields only when 'Custom' is selected -->
                                <div id="custom-date-range" class="d-none">
                                    <input type="date" name="start_date" id="start-date" class="form-control" placeholder="Start Date">
                                    <input type="date" name="end_date" id="end-date" class="form-control" placeholder="End Date">
                                </div>

                                <!-- Search button (only visible when 'Custom' is selected) -->
                                <button type="submit" class="btn btn-primary" id="search-button">Search</button>
                            </form>
                        </div>


                    </div>

                    <div class="dashboard-content_details mt-3 mt-md-5">
                        <div class="table-responsive">

                            <div id="receivedDiv" class="d-block">
                                <table class="table table-hover" id="receivedTable">
                                    <thead>
                                        <tr class="table-light text-center">
                                            <th class="text-start">Title</th>
                                            {{-- <th class="text-start">Period</th> --}}
                                            <th class="text-start">Amount</th>
                                            <th class="text-start">Payer</th>
                                            <th class="text-start">ID</th>
                                            <th class="text-start">Date</th>
                                            <th class="text-start">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($creditTransactions as $creditTransaction)
                                            <tr>
                                                <td class="">
                                                    <div class="d-flex align-items-center">
                                                        <img class="me-2" src="/assets/img/svg/transaction-out.svg" style="transform: rotate(180deg);" alt="payYourDues">
                                                        <span>{{ $creditTransaction->due->name }}</span>
                                                    </div>
                                                </td>
                                                {{-- <td>Jul 2024-Jul 2024</td> --}}
                                                <td>₦{{ number_format($creditTransaction->final_amount, 2) }}</td>
                                                <td>{{ $creditTransaction->student->first_name }} {{ $creditTransaction->student->other_names }}</td>
                                                <td>{{ $creditTransaction->trans_id }}</td>
                                                <td>{{ $creditTransaction->created_at }}</td>
                                                <td>Successful</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div id="payoutDiv" class="d-none">
                                <table class="table table-hover" id="payoutTable">
                                    <thead>
                                        <tr class="table-light text-center">
                                            <th class="text-start">Title</th>
                                            <th class="text-start">Amount</th>
                                            <th class="text-start">Date</th>
                                            <th class="text-start">ID for</th>
                                            <th class="text-start">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($debitTransactions as $debitTransaction)
                                            <tr>
                                                <td class="">
                                                    <div class="d-flex align-items-center">
                                                        <img class="me-2" src="/assets/img/svg/transaction-out.svg" alt="payYourDues">
                                                        <span>{{ $debitTransaction->due->name }}</span>
                                                    </div>
                                                </td>
                                                 <td>₦{{ number_format($debitTransaction->final_amount, 2) }}</td>
                                                 <td>{{ $debitTransaction->created_at }}</td>
                                                 <td>{{ $debitTransaction->trans_id }}</td>
                                                <td>Successful</td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>

                           
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

