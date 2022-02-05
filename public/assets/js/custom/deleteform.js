$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    $("body").on("click", ".deleteform", function (e) {

        e.preventDefault();

        var baseurl = $("#baseurl").val();

        var did = this.id;
        var delid = did.split('-');
        var id = delid[1];

        swal({
            title: "Are you sure?",
            text: "",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                if (id != '')
                {

                    $.blockUI({message: "<h4>Processing...</h4>"});

                    $.ajax({
                        type: "POST",
                        url: baseurl + "/delete_form",
                        data: {id: id},
                        cache: false,
                        async: false,
                        dataType: "json",
                        success: function (response) {

                            $('.error').html('');

                            if (response === 1) {

                                toastr.success("Form Deleted", "Deleted");
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);


                            } else
                            {
                                toastr.error("Failed to Delete Form", "Failed");
                                $.unblockUI();

                            }
                        },
                        error: function (data) {
                            $.unblockUI();
                        }
                    });

                } else
                {
                    toastr.error("Something went wrong", "Something went wrong");
                    $.unblockUI();
                }
            }
        });

    });


});