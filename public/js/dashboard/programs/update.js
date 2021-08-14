$(document).ready(function () {
    $("#editProgramBtn").on("click", function (e) {
        e.preventDefault();
        let id = $("#idProgram").val();
        let formData = new FormData(document.getElementById("editProgramForm"));

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        formData.append("_method", "PUT");
        $.ajax({
            url: "/dashboard/programs/" + id,
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response.data);
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


                $("#editModal").modal("toggle");
                $("#editProgramForm")[0].reset();
                successToastr();
            },
            error : function (reject){
                var response = $.parseJSON(reject.responseText);
                console.log(reject);
                $.each(response.errors , function(key, val){
                    $(`#${key}1_error`).text(val[0])
                })
            }
        });
    });
});

// &&&&&&&&&&&&&&&&& Get Program Data In Form To Be Updated &&&&&&&&&&&&& //
function editProgram(id) {
    $.get("/dashboard/programs/" + id + "/edit", function (data) {
        console.log(data);
        $("#idProgram").val(data.program.id);
        $("#nameProgram").val(data.program.name);

        $(`#category option[value=${data.program.category_id}]`).attr(
            "selected",
            "selected"
        );

        let obj = $(".countriesPicker");

        data.countries.forEach(element => {
            // $(".countriesPicker").multiselect("widget").find(":checkbox[value='"+element.id+"']").attr("checked","checked");
            // $(".countriesPicker option[value='" + element.id + "']").attr("selected", 1);
            // $(".countriesPicker").multiselect("refresh");
            // $('.countriesPicker').val(element.name);

            // obj.find(`option[value=${element.id}]`).attr('selected',1);
            obj.find("option[text=" + element.name + "]")
            .attr("selected", true);


$(`.countriesPicker option[value="${element.id}]"`).text(element.name);
$('.countriesPicker').selectpicker("refresh");

            console.log(element.name);

        });




        var statusBtn = document.getElementById("toggle-status");
        if (data.program.status == 0) {
            statusBtn.checked = true;
        } else {
            statusBtn.checked = false;
        }

    });
}
