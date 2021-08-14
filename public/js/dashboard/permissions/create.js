$(document).ready(function () {
    $("#createPermissionBtn").on("click", function (event) {
        event.preventDefault();

        $.ajax({
            url: "/dashboard/permissions",
            method: "POST",
            data: new FormData(document.getElementById("createPermissionForm")),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response);
                $("#tr" + response.data.id + " td:nth-child(1)").text(
                    response.data.id
                );

                $("#tr" + response.data.id + " td:nth-child(2)").text(
                    response.data.name
                );

                $("#addPermissionModal").modal("toggle");
                $("#createPermissionForm")[0].reset();
                successToastr();

            },
            error : function (reject){
                var response = $.parseJSON(reject.responseText);
                console.log(reject);
                $.each(response.errors , function(key, val){
                    $(`#${key}_error`).text(val[0])
                })
            }

        });
    });
});
