$(document).ready(function () {

    $(".burger3").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(this).toggleClass("on");
    });

});