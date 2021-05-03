function proccessIntoURL() {
    var order = $("#order").val();
    var gender = $("#gender").val();
    var priceFrom = $("#priceFrom").val();
    var priceTo = $("#priceTo").val();
    var submit = $("#submit").val();

    var url = "/Ocni/domaci-optika/bryle";
    if (gender) {
        url += "/" + gender;
    }
    if (order || priceFrom || priceTo || submit) {
        var count = 0;
        if (order) {
            url += "?order=" + order;
            count++;
        }
        if (priceFrom) {
            if (count > 0) {
                url += "&";
            } else {
                url += "?";
            }
            url += "priceFrom=" + priceFrom;
            count++;
        }
        if (priceTo) {
            if (count > 0) {
                url += "&";
            } else {
                url += "?";
            }
            url += "priceTo=" + priceTo;
            count++;
        }
    }
    window.location.replace(url);
}