$(document).ready(function(event) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('body').on('submit', '#form-comment', function(event) {
        event.preventDefault();
        var productId = $('input[name="productId"]').val(),
        userId = $('input[name="userId"]').val(),
        content = $('textarea[name="content"]').val();

        $.ajax({
            url: '/comment',
            type: 'POST',
            dataType: 'JSON',
            data: { productId: productId, userId: userId, content: content },
            success: function(data) {
                if (data.status == 1) {
                    $("#mydiv").load(location.href + " #mydiv");
                }
            }
        });
    });

    $('body').on('click', '.add-to-cart',  function(event) {
        event.preventDefault();
        var productId = $(this).attr('data-product-id');
        $.ajax({
            url: '/cart/add',
            type: 'post',
            data: { productId: productId },
            success: function(data) {
                $('.cart-icon').html(data);
            }   
        });
    });

})