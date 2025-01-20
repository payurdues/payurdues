<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!Auth::guard('association')->check()) {
            return redirect()->route('login'); // Redirect if not authenticated
        }

        // Fetch the authenticated student
        $association_id = Auth::guard('association')->user()->id;

      
        // $allTransactions = Transaction::getTransactions($association_id)->with(['student']);

        // For credit transactions only
        $creditTransactions = Transaction::getTransactions($association_id, 'credit');

        // For debit transactions only
        $debitTransactions = Transaction::getTransactions($association_id, 'debit');


        return view('faculty.transaction',compact('creditTransactions','debitTransactions'));
    }


    // public function search(Request $request)
    // {
    //     if (!Auth::guard('association')->check()) {
    //         return redirect()->route('login'); // Redirect if not authenticated
    //     }
    
    //     $association_id = Auth::guard('association')->user()->id;
    
    //     // Parse date range from request
    //     $range = $request->input('range', '90'); // Default to past 90 days
    //     $endDate = now(); // Current date and time
    
    //     // Handle custom date range if provided
    //     if ($range === 'custom') {
    //         $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
    //         $endDate = Carbon::parse($request->input('end_date'))->endOfDay();
    //     } else {
    //         // Default date handling
    //         $startDate = match ($range) {
    //             'today' => $endDate->copy()->startOfDay(),
    //             'yesterday' => $endDate->copy()->subDay()->startOfDay(),
    //             'this_week' => $endDate->copy()->startOfWeek(),
    //             default => $endDate->copy()->subDays((int)$range),
    //         };
    //     }
    
    //     // Fetch filtered transactions
    //     $creditTransactions = Transaction::where('association_id', $association_id)
    //         ->whereBetween('created_at', [$startDate, $endDate])
    //         ->where('amount_type', 'credit')
    //         ->with(['student'])
    //         ->get();
    
    //     $debitTransactions = Transaction::where('association_id', $association_id)
    //         ->whereBetween('created_at', [$startDate, $endDate])
    //         ->where('amount_type', 'debit')
    //         ->with(['student'])
    //         ->get();
    
    //     return view('faculty.transaction', compact('creditTransactions', 'debitTransactions'));
    // }

    public function search(Request $request)
{
    if (!Auth::guard('association')->check()) {
        return redirect()->route('login'); // Redirect if not authenticated
    }

    $association_id = Auth::guard('association')->user()->id;

    // Parse date range from request
    $range = $request->input('range', '90'); // Default to past 90 days
    $endDate = now(); // Current date and time

    // Handle custom date range if provided
    if ($range === 'custom') {
        $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
        $endDate = Carbon::parse($request->input('end_date'))->endOfDay();
    } else {
        // Default date handling for predefined ranges
        $startDate = match ($range) {
            'today' => $endDate->copy()->startOfDay(),
            'yesterday' => $endDate->copy()->subDay()->startOfDay(),
            'this_week' => $endDate->copy()->startOfWeek(),
            default => $endDate->copy()->subDays((int)$range),
        };
    }

    // Fetch filtered transactions
    $creditTransactions = Transaction::where('association_id', $association_id)
        ->whereBetween('created_at', [$startDate, $endDate])
        ->where('amount_type', 'credit')
        ->with(['student'])
        ->get();

    $debitTransactions = Transaction::where('association_id', $association_id)
        ->whereBetween('created_at', [$startDate, $endDate])
        ->where('amount_type', 'debit')
        ->with(['student'])
        ->get();

    return view('faculty.transaction', compact('creditTransactions', 'debitTransactions'));
}

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
