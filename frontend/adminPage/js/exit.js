$("#exit").on("click", function () {
    $.post("../../backend/logout.php", function() {
        window.location.href = '../form.php';
    });
});