function deleteCountry() {
    let id = $("#ct-id").text();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/dashboard/countries/" +id,
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

function getId(id){
    console.log(id);
    $("#ct-id").text(id);
}

