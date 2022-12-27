@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
            <div class="card">
                <div class="card">
                        <div class="card-header">
                            <div class="input-group mb-2">
                                <h4>Examiner 1 List</h4>
                                <div class="position-absolute top-0 end-0">
                                    <input type="text" id="myInput1" class="form-control" onkeyup="myFunction1()" placeholder="Search for student ID...">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                @csrf
                                <table class="table table-striped table-bordered text-center" id="myTable1">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Project Title</th>
                                        <th scope="col">Action</th>
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
                                            <td><a href="{{ route('project-show',['id' => $project[$i]->id])}}" class="btn btn-primary">Show</a></td>
                                            {{--<td><a href="{{ route('project-detail', ['id' => $project[$i]->id]) }}" class="btn btn-primary">Show</a></td>--}}
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </form>
                        </div>
                </div>

                <div class="card mt-5">
                        <div class="card-header">
                            <div class="input-group mb-2">
                                <h4>Examiner 2 List</h4>
                                <div class="position-absolute top-0 end-0">
                                <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for student ID...">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                @csrf
                                <table class="table table-striped table-bordered text-center" id="myTable">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Project Title</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($project1)<1)
                                        <tr>
                                            <td colspan="5">No data</td>
                                        </tr>
                                    @endif
                                    @for($j=0; $j < count($project1); $j++)
                                        <tr>
                                            <th scope="row">{{ $j+1 }}</th>
                                            <td>{{$students1[$j]->studentID}}</td>
                                            <td>{{$students1[$j]->name}}</td>
                                            <td>{{$project1[$j]->title}}</td>
                                            <td><a href="{{ route('project-show', ['id' => $project1[$j]->id])}}" class="btn btn-primary">Show</a></td>
                                           {{-- <td><a href="{{ route('project-show', ['id' => $project1[$j]->id]) }}" class="btn btn-primary">Show</a></td>--}}
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
    </div>
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        function myFunction1() {
            var input1, filter1, table1, tr1, td1, i1, txtValue1;
            input1 = document.getElementById("myInput1");
            filter1 = input1.value.toUpperCase();
            table1 = document.getElementById("myTable1");
            tr1 = table1.getElementsByTagName("tr");
            for (i1 = 0; i1 < tr1.length; i1++) {
                td1 = tr1[i1].getElementsByTagName("td")[0];
                if (td1) {
                    txtValue1 = td1.textContent || td1.innerText;
                    if (txtValue1.indexOf(filter1) > -1) {
                        tr1[i1].style.display = "";
                    } else {
                        tr1[i1].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
