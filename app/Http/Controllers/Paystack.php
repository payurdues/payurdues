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
        // $amount = $request->input('amount');

        $array = json_decode($due_ids, true);

   


        // Implement your logic to verify and update the payment status
        // if (($status === 'completed') && ($amount === 3400) ) {
        if (($status === 'completed') ) {

            // Update the due record as paid


            // try {
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
    
                // Calculate final amount after deducting charges
               
    
    
    
    
                return redirect()->route('select.due')
                                ->with('success', 'Payment successful!');
    
                // $successMessage = 'Payment successful!';
                // $student_name = $studentQuery->first_name.' '. $studentQuery->other_names;
            
                // $level=$studentQuery->level;
    
                
    
    
             
    
                // $due_name=$due->name;
    
                // $date = date('dMY');
            
    
    
                // return view('student.receipt', compact('successMessage','amount','due_name','level','student_name','trans_id','date','associationName','associationEmail','associationContact'));
                
    
                // // Log the transaction for reference
                // Log::info('Processing payment', [
                //     'student_id' => $studentId,
                //     'faculty' => $studentFaculty,
                //     'department' => $department,
                //     'transaction_id' => $transactionId,
                //     'amount' => $amount,
                //     'final_amount' => $finalAmount,
                //     'association_name' => $associationName,
                // ]);
    
                // // Return successful response
                // return [
                //     'status' => 'success',
                //     'message' => 'Payment processed successfully.',
                //     'data' => [
                //         'student_id' => $studentId,
                //         'transaction_id' => $transactionId,
                //         'amount' => $finalAmount,
                //         'narration' => $narration,
                //         'association_name' => $associationName,
                //         'association_email' => $associationEmail,
                //         'association_contact' => $associationContact,
                //     ],
            //     // ];
            // } catch (Exception $e) {
            //     // Handle exceptions and log errors
            //     Log::error('Error processing payment', ['error' => $e->getMessage()]);
            //     return [
            //         'status' => 'error',
            //         'message' => 'An error occurred while processing the payment. Please try again.',
            //     ];
            // }

           
        } else {
            // Handle payment failure
            return redirect()->route('select.due')->with('error', 'Payment failed!');
        }
    }
    


    public function handleFlutterwaveWebhook(Request $request)
    {
        // Get the secret hash from the environment
        $secretHash = env('FLW_SECRET_HASH');

        // Get the signature from headers
        $signature = $request->header('verif-hash');

        // Verify the signature
        if (!$signature || $signature !== $secretHash) {
            // This request isn't from Flutterwave; discard
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Get the payload
        $payload = $request->all();

        // Log the payload
        Log::info('Flutterwave Webhook Received:', $payload);

        // Perform any additional processing you need
        // Ensure the processing is lightweight to avoid timeouts

        // Return a 200 response
        return response()->json(['status' => 'success'], 200);
    }

    function processStudentDuePayment($due_ids, $amount, $formNo, $reference, $provider)
    {
       
    }

}
