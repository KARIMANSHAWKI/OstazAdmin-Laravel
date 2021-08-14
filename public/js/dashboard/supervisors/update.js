
$(document).ready(function () {
    $("#editSupervisorBtn").on("click", function (e) {
        e.preventDefault();
        let id = $("#id").val();

        let formData = new FormData(
            document.getElementById("editSupervisorForm")
        );

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        formData.append("_method", "PUT");
        $.ajax({
            url: "/dashboard/supervisors/" + id,
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $("#tr" + response.id + " td:nth-child(1)").text(
                    response.first_name
                );
                $("#tr" + response.id + " td:nth-child(2)").text(
                    response.last_name
                );

                $("#tr" + response.id + " td:nth-child(3)").text(
                    response.email
                );

                $("#tr" + response.id + " td:nth-child(7)").text(
                    response.phone
                );

                $("#editModal").modal("toggle");
                $("#editSupervisorForm")[0].reset();
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

// &&&&&&&&&&&&&&&&& Get Student Data In Form To Be Updated &&&&&&&&&&&&& //
function editSupervisor(id) {
    $.get("/dashboard/supervisors/" + id + "/edit", function (data) {
        $("#id").val(data.supervisor.id);
        $("#firstName").val(data.supervisor.first_name);
        $("#lastName").val(data.supervisor.last_name);
        $("#email").val(data.supervisor.email);
        $("#phone").val(data.supervisor.phone);



        data.permissions.forEach((permission) => {
            $("#updatePermissions").val(permission.name).prop("selected", true);
        });
    });
}
