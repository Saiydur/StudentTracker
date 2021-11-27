$(document).ready(function () {
    Registration();
});

function Registration() {
    //make on keyup validation for first name
    $("#firstName").keyup(function () {
        let firstName = $("#firstName").val();
        if (firstName.length > 3) {
            $("#firstName").removeClass("is-invalid");
            $("#firstName").addClass("is-valid");
        }
        else {
            $("#firstName").removeClass("is-valid");
            $("#firstName").addClass("is-invalid");
        }
    });

    //make on keyup validation for last name
    $("#lastName").keyup(function () {
        let lastName = $("#lastName").val();
        if (lastName.length > 3) {
            $("#lastName").removeClass("is-invalid");
            $("#lastName").addClass("is-valid");
        }
        else {
            $("#lastName").removeClass("is-valid");
            $("#lastName").addClass("is-invalid");
        }
    });

    //make on keyup validation for email
    $("#email").keyup(function () {
        let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        let email = $("#email").val();
        if (regex.test(email)) {
            $("#email").removeClass("is-invalid");
            $("#email").addClass("is-valid");
        }
        else {
            $("#email").removeClass("is-valid");
            $("#email").addClass("is-invalid");
        }
    }
    );

    //make on keyup validation for password
    $("#password").keyup(function () {
        let password = $("#password").val();
        let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
        if (regex.test(password)) {
            $("#password").removeClass("is-invalid");
            $("#password").addClass("is-valid");
        }
        else {
            $("#password").removeClass("is-valid");
            $("#password").addClass("is-invalid");
        }
    });
}