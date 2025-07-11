@extends('layout.facultyDashboard')

@section('title', 'Create Election')



@section('content')

                

        <div class="dashboard-content">
            
            <h2 class="dashboard-content_heading pt-3 pt-md-5">Voting</h2>

            <div class="my-3 mt-md-5 d-md-flex gap-3 justify-content-between align-items-center">

                <div class="d-flex voting-NavLink">
                    <a href="#" id="ongoingLink" class="active"><span>Ongoing Election</span></a>
                    <a href="#" id="createdLink"><span>Created Election</span></a>
                    <a href="#" id="pastLink"><span>Past Election</span></a>
                </div>
                
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('create_election') }}" class="d-flex align-items-center text-center justify-content-center gap-1 btn-pay-gradient">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.6875 6C10.6875 6.14918 10.6282 6.29226 10.5227 6.39775C10.4173 6.50324 10.2742 6.5625 10.125 6.5625H6.5625V10.125C6.5625 10.2742 6.50324 10.4173 6.39775 10.5227C6.29226 10.6282 6.14918 10.6875 6 10.6875C5.85082 10.6875 5.70774 10.6282 5.60225 10.5227C5.49676 10.4173 5.4375 10.2742 5.4375 10.125V6.5625H1.875C1.72582 6.5625 1.58274 6.50324 1.47725 6.39775C1.37176 6.29226 1.3125 6.14918 1.3125 6C1.3125 5.85082 1.37176 5.70774 1.47725 5.60225C1.58274 5.49676 1.72582 5.4375 1.875 5.4375H5.4375V1.875C5.4375 1.72582 5.49676 1.58274 5.60225 1.47725C5.70774 1.37176 5.85082 1.3125 6 1.3125C6.14918 1.3125 6.29226 1.37176 6.39775 1.47725C6.50324 1.58274 6.5625 1.72582 6.5625 1.875V5.4375H10.125C10.2742 5.4375 10.4173 5.49676 10.5227 5.60225C10.6282 5.70774 10.6875 5.85082 10.6875 6Z" fill="white"/>
                        </svg>        
                        <p class="text-light">Create a new Election</p>
                    </a>
                </div>
            </div>

            <div class="dashboard-content_details mb-5 col">
                
               <div class="d-flex flex-wrap flex-md-nowrap gap-2 g-md-3" id="ongoingContent">
                    @forelse ($ongoing as $election)
                        <div class="payable-dues_card countdown_card col-12 col-md-6 col-lg-4">
                            <div class="row g-2">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Title</p>
                                    <p class="text-end">{{ $election->title }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Category</p>
                                    <p class="text-end">{{ $election->categories->count() ?? 'N/A' }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Contestant</p>
                                    <p class="text-end">{{ $election->candidates->count() ?? '0' }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Voting Date</p>
                                    <p class="text-end election-date">
                                        {{ \Carbon\Carbon::parse($election->voting_date . ' ' . $election->voting_time)->format('jS F Y, h:ia') }}
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Countdown</p>
                                    <div class="countdown-display text-end" data-start="{{ $election->voting_date }} {{ $election->voting_time }}">
                                        <span class="text-color-gradient fw-semibold fs-5 days">00</span>
                                        <span class='fs-small'>Days</span>
                                        <span class="text-color-gradient fw-semibold fs-5 hours">00</span>
                                        <span class='fs-small'>Hrs</span>
                                        <span class="text-color-gradient fw-semibold fs-5 minutes">00</span>
                                        <span class='fs-small'>Min</span>
                                        <span class="text-color-gradient fw-semibold fs-5 seconds">00</span>
                                        <span class='fs-small'>Sec</span>
                                    </div>
                                </div>

                                <a href="{{ route('elections.show', $election) }}" class="d-flex align-items-center justify-content-center gap-1 btn-pay-gradient-outline">     
                                    <p class="">View Details</p>
                                </a>
                            </div>
                        </div>
                    @empty
                        <p>No ongoing elections found.</p>
                    @endforelse
                </div>


                <!-- Created Election -->
                <div class="d-flex flex-wrap flex-md-nowrap gap-2 g-md-3" id="createdContent">
                    @forelse ($created as $election)
                        <div class="payable-dues_card countdown_card col-12 col-md-6 col-lg-4">
                            <div class="row g-2">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Title</p>
                                    <p class="text-end">{{ $election->title }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Category</p>
                                    <p class="text-end">{{ $election->categories->count() ?? 'N/A' }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Contestant</p>
                                    <p class="text-end">{{ $election->candidates->count() ?? 0 }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Voting Date</p>
                                    <p class="text-end election-date">
                                        {{ \Carbon\Carbon::parse($election->voting_date . ' ' . $election->voting_time)->format('jS F Y, h:ia') }}
                                    </p>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">CountDown</p>
                                    <div class="countdown-display text-end" data-start="{{ $election->voting_date }} {{ $election->voting_time }}">
                                        <span class="text-color-gradient fw-semibold fs-5 days">00</span> 
                                        <span class='fs-small'>Days</span>
                                        <span class="text-color-gradient fw-semibold fs-5 hours">00</span> 
                                        <span class='fs-small'>Hrs</span>
                                        <span class="text-color-gradient fw-semibold fs-5 minutes">00</span> 
                                        <span class='fs-small'>Min</span>
                                        <span class="text-color-gradient fw-semibold fs-5 seconds">00</span> 
                                        <span class='fs-small'>Sec</span>
                                    </div>
                                </div>

                                <a href="{{ route('elections.show', $election->id) }}" class="d-flex align-items-center justify-content-center gap-1 btn-pay-gradient-outline">     
                                    <p class="">View Details</p>
                                </a>
                            </div>
                        </div>
                    @empty
                        <p>No created elections found.</p>
                    @endforelse
                </div>


                <!-- Past Eletion -->
              
                <div class="d-flex flex-wrap flex-md-nowrap gap-2 g-md-3" id="pastContent">
                    @forelse ($past as $election)
                        <div class="payable-dues_card countdown_card col-12 col-md-6 col-lg-4">
                            <div class="row g-2">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Title</p>
                                    <p class="text-end">{{ $election->title }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Category</p>
                                    <p class="text-end">{{ $election->category->name ?? 'N/A' }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Contestant</p>
                                    <p class="text-end">{{ $election->candidates_count ?? 0 }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">Voting Date</p>
                                    <p class="text-end election-date">
                                        {{ \Carbon\Carbon::parse($election->voting_date . ' ' . $election->voting_time)->format('jS F Y, h:ia') }}
                                    </p>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <p class="fw-bold">CountDown</p>
                                    <div class="countdown-display text-end">
                                        <span class="text-color-gradient fw-semibold fs-5 days">00</span> 
                                        <span class='fs-small'>Days</span>

                                        <span class="text-color-gradient fw-semibold fs-5 hours">00</span> 
                                        <span class='fs-small'>Hrs</span>

                                        <span class="text-color-gradient fw-semibold fs-5 minutes">00</span> 
                                        <span class='fs-small'>Min</span>

                                        <span class="text-color-gradient fw-semibold fs-5 seconds">00</span> 
                                        <span class='fs-small'>Sec</span>
                                    </div>
                                </div>

                                <a href="{{ route('admin.elections.results', $election->id) }}" class="d-flex align-items-center justify-content-center gap-1 btn-pay-gradient-outline">     
                                    <p class="">View Details</p>
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">No past elections available.</p>
                    @endforelse
                </div>



                <!-- <div id="createdContent" class="content-section d-none">
                    <h3>Created Elections Content</h3>
                    <p>This section shows elections you've created.</p>
                </div> -->

                <!-- <div id="pastContent" class="content-section d-none">
                    <h3>Past Elections Content</h3>
                    <p>This section shows past elections.</p>
                </div> -->
                
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
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching functionality (your existing code)
            const ongoingLink = document.getElementById('ongoingLink');
            const createdLink = document.getElementById('createdLink');
            const pastLink = document.getElementById('pastLink');

            const ongoingContent = document.getElementById('ongoingContent');
            const createdContent = document.getElementById('createdContent');
            const pastContent = document.getElementById('pastContent');

            const links = [ongoingLink, createdLink, pastLink];
            const contents = [ongoingContent, createdContent, pastContent];

            // Initialize first content as visible
            contents.forEach((content, index) => {
                if (index === 0) {
                    content.classList.remove('d-none');
                } else {
                    content.classList.add('d-none');
                }
            });

            links.forEach((link, index) => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
    
                    // Remove active class from all links
                    links.forEach(l => {
                        l.classList.remove('active');
                        l.style.transform = '';
                    });
    
                    // Add active class to clicked link
                    this.classList.add('active');
    
                    // Hide all content sections
                    contents.forEach(content => {
                        content.classList.add('d-none');
                    });
    
                    // Show the corresponding content
                    contents[index].classList.remove('d-none');
                });
            });
 
        });
        </script>
   @endsection

@push('script')


@endpush
