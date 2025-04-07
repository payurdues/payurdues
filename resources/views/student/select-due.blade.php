{{-- resources/views/student/select-due.blade.php --}}



@section('content')
<div class="container">
    <h1>Welcome, {{ $student->first_name }}</h1> {{-- Display student name --}}
    <h2>Total Dues: ₦{{ number_format($totalAmount, 2) }}</h2> {{-- Sum of dues --}}

    @foreach ($dues as $due)
        <div class="due-item mb-3"> {{-- Added margin for spacing --}}
            <h3>{{ $due->name }} (₦{{ number_format($due->amount, 2) }})</h3> {{-- Display due name and amount --}}
            <button type="button" class="btn btn-primary" onclick="makePayment({{ $due->amount }}, '{{ $student->first_name }}', '{{ $student->id }}', '{{ json_encode($student->levelduestatus === 'paid' ? ['1'] : ['1', '3']) }}','{{ $student->form_no ?? $student->matric_no }}')">Pay Now</button>
        </div>
    @endforeach
</div>

<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
    function makePayment(amount, studentName,studentId, dueId,form_no) {
        FlutterwaveCheckout({
            public_key: "FLWPUBK-8a51bc8d13d58f823b94ca818a5e564a-X",
            tx_ref: "txref-" + new Date().getTime(), // Use a unique transaction reference
            amount: 100,
            currency: "NGN",
            payment_options: "banktransfer",
            meta: {
                source: "duepayment",
                form_no: "form_no",
                due_id: dueId // Add due ID to meta for backend processing
            },
            customer: {
                email: "oladitisodiq@gmail.com", // Use student's email
                phone_number: "{{ $student->phone_number }}", // Use student's phone number
                name: studentName, // Use student's name
            },
            customizations: {
                title: studentName + "Facmas fee & Facmas Prospectus Fee",
                description: "Payment for " + studentName,
                logo: "https://www.payurdues.com.ng/assets/img/svg/logo.svg",
            },
            callback: function (data) {
                console.log("Payment callback:", data);
                // Handle payment success response
                // if (data.status === "completed") {
                //     window.location.href = "{{ route('payment.callback') }}?tx_ref=" + data.tx_ref + "&transaction_id=" + data.transaction_id + "&status=" + data.status + "&due_id=" + dueId + "&form_no=" + form_no;
                // }

                if (data.status === "completed") {
                    const form = document.createElement("form");
                    form.method = "POST";
                    form.action = "{{ route('payment.callback') }}";

                    // Add CSRF token for Laravel
                    const csrfInput = document.createElement("input");
                    csrfInput.type = "hidden";
                    csrfInput.name = "_token";
                    csrfInput.value = "{{ csrf_token() }}";
                    form.appendChild(csrfInput);

                    // Append data fields
                    const fields = {
                        tx_ref: data.tx_ref,
                        transaction_id: data.transaction_id,
                        status: data.status,
                        due_id: dueId,
                        student_id: studentId,
                        form_no: form_no
                    };

                    for (const [key, value] of Object.entries(fields)) {
                        const input = document.createElement("input");
                        input.type = "hidden";
                        input.name = key;
                        input.value = value;
                        form.appendChild(input);
                    }

                    document.body.appendChild(form);
                    form.submit();
                }

            },
            onclose: function() {
                console.log("Payment cancelled!");
            }
        });
    }
</script>


