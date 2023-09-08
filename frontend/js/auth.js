$(document).ready(function (){
    $('#login-form').submit(function (e) {
        const name = document.getElementById("username").value;
        const pass = document.getElementById("password").value;
        const data = {
            username: name,
            password: pass
        };
        console.log(name);
        $.ajax({
            type: 'POST',
            url : '../backend/authentification.php',
            data: data,
            success: function(response){
                console.log("Success!");
                if (response.success) {
                    window.location.href = '/frontend/rating.php';
                } else {
                    console.error("Authentication failed.");
                }
            },
            error: function(error){
                console.error("Error: ", error);
            }
        });
    });  
});