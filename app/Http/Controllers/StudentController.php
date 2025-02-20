<?php

namespace App\Http\Controllers;

use App\Models\Due;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('student.login'); // Ensure you have a login view created
    }

    public function manualform()
    {
        return view('student.manaual'); // Ensure you have a login view created
    }

    // Handle the login submission
  


    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'identifier' => 'required|string',
            'first_name' => 'required|string',
        ]);

        // Prepare the credentials
        $credentials = $request->only('identifier', 'first_name');

        // Query for the student based on first_name and either matric_no or form_no
        $studentQuery = Student::where('first_name', $credentials['first_name'])
            ->where(function ($query) use ($credentials) {
                $query->where('matric_no', $credentials['identifier'])
                    ->orWhere('form_no', $credentials['identifier']);
            });

        $student = $studentQuery->first();

        // Check if the student exists
        if ($student) {
            
           

            // Log the student in
            // Auth::login($student);

            Auth::guard('student')->login($student);

            // Redirect to the intended page or to a specific route
            return redirect()->route('select.due')
                            ->with('success', 'Login successful!');
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }


    // Logout function
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('success', 'You have been logged out successfully.');
    }

    public function initiateBankTransfer()
    {
        // Set the Flutterwave endpoint
        $url = 'https://api.flutterwave.com/v3/charges?type=bank_transfer';

        // Prepare the payload
        $payload = [
            'amount' => 100,
            'email' => 'user@flw.com',
            'currency' => 'NGN',
            'tx_ref' => 'MC-MC-1585230ew9v5050e8',
            'fullname' => 'Yemi Desola',
            'phone_number' => '07033002245',
            'client_ip' => '154.123.220.1',
            'device_fingerprint' => '62wd23423rq324323qew1',
            'meta' => [
                'flightID' => '123949494DC',
                'sideNote' => 'This is a side note to track this call'
            ],
            'is_permanent' => false,
        ];

        // Make the HTTP request using Laravel's Http facade
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('FLUTTERWAVE_SECRET_KEY'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($url, $payload);

        // Return the response
        return response()->json($response->json(), $response->status());
    }


    public function selectDue()
    {
        // Check if the student is authenticated
        if (!Auth::guard('student')->check()) {
            return redirect()->route('login'); // Redirect if not authenticated
        }

        // Fetch the authenticated student
        $student = Auth::guard('student')->user();

        
        if (is_null($student->matric_no))
        {
            // Fetch dues based on the specified faculty with associated data
                $dues = Due::whereJsonContains('payable_faculties', $student->faculty)->whereJsonContains('payable_levels', $student->level)->whereDoesntHave('transactions', function ($query) use ($student) {
                    $query->where('student_id', $student->id);
                })
            ->with('association') // Load associated data
            ->get();
        }else{


                
            $dues = Due::whereJsonContains('payable_faculties', $student->faculty)->whereJsonContains('payable_levels', $student->level)->whereDoesntHave('foprospectuspayment', function ($query) use ($student) {
                $query->where('id', $student->id);
            })->whereDoesntHave('transactions', function ($query) use ($student) {
                    $query->where('student_id', $student->id);
                })
        ->with('association') // Load associated data
        ->get();


        }
        



            
            // dd($dues );
// 
        if ($dues->isEmpty()) {
            // Handle the case where there are no dues
            $countDue = 0;
            $totalAmount = 0;
        } else {
            $countDue = $dues->count();
            $totalAmount = $dues->sum('amount');
        }

        $Transactions = Transaction::where('student_id', $student->id)->with(['due', 'association'])->get();

        if ($Transactions->isEmpty()) {
            // Handle the case where there are no transactions
            $paidDues = 0;
            $TransactionCount = 0;
        } else {
            $paidDues = $Transactions->sum('amount');
            $TransactionCount = $Transactions->count();
        }

        // Sum up the total dues
        // Assuming there is an 'amount' field in your Due model

        // return view('student.paystackselect-due', compact('dues','paidDues', 'countDue','student', 'totalAmount'));


        
        return view('student.index', compact('dues','paidDues','TransactionCount', 'countDue','student', 'totalAmount','Transactions'));
    }

    public function history(Request $request)
    {
        if (!Auth::guard('student')->check()) {
            return redirect()->route('login'); // Redirect if not authenticated
        }

        // Fetch the authenticated student
        $student = Auth::guard('student')->user();

        $Transactions = Transaction::where('student_id', $student->id)->with(['due', 'association'])->get();

        if ($Transactions->isEmpty()) {
            // Handle the case where there are no transactions
            $paidDues = 0;
            $TransactionCount = 0;
        } else {
            $paidDues = $Transactions->sum('amount');
            $TransactionCount = $Transactions->count();
        }

        return view('student.history', compact('Transactions','student'));


    }


    public function paymentpagePROSPECTUS(){
        // Check if the student is authenticated
        if (!Auth::guard('student')->check()) {
            return redirect()->route('login'); // Redirect if not authenticated
        }

        // Fetch the authenticated student
        $student = Auth::guard('student')->user();

        

        // Fetch dues based on the specified faculty with associated data
        

        
        return view('student.paymentpagePROSPECTUS', compact('student'));

    }

    public function paymentpage(){
        // Check if the student is authenticated
        if (!Auth::guard('student')->check()) {
            return redirect()->route('login'); // Redirect if not authenticated
        }

        // Fetch the authenticated student
        $student = Auth::guard('student')->user();

        

        // Fetch dues based on the specified faculty with associated data
        

        
        return view('student.paymentpage', compact('student'));

    }


    public function oldselectDue()
    {
        // Check if the student is authenticated
        if (!Auth::guard('student')->check()) {
            return redirect()->route('login'); // Redirect if not authenticated
        }
         // Fetch the authenticated student
         $student = Auth::guard('student')->user();

    
        // Fetch dues based on the specified faculty with associated data
        $dues = Due::whereJsonContains('payable_faculties', $student->faculty)->whereJsonContains('payable_levels', $student->level)->whereDoesntHave('transactions', function ($query) use ($student) {
                    $query->where('student_id', $student->id);
                })
            ->with('association') // Load associated data
            ->get();


        if ($dues->isEmpty()) {
            // Handle the case where there are no dues
            $countDue = 0;
            $totalAmount = 0;
        } else {
            $countDue = $dues->count();
            $totalAmount = $dues->sum('amount');
        }

        $Transactions = Transaction::where('student_id', $student->id)->get();

        if ($Transactions->isEmpty()) {
            // Handle the case where there are no transactions
            $paidDues = 0;
            $TransactionCount = 0;
        } else {
            $paidDues = $Transactions->sum('amount');
            $TransactionCount = $Transactions->count();
        }

        // Sum up the total dues
        // Assuming there is an 'amount' field in your Due model

        return view('student.npaystackselect-due', compact('Transactions','TransactionCount','dues','paidDues', 'countDue','student', 'totalAmount'));


        
        // return view('student.index', compact('dues','paidDues','TransactionCount', 'countDue','student', 'totalAmount'));
    }

    public function noldselectDue()
    {
        // Check if the student is authenticated
        if (!Auth::guard('student')->check()) {
            return redirect()->route('login'); // Redirect if not authenticated
        }
         // Fetch the authenticated student
         $student = Auth::guard('student')->user();

    
        // Fetch dues based on the specified faculty with associated data
        $dues = Due::whereJsonContains('payable_faculties', $student->faculty)->whereJsonContains('payable_levels', $student->level)->whereDoesntHave('transactions', function ($query) use ($student) {
                    $query->where('student_id', $student->id);
                })
            ->with('association') // Load associated data
            ->get();


        if ($dues->isEmpty()) {
            // Handle the case where there are no dues
            $countDue = 0;
            $totalAmount = 0;
        } else {
            $countDue = $dues->count();
            $totalAmount = $dues->sum('amount');
        }

        $Transactions = Transaction::where('student_id', $student->id)->get();

        if ($Transactions->isEmpty()) {
            // Handle the case where there are no transactions
            $paidDues = 0;
            $TransactionCount = 0;
        } else {
            $paidDues = $Transactions->sum('amount');
            $TransactionCount = $Transactions->count();
        }

        // Sum up the total dues
        // Assuming there is an 'amount' field in your Due model

        return view('student.npaystackselect-due', compact('Transactions','TransactionCount','dues','paidDues', 'countDue','student', 'totalAmount'));


        
        // return view('student.index', compact('dues','paidDues','TransactionCount', 'countDue','student', 'totalAmount'));
    }

}
