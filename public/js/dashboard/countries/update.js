$(document).ready(function () {

    $("#editCountryBtn").on("click", function (e) {
        e.preventDefault();
        let id = $("#idCountry").val();
        let formData = new FormData(document.getElementById("editCountryForm"));

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });



        formData.append("_method", "PUT");
        $.ajax({
            url: "/dashboard/countries/" + id,
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $("#tr" + response.data.id + " td:nth-child(2)").text(
                    response.data.name
                );


                $("#editModal").modal("toggle");
                $("#editCountryForm")[0].reset();
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


// &&&&&&&&&&&&&&&&& Get Student Data In Form To Be Updated &&&&&&&&&&&&& //
function editCountry(id) {
    $.get("/dashboard/countries/" + id + "/edit", function (data) {
        console.log(data);
        $("#idCountry").val(data.id);
        $("#nameCountry").val(data.name);
    });
}
