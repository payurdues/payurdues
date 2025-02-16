<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use App\Exports\TransactionsExportcopy;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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


    public function type(Request $request)
    {
        if (!Auth::guard('association')->check()) {
            return redirect()->route('association.login'); // Redirect if not authenticated
        }

        $association_id = Auth::guard('association')->user()->id;


        $studentLevel = $request->input('type');
        $studentDept = $request->input('dept');


          // Query builder for transactions
        $transactionsQuery = Transaction::where('association_id', $association_id)
        ->with(['student']);

        // Apply filters if selected
        if ($studentLevel && $studentLevel !== 'all') {
            $transactionsQuery->whereHas('student', function ($query) use ($studentLevel) {
                $query->where('level', $studentLevel);
            });
        }

        if ($studentDept && $studentDept !== 'all') {
            $transactionsQuery->whereHas('student', function ($query) use ($studentDept) {
                $query->where('department', $studentDept);
            });
        }

        // Separate transactions into credit and debit
        $creditTransactions = clone $transactionsQuery;
        $creditTransactions = $creditTransactions->where('amount_type', 'credit')->get();

        $debitTransactions = $transactionsQuery->where('amount_type', 'debit')->get();

        return view('faculty.transaction', compact('creditTransactions', 'debitTransactions'));
    }

    // public function export(Request $request)
    // {
    //     return Excel::download(
    //         new TransactionsExport($request->type, $request->dept),
    //         'transactions.xlsx'
    //     );
    // }

    // public function export(Request $request)
    // {
    //     return response()->streamDownload(function () use ($request) {
    //         echo Excel::raw(new TransactionsExport( $request->dept), \Maatwebsite\Excel\Excel::XLSX);
    //     }, 'transactions.xlsx', [
    //         'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    //         'Content-Disposition' => 'attachment; filename="transactions.xlsx"',
    //     ]);
    // }
    

    // public function export(Request $request)
    // {
    //     dd("hhhjhhh");
    //     return Excel::raw(new TransactionsExportcopy($request->type, $request->dept), \Maatwebsite\Excel\Excel::XLSX);
    // }

    public function export(Request $request)
    {
        // Fetch transactions with student details
        // dd( $request->all());
        if (!Auth::guard('association')->check()) {
            return redirect()->route('association.login'); // Redirect if not authenticated
        }

        $association_id = Auth::guard('association')->user()->id;
        

        $transactions = Transaction::where('association_id', $association_id)->with(['student:id,first_name,other_names,matric_no,form_no,department'])
            ->select('id', 'student_id', 'amount','final_amount');

        // Apply filters in the controller
        if (!empty($request->type) && $request->type !== 'all') {
            $transactions->whereHas('student', function ($query) use ($request) {
                $query->where('level', $request->type);
            });
        }

        if (!empty($request->dept) && $request->dept !== 'all') {
            $transactions->whereHas('student', function ($query) use ($request) {
                $query->where('department', $request->dept);
            });
        }

        // Get the filtered transactions
        $transactions = $transactions->get();

        // dd( $transactions);

        // Ensure there is data before exporting
        if ($transactions->isEmpty()) {
            return response()->json(['error' => 'No data available for export'], 400);
        }

        // Pass the filtered data to the export class
        return Excel::download(new TransactionsExportcopy($transactions), 'transactions.xlsx');
    }

    // public function export(Request $request)
    // {
    //     $export = new TransactionsExport($request->type, $request->dept);

    //     // Debugging: Check if data exists before downloading
    //     if ($export->collection()->isEmpty()) {
    //         dd("hhhhhh");
    //         return response()->json(['error' => 'No data available for export'], 400);
    //     }

    //     return Excel::download($export, 'transactions.xlsx');
    // }

    

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
