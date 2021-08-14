<div class="modal fade" id="editModal"  tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                <div class="compose-box">
                    <div class="compose-content" id="addTaskModalTitle">
                        <h5 class="">Edit Supervisor</h5>
                        <form  method="post"  id="editSupervisorForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex mail-to mb-4">
                                        <input type="hidden" name="id" id="id">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        <div class="w-100">
                                            <input id="firstName" type="text" placeholder="First Name" class="form-control" name="first_name">
                                            <small id="first_name1_error" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex mail-to mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        <div class="w-100">
                                            <input id="lastName" type="text" placeholder="Last Name" class="form-control" name="last_name">
                                            <small id="last_name1_error" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                            <div class="w-100">
                                                <input id="email" type="text" placeholder="Email" class="form-control" name="email">
                                                <small id="email1_error" class="form-text text-danger"></small>
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-md-12">
                                    <div class="d-flex mail-to mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        <div class="w-100">
                                            <input id="phone" type="text" placeholder="Phone" class="form-control" name="phone">
                                            <small id="phone1_error" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="d-flex mail-to mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        <div class="w-100">
                                            <select class="pr-select multiSelect form-control" id="updatePermissions"  name="permissions[]" multiple="true">
                                                @foreach ($permissions as $permission)
                                                        <option value="{{$permission->name}}">{{$permission->name}}</option>
                                                @endforeach
                                            </select>
                                            <small id="permissions1_error" class="form-text text-danger"></small>

                                        </div>
                                     </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btnDismiss" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="submit" class="btn editTrainer" id="editSupervisorBtn">Edit</button>
            </div>
        </div>
    </div>
</div>
