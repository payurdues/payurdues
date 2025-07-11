<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tag -->
        <meta charset="UTF-8">
        <meta name="author" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="" />
        <meta name="description" content="" />

        <!-- favicon -->
        <link rel="shortcut icon" href="../assets/img/favicons/favicon.png" />
        <link rel="apple-touch-icon" href="../assets/img/favicons/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="../assets/img/favicons//apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="../assets/img/favicons/apple-touch-icon-114x114.png" />

        <!-- Title -->
        <title>PayUrDues - Voting</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Data Table CSS -->
        <link href="../assets/css/datatables.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/style.css" rel="stylesheet">
        <link href="../assets/css/responsive.css" rel="stylesheet">

    </head>
    <body class="dashboard">

        <header class="px-3 px-md-5">
            <nav class="d-flex justify-content-between align-items-center py-4">
                <div class="d-flex gap-1 align-items-center">
                    <div class="association-logo_img">
                        <img src="../assets/img/svg/Ellipse 2.svg" alt="PayUrDues">
                    </div>
                    <div class="div">
                        <p class="mb-0 header-title">Hello {{$student->first_name}}, {{$student->other_names}} </p>
                        <p class="mb-0 header-subtitle">You have some dues to pay, we are here to help you</p>
                    </div>
                </div>
                <div class="nav-social d-flex gap-3 align-items-center">
                    <button class="d-flex justify-content-center align-items-center d-md-none toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive" >
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 6h18M3 12h18M3 18h18" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>

                </div>
            </nav>
        </header>


        <section class="main-content flex-grow-1">
            <div class="px-4 px-lg-5 h-100 d-flex mt-md-5 mt-4 gap-4">
                
                <div class="sidebar mt-md-4 offcanvas-md offcanvas-end" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                    <div class="offcanvas-header d-flex d-md-none justify-content-between mb-4 align-items-center">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="../assets/img/svg/Ellipse 1.svg" alt="PayUrDues" height="40" width="auto">
                            <p class="mb-0"> {{$student->first_name}} {{$student->other_names}} </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                      </div>
                    @include('student.sidebar')

                </div>

                <div class="dashboard-content">

                    <a href="{{ url()->previous() }}" class="d-flex gap-3 align-items-center position-sticky top-0 start-0">
                        <img src="../assets/img/svg/ArrowLeft.svg" alt="PayUrDues">
                        <h5 class="dashboard-content_heading">{{ $election->title }}</h5>
                    </a>
                    
                    <div class="dashboard-content_details mb-5 col">

                        @if($student->levelduestatus === 'pending')
                           

                            <div class="p-5 d-flex flex-column justify-content-center align-items-center gap-4">
                                <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="64" height="64" rx="32" fill="#FEE6FA"/>
                                    <path d="M42.6357 22.7952L44.4989 20.7449C44.7936 20.4127 44.9455 19.9778 44.9216 19.5343C44.8978 19.0909 44.7001 18.6748 44.3715 18.3762C44.0429 18.0775 43.6098 17.9204 43.1661 17.939C42.7225 17.9575 42.304 18.1502 42.0014 18.4752L40.1396 20.5227C37.337 18.546 33.9087 17.6615 30.4996 18.0358C27.0906 18.41 23.9358 20.0171 21.6288 22.5548C19.3218 25.0924 18.0217 28.3857 17.9731 31.8148C17.9245 35.244 19.1306 38.5728 21.3647 41.1749L19.5014 43.2252C19.3493 43.3886 19.2311 43.5807 19.1537 43.7901C19.0763 43.9996 19.0412 44.2223 19.0506 44.4454C19.0599 44.6686 19.1134 44.8876 19.208 45.0899C19.3026 45.2922 19.4364 45.4737 19.6017 45.6238C19.7669 45.774 19.9603 45.8899 20.1707 45.9648C20.3811 46.0397 20.6043 46.0721 20.8272 46.0601C21.0502 46.0481 21.2686 45.9919 21.4697 45.8949C21.6709 45.7979 21.8507 45.6619 21.9989 45.4949L23.8608 43.4474C26.6634 45.4241 30.0917 46.3085 33.5007 45.9343C36.9098 45.5601 40.0646 43.9529 42.3716 41.4153C44.6785 38.8776 45.9786 35.5844 46.0273 32.1552C46.0759 28.726 44.8697 25.3972 42.6357 22.7952ZM21.3127 31.985C21.3111 30.0583 21.8307 28.167 22.8166 26.5116C23.8026 24.8562 25.218 23.4984 26.9129 22.582C28.6077 21.6657 30.519 21.2249 32.444 21.3065C34.369 21.3881 36.2361 21.989 37.8474 23.0455L23.6569 38.6549C22.1375 36.7641 21.3103 34.4106 21.3127 31.985ZM32.0002 42.6725C29.9221 42.6745 27.8891 42.0668 26.153 40.9246L40.3435 25.3152C41.6025 26.8862 42.3917 28.781 42.6203 30.7812C42.8488 32.7814 42.5073 34.8055 41.6351 36.6199C40.7629 38.4344 39.3956 39.9654 37.6909 41.0363C35.9861 42.1072 34.0134 42.6744 32.0002 42.6725Z" fill="#B60099"/>
                                </svg>

                                <div class="text-center">
                                    <h4 class="mb-1">You are not eligible to vote.</h4>
                                    <p>Kindly make appropiate payment to and change password to have access to vote</p>
                                </div>

                            </div>
                        @else
                            <div class="countdown_card my-4">

                                <div class="d-none justify-content-between align-items-center">
                                    <p class="fw-bold">Voting Date</p>
                            
                                    <p class="text-end election-date">{{ $election->voting_date }}, <br class="d-none d-md-block"/> {{ $election->voting_time }}</p>

                                </div>

                                <div class="d-md-flex text-center text-md-start align-items-center gap-3 col-md-8 col-lg-auto">
                                    <p class="fs-6 fw-semibold text-nowrap">Ends in</p>
                                    <div class="countdown-display text-lg-end fs-3" data-end="{{ $election->voting_date }} {{ $election->voting_time }}">
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

                    

                            @php
                                $votingStart = \Carbon\Carbon::parse($election->voting_date . ' ' . $election->voting_time);
                                $votingEnd = $votingStart->copy()->addHours($election->voting_period);
                                $now = now();
                                $votingOpen = $now->between($votingStart, $votingEnd);
                            @endphp

                            @if (!$votingOpen)
                                <div class="alert alert-warning text-center">Voting is currently closed.</div>
                            @endif

                            <form id="voteForm">
                                @csrf

                                <div class="row row-cols-1 row-cols-lg-2 justify-content-between g-3 g-md-5">
                                    @foreach ($election->categories as $category)
                                        <div class="col">
                                            <div class="accordion" id="categoryAccordion{{ $category->id }}">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button py-4 collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#category{{ $category->id }}"
                                                                aria-expanded="true"
                                                                aria-controls="category{{ $category->id }}">
                                                            <h4 class="text-color-gradient">{{ $category->name }}</h4>
                                                        </button>
                                                    </h2>

                                                    <div id="category{{ $category->id }}"
                                                        class="accordion-collapse collapse p-3 p-md-4 bg-white m-2 mt-0"
                                                        data-bs-parent="#categoryAccordion{{ $category->id }}">
                                                        <div class="accordion-body">
                                                            <div class="row row-cols-2 g-3 candidate-group" data-position="{{ $category->id }}">
                                                                @foreach ($category->candidates as $candidate)
                                                                    @php
                                                                        $hasVoted = isset($votes[$category->id]);
                                                                        $isVotedCandidate = $hasVoted && $votes[$category->id] == $candidate->id;
                                                                    @endphp
                                                                    <div class="col candidate-option {{ $isVotedCandidate ? 'selected' : '' }}">
                                                                        <label class="d-block">
                                                                            <input type="radio"
                                                                                name="category_{{ $category->id }}"
                                                                                value="{{ $candidate->id }}"
                                                                                data-category-id="{{ $category->id }}"
                                                                                data-election-id="{{ $election->id }}"
                                                                                class="d-none vote-radio"
                                                                                {{ $isVotedCandidate ? 'checked' : '' }}
                                                                                {{ $hasVoted ? 'disabled' : '' }}
                                                                                required>
                                                                            <div class="bg-white mt-3 p-0 border rounded">
                                                                                <div class="square-image-container">
                                                                                    <img src="{{ asset('storage/' . $candidate->image) }}"
                                                                                        class="img-thumbnail" alt="{{ $candidate->full_name }}">
                                                                                </div>
                                                                                <div class="p-3 py-0 text-center candidate-details">
                                                                                    <p class="candidate-name">
                                                                                        {{ $candidate->full_name }}
                                                                                        <span class="fs-small fw-light">({{ $candidate->alias }})</span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="text-center mt-4">
                                    @if (count($votes))
                                        <button class="btn btn-secondary w-75" disabled>You have voted</button>
                                    @else
                                        <button type="submit" class="btn btn-pay-gradient w-75 modal-button" id="voteBtn" {{ !$votingOpen ? 'disabled' : '' }}>
                                            Cast my Vote
                                        </button>
                                    @endif
                                </div>
                            </form>
                        @endif

                        




                    </div>
            </div>
        </section>

        

        
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
       
        <!-- Data Table JS-->
        <script src="../assets/js/datatables.min.js"></script>

        <!-- SweetAlert JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Custom JS -->
        <script src="../assets/js/main.js"></script>
        <script src="../assets/js/countdown.js"></script>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Highlight selection
                document.querySelectorAll('.vote-radio').forEach(radio => {
                    radio.addEventListener('change', function () {
                        const group = this.closest('.candidate-group');
                        group.querySelectorAll('.candidate-option').forEach(opt => opt.classList.remove('selected'));
                        this.closest('.candidate-option').classList.add('selected');
                    });
                });

                document.getElementById('voteForm').addEventListener('submit', function (e) {
                    e.preventDefault();

                    const radios = document.querySelectorAll('.vote-radio:checked');
                    if (radios.length === 0) {
                        return Swal.fire({
                            icon: 'warning',
                            title: 'No Selection',
                            text: 'Please select at least one candidate.',
                            confirmButtonText: 'OK'
                        });
                    }

                    const votes = [];

                    radios.forEach(radio => {
                        votes.push({
                            election_id: radio.dataset.electionId,
                            category_id: radio.dataset.categoryId,
                            candidate_id: radio.value
                        });
                    });

                    fetch("{{ route('votes.store') }}", {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
                        },
                        body: JSON.stringify({ votes })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'You have voted successfully!',
                                text: data.message,
                                timer: 3000,
                                showConfirmButton: false
                            });
                            // Optionally disable form after vote
                            document.getElementById('voteForm').querySelectorAll('button, input').forEach(el => el.disabled = true);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Voting Failed',
                                text: data.message || 'Something went wrong. Please try again.'
                            });
                        }
                    })
                    .catch(err => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Server Error',
                            text: 'Please try again later.'
                        });
                        console.error(err);
                    });
                });
            });
        </script>



        
    </body>
</html>