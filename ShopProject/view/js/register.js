import { Regex } from "./utils/regex.js";
import { Hash } from "./utils/hash.js";

$(document).ready(() => {
    $("#signup").submit(async function (e) {
        e.preventDefault();

        var formValues = {};
        $(this).serialize().split("&").forEach((value) => {
            value = value.split("=");
            formValues[decodeURIComponent(value[0])] = decodeURIComponent(value[1]).trim();
        });

        var valid = true;

        /*First name validation*/
        if (!Regex.fNameRegex.test(formValues.f_name)) {
            valid = false;
            $("#f_name").addClass("invalid-color");
            $("#f_name").addClass("invalid-border");

            $("#f_name").removeClass("valid-color");
            $("#f_name").removeClass("valid-border");
        }
        else {
            $("#f_name").removeClass("invalid-color");
            $("#f_name").removeClass("invalid-border");

            $("#f_name").addClass("valid-color");
            $("#f_name").addClass("valid-border");
        }

        /*Last name validation*/
        if (!Regex.LNameRegex.test(formValues.l_name)) {
            valid = false;
            $("#l_name").addClass("invalid-color");
            $("#l_name").addClass("invalid-border");

            $("#l_name").removeClass("valid-color");
            $("#l_name").removeClass("valid-border");
        }
        else {
            $("#l_name").removeClass("invalid-color");
            $("#l_name").removeClass("invalid-border");

            $("#l_name").addClass("valid-color");
            $("#l_name").addClass("valid-border");
        }

        /*Email validation*/
        if (!Regex.emailRegex.test(formValues.email)) {
            valid = false;
            $("#email").addClass("invalid-color");
            $("#email").addClass("invalid-border");

            $("#email").removeClass("valid-color");
            $("#email").removeClass("valid-border");
        }
        else {
            $("#email").removeClass("invalid-color");
            $("#email").removeClass("invalid-border");

            $("#email").addClass("valid-color");
            $("#email").addClass("valid-border");
        }

        /*Username validation*/
        if (!Regex.usernameRegex.test(formValues.username)) {
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

        /*Password validation*/
        if (!Regex.passwordRegex.test(formValues.password)) {
            valid = false;
            $("#password").addClass("invalid-color");
            $("#password").addClass("invalid-border");

            $("#password").removeClass("valid-color");
            $("#password").removeClass("valid-border");
        }
        else {
            $("#password").removeClass("invalid-color");
            $("#password").removeClass("invalid-border");

            $("#password").addClass("valid-color");
            $("#password").addClass("valid-border");
        }

        /*Repeated Password validation*/
        if (!Regex.passwordRegex.test(formValues.r_password) || formValues.password.localeCompare(formValues.r_password)) {
            valid = false;
            $("#r_password").addClass("invalid-color");
            $("#r_password").addClass("invalid-border");

            $("#r_password").removeClass("valid-color");
            $("#r_password").removeClass("valid-border");
        }
        else {
            $("#r_password").removeClass("invalid-color");
            $("#r_password").removeClass("invalid-border");

            $("#r_password").addClass("valid-color");
            $("#r_password").addClass("valid-border");
        }

        try {
            if (valid) {
                $("#message").removeClass("valid-color");
                $("#message").removeClass("invalid-color");
                $.ajax({
                    url: "../controllers/register_controller.php",
                    method: "POST",
                    data: {
                        f_name: formValues.f_name,
                        l_name: formValues.l_name,
                        email: formValues.email,
                        username: formValues.username,
                        password: await Hash.algoHash(formValues.password)
                    },
                    success: function (response) {
                        // Handle the successful response from the server
                        response = JSON.parse(response);
                        if (response["status"] !== 1) {
                            $("#message").addClass("invalid-color");
                            $("#message").text("Error while registering the user");
                            return;
                        }
                        $("#message").addClass("valid-color");
                        $("#message").text("Successfully registered the user account");
                        setTimeout(() => {
                            window.location = "login.php";
                        }, 3000);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Handle any errors that occurred during the request
                        $("#message").addClass("invalid-color");
                        $("#message").text("Error while registering the user");
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
            $("#message").text("Error while registering the user");
        }
    });

});