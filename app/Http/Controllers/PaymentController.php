<?php

namespace App\Http\Controllers;


use App\Models\Due;
use App\Models\farm_register;
use App\Models\Student;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WalletTransaction;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function getBanks()
    {
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->get('https://api.paystack.co/bank');
        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Unable to fetch banks'], 500);
        }
    }

    public function getManagerDetails($id)
    {
        $manager = User::find($id);
        if ($manager) {
            return response()->json([
                'account_no' => $manager->account_number,
                'name' => $manager->account_name,
                'bank_name' => $manager->bank_name,
            ]);
        }
        return response()->json(['error' => 'Manager not found'], 404);
    }

    public function payLayborsalary(Request $request)
    {
        $request->validate([
           
     
            'managerS' => 'required|numeric',
          
            'amount' => 'required|numeric|min:100'  // Also validate the amount for transfer
        ]);


    
        $managerS = $request->input('managerS');
        $amount = $request->input('amount'); // Amount to transfer


        $manager = $this->show($managerS);

        $bank = $request->input('bank');
        $parts = explode('-', $bank);
    
        $bankCode = $manager->bank_code;
        $bankname =  $manager->bank_name;
        $accountName =$manager->account_name; // Name of the recipient
        $accountNumber =$manager->account_number;
      
        $details = "Salary Payment";
        $narration=$request->input('narration');
        $status = "approved";
        $reference = "";
        $trans_id = mt_rand(100000000, 999999999) . "SA";
        $user_id = auth()->user()->id;
        $transferFee = $this->calculateTransferFee($amount);

        $totalAmount = $amount + $transferFee;
            if (!$this->checkWallet($user_id, $totalAmount)) {
                return redirect()->back()->with('error', 'Insufficient Account');
            }
    
        try {
            // Step 1: Verify the bank details
            $verificationResponse = Http::withToken(env('PAYSTACK_SECRET_KEY'))
                ->get('https://api.paystack.co/bank/resolve', [
                    'account_number' => $accountNumber,
                    'bank_code' => $bankCode,
                ]);
    
            if (!$verificationResponse->successful() || !isset($verificationResponse['data'])) {
                return redirect()->back()->with('error', 'Bank account verification failed');
               
            }
    
            $verifiedAccountName = $verificationResponse['data']['account_name'];
    
            // Step 2: Create transfer recipient
            $recipientResponse = Http::withToken(env('PAYSTACK_SECRET_KEY'))
                ->post('https://api.paystack.co/transferrecipient', [
                    'type' => 'nuban',
                    'name' => $accountName, // Or use the verified account name if preferred
                    'account_number' => $accountNumber,
                    'bank_code' => $bankCode,
                    'currency' => 'NGN',
                ]);
    
            if (!$recipientResponse->successful()) {
              

                return redirect()->back()->with('error', 'Failed to create transfer recipient');
            }
    
            $recipientCode = $recipientResponse['data']['recipient_code'];
    
            // Step 3: Initiate the transfer
            $transferResponse = Http::withToken(env('PAYSTACK_SECRET_KEY'))
                ->post('https://api.paystack.co/transfer', [
                    'source' => 'balance',
                    'reason' => 'Salary Payment', // Update reason as needed
                    'amount' => $amount * 100, // Amount in kobo (convert NGN to kobo)
                    'recipient' => $recipientCode,
                ]);
    
            if (!$transferResponse->successful()) {
                return redirect()->back()->with('error', 'Transfer failed.');
               
            }
    
            
    
          
            $this->debitWalletTransaction($reference, $totalAmount, $details, $status, $trans_id, $user_id,$narration);
    
            return redirect()->back()->with('success', 'Transfer successful!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    
    // public function fund_manager(Request $request) {
    //     $request->validate([
    //         'manager' => 'required|exists:users,id',
    //         'amount' => 'required|numeric|min:200',
    //     ]);
    
    //     $amount = $request->amount;
    //     $details = "Fund Manager";
     
    //     $narration="";
    //     $status = "approved";
    //     $reference = "";
    //     $trans_id = mt_rand(100000000, 999999999) . "FM";
    
    //     $user_id = auth()->user()->id;
    //     $manager_user_id = $request->manager;
    
    //     // Check if the debit was successful
    //     if (!$this->checkWallet($user_id, $amount)) {
        
    //         return redirect()->back()->with('error', 'Insufficient Account');
           
    //     }
    
    //     // If debit was successful, proceed with crediting and transactions
    //     $this->creditWallet($manager_user_id, $amount);
    //     $this->creditWalletTransaction($reference, $amount, $details, $status, $trans_id, $manager_user_id,$narration);
    //     $this->debitWallet($user_id, $amount);
    //     $this->debitWalletTransaction($reference, $amount, $details, $status, $trans_id, $user_id, $narration);

    //     return redirect()->back()->with('success', 'Payment successful!.');
    
    // }
 

   
    public function verifyBank(Request $request)
    {
        
        // Validate request
        $request->validate([
            'account_number' => 'required|numeric',
            'bank_code' => 'required|string',
        ]);

        $accountNumber = $request->input('account_number');
        $bank = $request->input('bank_code');
        $parts = explode('-', $bank);

        $bankCode = $parts[0];

        // Call Paystack API to verify the account
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->get('https://api.paystack.co/bank/resolve', [
            'account_number' => $accountNumber,
            'bank_code' => $bankCode
        ]);

        // Check if the API call was successful
        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Unable to verify account details'], 400);
        }
    }

    // public function verifyAndCreateRecipient(Request $request)
    // {
    //     $request->validate([
    //         'accountno' => 'required|numeric',
    //         'bank' => 'required|string',
    //         'category_id' => 'required|numeric',
    //         'farm_crop_id' => 'required|numeric',
    //         'amount' => 'required|numeric|min:1'  // Also validate the amount for transfer
    //     ]);
    
    //     $accountNumber = $request->input('accountno');
    //     $bank = $request->input('bank');
    //     $parts = explode('-', $bank);
    
    //     $bankCode = $parts[0];
    //     $bankname = $parts[1];
    //     $accountName = $request->input('name'); // Name of the recipient
    //     $amount = $request->input('amount'); // Amount to transfer
    //     $details = "Funds Transfer";
    //     $narration =$request->input('narration');
    //     $status = "approved";
    //     $reference = "";
    //     $trans_id = mt_rand(100000000, 999999999) . "FT";
    //     $user_id = auth()->user()->id;
    //     $transferFee = $this->calculateTransferFee($amount);


    //     $totalAmount = $amount + $transferFee;
    //         if (!$this->checkWallet($user_id, $totalAmount)) {
    //             return redirect()->back()->with('error', 'Insufficient Account');
           
    //         }
    
    //     try {
    //         // Step 1: Verify the bank details
    //         $verificationResponse = Http::withToken(env('PAYSTACK_SECRET_KEY'))
    //             ->get('https://api.paystack.co/bank/resolve', [
    //                 'account_number' => $accountNumber,
    //                 'bank_code' => $bankCode,
    //             ]);
    
    //         if (!$verificationResponse->successful() || !isset($verificationResponse['data'])) {
    //             return redirect()->back()->with('error', 'Bank account verification failed.');
           
             
    //         }
    
    //         $verifiedAccountName = $verificationResponse['data']['account_name'];
    
    //         // Step 2: Create transfer recipient
    //         $recipientResponse = Http::withToken(env('PAYSTACK_SECRET_KEY'))
    //             ->post('https://api.paystack.co/transferrecipient', [
    //                 'type' => 'nuban',
    //                 'name' => $accountName, // Or use the verified account name if preferred
    //                 'account_number' => $accountNumber,
    //                 'bank_code' => $bankCode,
    //                 'currency' => 'NGN',
    //             ]);
    
    //         if (!$recipientResponse->successful()) {
    //             return redirect()->back()->with('error', 'Failed to create transfer recipient.');
             
    //         }
    
    //         $recipientCode = $recipientResponse['data']['recipient_code'];
    
    //         // Step 3: Initiate the transfer
    //         $transferResponse = Http::withToken(env('PAYSTACK_SECRET_KEY'))
    //             ->post('https://api.paystack.co/transfer', [
    //                 'source' => 'balance',
    //                 'reason' => 'Transfer for farm expenses', // Update reason as needed
    //                 'amount' => $amount * 100, // Amount in kobo (convert NGN to kobo)
    //                 'recipient' => $recipientCode,
    //             ]);
    
    //         if (!$transferResponse->successful()) {
    //             return redirect()->back()->with('error', 'Transfer failed.');
             
    //         }
    
            
    
    //         // Save farm register details
    //         farm_register::create([
    //             'farm_id' => $request->input('activiity_farm_id'),
    //             'farm_crop_id' => $request->input('farm_crop_id'),
    //             'category_id' => $request->input('category_id'),
    //             'total_cost' => $totalAmount,
    //             'description' => $details,
    //             'account_name' => $verifiedAccountName,
    //             'account_number' => $accountNumber,
    //             'bank_name' => $bankname,
    //         ]);
            
    //         $this->debitWalletTransaction($reference, $totalAmount, $details, $status, $trans_id, $user_id,$narration);
    //         $this->debitWallet($user_id, $amount);
    
    //         return redirect()->back()->with('success', 'Transfer successful!');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }

  
    

    private function calculateTransferFee($amount)
    {
        if ($amount <= 5000) {
            return 10; // NGN 10 for transfers of NGN 5,000 and below
        } elseif ($amount > 5000 && $amount <= 50000) {
            return 25; // NGN 25 for transfers between NGN 5,001 and NGN 50,000
        } else {
            return 50; // NGN 50 for transfers above NGN 50,000
        }
    }

    public function callback(Request $request)
    {
        // dd($request->all());
        $reference = $request->reference;

        $checkTransaction= Transaction::where('reference',$reference)->first();
        
        if ($checkTransaction){

            $due = Due::with(['association:id,name,email,contact_person_phone'])->where('id', $checkTransaction->due_id)->first(['charges', 'name', 'association_id']);

            $studentQuery= Student::where('id', $checkTransaction->student_id)->first();

            $associationName = $due->association->name;
            $associationEmail = $due->association->email;
            $associationContact = $due->association->contact_person_phone;
          

                 $successMessage = 'Payment successful!';
                $student_name = $studentQuery->first_name.' '. $studentQuery->other_names;
            
                $level=$studentQuery->level;

                $amount= $checkTransaction->amount;


                $trans_id= $checkTransaction->trans_id;

                $due_name=$due->name;

                $date = date('dMY');
            


                return view('student.receipt', compact('successMessage','amount','due_name','level','student_name','trans_id','date','associationName','associationEmail','associationContact'));

        }else
        {
            $curl = curl_init();
        
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$reference,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_live_ad74a3b6af468d1019c9082b59468837e5c8eb10",
                "Cache-Control: no-cache",
                'Content-Type: application/json'
                ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            $response = json_decode($response);
            // dd($response);
            $meta_data = $response->data->metadata->custom_fields;
            if($response->data->status == 'success')
            {
                
            
                $student_name = $response->data->metadata->custom_fields[0]->value;
                $student_matric_no = $response->data->metadata->custom_fields[1]->value;
                $due_id = $response->data->metadata->custom_fields[2]->value;

                // $due = Due::with('Association')->where('id', $due_id)->first(['charges', 'name','association_id']);

                $due = Due::with(['association:id,name,email,contact_person_phone'])->where('id', $due_id)->first(['charges', 'name', 'association_id']);

                $associationName = $due->association->name;
                $associationEmail = $due->association->email;
                $associationContact = $due->association->contact_person_phone;

                $charges = $due->charges;
                $narration = $due->name;
                $association_id = $due->association_id;
                $amount = $response->data->amount / 100;
                $final_amount = $amount- $charges;

                $student_matric_no = $response->data->metadata->custom_fields[1]->value;

                
            
                
                $studentQuery = Student::where(function ($query) use ($student_matric_no) {
                    $query->where('matric_no', $student_matric_no)
                        ->orWhere('form_no', $student_matric_no);
                })->first();

                if ($studentQuery) {
                    $studentQuery->facultyduestatus = 'paid';
                    $studentQuery->save();
                }


                $student_id =  $studentQuery->id;

                $student_faculty =  $studentQuery->faculty;

                $dept= $studentQuery->department;
            
                $status = "approved";
            
                $trans_id = $studentQuery->dept.mt_rand(1000000, 9999999). $studentQuery->level;
                
            
                $this->creditWalletTransaction($reference,$amount,$association_id,$status,$trans_id, $student_id, $narration,$student_faculty,$final_amount,$charges,$dept, $due_id);

                // $this->creditWallet($user_id, $amount);
            
                
                $successMessage = 'Payment successful!';
                $student_name = $studentQuery->first_name.' '. $studentQuery->other_names;
            
                $level=$studentQuery->level;

                $due_name=$due->name;

                $date = date('dMY');
            


                return view('student.receipt', compact('successMessage','amount','due_name','level','student_name','successMessage','trans_id','date','associationName','associationEmail','associationContact'));



            } else {
                return redirect()->route('select.due')
                ->with('success', 'Payment is cancelled!!');
            
            
            }
        
        }
        
        

    }

    


    public function success()
    {
        return "Payment is successful";
    }
    public function cancel()
    {
        return "Payment is cancelled";
    }

    // $this->creditWalletTransaction($reference,$amount,$association_id,$status,$trans_id, $student_id, $narration,$student_faculty,$final_amount,$charges);

    public function creditWalletTransaction($reference,$amount,$association_id,$status,$trans_id, $student_id, $narration,$student_faculty,$final_amount,$charges,$dept, $due_id)
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
        ]);
        return $data;
    }
 
    public function show($id){
        $data = User::find($id);
        if(!$data){
            return redirect()->back()->with('error', 'Insufficient Account .');
        }
        return $data;
    }

    public function creditWallet($userid,   $amount)
    {
        $wallet = $this->show($userid);

        $wallet->update([
            'balance' => $wallet->balance + $amount
        ]);


    }
    public function checkWallet($userid, $amount)
    {
        $wallet = $this->show($userid);

        if ($amount > $wallet->balance) {
            return false; // Return false if balance is insufficient
        }
    }
    public function debitWallet($userid, $amount)
    {
        $wallet = $this->show($userid);

        $wallet->update([
            'balance' => $wallet->balance - $amount
        ]);

        // return true; // Return true if debit is successful
    }


    public function getBalance()
    {
        $user = Auth::user(); // Get the authenticated user
        $balance = $user->balance; // Assuming you have a 'wallet_balance' column in the users table

        return response()->json([
            'balance' => $balance,
        ]);
    }
    // public function debitWalletTransaction($reference, $amount, $details, $status,$trans_id, $user_id,$narration)
    // {
    //     $data = WalletTransaction::create([
    //         'user_id' => $user_id,
    //         'details' => $details,
    //         'amount_type' => 'debit',
    //         'reference' => $reference,
    //         'narration' =>$narration,
    //         'transaction_id' => $trans_id,
    //         'status' => $status,
    //         'amount' => $amount
    //     ]);
    //     return $data;
    // }

    // public function expense()
    // {
    //     $user = WalletTransaction::where('amount_type','credit')->where('user_id',auth()->user()->id)->sum('amount');

    //     return response()->json([
    //         'expense' => $user,
    //     ]);
    // }
  

    public function generateRequestId()
    {
        // Generate timestamp in YYYYMMDDHHII format
        $timestamp = Carbon::now()->format('YmdHi');
        
        // Generate a random alphanumeric string (16 characters long)
        $extra_string = substr(bin2hex(random_bytes(8)), 0, 16);
    
        // Concatenate the timestamp with the extra alphanumeric string
        return $timestamp . $extra_string;
    }

    // public function payAirtime(Request $request)
    // {
    //     // Generate request_id in UNIX format
    //     $dateTime = Carbon::now()->format('YmdHi');
    //     $extra_string = bin2hex(random_bytes(10)); // Autogenerate alphanumeric string
    //     $request_id = $dateTime . $extra_string;

    //     // Airtime purchase data
    //     $data = [
    //         'serviceID' => $request->input('serviceID'), // e.g. mtn, airtel
    //         'amount' => $request->input('amount'), // integer
    //         'phone' => $request->input('phone'), // integer (recipient phone)
    //         'request_id' => $request_id
    //     ];

    //     // Initialize cURL
    //     $ch = curl_init('http://sandbox.vtpass.com/api/pay');

    //     // Set cURL options
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Encode data as JSON
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //         'Content-Type: application/json',
    //         'api-key: 8b9f2f44fc37e38f25276376f4782df7',
    //         'secret-key: SK_7949b4e08a914df3bbc298afeebfeb4d7eed3e80a25',
    //     ]);

    //     // Execute cURL request and capture the response
    //     $response = curl_exec($ch);

    //     // dd($response);

    //     // Check for cURL errors
    //     if (curl_errno($ch)) {
    //         return back()->with('error', 'Airtime purchase failed: ' . curl_error($ch));
    //     }

    //     // Close cURL resource
    //     curl_close($ch);

    //     // Decode the response (assuming it's JSON)
    //     $responseData = json_decode($response, true);

    //     // Handle response
    //     if ($responseData['status'] === 'success') { // Adjust this based on the actual API response structure
    //         return back()->with('success', 'Airtime purchase successful!');
    //     } else {
    //         return back()->with('error', 'Airtime purchase failed. Please try again.');
    //     }
    // }

    public function payAirtime(Request $request)
    {
        // Validate the request input
        $validated = $request->validate([
            'network_id' => 'required|integer',
            'amount' => 'required|numeric',
            'phone' => 'required|string',
        ]);

        // Prepare the data for the cURL request
        $postData = [
            'network' => $validated['network_id'],
            'amount' => $validated['amount'],
            'mobile_number' => $validated['phone'],
            'Ported_number' => true,
            'airtime_type' => 'VTU'
        ];

        
        // if (!$this->checkWallet(auth()->user()->id, $validated['amount'])) {
        //     return redirect()->back()->with('error', 'Insufficient Account');
        // }
        



        // Initialize cURL
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gladtidingsapihub.com/api/topup/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($postData),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Token 1d35df04fdeb0b04201916375a7ffb410a667ded',
                'Content-Type: application/json'
            ),
        ));

        // Execute the request
        $response = curl_exec($curl);

        // Check for errors
        if (curl_errno($curl)) {
            // Handle the error
            return response()->json(['error' => curl_error($curl)], 500);
        }

        // Close cURL
        curl_close($curl);

        $responseData = json_decode($response, true);

        // dd( $responseData);

        $network =$responseData['network'];
        $mobile_number =$responseData['mobile_number'];
        $last_balance =$responseData['balance_after'];
        $paid_amount =$responseData['paid_amount'];
        $amount =$responseData['plan_amount'];
        $reference=$responseData['ident'];
        $status = "approved";
        $details="VTU";
        $user_id=auth()->user()->id;
        $narration =$request->input('narration');
        $trans_id = mt_rand(100000000, 999999999) . "AT";

        // Check if the payment was successful
        if (isset($responseData['Status']) && $responseData['Status'] === 'successful') {
            

            $this->AirtimedebitWalletTransaction($reference, $amount, $details, $status,$trans_id, $user_id,$narration,$network,$mobile_number,$last_balance,$paid_amount);
            // Redirect on success
            $this->debitWallet($user_id, $amount);
            return redirect()->route('dashboard')
                             ->with('success', 'Payment successful!');
        } else {

            

            // Redirect on failure or cancellation
            $errorMessage =  'Payment failed or cancelled!';
            return redirect()->route('dashboard')
                             ->with('error', $errorMessage);
        }
    }

    // public function AirtimedebitWalletTransaction($reference, $amount, $details, $status,$trans_id, $user_id,$narration,$network,$mobile_number,$last_balance,$paid_amount)
    // {

   

    //     $data = WalletTransaction::create([
    //         'user_id' => $user_id,
    //         'details' => $details,
    //         'amount_type' => 'debit',
    //         'reference' => $reference,
    //         'narration' =>$narration,
    //         'transaction_id' => $trans_id,
    //         'status' => $status,
    //         'amount' => $amount,
    //         'network' =>$network,
    //         'mobile_number' =>$mobile_number,
    //         'last_balance' =>$last_balance,
    //         'paid_amount' =>$paid_amount
    //     ]);
    //     return $data;
    // }


    





}
