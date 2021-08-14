function deleteStudent() {
    let id = $("#st-id").text();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/dashboard/students/" +id,
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

function getId($id){
    $("#st-id").text($id);
}

