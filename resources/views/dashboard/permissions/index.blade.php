@extends('dashboard.layouts.app')
@section('content')

    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3 style="display: inline-block">Permissions</h3>
                <a id="btn-compose-mail" class="btn-add "  data-toggle="modal" data-target="#addPermissionModal"
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
                    <table id="range-search" class="display table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Permission</th>
                                <th class="text-center dt-no-sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr id="tr{{ $permission->id }}">
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <ul class="table-controls" style="text-align: center">
                                            <li><a href="javascript:void(0);" onclick="editpermission({{$permission->id}})"
                                                    data-toggle="modal" data-target="#editModal" data-toggle="tooltip"
                                                    data-placement="top" title="Edit"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg></a></li>
                                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#deleteModal" onclick="getId({{$permission->id}})"
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
                            <th>#</th>
                                <th>Permission</th>
                            <th class="text-center dt-no-sorting">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>

        @include('dashboard.permissions.create')
        @include('dashboard.permissions.delete')
        @include('dashboard.permissions.edit')



    </div>

@endsection
