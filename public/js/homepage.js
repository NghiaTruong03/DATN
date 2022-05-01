$(document).ready(function () {
    $('.add-to-cart').on('click', function () {
        let productId = $(this).attr('data-id');
        let url = addCartUrl;
        $.ajax({
            url: url.replace('__id__', productId),
            type: 'GET',
            success: function (res) {
                if (res.status) {
                    $('.toast').toast('show');
                    let quantity = $('#quantity-product-' + res.product_id).data('quantity') + 1;
                    $('#quantity-product-' + res.product_id).data('quantity', quantity)
                    $('#quantity-product-' + res.product_id).text(quantity);
                }

            }
        })
    })

})



function requireLogin() {
    alert("Yêu cầu đăng nhập để mua hàng");
}
