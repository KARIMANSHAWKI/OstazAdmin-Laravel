$(document).ready(function () {
    $("#editPermissionBtn").on("click", function (e) {
        e.preventDefault();
        let id = $("#idPermission").val();
        let formData = new FormData(
            document.getElementById("editPermissionForm")
        );

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        formData.append("_method", "PUT");
        $.ajax({
            url: "/dashboard/permissions/" + id,
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $("#tr" + response.data.id + " td:nth-child(1)").text(
                    response.data.id
                );

                $("#tr" + response.data.id + " td:nth-child(2)").text(
                    response.data.name
                );

                $("#editModal").modal("toggle");
                $("#editPermissionForm")[0].reset();
                successToastr();

            },
            error : function (reject){
                var response = $.parseJSON(reject.responseText);
                console.log(response.errors);

                $.each(response.errors , function(key, val){
                    $(`#${key}1_error`).text(val[0])
                })
            }
        });
    });
});

// &&&&&&&&&&&&&&&&& Get permission Data In Form To Be Updated &&&&&&&&&&&&& //
function editpermission(id) {
    $.get("/dashboard/permissions/" + id + "/edit", function (data) {
        $("#idPermission").val(data.id);
        $("#namePermission").val(data.name);
    });
}
