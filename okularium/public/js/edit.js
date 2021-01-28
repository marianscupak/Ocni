var form = $("#form");
var template = $("#template").clone().removeAttr('id');
var submit = $("#submit");
$("#template").remove();

function addElement() {
    if ((form.classList != null && form.classList.contains('pricesForm')) || form.children().length <= 7) {
        template.clone().insertBefore(submit);
    }
}

function removeElement(element) {
    element = $(element);
    element.parent().remove();
}