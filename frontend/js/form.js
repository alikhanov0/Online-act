$(document).ready(function (){
    $('#login-form').submit(function (e) {
        e.preventDefault();
        const name = document.getElementById("username").value;
        const pass = document.getElementById("password").value;
        const data = {
            username: name,
            password: pass
        };
        console.log(name);
        $.ajax({
            type: 'POST',
            url : 'backend/auth.php',
            data: data,
            success: function(response){
                console.log("Success!");
                console.log(response);
                if (response.success) {
                    window.location.href = 'frontend/rating.php';
                } else {
                    console.log("Authentication failed.");
                }
            },
            error: function(error){
                console.error("Error:", error); // Вывести сообщение об ошибке
            }
        });
    });  
});

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