$(document).ready(function () {

   //Quantity
   $(document).on('click','.increment-btn', function (e) {
    e.preventDefault();

    var qty = $(this).closest('.product_data').find('.input-qty').val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if(value < 10)
    {
        value++;
        $(this).closest('.product_data').find('.input-qty').val(value);
    }
    
});

$(document).on('click','.decrement-btn', function (e) {
    e.preventDefault();

    var qty = $(this).closest('.product_data').find('.input-qty').val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 1)
    {
        value--;
        $(this).closest('.product_data').find('.input-qty').val(value);
    }
    
});

$(document).on('click','.updateQty', function (e) {
    e.preventDefault();

    var qty = $(this).closest('.product_data').find('.input-qty').val();
    var prod_id = $(this).closest('.product_data').find('.prodId').val();

    $.ajax({
        method: "POST",
        url: "functions/handlecart.php",
        data: {
            "prod_id": prod_id,
            "prod_qty": qty,
            "scope": "update"
        },
        success: function (response){
            // Update ngayon
                location.reload();
        }
    });
});

$('.addToCartBtn').click(function (e) {
    e.preventDefault();

    var qty = $(this).closest('.product_data').find('.input-qty').val();
    var prod_id = $(this).val();

    // alert(prod_id);
    $.ajax({
        method: "POST",
        url: "functions/handlecart.php",
        data: {
           "prod_id": prod_id,
           "prod_qty": qty,
           "scope": "add"
        },
        success: function(response){

            if(response == 201)
            {
                alertify.success("Product added to cart");
            }
            else
            {
                alertify.success("Something went wrong.");
            }
        }
    });
});



 


});