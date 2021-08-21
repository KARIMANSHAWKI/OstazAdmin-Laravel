<div class="modal fade" id="editModal"  tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                <div class="compose-box">
                    <div class="compose-content" id="addTaskModalTitle">
                        <h5 class="">Add Task</h5>
                        <form  method="post"  id="editTrainerForm">
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
                                            <input id="age" type="number" placeholder="Age" class="form-control" name="age">
                                            <small id="age1_error" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="d-flex mail-to mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        <div class="w-100">
                                            <label for="gender" style="color: #ccc">Gender : </label>
                                            <input type="radio" name="gender" id="male" value="Male" style="color: #fff">
                                            <label for="male" style="color: #009688">Male</label>
                                            <input type="radio" name="gender" id="female" value="Female">
                                            <label for="female" style="color: #009688">Female</label>
                                            <small id="gender1_error" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="d-flex mail-to mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        <div class="w-100">

                                            <div class="row">
                                                <div class="col-6">
                                                    {{-- Select programs --}}
                                                      <div class="multiselect" id="categories" name="categories[]" multiple="multiple" data-target="multi-0">
                                                          <div class="title noselect">
                                                              <span class="text">Select Category</span>
                                                              <span class="close-icon">&times;</span>
                                                              <span class="expand-icon">&plus;</span>
                                                              <input type="hidden" name="categories"/>
                                                          </div>
                                                          <div class="container1">
                                                               @foreach ($programs as $program)
                                                                  <option value="{{$program->id}}">{{$program->name}}</option>
                                                          @endforeach
                                                          </div>
                                                      </div>
                                                      <small id="programs1_error" class="form-text text-danger"></small>
                                                </div>


                                                <div class="col-6">
                                                    {{-- Select programs --}}
                                                      <div class="multiselect"id="programs"   multiple="multiple" data-target="multi-1">
                                                          <div class="title noselect">
                                                              <span class="text">Select Program</span>
                                                              <span class="close-icon">&times;</span>
                                                              <span class="expand-icon">&plus;</span>
                                                              <input type="hidden" name="programs[]"/>
                                                          </div>
                                                          <div class="container1">
                                                               @foreach ($programs as $program)
                                                                  <option value="{{$program->id}}">{{$program->name}}</option>
                                                          @endforeach
                                                          </div>
                                                      </div>
                                                      <small id="categories1_error" class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="d-flex mail-to mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        <div class="w-100">
                                            <select class="form-select form-control" id="country" name="country" aria-label="Default select example">
                                                @foreach ($countries as $country)
                                                      <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                              </select>
                                            <span class="validation-text"></span>
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

                                            <div class="field-wrapper toggle-pass">
                                                <p class="d-inline-block">Status</p>
                                                <label class="switch  s-primary" >
                                                    <input type="checkbox" name="status" id="toggle-status" value="{{ 'checked' ? 0 : ''}}" class="d-none">
                                                    <span class="slider round"  style="margin-top: 30px; color:#e0e6ed"></span>
                                                </label>
                                            </div>
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
                <button type="submit" class="btn editTrainer" id="editBtn">Edit</button>
            </div>
        </div>
    </div>
</div>
