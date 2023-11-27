const msalConfig = {
    auth: {
        clientId: 'e5a415a5-cebb-417a-875a-197dcdc73b0e',
        authority: 'https://login.microsoftonline.com/f8cdef31-a31e-4b4a-93e4-5f571e91255a',
        redirectUri: 'http://localhost/online-act/frontend/rating.php',
    },
};

const msalInstance = new Msal.UserAgentApplication(msalConfig);

msalInstance.loginPopup()
    .then(response => {
        const userObjectId = response.account.idTokenClaims.oid;
        const userEmail = response.account.userName;

        $.ajax({
            url: '../backend/auth.php',
            type: 'POST',
            data: {
                email: userEmail
            },
            success: function(data) {
                window.location.href = 'rating.php';
            },
            error: function(error) {
                
            }
        });
    })
    .catch(error => {
        console.error("Ошибка аутентификации", error);
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