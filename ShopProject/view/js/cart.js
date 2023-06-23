function add_to_cart(item_id, quantity) {
    try {
        $.ajax({
            url: "../controllers/items_controller.php",
            method: "POST",
            data: {
                action: "add-to-cart",
                item_id: item_id,
                quantity: quantity
            },
            success: function (response) {
                // Handle the successful response from the server
                response = JSON.parse(response);
                if (response.hasOwnProperty("status")) {
                    if (response["status"]) {
                        $(".cart-items-number").each(function () {
                            $(this).text(`${response["items_count"]}`);
                        });
                    }
                }
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
    if (parseInt(input.val()) <= 0)
        return;
    input.val(parseInt(input.val()) - 1);
}

function validate_item_number(element) {
    if (parseInt($(element).val()) < 0)
        $(element).val(0);
    else if (parseInt($(element).val()) > 100)
        $(element).val(100);
}