function AddToCart(item_id, element) {
    try {
        const quantity = $(element).parent().children('.quantity-container:first').children('input:first').val();
        $.ajax({
            url: "../controllers/cart_controller.php",
            method: "POST",
            data: {
                action: "add-to-cart",
                item_id: item_id,
                quantity: quantity
            },
            success: function (response) {
                // Handle the successful response from the server
                try {
                    response = JSON.parse(response);
                    if (response.hasOwnProperty("status")) {
                        if (response["status"]) {
                            $(".cart-items-number").each(function () {
                                $(this).text(`${response["items_count"]}`);
                            });
                            $(element).parent().children('.quantity-container:first').children('input:first').val(1);

                            $("#toast_message").text(response["message"]);
                            //$("#toast").css("display", "block");
                            $("#toast").addClass("valid-bg");
                            $("#toast").animate({
                                left: "3vw"
                            }, 700, function () {
                                setTimeout(function () {
                                    $("#toast").animate({
                                        left: "-20vw"
                                    }, 1000, function () {
                                        $("#toast_message").text("");
                                        //$("#toast").css("display", "none");
                                        $("#toast").removeClass("valid-bg");
                                    });
                                }, 700);
                            });
                        } else {
                            $("#toast_message").text(response["message"]);
                            //$("#toast").css("display", "block");
                            $("#toast").addClass("invalid-bg");
                            $("#toast").animate({
                                left: "3vw"
                            }, 700, function () {
                                setTimeout(function () {
                                    $("#toast").animate({
                                        left: "-20vw"
                                    }, 1000, function () {
                                        $("#toast_message").text("");
                                        //$("#toast").css("display", "none");
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
            }
        });
    }
    catch (error) { }
}

function ClearCart() {
    try {
        $.ajax({
            url: "../controllers/cart_controller.php",
            method: "GET",
            data: {
                action: "clear"
            },
            success: function (response) {
                // Handle the successful response from the server
                try {
                    response = JSON.parse(response);
                    if (response.hasOwnProperty("status")) {
                        if (response["status"]) {
                            $(".cart-items-number").each(function () {
                                $(this).text(`${response["items_count"]}`);
                            });

                            $("#toast_message").text(response["message"]);
                            //$("#toast").css("display", "block");
                            $("#toast").addClass("valid-bg");
                            $("#toast").animate({
                                left: "3vw"
                            }, 700, function () {
                                setTimeout(function () {
                                    $("#toast").animate({
                                        left: "-20vw"
                                    }, 1000, function () {
                                        $("#toast_message").text("");
                                        //$("#toast").css("display", "none");
                                        $("#toast").removeClass("valid-bg");
                                    });
                                }, 700);
                            });
                        } else {
                            $("#toast_message").text(response["message"]);
                            //$("#toast").css("display", "block");
                            $("#toast").addClass("invalid-bg");
                            $("#toast").animate({
                                left: "3vw"
                            }, 700, function () {
                                setTimeout(function () {
                                    $("#toast").animate({
                                        left: "-20vw"
                                    }, 1000, function () {
                                        $("#toast_message").text("");
                                        //$("#toast").css("display", "none");
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
            }
        });
    }
    catch (error) { }
}

function Order() {
    try {
        $.ajax({
            url: "../controllers/orders_controller.php",
            method: "GET",
            data: {
                action: "order"
            },
            success: function (response) {
                // Handle the successful response from the server
                try {
                    response = JSON.parse(response);
                    if (response.hasOwnProperty("status")) {
                        if (response["status"]) {
                            $(".cart-items-number").each(function () {
                                $(this).text(`${response["items_count"]}`);
                            });

                            $("#toast_message").text(response["message"]);
                            //$("#toast").css("display", "block");
                            $("#toast").addClass("valid-bg");
                            $("#toast").animate({
                                left: "3vw"
                            }, 700, function () {
                                setTimeout(function () {
                                    $("#toast").animate({
                                        left: "-20vw"
                                    }, 1000, function () {
                                        $("#toast_message").text("");
                                        //$("#toast").css("display", "none");
                                        $("#toast").removeClass("valid-bg");
                                    });
                                }, 700);
                            });
                        }
                        else {
                            $("#toast_message").text(response["message"]);
                            //$("#toast").css("display", "block");
                            $("#toast").addClass("invalid-bg");
                            $("#toast").animate({
                                left: "3vw"
                            }, 700, function () {
                                setTimeout(function () {
                                    $("#toast").animate({
                                        left: "-20vw"
                                    }, 1000, function () {
                                        $("#toast_message").text("");
                                        //$("#toast").css("display", "none");
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
            }
        });
    }
    catch (error) { }
}

function increment(element) {
    const input = $(element).parent().children("input:first");
    if (parseInt(input.val()) >= 100)
        return;
    input.val(parseInt(input.val()) + 1);
}

function decrement(element) {
    const input = $(element).parent().children("input:first");
    if (parseInt(input.val()) <= 1)
        return;
    input.val(parseInt(input.val()) - 1);
}

function validate_item_number(element) {
    if (parseInt($(element).val()) < 1)
        $(element).val(1);
    else if (parseInt($(element).val()) > 100)
        $(element).val(100);
}