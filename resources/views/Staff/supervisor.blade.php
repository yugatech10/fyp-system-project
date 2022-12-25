@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Supervisor List</div>
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <table class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Project Title</th>
                                    <th scope="col" style="width: 16.66%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($project)<1)
                                    <tr>
                                        <td class="text-center" colspan="5">No data</td>
                                    </tr>
                                @endif
                                @for($i=0; $i < count($project); $i++)
                                <tr>
                                    <th scope="row">{{ $i+1 }}</th>
                                    <td>{{$students[$i]->studentID}}</td>
                                    <td>{{$students[$i]->name}}</td>
                                    <td>{{$project[$i]->title}}</td>
                                    <td><a href="{{ route('project-detail', ['id' => $project[$i]->id]) }}" class="btn btn-primary">Edit</a></td>
                                </tr>
                                @endfor
                                </tbody>
                            </table>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
