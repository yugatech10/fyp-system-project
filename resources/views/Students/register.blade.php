@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Register</div>

                <div class="card-body">
                    <form method="POST" action="{{route('student-registerP')}}">
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
                                <input id="studentID" type="text" class="form-control" name="studentID" value="{{ old('studentID') }}" >
                                <span class="text-danger" >
                                    <strong>@error('studentID'){{ $message }}@enderror</strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stdName" class="col-md-4 col-form-label text-md-end">Student Name</label>
                            <div class="col-md-6">
                                <input id="stdName" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                <span class="text-danger" >
                                    <strong>@error('name'){{ $message }}@enderror</strong>
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="stdEmail" class="col-md-4 col-form-label text-md-end">Student Email</label>
                            <div class="col-md-6">
                                <input id="stdEmail" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                <span class="text-danger" >
                                    <strong>@error('email'){{ $message }}@enderror</strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
                                <span class="text-danger" >
                                    <strong>@error('password'){{ $message }}@enderror</strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                            <a href="{{route('login-student')}}">Already Register... Please Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
