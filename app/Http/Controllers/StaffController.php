<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Staff;
use App\Models\Students;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Log;
use Session;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        return view("Staff/login");
    }
    public function loginP(Request $request){
        $request->validate([
            'staffID' => 'required',
            'password' => 'required',
        ]);

        $staff = Staff::where('staffID', '=', $request->staffID)->first();

        if($staff){
            if(Hash::check($request->password, $staff->password)){
                $request->session()->put('loginID', $staff->id);

                if($staff->type=="Lecturer")
                {
                    $request->session()->put('type', "Staff");
                    return redirect('staff-detail');
                }
                if($staff->type=="Coordinator")
                {
                    $request->session()->put('type', "Coordinator");
                    return redirect('coordinator-dashboard');
                }
            }
            else{
                return back()->with('fail','Password not matched');
            }
        }
        else{
            return back()->with('fail','This Staff ID not registered');
        }
    }

    public function index()
    {
        //
        return "Staff";
    }
    public function detail()
    {
        $data = array();
        if(Session::has('loginID')){
            $data = Staff::where('id', '=', Session::get('loginID'))->first();
            return view('Students/student', compact('data'));
        }
    }
    public function indexCoordinator()
    {
        $data = array();
        if(Session::has('loginID')){
            $data = Staff::where('id', '=', Session::get('loginID'))->first();
            return view('Students/student', compact('data'));
        }
        //return "Coordinator";
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Staff/register");
    }
    public function supervisor(){
        $students = array();
        $temp = array();
        //$test = Projects::with('students')->get();
        $project = Projects::where('supervisorID', '=', Session::get('loginID'))->get();
        foreach($project as $projects){
            $students[] = Students::where('id', '=', $projects->stdID)->first();
            //array_push($students,$temp);
            //$students = array_add($students, $temp);
        }

        return view("Staff/supervisor", compact('project','students'));

    }
    public function examiner(){
        $students = array();
        $students1 = array();
        $project = Projects::where('examiner1ID', '=', Session::get('loginID'))->get();
        $project1 = Projects::where('examiner2ID', '=', Session::get('loginID'))->get();
        foreach($project as $projects){
            $students[] = Students::where('id', '=', $projects->stdID)->first();
        }
        foreach($project1 as $project1s){
            $students1[] = Students::where('id', '=', $project1s->stdID)->first();
        }

        return view("Staff/examiner", compact('project','project1','students','students1'));

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
            'staffID' => 'required|unique:staff,staffID',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $staff = new Staff();
        $staff->staffID = $request->staffID;
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->type = "Lecturer";
        $staff->password = Hash::make($request->password);

        $res = $staff->save();
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
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
