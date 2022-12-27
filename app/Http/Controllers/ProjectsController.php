<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Students;
use App\Models\Staff;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Session;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::all();
        $check = Projects::all();
        if(count($check)==0){
            $student = Students::all();
        }
        else {
            $taken = Projects::where('stdID', '!=', NULL)->with('students')->get();
            //$students = Students::where('projecID', '=', NULL)->get();
            //$project = Projects::where('stdID', '!=', NULL)->get();
            foreach ($taken as $projects) {
                $students[] = $projects->students->id;
                //$students[] = Students::where('id', '=', $projects->stdID)->pluck('id')->first();
                //array_push($students,$temp);
                //$students = array_add($students, $temp);
            }
            $student = Students::whereNotIn('id', $students)->get();
        }
        //$encodedSku = json_encode($taken);
        //$encodedSku = json_encode($student);
        //print_r($encodedSku);
        //echo $projects->students->id;
        //print_r($students);
        return view('Staff/coordinator', compact('staffs','student'));
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
            'title' => 'required',
            'student' => 'required',
            'supervisor' => 'required',
            'examiner1' => 'required|different:supervisor',
            'examiner2' => 'required|different:supervisor||different:examiner1',
        ]);
        $project = new Projects();
        $project->title = $request->title;
        $project->stdID = $request->student;
        $project->supervisorID = $request->supervisor;
        $project->examiner1ID = $request->examiner1;
        $project->examiner2ID = $request->examiner2;
        $res = $project->save();
        print_r($res);
        if($res){
            return back()->with('success','New projects has been added');
        }
        else{
            return back()->with('fail','Something wrong');
        }
        //return redirect()->route('Students/dashboard')->with('success','New projects has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $projects, $id)
    {
        //$project = array();
        $staffs = Staff::all();
        $project = Projects::where('id', '=', $id)->with('students')->first();
        //echo $project;
        return view('Staff/show', compact('project','staffs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Projects $projects, $id)
    {
        $project = Projects::where('id', '=', $id)->first();
        $student = Students::where('id', '=', $project->stdID)->first();
        $staff = Staff::all();
        $progress = array("Milestone 1", "Milestone 2", "Final Report");
        $status = array("On track", "Delayed", "Extended", "Completed");
        return view("Staff/edit", compact('project','student', 'progress', 'status','staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projects $projects)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $sDate = Carbon::parse($request->startDate);
        $eDate =Carbon::parse($request->endDate);
        $duration = $sDate->diffInMonths($eDate, false);
        $request->duration = $duration;

        $upd = Projects::where('id', $request->id)->update($request->except(['_token']));
        if($upd){
            return Redirect::route('project-detail', ['id' => $request->id])->with('success', 'Project Detail Updated');
        }
        else{
            return "Fail";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projects $projects)
    {
        //
    }
}
