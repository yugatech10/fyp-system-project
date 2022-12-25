@extends('layouts.app')

@section('content')
    <script>
        $(document).ready(function(){
            $('#startDate').change(function() {
                var months;
                var enddate = new Date($("#endDate").val());
                var startdate = new Date($(this).val());
                months = (enddate.getFullYear() - startdate.getFullYear()) * 12;
                months -= startdate.getMonth();
                months += enddate.getMonth();
                document.getElementById("duration1").value = months;
                document.getElementById("duration2").value = months;
                console.log(months, 'change')
            });
            $('#endDate').change(function() {
                var months;
                var startdate= new Date($("#startDate").val());
                var enddate= new Date($(this).val());
                months = (enddate.getFullYear() - startdate.getFullYear()) * 12;
                months -= startdate.getMonth();
                months += enddate.getMonth();
                document.getElementById("duration1").value = months;
                document.getElementById("duration2").value = months;
                console.log(months, 'change')
            });
        });
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Projects</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('project-update') }}">
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            @csrf
                            <div class="row mb-3">
                                <label for="studentID" class="col-md-4 col-form-label text-md-end">Student ID</label>
                                <div class="col-md-6">
                                    <input id="studentID" type="text" class="form-control" name="studentID" value="{{ $student->studentID }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="startDate" class="col-md-4 col-form-label text-md-end">Student Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $student->name }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ $student->email }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Project Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $project-> title }}" disabled>
                                    <input type="hidden" name="id" value="{{ $project-> id }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="startDate" class="col-md-4 col-form-label text-md-end">Start Date</label>
                                <div class="col-md-6">
                                    <input id="startDate" type="date" class="form-control" name="startDate" value="{{ $project-> startDate }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="endDate" class="col-md-4 col-form-label text-md-end">End Date</label>
                                <div class="col-md-6">
                                    <input id="endDate" type="date" class="form-control" name="endDate" value="{{ $project-> endDate }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="duration" class="col-md-4 col-form-label text-md-end">Duration (months)</label>
                                <div class="col-md-6">
                                    <input id="duration1" type="number" class="form-control" name="duration" value="{{ $project-> duration }}" disabled>
                                    <input id="duration2" type="hidden" name="duration" value="{{ $project-> duration }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="progress" class="col-md-4 col-form-label text-md-end">Progress</label>
                                <div class="col-md-6">
                                    <select name="progress" class="form-control" id="progress">
                                        @if($project-> progress == NULL)
                                            <option value=NULL {{ "selected" }}>Please Choose One</option>
                                        @endif
                                        @foreach ($progress as $item)
                                            <option value="{{ $item}}" {{ ( $item == $project-> progress) ? 'selected' : '' }}> {{ $item }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-md-4 col-form-label text-md-end">Status</label>
                                <div class="col-md-6">
                                    <select name="status" class="form-control" id="status">
                                        @if($project-> status == NULL)
                                            <option value=NULL {{ "selected" }}>Please Choose One</option>
                                        @endif
                                        @foreach ($status as $item)
                                            <option value="{{ $item}}" {{ ( $item == $project-> status) ? 'selected' : '' }}> {{ $item }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Supervisor" class="col-md-4 col-form-label text-md-end">Supervisor</label>
                                <div class="col-md-6">
                                    @foreach ($staff as $staffs)@if($staffs->id == $project-> supervisorID)
                                    <input id="supervisor" type="text" class="form-control" name="supervisor" value="{{ $staffs-> name }}" disabled>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="examiner1" class="col-md-4 col-form-label text-md-end">Examiner 1</label>
                                <div class="col-md-6">
                                    @foreach ($staff as $staffs)
                                        @if($staffs->id == $project-> examiner1ID)
                                            <input id="examiner1" type="text" class="form-control" name="examiner1" value="{{$staffs->name}}" disabled>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="examiner2" class="col-md-4 col-form-label text-md-end">Examiner 2</label>
                                <div class="col-md-6">
                                    @foreach ($staff as $staffs)
                                        @if($staffs->id == $project-> examiner2ID)
                                            <input id="examiner2" type="text" class="form-control" name="examiner2" value="{{$staffs->name}}" disabled>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 offset-md-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
