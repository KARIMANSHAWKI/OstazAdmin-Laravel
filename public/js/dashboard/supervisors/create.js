$(document).ready(function () {
    $("#createSupervisorBtn").on("click", function (event) {
        event.preventDefault();

        $.ajax({
            url: "/dashboard/supervisors",
            method: "POST",
            data: new FormData(document.getElementById("createSupervisorForm")),
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
                    response.data.first_name + ' ' + response.data.last_name
                );

                $("#tr" + response.data.id + " td:nth-child(3)").text(
                    response.data.email
                );

                $("#addSupervisorModal").modal("toggle");
                $("#createSupervisorForm")[0].reset();
                successToastr();

            },
            error : function (reject){
                var response = $.parseJSON(reject.responseText);
                console.log(response.errors);

                $.each(response.errors , function(key, val){
                    $(`#${key}_error`).text(val[0])
                })
            }
        });
    });
});


