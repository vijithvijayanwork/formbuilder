$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    $.validator.addMethod("email", function (value, element) {
        return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
    });


    var validator = $("#loginform").validate({
        onfocusout: false,
        rules: {
            email: "required email",
            password: "required",
        },
        messages: {
            email: {
                required: "Email id is required.",
                email: "Email id is invalid."
            },
            password: {
                required: "Password is required."
            }
        },
        submitHandler: function (form, event) {
            event.preventDefault();

            var baseurl = $("#baseurl").val();
            $.blockUI({message: "<h4>Processing...</h4>"});

            $.ajax({
                type: "POST",
                url: baseurl + "/login/user_login",
                data: new FormData($(form)[0]),
                cache: false,
                processData: false,
                contentType: false,
                async: false,
                dataType: "json",
                success: function (response) {

                    $('.error').html('');
                    $.unblockUI();

                    if (response === 1) {
                        window.location.href = baseurl + "/dashboard";
                    } else {
                        $("#loginform").trigger("reset");
                        toastr.error("Failed to Login", "Login failed");

                    }
                },
                error: function (data) {
                    $.unblockUI();
                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {

                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {

                                    $("#" + key + "_error").text(value);
                                });
                            }
                        });
                    } else if (data.status === 200) {
                        $("#loginform").trigger("reset");
                        $("#password_error").text("Invalid Login");
                    }
                }
            });

        }
    });

});