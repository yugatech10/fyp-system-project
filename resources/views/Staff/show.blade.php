@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Projects</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">Student ID</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="studentID" value="{{ $project->students->studentID }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">Student Name</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="name" value="{{ $project-> students->name }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">Project Title</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ $project-> title }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="startDate" class="col-md-4 col-form-label text-md-end">Start Date</label>
                        <div class="col-md-6">
                            @if($project-> startDate==NULL)
                                <input id="endDate" type="text" class="form-control text-danger" name="startDate" value="No Data" disabled>
                            @endif
                            @if($project-> startDate!=NULL)
                                <input id="startDate" type="date" class="form-control" name="startDate" value="{{ $project-> startDate }}" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="endDate" class="col-md-4 col-form-label text-md-end">End Date</label>
                        <div class="col-md-6">
                            @if($project-> endDate==NULL)
                                <input id="endDate" type="text" class="form-control text-danger" name="endDate" value="No Data" disabled>
                            @endif
                            @if($project-> endDate!=NULL)
                                <input id="endDate" type="date" class="form-control" name="endDate" value="{{ $project-> endDate }}" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="duration" class="col-md-4 col-form-label text-md-end">Duration (months)</label>
                        <div class="col-md-6">
                            @if($project-> duration==NULL)
                                <input id="endDate" type="text" class="form-control text-danger" name="duration" value="No Data" disabled>
                            @endif
                            @if($project-> duration!=NULL)
                                <input id="endDate" type="number" class="form-control" name="duration" value="{{ $project-> duration }}" disabled>
                            @endif
                       </div>
                    </div>
                    <div class="row mb-3">
                        <label for="progress" class="col-md-4 col-form-label text-md-end">Progress</label>
                        <div class="col-md-6">
                            @if($project-> progress==NULL)
                                <input id="progress" type="text" class="form-control text-danger" name="progress" value="No Data" disabled>
                            @endif
                            @if($project-> progress!=NULL)
                                <input id="progress" type="text" class="form-control" name="progress" value="{{ $project-> progress }}" disabled>
                            @endif

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-md-4 col-form-label text-md-end">Status</label>
                        <div class="col-md-6">
                            @if($project-> status==NULL)
                                <input id="status" type="text" class="form-control text-danger" name="status" value="No Data" disabled>
                            @endif
                            @if($project-> status!=NULL)
                                <input id="status" type="text" class="form-control" name="status" value="{{ $project-> status }}" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Supervisor" class="col-md-4 col-form-label text-md-end">Supervisor</label>
                        <div class="col-md-6">
                            @if($staffs->contains($project-> supervisorID))
                            @foreach($staffs as $staff)
                                @if($staff->id == $project-> supervisorID)
                                    <input id="supervisor" type="text" class="form-control" name="supervisor" value="{{$staff->name}}" disabled>
                                @endif
                            @endforeach
                            @endif
                            @if(!$staffs->contains($project-> supervisorID))
                                <input id="supervisor" type="text" class="form-control text-danger" name="supervisor" value="No Data" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="examiner1" class="col-md-4 col-form-label text-md-end">Examiner 1</label>
                        <div class="col-md-6">
                            @if($staffs->contains($project-> examiner1ID))
                                @foreach($staffs as $staff)
                                    @if($staff->id == $project-> examiner1ID)
                                        <input id="examiner1" type="text" class="form-control" name="examiner1" value="{{$staff->name}}" disabled>
                                    @endif
                                @endforeach
                            @endif
                            @if(!$staffs->contains($project-> examiner1ID))
                                <input id="examiner1" type="text" class="form-control text-danger" name="examiner1" value="No Data" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="examiner2" class="col-md-4 col-form-label text-md-end">Examiner 2</label>
                        <div class="col-md-6">
                            @if($staffs->contains($project-> examiner2ID))
                                @foreach($staffs as $staff)
                                    @if($staff->id == $project-> examiner2ID)
                                        <input id="examiner1" type="text" class="form-control" name="examiner1" value="{{$staff->name}}" disabled>
                                    @endif
                                @endforeach
                            @endif
                            @if(!$staffs->contains($project-> examiner2ID))
                                <input id="examiner1" type="text" class="form-control text-danger" name="examiner1" value="No Data" disabled>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
