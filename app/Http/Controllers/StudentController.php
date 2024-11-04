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


    public function selectDue()
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

        $Transaction = Transaction::where('student_id', $student->id)->get();

        if ($Transaction->isEmpty()) {
            // Handle the case where there are no transactions
            $paidDues = 0;
            $TransactionCount = 0;
        } else {
            $paidDues = $Transaction->sum('amount');
            $TransactionCount = $Transaction->count();
        }

        // Sum up the total dues
        // Assuming there is an 'amount' field in your Due model

        // return view('student.paystackselect-due', compact('dues','paidDues', 'countDue','student', 'totalAmount'));


        
        return view('student.index', compact('dues','paidDues','TransactionCount', 'countDue','student', 'totalAmount'));
    }

}
