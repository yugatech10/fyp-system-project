@if(Session::has('type'))
    @if(Session::get('type')=="Staff")
        <?php $type = "Staff";?>
    @endif
    @if(Session::get('type')=="Student")
        <?php $type = "Student";?>
    @endif
    @if(Session::get('type')=="Coordinator")
            <?php $type = "Coordinator";?>
    @endif
@endif
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card{{$type}}">
                    <div class="card-header">Your Detail</div>
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="studentID" class="col-md-4 col-form-label text-md-end">{{$type}} ID</label>
                                <div class="col-md-6">
                                    <input id="studentID" type="text" class="form-control" name="studentID" value="@if($type=="Staff" OR $type=="Coordinator"){{ $data->staffID }}@endif @if($type=="Student"){{ $data->studentID }}@endif" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="startDate" class="col-md-4 col-form-label text-md-end">{{$type}} Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ $data->email }}" disabled>
                                </div>
                            </div>

                            <!--<div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
