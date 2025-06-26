<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Association;
use App\Models\Student;
use App\Models\Admin;


class AdminController extends Controller
{

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.index');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
      //  return back()->withErrors([
        //    'login' => 'Invalid Credentials.',
        //]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function index()
    {
        $associations = Association::all();
        return view('admin.index', compact('associations'));

    }

    public function show($id)
    {
        
        $association = Association::findOrFail($id);
        $students = Student::where('association_id', $association->id)->get();

        return view('admin.association', ['students' => $students], compact('association'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|',
            'link' => 'required',
            'about' => 'required',
            'contact_person_name' => 'required',
            'contact_person_phone' => 'required|numeric',
            'bank_code' => 'required',
            'bank_name' => 'required',
            'bank_account_no' => 'required',
            'bank_account_name' => 'required',
            'provider' => 'required',
            'password' => 'required',
            'image' => 'required|image',
            'approval_doc' => 'required',
        ]);

        $Image = null;
        $ApprovalDoc = null;


        if (isset($request['image'])) {

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $destinationPath = public_path('assets');

                // Move image to public folder
                $image->move($destinationPath, $filename);

                // Save correct public path in DB
                $Image = $filename;
            }
        }

        if (isset($request['approval_doc'])) {

            if ($request->hasFile('approval_doc')) {
                $approval_doc = $request->file('approval_doc');
                $approval_doc_name = $approval_doc->getClientOriginalName();
                $approval_doc_path = public_path('assets');

                // Move image to public folder
                $approval_doc->move($approval_doc_path, $approval_doc_name);

                // Save correct public path in DB
                $ApprovalDoc = $approval_doc_name;
            }
        }

        $data['password'] = Hash::make($request['password']);
        $data['image'] = $Image;
        $data['approval_doc'] = $ApprovalDoc;
        Association::create($data);

        return back();
    }


}
