import { Regex } from "./utils/regex.js";
import { Hash } from "./utils/hash.js";

$(document).ready(() => {
    $("#login").submit(async function (e) {
        e.preventDefault();

        var formValues = {};
        $(this).serialize().split("&").forEach((value) => {
            value = value.split("=");
            formValues[decodeURIComponent(value[0])] = decodeURIComponent(value[1]).trim();
        });

        var valid = true;

        /*Username and/or Email validation*/
        if (!Regex.usernameRegex.test(formValues.username_email) && !Regex.emailRegex.test(formValues.username_email)) {
            valid = false;
            $("#username").addClass("invalid-color");
            $("#username").addClass("invalid-border");

            $("#username").removeClass("valid-color");
            $("#username").removeClass("valid-border");
        }
        else {
            $("#username").removeClass("invalid-color");
            $("#username").removeClass("invalid-border");

            $("#username").addClass("valid-color");
            $("#username").addClass("valid-border");
        }

        /*Password*/
        if (!Regex.passwordRegex.test(formValues.password)) {
            valid = false;
            $("#password").addClass("invalid-color");
            $("#password").addClass("invalid-border");

            $("#password").removeClass("valid-color");
            $("#l_name").removeClass("valid-border");
        }
        else {
            $("#password").removeClass("invalid-color");
            $("#password").removeClass("invalid-border");

            $("#password").addClass("valid-color");
            $("#password").addClass("valid-border");
        }

        try {
            if (valid) {
                $("#message").removeClass("valid-color");
                $("#message").removeClass("invalid-color");
                $.ajax({
                    url: "../controllers/login_controller.php",
                    method: "POST",
                    data: {
                        username_email: formValues.username_email,
                        password: await Hash.sha256(formValues.password)
                    },
                    success: function (response) {
                        // Handle the successful response from the server
                        response = JSON.parse(response);
                        if (response["status"] !== 1) {
                            $("#message").addClass("invalid-color");
                            $("#message").text("Error occured during user login");
                            return;
                        }
                        $("#message").addClass("valid-color");
                        $("#message").text("Successfully user login");
                        setTimeout(() => {
                            window.location = "index.php";
                        }, 2000);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Handle any errors that occurred during the request
                        $("#message").addClass("invalid-color");
                        $("#message").text("Error occured during user login");
                    }
                });
            }
            else {
                $("#message").addClass("invalid-color");
                $("#message").text("Some data fields are incorrect");
            }
        }
        catch (error) {
            $("#message").addClass("invalid-color");
            $("#message").text("Error occured during user login");
        }
    });

});