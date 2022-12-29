@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardCoordinator">
                    <div class="card-header">Add Projects</div>
                    <div class="card-body">
                            <form method="POST" action="{{ route('project-create') }}">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="row mb-3">
                                    <label for="title" class="col-md-4 col-form-label text-md-end">Project Title</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                        <span class="text-danger" >
                                            <strong>@error('title'){{ $message }}@enderror</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="student" class="col-md-4 col-form-label text-md-end">Student</label>
                                    <div class="col-md-6">
                                        <select name="student" class="form-control">
                                            <option>-- Please Select --</option>
                                            @foreach($student as $students)
                                                <option {{ old('student') == $students->id ? "selected": ""}} value="{{$students->id}}">{{$students->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" >
                                        <strong>@error('student'){{ $message }}@enderror</strong>
                                    </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Supervisor" class="col-md-4 col-form-label text-md-end">Supervisor</label>
                                    <div class="col-md-6">
                                        <select name="supervisor" class="form-control">
                                            <option>-- Please Select --</option>
                                            @foreach($staffs as $staff)
                                                <option {{ old('supervisor') == $staff->id ? "selected": ""}} value="{{$staff->id}}">{{$staff->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" >
                                            <strong>@error('supervisor'){{ $message }}@enderror</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Supervisor" class="col-md-4 col-form-label text-md-end">Examiner 1</label>
                                    <div class="col-md-6">
                                        <select name="examiner1" class="form-control">
                                            <option>-- Please Select --</option>
                                            @foreach($staffs as $staff)
                                                <option {{ old('examiner1') == $staff->id ? "selected": ""}} value="{{$staff->id}}">{{$staff->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" >
                                            <strong>@error('examiner1'){{ $message }}@enderror</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Supervisor" class="col-md-4 col-form-label text-md-end">Examiner 2</label>
                                    <div class="col-md-6">
                                        <select name="examiner2" class="form-control">
                                            <option>-- Please Select --</option>
                                            @foreach($staffs as $staff)
                                                <option {{ old('examiner2') == $staff->id ? "selected": ""}} value="{{$staff->id}}">{{$staff->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" >
                                            <strong>@error('examiner2'){{ $message }}@enderror</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-10">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
