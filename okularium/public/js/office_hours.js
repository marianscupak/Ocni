var form = $("#daysForm");
var template = $("#template").clone().removeAttr('id');
var submit = $("#submit");
$("#template").remove();

function addDay() {
    if (form.children().length <= 7) {
        template.clone().insertBefore(submit);
    }
}

function removeDay(day) {
    day = $(day);
    day.parent().remove();
}