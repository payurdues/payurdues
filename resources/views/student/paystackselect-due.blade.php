{{-- resources/views/student/select-due-paystack.blade.php --}}

@section('content')
<div class="container">
    <h1>Welcome, {{ $student->first_name }}</h1> {{-- Display student name --}}
    <h2>Total Dues: ₦{{ number_format($totalAmount, 2) }}</h2> {{-- Sum of dues --}}

    @foreach ($dues as $due)
        <div class="due-item mb-3"> {{-- Added margin for spacing --}}
            <h3>{{ $due->name }} (₦{{ number_format($due->amount, 2) }})</h3> {{-- Display due name and amount --}}
            <button type="button" class="btn btn-primary pay-now-btn"
                    data-amount="{{ $due->amount }} {{$student->levelduestatus === 'paid' ? 1200:3900 }}"
                    data-due-id="{{ $due->id }}">
                Pay Now with Paystack
            </button>
        </div>
    @endforeach
</div>

<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    // Select all Pay Now buttons
    const payNowButtons = document.querySelectorAll('.pay-now-btn');

    // Add event listener to each button
    payNowButtons.forEach(button => {
        button.addEventListener("click", function() {
            // Get amount and due ID from the clicked button's data attributes
            const amount = button.getAttribute('data-amount') * 100; // Convert to kobo
            const dueId = button.getAttribute('data-due-id');

            // Call the Paystack function with the dynamic amount and due ID
            payWithPaystack(amount, dueId);
        });
    });

    // Function to handle Paystack payment
    function payWithPaystack(amount, dueId) {
        let handler = PaystackPop.setup({
            key: "{{ env('PAYSTACK_PUBLIC_KEY') }}", // Paystack public key from .env
            email: "oladitisodiq@gmail.com", // User's email
            amount: amount, // Amount in kobo
            currency: "NGN", // Nigerian Naira
            metadata: {
                custom_fields: [
                    {
                        display_name: "Student Name",
                        variable_name: "student_name",
                        value: "{{ $student->first_name }} {{ $student->last_name }}"
                    },
                    {
                        display_name: "Student Mat or Form No",
                        variable_name: "student_matric_no",
                        value: "{{ $student->matric_no ?? $student->form_no }}"
                    },
                    {
                        display_name: "Due ID",
                        variable_name: "due_id",
                        value: dueId // Use dynamic due ID
                    }
                ]
            },
            onClose: function() {
                alert('Payment window closed.');
            },
            callback: function(response) {
                // Redirect to the callback route with the transaction details
                window.location.href = "{{ route('callback') }}?reference=" + response.reference;
            }
        });

        handler.openIframe(); // Open Paystack payment iframe
    }
</script>
