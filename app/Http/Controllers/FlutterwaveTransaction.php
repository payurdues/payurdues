<?php

namespace App\Http\Controllers;

use App\Models\Due;


use Illuminate\Http\Request;

class FlutterwaveTransaction extends Controller
{
    //
    public function paymentCallback(Request $request)
    {

        dd($request->all());
        $transactionId = $request->input('transaction_id');
        $txRef = $request->input('tx_ref');
        $status = $request->input('status');
        $dueId = $request->input('due_id');

        // Implement your logic to verify and update the payment status
        if ($status === 'successful') {
            // Update the due record as paid
            Due::where('id', $dueId)->update(['status' => 'paid', 'transaction_id' => $transactionId]);

            return redirect()->route('some.route')->with('success', 'Payment successful! Transaction ID: ' . $transactionId);
        } else {
            // Handle payment failure
            return redirect()->route('some.route')->with('error', 'Payment failed!');
        }
    }

}
