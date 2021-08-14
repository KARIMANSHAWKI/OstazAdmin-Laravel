@extends('dashboard.layouts.app')
@section('content')

    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3 style="display: inline-block">Programs Report</h3>
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
                                <th>Program</th>
                            <th>N.Trainers</th>
                            <th>N.Students</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programs as $programs)
                                <tr id="tr{{ $programs->id }}">
                                    <td>{{ $programs->name }}</td>
                                    <td>{{count($programs->Trainers)}}</td>
                                    <td>{{count($programs->Students)}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <th>Program</th>
                            <th>N.Trainers</th>
                            <th>N.Students</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
