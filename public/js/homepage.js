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
                }else{
                    // alert('Thêm mới thất bại');
                }

            }
        })
    })
    
    // alert(product_id);
    // loadComment();
    // function loadComment(){
    //     var product_id = $('.product_id').val();
    //     var _token = $(' input[name= "_token"] ').val();
    //     $.ajax({
    //         url: "{{url('/loadComment')}}",
    //         method: "POST",
    //         data:{product_id:product_id, _token:_token},
    //         success: function (data){
    //             $('#comment_show').html(data);
    //         }
    //     })
    // }

    // $('#btn-comment').click(function (ev) {
    //     ev.preventDefault();
    //     let content = $('#comment-content').val();
    //     let _commentnUrl = '{{route("loadComment")}}';
    //     console.log(content);
    //     console.log(_commentnUrl);

    // })

})



function requireLogin() {
    alert("Yêu cầu đăng nhập để mua hàng");
}
