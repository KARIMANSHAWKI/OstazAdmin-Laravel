@extends('dashboard.layouts.app')
@section('content')

    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3 style="display: inline-block">Students</h3>
                <a id="btn-compose-mail" class="btn-add "  data-toggle="modal" data-target="#addStudentModal"
                data-toggle="tooltip" href="javascript:void(0);"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-plus">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg></a>
            </div>
        </div>

        <div class="row" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-form">
                        <div class="form-group row mr-3">
                            <label for="min" class="col-sm-5 col-form-label col-form-label-sm">Minimum age:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form-control-sm" name="min" id="min" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="max" class="col-sm-5 col-form-label col-form-label-sm">Maximum age:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form-control-sm" name="max" id="max" placeholder="">
                            </div>
                        </div>
                    </div>
                    <table id="range-search" class="display table" style="width:100%">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Country</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th class="text-center dt-no-sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr id="tr{{ $student->id }}">
                                    <td>{{ $student->first_name }}</td>

                                    <td>{{ $student->last_name }}  </td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ getGender($student->gender) }}</td>
                                    <td>{{ $student->country->name }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{  getStatus($student->status) }}</td>
                                    <td>
                                        <ul class="table-controls">
                                            <li><a href="javascript:void(0);" onclick="editStudent({{ $student->id }})"
                                                    data-toggle="modal" data-target="#editModal" data-toggle="tooltip"
                                                    data-placement="top" title="Edit"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg></a></li>
                                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#deleteModal" onclick="getId({{$student->id}})"
                                                    data-toggle="tooltip" data-placement="top"  title="Delete"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Country</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th class="text-center dt-no-sorting">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
        {{-- <a class="btn"  id="addTask" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> New Task</a> --}}

        @include('dashboard.students.edit')
        @include('dashboard.students.delete')
        @include('dashboard.students.create')

    </div>

@endsection
