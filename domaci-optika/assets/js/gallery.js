function currentSlide(n) {
    $(".activeSlide").removeClass("activeSlide");
    $(".activeThumbnail").removeClass("activeThumbnail");
    $("#slide_" + n).addClass("activeSlide");
    $("#thumbnail_" + n).addClass("activeThumbnail");
}

function changeSlide(n) {
    var curr_slide = parseInt($(".activeSlide").attr("id")[$(".activeSlide").attr("id").length - 1]);
    var amount = $(".gallerySlide").length;
    var index = curr_slide + n;
    if (index > amount) {
        index = 1;
    }
    if (index < 1) {
        index = amount;
    }
    currentSlide(index);
}