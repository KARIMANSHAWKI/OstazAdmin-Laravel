$(document).ready(function () {
    $("#createStudentBtn").on("click", function (event) {
        event.preventDefault();

        $.ajax({
            url: "/dashboard/students",
            method: "POST",
            data: new FormData(document.getElementById("createStudentForm")),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response);
                $("#tr" + response.data.id + " td:nth-child(1)").text(
                    response.data.first_name
                );
                $("#tr" + response.data.id + " td:nth-child(2)").text(
                    response.data.last_name
                );

                $("#tr" + response.data.id + " td:nth-child(3)").text(
                    response.data.email
                );

                $("#tr" + response.data.id + " td:nth-child(4)").text(
                    response.data.age
                );

                if (response.data.gender == "f") {
                    $("#tr" + response.data.id + " td:nth-child(5)").text(
                        "Female"
                    );
                } else {
                    $("#tr" + response.data.id + " td:nth-child(5)").text(
                        "Male"
                    );
                }

                $("#tr" + response.data.id + " td:nth-child(6)").text(
                    response.data.country
                );

                $("#tr" + response.data.id + " td:nth-child(7)").text(
                    response.data.phone
                );

                if (response.data.status == "0") {
                    $("#tr" + response.data.id + " td:nth-child(8)").text(
                        "Not Active"
                    );
                } else {
                    $("#tr" + response.data.id + " td:nth-child(8)").text(
                        "Active"
                    );
                }

                $("#addStudentModal").modal("toggle");
                $("#createStudentForm")[0].reset();
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
