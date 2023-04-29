import "flowbite";
//this shows the selected image inplace of the image
$(function () {
    var loadFile = function (event) {
        var output = $("#output")[0];
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src); // free memory
        };
    };

    $("#fileInput").on("change", loadFile);
});


$(function () {
    $("#registerForm").submit(function (e) {
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $("#registerForm input").removeClass("is-invalid");
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json",
            },
            url: "{{ route('register') }}",
            data: formData,
            success: () => window.location.assign("{{ route('home') }}"),
            error: (response) => {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    Object.keys(errors).forEach(function (key) {
                        $("#" + key + "Input").addClass("is-invalid");
                        $("#" + key + "Error")
                            .children("strong")
                            .text(errors[key][0]);
                    });
                } else {
                    window.location.reload();
                }
            },
        });
    });
});

// $("#currency").maskMoney({ formatOnBlur: true, reverse: true, precision: 2 });

$(document).ready(function () {
    $(".search").on("keyup", function () {
        var value = $(this).val();
        if (value) {
            $.ajax({
                type: "get",
                url: "search",
                data: { search: value },
                success: function (data) {
                    $("#Content").html(data);
                },
            });
        } else if (value == "") {
            $("#Content").html("");
        }
    });
});
