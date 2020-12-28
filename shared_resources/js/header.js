var header = $(".stickyHeader-hide")[0];

var sticky = header.offsetTop;

var img = $(".stickyImg")[0];

var main = $(".container")[0];

window.onscroll = function() { // sticky header
    if (screen.width > 600) { // not on mobile display
        if (window.pageYOffset >= sticky) {
            header.classList.add("header-stick");

            img.classList.add("stickyImg-stick");
            img.classList.remove("stickyImg");

            main.classList.add("container-stick");
            main.classList.remove("container");
        } else {
            header.classList.remove("header-stick");

            img.classList.add("stickyImg");
            img.classList.remove("stickyImg-stick");

            main.classList.add("container");
            main.classList.remove("container-stick");
        }
    }
}

function responsiveMenu() {
    if (header.classList.contains("stickyHeader-show")) {
        header.classList.add("stickyHeader-hide");
        header.classList.remove("stickyHeader-show");
    } else {
        header.classList.add("stickyHeader-show");
        header.classList.remove("stickyHeader-hide");
    }
}

function dropdownMenu(x) {
    var dropdown = $(".dropdownHeader")[x];

    if (dropdown.classList.contains("dropdownHeader-show")) {
        dropdown.classList.remove("dropdownHeader-show");
    } else {
        dropdown.classList.add("dropdownHeader-show");
    }
}

window.onresize = function() {
    if (screen.width > 600 && header.classList.contains("stickyHeader-hide")) {
        header.classList.add("stickyHeader-show");
        header.classList.remove("stickyHeader-hide");
    }
};