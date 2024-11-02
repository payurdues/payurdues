{{-- resources/views/student/select-due.blade.php --}}



@section('content')
<div class="container">
    <h1>Welcome, {{ $student->first_name }}</h1> {{-- Display student name --}}
    <h2>Total Dues: ₦{{ number_format($totalAmount, 2) }}</h2> {{-- Sum of dues --}}

    @foreach ($dues as $due)
        <div class="due-item mb-3"> {{-- Added margin for spacing --}}
            <h3>{{ $due->name }} (₦{{ number_format($due->amount, 2) }})</h3> {{-- Display due name and amount --}}
            <button type="button" class="btn btn-primary" onclick="makePayment({{ $due->amount }}, '{{ $student->name }}', '{{ $student->id }}', '{{ $due->id }}')">Pay Now</button>
        </div>
    @endforeach
</div>

<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
    function makePayment(amount, studentName, dueId) {
        FlutterwaveCheckout({
            public_key: "FLWPUBK_TEST-02b9b5fc6406bd4a41c3ff141cc45e93-X",
            tx_ref: "txref-" + new Date().getTime(), // Use a unique transaction reference
            amount: amount,
            currency: "NGN",
            payment_options: "card, banktransfer, ussd",
            meta: {
                source: "docs-inline-test",
                consumer_mac: "92a3-912ba-1192a",
                due_id: dueId // Add due ID to meta for backend processing
            },
            customer: {
                email: "{{ $student->email }}", // Use student's email
                phone_number: "{{ $student->phone_number }}", // Use student's phone number
                name: studentName, // Use student's name
            },
            customizations: {
                title: "Flutterwave Payment",
                description: "Payment for " + studentName,
                logo: "https://checkout.flutterwave.com/assets/img/rave-logo.png",
            },
            callback: function (data) {
                console.log("Payment callback:", data);
                // Handle payment success response
                if (data.status === "successful") {
                    window.location.href = "{{ route('payment.callback') }}?tx_ref=" + data.tx_ref + "&transaction_id=" + data.transaction_id + "&status=" + data.status + "&due_id=" + dueId;
                }
            },
            onclose: function() {
                console.log("Payment cancelled!");
            }
        });
    }
</script>


