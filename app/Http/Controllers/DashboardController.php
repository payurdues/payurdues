<?php

namespace App\Http\Controllers;

use App\Models\Due;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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

        $Transactions =Transaction::where('association_id',$association_id)->with(['due', 'association'])->get();


        $Duee =Due::where(column: 'association_id',$association_id)->with(['association'])->first(['payable_faculties']);

        
        $Due = json_decode($Duee->payable_faculties, true);

        $students= Student::where('faculty',$Due)->get();

        $duesCount =Due::where('association_id',$association_id)->count();

        // dd($Transactions->due->count());
        if ($Transactions->isEmpty()) {
            // Handle the case where there are no transactions
            $inflow_transaction = 0;
            $inflow_transactionCount = 0;
        } else {
            $inflow_transaction = $Transactions->sum('final_amount');
            $inflow_transactionCount = $Transactions->count();
        }

        
        return view('faculty.index',compact('duesCount','inflow_transaction','students','inflow_transactionCount'));

    }

    /**
     * Show the form for creating a new resource.
     *Transactions
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
