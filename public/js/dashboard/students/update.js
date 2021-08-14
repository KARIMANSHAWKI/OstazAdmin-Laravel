$(document).ready(function () {

    $("#editStudentBtn").on("click", function (e) {
        e.preventDefault();
        let id = $("#id").val();
        let formData = new FormData(document.getElementById("editStudentForm"));

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });



        formData.append("_method", "PUT");
        $.ajax({
            url: "/dashboard/students/" + id,
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

                $("#tr" + response.id + " td:nth-child(4)").text(
                    response.age
                );

                if (response.gender == "f") {
                    $("#tr" + response.id + " td:nth-child(5)").text(
                        "Female"
                    );
                } else {
                    $("#tr" + response.id + " td:nth-child(5)").text(
                        "Male"
                    );
                }

                $("#tr" + response.id + " td:nth-child(6)").text(
                    response.country
                );

                $("#tr" + response.id + " td:nth-child(7)").text(
                    response.phone
                );

                if (response.status == "0") {
                    $("#tr" + response.id + " td:nth-child(8)").text(
                        "Not Active"
                    );
                } else {
                    $("#tr" + response.id + " td:nth-child(8)").text(
                        "Active"
                    );
                }

                $("#editModal").modal("toggle");
                $("#editStudentForm")[0].reset();
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
function editStudent(id) {
    $.get("/dashboard/students/" + id + "/edit", function (data) {
        $("#id").val(data.student.id);
        $("#firstName").val(data.student.first_name);
        $("#lastName").val(data.student.last_name);
        $("#email").val(data.student.email);
        $("#age").val(data.student.age);
        $("#country_id").val(data.student.country_id);
        var male = document.getElementById("male");
        var female = document.getElementById("female");

        if (data.student.gender == "m") {
            male.checked = true;
        } else {
            female.checked = true;
        }

        $("#country")
            .find("option[text=" + data.country + "]")
            .attr("selected", true);
        $("#phone").val(data.student.phone);

        var statusBtn = document.getElementById("toggle-status");
        if (data.student.status == 0) {
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
