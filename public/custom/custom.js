$(document).ready(function () {
    $('.increment-btn').click(function (e) {
    e.preventDefault();
    // var inc_value = $('.qty-input').val();
    var inc_value = $(this).closest('.product_data').find('.qty-input').val();
    var value = parseInt(inc_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value < 10)
    {
        value++;
        // $('.qty-input').val(value);
        $(this).closest('.product_data').find('.qty-input').val(value);
    }
    });

    $('.decrement-btn').click(function (e) {
    e.preventDefault();
    var dec_value =  $(this).closest('.product_data').find('.qty-input').val();
    var value = parseInt(dec_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 1)
    {
        value--;
        $(this).closest('.product_data').find('.qty-input').val(value);
    }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.changeQuantity').click(function (e) {
        e.preventDefault();
        var qty =  $(this).closest('.product_data').find('.qty-input').val();

        data = {
            "banyak" : qty,
            "_token": "{{ csrf_token() }}",
        }

        $.ajax({
            method: "POST",
            url: "update-detail-pesanan",
            data: data,
            success: function (response){
                alert(response)
            }
        });
    });

});
