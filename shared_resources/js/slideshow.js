window.addEventListener("DOMContentLoaded", function(e) {
    var stage = $(".slideshow")[0];
    var fadeComplete = function(e) {
        stage.appendChild(arr[0]);
    };

    var arr = stage.getElementsByTagName("img");

    for (var i = 0; i < arr.length; i++) {
        arr[i].addEventListener("animationend", fadeComplete, false);
    }
}, false);