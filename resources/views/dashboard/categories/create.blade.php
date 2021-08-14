<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x close" data-dismiss="modal">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
                <div class="compose-box">
                    <div class="compose-content" id="addTaskModalTitle">
                        <h5 class="">Add Category</h5>
                        <form method="post" id="createCategoryForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex mail-to mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit-3 flaticon-notes">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                        </svg>
                                        <div class="w-100">
                                            <input id="name" type="text" placeholder="Name"
                                                class="form-control" name="name">
                                                <small id="name_error" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="d-flex mail-to mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit-3 flaticon-notes">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                            </path>
                                        </svg>
                                        <div class="w-100">

                                            <div class="field-wrapper toggle-pass">
                                                <p class="d-inline-block">Status</p>
                                                <label class="switch  s-primary">
                                                    <input type="checkbox" name="status" id="toggle-status"
                                                        value="{{ 'checked' ? 0 : '' }}" class="d-none">
                                                    <span class="slider round"
                                                        style="margin-top: 30px; color:#e0e6ed"></span>
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
                <button type="submit" class="btn editTrainer" id="createCategoryBtn">Add</button>
            </div>
        </div>
    </div>
</div>
