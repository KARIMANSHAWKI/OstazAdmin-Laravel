// $(document).ready(function () {
//     $("#editProfileBtn").on("click", function (e) {
//         e.preventDefault();
//         let id = $("#idProfile").val();
//         let formData = new FormData(
//             document.getElementById("editProfileForm")
//         );

//         $.ajaxSetup({
//             headers: {
//                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//             },
//         });

//         formData.append("_method", "PUT");
//         $.ajax({
//             url: "/dashboard/profile/" + id,
//             type: "POST",
//             data: formData,
//             contentType: false,
//             cache: false,
//             processData: false,
//             success: function (response) {
//                 console.log(response);

//             },
//         });
//     });
// });


