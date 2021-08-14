function deleteItem() {
    let id = $("#tr-id").text();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/dashboard/trainers/" +id,
            type: "DELETE",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                $("#tr"+id).fadeOut(500);
                $("#deleteModal").modal('hide');
                deleteToastr();

            },
        });
    }

    function getTrainerId($id){
        $("#tr-id").text($id);
    }

