$(document).ready(function() {
    var message = $("#message");

    if (message.html().length > 5) { // Hopefully we're not going to need a message 5 characters long.
        message.css({ "display": "block" });
        $("#messageClose").css({ "display": "block" });
        setTimeout(hideMess, 3500);
    }
});

function hideMess() {
    $("#message").fadeOut(500);
    $("#messageClose").fadeOut(500);
};