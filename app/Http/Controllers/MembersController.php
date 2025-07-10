<?php

namespace App\Http\Controllers;

use App\Models\Due;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;


class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     if (!Auth::guard('association')->check()) {
    //         return redirect()->route('login');
    //     }

    //     $association_id = Auth::guard('association')->user()->id;

    //     $Duee = Due::where('association_id', $association_id)->with(['association'])->first(['payable_faculties']);
    //     // $Due = json_decode($Duee->payable_faculties, true);

    //     // // Start building the query
    //     // $query = Student::query()->where('association_id',$association_id);


    //     $Due = "No Due";
    //     if(isset($Duee->payable_faculties)){

    //     $Due = json_decode($Duee->payable_faculties, true);
    //     }
    //    $query= Student::where('faculty',$Due)->get();

    //     // dd($query);
    //     // Filter by level (if present)
    //     if ($request->has('levels')) {
    //         $query->whereIn('level', $request->levels);
    //     }

        
    //     $students = $query->get();
    //     $duesCount = Due::where('association_id', $association_id)->count();

    //     return view('faculty.members', compact('students'));
    // }

     public function index()
    {
        //

        if (!Auth::guard('association')->check()) {
            return redirect()->route('login'); // Redirect if not authenticated
        }

        // Fetch the authenticated student
        $association_id = Auth::guard('association')->user()->id;


        $Duee =Due::where('association_id',$association_id)->with(['association'])->first(['payable_faculties']);
        $Due = json_decode($Duee->payable_faculties, true);

        $students= Student::where('faculty',$Due)->get();

        $duesCount =Due::where('association_id',$association_id)->count();

        // dd($Transactions->due->count());
       
        return view('faculty.members',compact('students'));
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
        $assoc = auth('association')->user();
        $request->validate([
            'matric_no' => 'required|string|max:255|unique:students',
            'jamb_reg' => 'required|string|max:255|unique:students',
            'form_no' => 'required|string|max:255|unique:students',
            'first_name' => 'required|string|max:255',
            'other_names' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'level' => 'required|string|max:10',
        ]);

        Student::create([
            'matric_no' => $request->matric_no,
            'jamb_reg' => $request->jamb_reg,
            'form_no' => $request->form_no,
            'first_name' => $request->first_name,
            'other_names' => $request->other_names,
            'faculty' => $request->faculty,
            'department' => $request->department,
            'level' => $request->level,
            'association_id' => $assoc->id,
        ]);

        return redirect()->back()->with('success', 'Student registered successfully!');
    }



public function import(Request $request)
{
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt,xlsx',
    ]);

    Excel::import(new StudentsImport, $request->file('csv_file'));

    return back()->with('success', 'Students imported successfully.');
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


