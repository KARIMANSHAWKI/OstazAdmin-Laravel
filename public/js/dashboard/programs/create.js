$(document).ready(function () {
    $("#createProgramBtn").on("click", function (event) {
        event.preventDefault();

        $.ajax({
            url: "/dashboard/programs",
            method: "POST",
            data: new FormData(document.getElementById("createProgramForm")),
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

                $("#tr" + response.data.id + " td:nth-child(3)").text(
                    response.category
                );

                if (response.data.status == "0") {
                    $("#tr" + response.data.id + " td:nth-child(5)").text(
                        "Not Active"
                    );
                } else {
                    $("#tr" + response.data.id + " td:nth-child(5)").text(
                        "Active"
                    );
                }

                $("#addProgramModal").modal("toggle");
                $("#createProgramForm")[0].reset();
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
