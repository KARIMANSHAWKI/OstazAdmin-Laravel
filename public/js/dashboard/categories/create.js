$(document).ready(function () {
    $("#createCategoryBtn").on("click", function (event) {
        event.preventDefault();

        $.ajax({
            url: "/dashboard/categories",
            method: "POST",
            data: new FormData(document.getElementById("createCategoryForm")),
            dataType: "JSON",
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

                if (response.data.status == "0") {
                    $("#tr" + response.data.id + " td:nth-child(5)").text(
                        "Not Active"
                    );
                } else {
                    $("#tr" + response.data.id + " td:nth-child(5)").text(
                        "Active"
                    );
                }

                $("#addCategoryModal").modal("toggle");
                $("#createCategoryForm")[0].reset();
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
