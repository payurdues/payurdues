
@extends('layout.facultyDashboard')

@section('title', 'Transactions')



@section('content')
                

                <div class="dashboard-content">
                    <div class="dashboard-content_header p-0 d-flex justify-content-between align-items-center">
                        <h1 class="dashboard-content_heading">Transactions</h1>
                    </div>

                    <div class="dashboard-content_transaction-box d-block d-md-flex justify-content-between align-items-center">
                        <div class="d-flex gap-4">
                            <a href="#" id="payoutLink" class="active fw-semibold">Payout</a>
                            <a href="#" id="receivedLink" class="fw-semibold">Received</a>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="position-relative d-flex align-items-center">
                                <select name="" id="" class="form-select">
                                    <option value="90">Past 90 Days</option>
                                    <option value="30">Past 30 Days</option>
                                    <option value="7">Past 7 Days</option>
                                </select>
                                <img src="/assets/img/svg/CalendarDots.svg" alt="" class="ms-3 position-absolute top-50 start-0 translate-middle-y" height="21">
                            </div>
                            <p class="mb-0 ">17 Jun 2024<span class="mx-2 fw-medium">to</span>15 Sep 2024</p>
                        </div>
                    </div>

                    <div class="dashboard-content_details mt-3 mt-md-5">
                        <div class="table-responsive">
                            <div id="payoutDiv" class="d-block">
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
                                        <tr>
                                            <td class="">
                                                <div class="d-flex align-items-center">
                                                    <img class="me-2" src="/assets/img/svg/transaction-out.svg" alt="payYourDues">
                                                    <span>Basic Due Payment</span>
                                                </div>
                                            </td>
                                            <td>₦4,000</td>
                                            <td>16 Jul 2024</td>
                                            <td>Nip_234Ad_hf..</td>
                                            <td>Successful</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div id="receivedDiv" class="d-none">
                                <table class="table table-hover" id="receivedTable">
                                    <thead>
                                        <tr class="table-light text-center">
                                            <th class="text-start">Title</th>
                                            <th class="text-start">Period</th>
                                            <th class="text-start">Amount</th>
                                            <th class="text-start">Payer</th>
                                            <th class="text-start">ID</th>
                                            <th class="text-start">Date</th>
                                            <th class="text-start">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="">
                                                <div class="d-flex align-items-center">
                                                    <img class="me-2" src="/assets/img/svg/transaction-out.svg" style="transform: rotate(180deg);" alt="payYourDues">
                                                    <span>Basic Due Payment</span>
                                                </div>
                                            </td>
                                            <td>Jul 2024-Jul 2024</td>
                                            <td>₦4,000</td>
                                            <td>Akerele Peter</td>
                                            <td>Nip_234Ad_hf..</td>
                                            <td>14 Jul 2024</td>
                                            <td>Successful</td>
                                        </tr>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const payoutLink = document.getElementById('payoutLink');
        const receivedLink = document.getElementById('receivedLink');
        const payoutDiv = document.getElementById('payoutDiv');
        const receivedDiv = document.getElementById('receivedDiv');

        payoutLink.addEventListener('click', function(e) {
            e.preventDefault();
            if (payoutDiv.classList.contains('d-none')) {
                payoutDiv.classList.remove('d-none');
                receivedDiv.classList.add('d-none');
                payoutLink.classList.toggle('active');
                receivedLink.classList.remove('active');
            } 
        });

        receivedLink.addEventListener('click', function(e) {
            e.preventDefault();
            if (receivedDiv.classList.contains('d-none')) {
                receivedDiv.classList.remove('d-none');
                payoutDiv.classList.add('d-none');
                receivedLink.classList.toggle('active');
                payoutLink.classList.remove('active');
            } 
        });
    });
</script>

@endpush

