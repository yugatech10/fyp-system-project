@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardStudent">
                    <div class="card-header">Student Login</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('student-loginP') }}">
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            @csrf
                            <div class="row mb-3">
                                <label for="stdID" class="col-md-4 col-form-label text-md-end">Student ID</label>
                                <div class="col-md-6">
                                    <input id="studentID" type="text" class="form-control" name="studentID" value="{{ old('studentID') }}">
                                    <span class="text-danger" >
                                        <strong>@error('studentID'){{ $message }}@enderror</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">
                                    <span class="text-danger" >
                                        <strong>@error('password'){{ $message }}@enderror</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <a href="{{route('register-student')}}">New Student Please Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
