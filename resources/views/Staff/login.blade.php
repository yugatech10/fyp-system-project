@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Staff Login</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('staff-loginP') }}">
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            @csrf

                            <div class="row mb-3">
                                <label for="staffID" class="col-md-4 col-form-label text-md-end">Staff ID</label>
                                <div class="col-md-6">
                                    <input id="staffID" type="text" class="form-control" name="staffID" value="{{ old('staffID') }}" required>
                                    <span class="text-danger" >
                                        <strong>@error('staffID'){{ $message }}@enderror</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <span class="text-danger" >
                                        <strong>@error('password'){{ $message }}@enderror</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <a href="{{route('register-staff')}}">New Staff Please Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
