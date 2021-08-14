$(document).ready(function () {
    $("#editCategoryBtn").on("click", function (e) {
        e.preventDefault();
        let id = $("#idCategory").val();
        let formData = new FormData(document.getElementById("editCategoryForm"));

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        formData.append("_method", "PUT");
        $.ajax({
            url: "/dashboard/categories/" + id,
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

                if (response.data.status == "0") {
                    $("#tr" + response.data.id + " td:nth-child(3)").text(
                        "Not Active"
                    );
                } else {
                    $("#tr" + response.data.id + " td:nth-child(3)").text(
                        "Active"
                    );
                }


                $("#editModal").modal("toggle");
                $("#editCategoryForm")[0].reset();
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
function editCategory(id) {
    $.get("/dashboard/categories/" + id + "/edit", function (data) {
        $("#idCategory").val(data.category.id);
        $("#nameCategory").val(data.category.name);


        var statusBtn = document.getElementById("toggle-status");
        if (data.category.status == 0) {
            statusBtn.checked = true;
        } else {
            statusBtn.checked = false;
        }

    });
}
