$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    $('#formBuilder').formBuilder({
        controlOrder: [
            'text',
            'number',
            'select',
            'button',
        ],
        disableFields: [
            'autocomplete',
            'checkbox-group',
            'checkbox',
            'file',
            'header',
            'hidden',
            'paragraph',
            'radio-group',
            'textarea',
            'date'
        ],
        disabledAttrs: [
            'access',
            'description',
            'step',
            'other',
        ],
        onSave: function (evt, formData) {

            var baseurl = $("#baseurl").val();
            var formname = $("#formname").val();
            var formaction = $("#formaction").val();
            var formmethod = $("#formmethod").val();

            $.blockUI({message: "<h4>Processing...</h4>"});

            $.ajax({
                type: "POST",
                url: baseurl + "/generate_form",
                data: {formname: formname, formdata: formData, formaction: formaction, formmethod: formmethod},
                cache: false,
                async: false,
                dataType: "json",
                success: function (response) {

                    $('.error').html('');
                    $.unblockUI();

                    if (response === 1) {
                        toastr.success("Form Created", "Success");
                        setTimeout(function () {
                            window.location.href = baseurl + "/dashboard";
                        }, 1000);

                    } else {
                        toastr.error("Failed to Generate Form", "Failed");
                        $.unblockUI();

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
                        toastr.error("Something went wrong", "Something went wrong");
                    }
                }
            });

        },
    });

});