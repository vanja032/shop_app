function CancelOrder(order_id, element) {
    try {
        $.ajax({
            url: "../controllers/orders_controller.php",
            method: "POST",
            data: {
                action: "cancel-order",
                order_id: order_id
            },
            success: function (response) {
                // Handle the successful response from the server
                try {
                    response = JSON.parse(response);
                    if (response.hasOwnProperty("status")) {
                        if (response["status"]) {
                            $(element).parent().parent().children('.status:first').text(`${response["order_status"]}`);
                            $(element).parent().html(`<span class='inactive-color'>${response["order_status"]}</span>`);

                            $("#toast_message").text(response["message"]);
                            $("#toast").addClass("valid-bg");
                            $("#toast").animate({
                                left: "3vw"
                            }, 700, function () {
                                setTimeout(function () {
                                    $("#toast").animate({
                                        left: "-20vw"
                                    }, 1000, function () {
                                        $("#toast_message").text("");
                                        $("#toast").removeClass("valid-bg");
                                    });
                                }, 700);
                            });
                        } else {
                            $("#toast_message").text(response["message"]);
                            $("#toast").addClass("invalid-bg");
                            $("#toast").animate({
                                left: "3vw"
                            }, 700, function () {
                                setTimeout(function () {
                                    $("#toast").animate({
                                        left: "-20vw"
                                    }, 1000, function () {
                                        $("#toast_message").text("");
                                        $("#toast").removeClass("invalid-bg");
                                    });
                                }, 700);
                            });
                        }
                    }
                }
                catch (error) { }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Handle any errors that occurred during the request
                $("#toast_message").text("Error while canceling the order");
                $("#toast").addClass("invalid-bg");
                $("#toast").animate({
                    left: "3vw"
                }, 700, function () {
                    setTimeout(function () {
                        $("#toast").animate({
                            left: "-20vw"
                        }, 1000, function () {
                            $("#toast_message").text("");
                            $("#toast").removeClass("invalid-bg");
                        });
                    }, 700);
                });
            }
        });
    }
    catch (error) { }
}

function ApproveOrder(order_id, element) {
    try {
        $.ajax({
            url: "../controllers/orders_controller.php",
            method: "POST",
            data: {
                action: "approve-order",
                order_id: order_id
            },
            success: function (response) {
                // Handle the successful response from the server
                try {
                    response = JSON.parse(response);
                    if (response.hasOwnProperty("status")) {
                        if (response["status"]) {
                            $(element).parent().parent().children('.status:first').text(`${response["order_status"]}`);
                            $(element).parent().html(`<span class='valid-color'>${response["order_status"]}</span>`);

                            $("#toast_message").text(response["message"]);
                            $("#toast").addClass("valid-bg");
                            $("#toast").animate({
                                left: "3vw"
                            }, 700, function () {
                                setTimeout(function () {
                                    $("#toast").animate({
                                        left: "-20vw"
                                    }, 1000, function () {
                                        $("#toast_message").text("");
                                        $("#toast").removeClass("valid-bg");
                                    });
                                }, 700);
                            });
                        } else {
                            $("#toast_message").text(response["message"]);
                            $("#toast").addClass("invalid-bg");
                            $("#toast").animate({
                                left: "3vw"
                            }, 700, function () {
                                setTimeout(function () {
                                    $("#toast").animate({
                                        left: "-20vw"
                                    }, 1000, function () {
                                        $("#toast_message").text("");
                                        $("#toast").removeClass("invalid-bg");
                                    });
                                }, 700);
                            });
                        }
                    }
                }
                catch (error) { }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Handle any errors that occurred during the request
                $("#toast_message").text("Error while approving the order");
                $("#toast").addClass("invalid-bg");
                $("#toast").animate({
                    left: "3vw"
                }, 700, function () {
                    setTimeout(function () {
                        $("#toast").animate({
                            left: "-20vw"
                        }, 1000, function () {
                            $("#toast_message").text("");
                            $("#toast").removeClass("invalid-bg");
                        });
                    }, 700);
                });
            }
        });
    }
    catch (error) { }
}

function RejectOrder(order_id, element) {
    try {
        $.ajax({
            url: "../controllers/orders_controller.php",
            method: "POST",
            data: {
                action: "reject-order",
                order_id: order_id
            },
            success: function (response) {
                // Handle the successful response from the server
                try {
                    response = JSON.parse(response);
                    if (response.hasOwnProperty("status")) {
                        if (response["status"]) {
                            $(element).parent().parent().children('.status:first').text(`${response["order_status"]}`);
                            $(element).parent().html(`<span class='invalid-color'>${response["order_status"]}</span>`);

                            $("#toast_message").text(response["message"]);
                            $("#toast").addClass("valid-bg");
                            $("#toast").animate({
                                left: "3vw"
                            }, 700, function () {
                                setTimeout(function () {
                                    $("#toast").animate({
                                        left: "-20vw"
                                    }, 1000, function () {
                                        $("#toast_message").text("");
                                        $("#toast").removeClass("valid-bg");
                                    });
                                }, 700);
                            });
                        } else {
                            $("#toast_message").text(response["message"]);
                            $("#toast").addClass("invalid-bg");
                            $("#toast").animate({
                                left: "3vw"
                            }, 700, function () {
                                setTimeout(function () {
                                    $("#toast").animate({
                                        left: "-20vw"
                                    }, 1000, function () {
                                        $("#toast_message").text("");
                                        $("#toast").removeClass("invalid-bg");
                                    });
                                }, 700);
                            });
                        }
                    }
                }
                catch (error) { }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Handle any errors that occurred during the request
                $("#toast_message").text("Error while rejecting the order");
                $("#toast").addClass("invalid-bg");
                $("#toast").animate({
                    left: "3vw"
                }, 700, function () {
                    setTimeout(function () {
                        $("#toast").animate({
                            left: "-20vw"
                        }, 1000, function () {
                            $("#toast_message").text("");
                            $("#toast").removeClass("invalid-bg");
                        });
                    }, 700);
                });
            }
        });
    }
    catch (error) { }
}