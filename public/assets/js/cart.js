$("#addToCartForm").on("submit", function (event) {
    event.preventDefault();
    if ($("#Quantity").length) {
        let quantity = parseInt($("#Quantity").val());
        if (quantity > 0) {
            let cartForm = $("#addToCartForm")[0];
            let cartFormData = new FormData(cartForm);
            $.ajax({
                url: "add-to-cart",
                processData: false,
                contentType: false,
                type: "POST",
                data: cartFormData,
                success: function (addToCartResponse) {
                    if(addToCartResponse.status == 'Exceeds Available Stocks') {
                        iziToast.show({
                            messageColor: '#FFFFFF',
                            backgroundColor: '#dc3545',
                            message: 'Exceeds Available Stocks'
                        });
                    }
                    if(addToCartResponse.status == 'Added to Cart') {
                        $('#stockCount').html('<span class="text-success">'+addToCartResponse.stock+'</span>');
                        if(event.originalEvent.submitter.name == 'buy_now') {
                            window.location.href = 'cart';
                        }else {
                            iziToast.show({
                                messageColor: '#FFFFFF',
                                backgroundColor: '#28a745',
                                message: 'Added to Cart'
                            });
                            
                            if($('.menuCartCount').length) {
                                $('.menuCartCount').html(addToCartResponse.cart_count);
                            }
                        }
                    }
                },
                error: function (addToCartErrors) {
                    console.log(addToCartErrors);
                },
            });
        }
    }
});
function quantityUpdateDecrement(el) {
    if(parseInt($(el).parent().parent().find('input').val()) > 1) {
        $(el).parent().parent().find('input').val(parseInt($(el).parent().parent().find('input').val()) - 1);   
    }
}
function quantityUpdateIncrement(el) {
    $(el).parent().parent().find('input').val(parseInt($(el).parent().parent().find('input').val()) + 1);
}
