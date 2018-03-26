$(document).ready(function () {
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $(".upCart").click(function(e){
        e.preventDefault();
        var rowid = $(this).attr('data-row-id');
        var qty = $(this).parent().find('.qty').val();

        $.ajax({
            url:'updateCart',
            type:'POSt',
            dataType: 'JSON',
            data:{rowid:rowid, qty:qty},
            success:function(data){
                if (data.status == 1) { 
                location.reload();
                }
            }
        });
    });


    
});