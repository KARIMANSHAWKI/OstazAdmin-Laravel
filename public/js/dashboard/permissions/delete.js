function deleteSupervisor() {
    let id = $("#st-id").text();
    alert(id);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/dashboard/supervisors/" +id,
            type: "DELETE",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response);
                $("#tr"+id).fadeOut(500);
                $("#deleteModal").modal('hide');
                deleteToastr();

            },
        });
    }

function getSupervisorId($id){
    $("#st-id").text($id);
}

