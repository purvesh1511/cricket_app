function applyCoupon(token) {
    let couponCode = $('#c_code').val();
    if(couponCode.length > 0) {
        $.ajax({
            url: "apply-coupon",
            type: "POST",
            data: {
                _token: token,
                code: couponCode
            },
            success: function(applyCouponResponse) {
                $('#c_code').val('');
                if(applyCouponResponse.status == 'Invalid Coupon Code') {
                    iziToast.show({
                        messageColor: '#FFFFFF',
                        backgroundColor: '#dc3545',
                        message: applyCouponResponse.status
                    });
                }else if(applyCouponResponse.status == 'Coupon Code Not Activated Yet') {
                    iziToast.show({
                        messageColor: '#FFFFFF',
                        backgroundColor: '#dc3545',
                        message: applyCouponResponse.status
                    });
                }else if(applyCouponResponse.status == 'Coupon Code Expired') {
                    iziToast.show({
                        messageColor: '#FFFFFF',
                        backgroundColor: '#dc3545',
                        message: applyCouponResponse.status
                    });
                }else if(applyCouponResponse.status == 'Coupon Not Applicable') {
                    iziToast.show({
                        messageColor: '#FFFFFF',
                        backgroundColor: '#dc3545',
                        message: applyCouponResponse.status
                    });
                }else if(applyCouponResponse.status == 'Coupon Applied') {
                    $('#couponCodeWrap').html('<small class="text-success"><b>Congrats!</b> Your Coupon Code "'+applyCouponResponse.code+'" Applied</small>');
                    iziToast.show({
                        messageColor: '#FFFFFF',
                        backgroundColor: '#28a745',
                        message: 'Coupon Applied'
                    });
                    $('#couponDiscount').html('- ₹'+(Math.round(applyCouponResponse.coupon_discount * 100) / 100).toFixed(2));
                    $('#grandTotal').html('₹'+(Math.round((applyCouponResponse.grand_total) * 100) / 100).toFixed(2));
                }else {
                    return null;
                }
            },
            error: function(applyCouponErrors) {
                console.log(applyCouponErrors);
            }
        });
    }
}