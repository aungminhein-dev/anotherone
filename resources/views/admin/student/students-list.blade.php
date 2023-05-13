@extends('admin.layouts.master')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Students</h3>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="students.html">Student</a></li>
                            <li class="breadcrumb-item active">All Students</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="student-group-form">
            <form>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" name="key" value="{{request('key')}}" class="form-control" placeholder="Search by ID ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" name="studentName" value="{{request('studentName')}}" class="form-control" placeholder="Search by Name ...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{request('phone')}}" name="phone" placeholder="Search by Phone ...">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-student-btn">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Students</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="students.html" class="btn btn-outline-gray me-2 active"><i
                                            class="feather-list"></i></a>
                                    <a href="students-grid.html" class="btn btn-outline-gray me-2"><i
                                            class="feather-grid"></i></a>
                                    <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i>
                                        Download</a>
                                    <a href="add-student.html" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 shadow star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    @if (request('key') || request('studentName') || request('phone'))
                                    <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
                                    @endif
                                    <tr>
                                       <th></th>
                                        <th>Admission Id</th>
                                        <th>Student Name</th>
                                        <th>Birthday</th>
                                        <th>Grade</th>
                                        <th>Father Name</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($students as $student)
                                  <tr>
                                    <td>
                                        <div class="form-check check-tables">
                                            <input class="form-check-input" type="checkbox" value="something">
                                        </div>
                                    </td>
                                    <td>{{$student->admission_id}}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="student-details.html" class="avatar avatar-sm me-2">
                                               @if($student->image)
                                                <img class="avatar-img rounded-circle"src="{{asset('storage/'.$student->image)}}"
                                                 alt="User Image">
                                               @else
                                                    @if($student->gender == 'male')
                                                        <img class="avatar-img rounded-circle"
                                                        src="{{asset('storage/unknown/male.jpg')}}"
                                                        alt="User Image">
                                                    @else
                                                        <img class="avatar-img rounded-circle"
                                                        src="{{asset('storage/unknown/female.png')}}"
                                                        alt="User Image">
                                                    @endif

                                                @endif
                                            <a href="{{route('admin#studentDetails',$student->id)}}" class="text-info">{{$student->student_name}}</a>
                                        </h2>
                                    </td>
                                    <td>{{$student->birthday}}</td>
                                    <td>@if ($student->grade == 0)
                                        KG
                                        @else
                                        {{$student->grade}}
                                        @endif
                                    </td>
                                    <td>{{$student->father_name}}</td>
                                    <td>{{$student->phone}}</td>
                                    <td>{{$student->address}}</td>
                                    <td class="text-end">
                                        <div class="actions ">
                                            <a href="" class="btn btn-sm bg-success-light me-2 ">
                                                <i class="feather-eye"></i>
                                            </a>
                                            <a href="{{route('admin#editStudent',$student->id)}}" class="btn btn-sm bg-danger-light">
                                                <i class="feather-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                  @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
