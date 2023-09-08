$(function () {  
    $(".form-group input").on("checkval", function () {
        let label = $(this).next("label");
        if (this.value !== "") {
            label.addClass("label-animated");
        } else {
            label.removeClass("label-animated");
        }
    }).on("keyup", function () {
        $(this).trigger("checkval");
    });
});