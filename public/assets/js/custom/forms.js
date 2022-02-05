$(document).ready(function () {
    var i;
    $(".hform").each(function (index) {
        i = index + 1;
        var hform = $('#hform-' + i).val();

        $('#fb-render-' + i).formRender({
            dataType: 'json',
            formData: hform
        });

    });

    // Form Submission Here

    $("body").on("click", "button", function (e) {
        e.preventDefault();
    });

});