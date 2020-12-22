function changeForm(x) {
    var form = $("#changeForm");
    var email = $("#email");
    var pwd = $("#pwd");
    var pwdInputs = pwd.children();

    if (x == 0) {
        form.css("display", "block");
        email.css("display", "block");
        email.prop("required", true);

        pwd.css("display", "none");
        pwdInputs[0].required = false;
        pwdInputs[1].required = false;
    } else if (x == 1) {
        form.css("display", "block");
        email.css("display", "none");
        email.prop("required", false);

        pwd.css("display", "block");
        pwdInputs[0].required = true;
        pwdInputs[1].required = true;
    }
}