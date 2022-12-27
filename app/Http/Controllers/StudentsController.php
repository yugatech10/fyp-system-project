<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Students;
use App\Models\Staff;
use Illuminate\Http\Request;
use Hash;
use Session;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        return view("Students/login");
    }
    public function logout(){
        if(Session::has('loginID')){
            Session::pull('loginID');
            Session::pull('type');
            return view('welcome');
        }
    }
    public function loginP(Request $request){
        $request->validate([
            'studentID' => 'required',
            'password' => 'required',
        ]);

        $student = Students::where('studentID', '=', $request->studentID)->first();
        if($student){
            if(Hash::check($request->password, $student->password)){
                $request->session()->put('loginID', $student->id);
                $request->session()->put('type', "Student");
                return redirect('student-detail');
            }
            else{
                return back()->with('fail','Password not matched');
            }
        }
        else{
            return back()->with('fail','This Student ID not registered');
        }
    }
    public function detail()
    {
        $data = array();
        if(Session::has('loginID')){
            $data = Students::where('id', '=', Session::get('loginID'))->first();
            return view('Students/student', compact('data'));
        }
    }
    public function index()
    {
        $project = array();
        $staffs = Staff::all();
        if(Session::has('loginID')){
            $project = Projects::where('stdID', '=', Session::get('loginID'))->with('students')->first();
        }
        return view('Students/dashboard', compact('project','staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Students/register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'studentID' => 'required|unique:students,studentID',
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'password' => 'required',
        ]);

        $student = new Students();
        $student->studentID = $request->studentID;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);

        $res = $student->save();
        if($res){
            return back()->with('success','You have registered successfully');
        }
        else{
            return back()->with('fail','Something wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $students)
    {
        //
    }
}
