<?php

namespace App\Http\Controllers;

use App\Models\WaitingList;
use Illuminate\Http\Request;

class WaitingListController extends Controller
{
    //
    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'fullname' => 'required|string|max:255',
        'email' => 'required|email',
        'association_name' => 'required|string|max:255',
        'phone' => 'required|numeric|digits_between:10,11',
    ]);

    // Check if the user already exists in the waiting list
    $existingUser = WaitingList::where('email', $request->email)->first();

    if ($existingUser) {
        // Return a response for an already existing user
        $html = view('partials.already_in_waitlist_modal')->render();
        return response()->json([
            'status' => 'already_exists',
            'html' => $html,
        ], 200);
    }

    // Add the user to the waiting list
    WaitingList::create([
        'fullname' => $request->fullname,
        'email' => $request->email,
        'association_name' => $request->association_name,
        'phone' => $request->phone,
    ]);

    return response()->json([
        'status' => 'new_user',
        'message' => 'You have successfully joined the waitlist!',
    ], 201);
}


}
