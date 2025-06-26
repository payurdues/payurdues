<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Student;

class AssociationController extends Controller
{
    //
     // Show the login form
     public function showLoginForm()
     {
         return view('faculty.login'); // Ensure you have a login view created
     }
 
     // Handle the login submission
   
     
     public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'identifier' => 'required|string',
            'password' => 'required|string',
        ]);

        // Prepare the credentials
        $credentials = $request->only('identifier', 'password');

        // Query for the association based on email or phoneno and password
        $associationQuery = Association::where(function ($query) use ($credentials) {
            $query->where('email', $credentials['identifier'])
                ->orWhere('contact_person_phone', $credentials['identifier']);
        });

        $association = $associationQuery->first();

        // Check if the association exists and the password matches
        if ($association && Hash::check($credentials['password'], $association->password)) {
            // Log the association in
            Auth::guard('association')->login($association);

            // Redirect to the intended page or to a specific route
            return redirect()->route('dashboard.index')
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

    
}
