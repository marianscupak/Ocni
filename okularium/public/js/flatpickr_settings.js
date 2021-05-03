<<<<<<< HEAD
var days;
$.get({
    url: "/Ocni/okularium/public/ordinacni_hodiny/days/",
    success: function(result) {
        days = result.split(";");
        days.pop();
    },
    async: false
});

var dateSettings = {
    "enable": [
        function(date) {
            return days.includes(date.getDay().toString());
        }
    ],
    "locale": {
        "firstDayOfWeek": 1
    },
    minDate: new Date().fp_incr(1),
    altInput: true,
    altFormat: "j. F Y",
    onChange: function(selectedDates, dateStr, instance) {
        $.get({
            url: "/Ocni/okularium/public/ordinacni_hodiny/times/?date=" + dateStr,
            success: function(result) {
                var times = result.split(";");
                times.pop();

                var timeSelection = $("#timeSelection");
                timeSelection.empty();

                var select = "<h2>Čas</h2>";
                if (times.length > 0) {
                    select += '<select id="time">';
                    for (var i = 0; i < times.length; i++) {
                        select += '<option value="' + times[i] + '">' + times[i]; + '</option>';
                    }
                    select += "</select>";
                } else {
                    select += "<p>V tento den nejsou žádné volné časy.</p>";
                }

                timeSelection.append(select);
                timeSelection.css('display', 'block');
                $("#submitButton").css('display', 'block');
            }
        })
    }
}

$("#datePicker").flatpickr(dateSettings);

function process() {
    var date = $("#datePicker").val();
    var time = $("#time").val();
    var reason = $("#reason").val();
    var user = $("#user").val();

    if (!date || !time) {
        alert("Zvolte den a čas.");
    } else {
        var url = "/Ocni/okularium/public/prohlidky/add?";
        url += "date=" + date;
        url += "&time=" + time;
        url += "&user=" + user;
        url += ((reason) ? ("&reason=" + reason) : "");

        window.location.replace(url);
    }
=======
var days;
let origin = window.location.href.replace('/prohlidky/pridat', '');

$.get({
    url: origin + "/ordinacni_hodiny/days/",
    success: function(result) {
        days = result.split(";");
        days.pop();
    },
    async: false
});

var dateSettings = {
    "enable": [
        function(date) {
            return days.includes(date.getDay().toString());
        }
    ],
    "locale": {
        "firstDayOfWeek": 1
    },
    minDate: new Date().fp_incr(1),
    altInput: true,
    altFormat: "j. F Y",
    onChange: function(selectedDates, dateStr, instance) {
        $.get({
            url: origin + "/ordinacni_hodiny/times/?date=" + dateStr,
            success: function(result) {
                var times = result.split(";");
                times.pop();

                var timeSelection = $("#timeSelection");
                timeSelection.empty();

                var select = "<h2>Čas</h2>";
                if (times.length > 0) {
                    select += '<select id="time">';
                    for (var i = 0; i < times.length; i++) {
                        select += '<option value="' + times[i] + '">' + times[i]; + '</option>';
                    }
                    select += "</select>";
                } else {
                    select += "<p>V tento den nejsou žádné volné časy.</p>";
                }

                timeSelection.append(select);
                timeSelection.css('display', 'block');
                $("#submitButton").css('display', 'block');
            }
        })
    }
}

$("#datePicker").flatpickr(dateSettings);

function process() {
    var date = $("#datePicker").val();
    var time = $("#time").val();
    var reason = $("#reason").val();
    var user = $("#user").val();

    if (!date || !time) {
        alert("Zvolte den a čas.");
    } else {
        var url = origin + "/prohlidky/add?";
        url += "date=" + date;
        url += "&time=" + time;
        url += "&user=" + user;
        url += ((reason) ? ("&reason=" + reason) : "");

        window.location.replace(url);
    }
>>>>>>> routes-update
}