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
            'phone' => 'required|numeric|max:11',
        ]);

        // Add the user to the waiting list
        WaitingList::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'association_name' => $request->association_name,
            'phone' => $request->phone,
        ]);

        return response()->json(['message' => 'You have been added to the waiting list!'], 201);
    }

}
