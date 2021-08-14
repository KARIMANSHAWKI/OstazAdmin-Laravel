<script src="{{asset('dashboard/ltr/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('dashboard/ltr/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('dashboard/ltr/bootstrap/js/popper.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
<script src="{{asset('dashboard/ltr/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard/ltr/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('dashboard/ltr/assets/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{asset('dashboard/ltr/assets/js/custom.js')}}"></script>

 <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
 <script src="{{asset('dashboard/ltr/plugins/apex/apexcharts.min.js')}}"></script>
 <script src="{{asset('dashboard/ltr/assets/js/widgets/modules-widgets.js')}}"></script>
 <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

 <script src="{{asset('dashboard/ltr/assets/js/authentication/form-1.js')}}"></script>

 {{-- Setting --}}
 <script src="{{asset('dashboard/ltr/plugins/dropify/dropify.min.js')}}"></script>
 <script src="{{asset('dashboard/ltr/plugins/blockui/jquery.blockUI.min.js')}}"></script>
 <script src="{{asset('dashboard/ltr/assets/js/users/account-settings.js')}}"></script>

{{-- Data tables --}}
<script src="{{asset('dashboard/ltr/plugins/table/datatable/datatables.js')}}"></script>
<script>
    /* Custom filtering function which will search data in column four between two values */
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = parseInt( $('#min').val(), 10 );
            var max = parseInt( $('#max').val(), 10 );
            var age = parseFloat( data[3] ) || 0; // use data for the age column

            if ( ( isNaN( min ) && isNaN( max ) ) ||
                 ( isNaN( min ) && age <= max ) ||
                 ( min <= age   && isNaN( max ) ) ||
                 ( min <= age   && age <= max ) )
            {
                return true;
            }
            return false;
        }
    );
    $(document).ready(function() {
        var table = $('#range-search').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').keyup( function() { table.draw(); } );
    });
    </script>

    <script src="{{asset('dashboard/ltr/assets/js/apps/todoList.js')}}"></script>


{{-- Profile update script --}}
<script src="{{asset('js/dashboard/profile/update.js')}}"></script>
<script src="{{asset('js/firebase.js')}}"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js"></script>





