var dateSettings = {
    "enable": [
        function(date) {
            return (date.getDay() === 3);
        }
    ],
    "locale": {
        "firstDayOfWeek": 1
    },
    minDate: "today",
    altInput: true,
    altFormat: "j. F Y",
    onChange: function(selectedDates, dateStr, instance) {
        $.get({
            url: "/Ocni/okularium/public/prohlidka/time?date=" + dateStr,
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
        var url = "/Ocni/okularium/public/prohlidka/add?";
        url += "date=" + date;
        url += "&time=" + time;
        url += "&user=" + user;
        url += ((reason) ? ("&reason=" + reason) : "");

        window.location.replace(url);
    }
}