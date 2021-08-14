<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteConformationLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="deleteConformationLabel">
            <div class="modal-header">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-trash-2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                </div>
                <span id="ct-id" style="display: none"></span>
                <h5 class="modal-title" id="exampleModalLabel">Delete This Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="">If you delete the country it will be gone forever. Are you sure you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <form action="">
                    {{ csrf_field() }}
                    @method('delete')
                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" data-remove="task"
                    onclick="deleteCountry()">Delete</button>

                </form>
            </div>
        </div>
    </div>
</div>
