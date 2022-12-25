@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Staff Register</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('staff-registerP')}}">
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
                                    <input id="staffID" type="text" class="form-control" name="staffID" value="{{ old('staffID') }}" required >

                                    @error('staffID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="staffName" class="col-md-4 col-form-label text-md-end">Staff Name</label>

                                <div class="col-md-6">
                                    <input id="staffName" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="staffEmail" class="col-md-4 col-form-label text-md-end">Staff Email</label>

                                <div class="col-md-6">
                                    <input id="staffEmail" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required >

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                                <a href="{{route('login-staff')}}">Already Register... Please Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
