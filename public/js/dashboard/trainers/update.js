$(document).ready(function () {
    $("#editBtn").on("click", function (e) {
        e.preventDefault();
        let id = $("#id").val();
        let formData = new FormData(document.getElementById("editTrainerForm"));

        let status = "";
        let checkBtn = document.getElementById("toggle-status");
        if (checkBtn.checked == 0) {
            status = "active";
        } else {
            status = "notactive";
        }

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        let dataValue = {
            data: formData,
            status: status,
        };

        formData.append("_method", "PUT");
        $.ajax({
            url: "/dashboard/trainers/" + id,
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
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

                $("#editModal").modal("toggle");
                $("#userEditForm")[0].reset();
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

// &&&&&&&&&&&&&&&&& Get Trainer Data In Form To Be Updated &&&&&&&&&&&&& //
function editTrainer(id) {
    $.get("/dashboard/trainers/" + id + "/edit", function (data) {
        $("#id").val(data.trainer.id);
        $("#firstName").val(data.trainer.first_name);
        $("#lastName").val(data.trainer.last_name);
        $("#email").val(data.trainer.email);
        $("#age").val(data.trainer.age);
        $("#country_id").val(data.trainer.country_id);
        var male = document.getElementById("male");
        var female = document.getElementById("female");

        if (data.trainer.gender == "m") {
            male.checked = true;
        } else {
            female.checked = true;
        }

        $("#country")
            .find("option[text=" + data.country + "]")
            .attr("selected", true);
        $("#phone").val(data.trainer.phone);

        var statusBtn = document.getElementById("toggle-status");
        if (data.trainer.status == 0) {
            statusBtn.checked = true;
        } else {
            statusBtn.checked = false;
        }

        data.categories.forEach((element) => {
            var selectOption = new Option(element.name, element.id, true, true);
            $(".categorySelect2").append(selectOption).trigger("change");
        });

        data.programs.forEach((element) => {
            var selectOption = new Option(
                element.name,
                element.id,
                true,
                true
            );
            var selectOption = new Option(element.name, element.id, true, true);
            $(".programSelect2").append(selectOption).trigger("change");        });
    });
}
