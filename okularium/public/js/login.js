var login = $(".loginWrapper");
var popup = $(".loginForm")[0];
var opened = false;

window.onclick = function(event) {
    if (opened) {
        if (!popup.contains(event.target)) {
            login.css({ "display": "none" });
        }
    }
}

function loginForm() {
    login.css({ "display": "block" });
    opened = false;
    setTimeout(function() { opened = true }, 1);
}

function closeLogin() {
    login.css({ "display": "none" });
}