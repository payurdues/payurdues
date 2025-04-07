<?php

namespace App\Http\Controllers;

use App\Models\Due;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::guard('association')->check()) {
            return redirect()->route('login');
        }

        $association_id = Auth::guard('association')->user()->id;

        $Duee = Due::where('association_id', $association_id)->with(['association'])->first(['payable_faculties']);
        $Due = json_decode($Duee->payable_faculties, true);

        // Start building the query
        $query = Student::query();

       
        // Filter by level (if present)
        if ($request->has('levels')) {
            $query->whereIn('level', $request->levels);
        }


        $students = $query->get();
        $duesCount = Due::where('association_id', $association_id)->count();

        return view('faculty.members', compact('students'));
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


