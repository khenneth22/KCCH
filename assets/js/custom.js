$(document).ready(function (){

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

    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();
        var add_ons = [];
        var add_ons_total = $(this).val();
        $('.add_ons').each(function(){
            if($(this).is(":checked")){
                add_ons.push($(this).val());
            }
        });
        add_ons_total = add_ons.length * 15;
        add_ons = add_ons.toString();
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "add_ons": add_ons,
                "add_ons_total": add_ons_total,
                "scope": "add"
            },
            success: function (response){
                if(response == 201)
                {
                    window.location="cart.php";
                    alertify.success("Product added to cart");
                    setTimeout(function(){
                        location.reload();    
                    }, 500);                
                }
                else if(response == "existing")
                {
                    alertify.success("Already added to cart");
                }
                else if(response == 401)
                {
                    alertify.success("Login to continue");
                    location.href="login.php";
                    
                }
                else if(response == 500)
                {
                    alertify.success("Something went wrong!");
                }
                
            }

        });
        
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

    $(document).on('click','.deleteItems', function() {
        var cart_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "cart_id": cart_id,    
                "scope": "delete"
            },
            success: function (response){
                if(response == 200)
                {
                    
                    alertify.success("Item removed");
                    $('#mycart').load(location.href + " #mycart");
                }
                else
                {
                    alertify.success(response);

                }
            }
        });
    });
  

});

