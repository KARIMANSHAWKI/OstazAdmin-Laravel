@extends('dashboard.layouts.app')
@section('content')

    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3 style="display: inline-block">Students Report</h3>
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
                                <th>Name</th>
                                <th>Age</th>
                                <th>Programs</th>
                                <th>Country</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr id="tr{{ $student->id }}">
                                    <td>{{ $student->first_name . ' ' . $student->last_name }}</td>
                                    <td>{{$student->age}}</td>
                                    @foreach ($student->programs as $program)
                                        <td>{{ $program->name }}</td>
                                    @endforeach
                                    <td> {{ $student->country->name }} </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Programs</th>
                            <th>Country</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
