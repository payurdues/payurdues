<?php

namespace App\Http\Controllers;

use App\Models\Due;
use App\Models\Student;

use App\Models\Transaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FlutterwaveTransaction extends Controller
{
    public function creditWalletTransaction($reference,$amount,$association_id,$status,$trans_id, $student_id, $narration,$student_faculty,$final_amount,$charges,$dept, $due_id,$provider,$provider_charges)
    {
        $data = Transaction::create([
         
            'student_id' => $student_id,
            'due_id' => $due_id,
            'dept' => $dept,
            'amount_type' => 'credit',
            'reference' => $reference,
            'narration' =>$narration,
            'trans_id' => $trans_id,
            'charges' => $charges,
            'final_amount' => $final_amount,
            'association_id' => $association_id,
            'faculty' => $student_faculty,
            'amount' => $amount,
            'status' => $status,
            'provider' => $provider,
            'provider_charges' => $provider_charges,
            'created_at'=>Carbon::now(),
        ]);
        return $data;
    }
    function getProviderCharges($provider, $amount) {
        // Define charge mappings for each provider
        $charges = [
            'paystack' => [
                "1700.00" => 25,
                "2700.00" => 140.50,
            ],
            'flutterwave' => [
                "1700.00" => 50,
                "2700.00" => 50,
            ],
        ];
    
        // Check if the provider and amount exist in the charges mapping
        if (isset($charges[$provider]) && isset($charges[$provider][$amount])) {
            return $charges[$provider][$amount];
        } else {
            return 0;
        }
    }
    //
    public function paymentCallback(Request $request)
    {



   
        // dd($request->all());
        $reference = $request->input('tx_ref');
        // $transactionId = $request->input('transaction_id');
        $status = $request->input('status');
        $due_ids = $request->input('due_id');
        $formNo = $request->input('form_no');


        $checkTransaction= Transaction::where('reference',$reference)->first();
        
        if ($checkTransaction){
            return redirect()->route('select.due')
            ->with('success', 'Payment successful!');

        }else{

            // $amount = $request->input('amount');

            $array = json_decode($due_ids, true);
            // Implement your logic to verify and update the payment status
       
            if (($status === 'completed') ) {
                // Update the due record as paid
                // Fetch the student record using matriculation number or form number
                $studentQuery = Student::where(function ($query) use ($formNo) {
                    $query->where('matric_no', $formNo)
                        ->orWhere('form_no', $formNo);
                })->first();
    
                if (!$studentQuery) {
                    return [
                        'status' => 'error',
                        'message' => 'Student record not found.',
                    ];
                }
    
                // Update student's due status
                $studentQuery->levelduestatus = 'paid';
                $studentQuery->facultyduestatus = 'paid';
                $studentQuery->save();
    
                $student_id = $studentQuery->id;
                $student_faculty = $studentQuery->faculty;
                $dept = $studentQuery->department;
                $status = "approved";
    
                // Generate a unique transaction ID
                $trans_id = $dept . mt_rand(1000000, 9999999) . $studentQuery->level;
                // Fetch due information with association details
            
                $provider = 'flutterwave';
            
                // dd($due_ids);
                // Association details
                foreach ($array as $due_id) {
    
                    $due = Due::with(['association:id,name,email,contact_person_phone'])
                    ->where('id', $due_id)
                    ->first(['charges', 'name', 'association_id', 'amount']);
    
                    $charges = $due->charges;
                    $narration = $due->name;
                    $association_id = $due->association_id;
                    $trans_id = $dept . mt_rand(1000000, 9999999) . $studentQuery->level;
                    $dueamount = $due->amount;
                    $final_amount = $dueamount - $charges;
                    // $reference="";
        
                    $provider_charges = $this->getProviderCharges($provider, $dueamount);
        
                    $this->creditWalletTransaction($reference,$dueamount,$association_id,$status,$trans_id, $student_id, $narration,$student_faculty,$final_amount,$charges,$dept, $due_id,$provider,$provider_charges);
    
                }
                return redirect()->route('select.due')->with('success', 'Payment successful!');
            } else {
                // Handle payment failure
                return redirect()->route('select.due')->with('error', 'Payment failed!');
            }

        }


        
    }


    public function MANpaymentCallback(Request $request)
    {

    // dd($request->all());

   
        // dd($request->all());
        $reference = $request->input('tx_ref');
        // $transactionId = $request->input('transaction_id');
        $status = $request->input('status');
        $due_ids = $request->input('due_id');
        $formNo = $request->input('form_no');


        $checkTransaction= Transaction::where('reference',$reference)->first();
        
        if ($checkTransaction){
            return redirect()->route('select.due')
            ->with('success', 'Payment successful!');

        }else{

            // $amount = $request->input('amount');

            $array = json_decode($due_ids, true);
            // Implement your logic to verify and update the payment status
       
            if (($status === 'completed') ) {
                // Update the due record as paid
                // Fetch the student record using matriculation number or form number
                $studentQuery = Student::where(function ($query) use ($formNo) {
                    $query->where('matric_no', $formNo)
                        ->orWhere('form_no', $formNo);
                })->first();
    
                if (!$studentQuery) {
                    return [
                        'status' => 'error',
                        'message' => 'Student record not found.',
                    ];
                }
    
                // Update student's due status
                $studentQuery->levelduestatus = 'paid';
                $studentQuery->facultyduestatus = 'paid';
                $studentQuery->save();
    
                $student_id = $studentQuery->id;
                $student_faculty = $studentQuery->faculty;
                $dept = $studentQuery->department;
                $status = "approved";
    
                // Generate a unique transaction ID
                $trans_id = $dept . mt_rand(1000000, 9999999) . $studentQuery->level;
                // Fetch due information with association details
            
                $provider = 'flutterwave';
            
                // dd($due_ids);
                // Association details
                foreach ($array as $due_id) {
    
                    $due = Due::with(['association:id,name,email,contact_person_phone'])
                    ->where('id', $due_id)
                    ->first(['charges', 'name', 'association_id', 'amount']);
    
                    $charges = $due->charges;
                    $narration = $due->name;
                    $association_id = $due->association_id;
                    $trans_id = $dept . mt_rand(100000, 999999) . $studentQuery->level."MN";
                    $dueamount = $due->amount;
                    $final_amount = $dueamount - $charges;
                    // $reference="";
        
                    $provider_charges = $this->getProviderCharges($provider, $dueamount);
        
                    $this->creditWalletTransaction($reference,$dueamount,$association_id,$status,$trans_id, $student_id, $narration,$student_faculty,$final_amount,$charges,$dept, $due_id,$provider,$provider_charges);
    
                }
                return redirect()->route('select.due')->with('success', 'Payment successful!');
            } else {
                // Handle payment failure
                return redirect()->route('select.due')->with('error', 'Payment failed!');
            }

        }


        
    }
    


    public function handleFlutterwaveWebhook(Request $request)
    {
        // Get the secret hash from the environment
        $secretHash ="yugs-6st7-jqu9-9o01";

        $payload = $request->all();

        // Log the webhook for debugging
        Log::info('Flutterwave Webhook:', $payload);

        // Verify the webhook signature (optional but recommended)
        
        if ($request->header('verif-hash') !== $secretHash) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Process the webhook event
        if ($payload['event'] === 'charge.completed' && $payload['data']['status'] === 'successful') {
            // Extract transaction details
            $txRef = $payload['data']['tx_ref'];
            $amount = $payload['data']['amount'];
            $customer = $payload['data']['customer']['email'];
            $meta = $payload['data']['meta'] ?? [];

            // Process the payment (e.g., update order status)
            // Example: Order::where('tx_ref', $txRef)->update(['status' => 'paid']);

            return response()->json(['message' => 'Webhook processed']);
        }

        return response()->json(['mesgsage' => 'Event ignored']);
    }

    function processStudentDuePayment($due_ids, $amount, $formNo, $reference, $provider)
    {
       
    }

}
