$(document).ready(function(){
    $('.fv-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        items: 1,
        autoplay: true,
        autoplayTimeout:5000, 
        autoplayHoverPause:false,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        mouseDrag: false,
        touchDrag: false
    })

    $('.testimonial-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay: true,
        autoplayTimeout:5000, 
        autoplayHoverPause:false,
        // animateIn: 'fadeIn',
        // animateOut: 'fadeOut',
        // mouseDrag: false,
        // touchDrag: false
        responsive : {
            0 : {
                items : 1,
            },
            768 : {
                items : 2,
            },

            1000: {
                items: 3
            }
        }
    })
    
    $('.gallery-carousel').owlCarousel({
        loop:true,
        margin:2,
        nav:true,
        autoplay: true,
        autoplayTimeout:5000, 
        autoplayHoverPause:false,
        // animateIn: 'fadeIn',
        // animateOut: 'fadeOut',
        // mouseDrag: false,
        // touchDrag: false,
        responsive : {
            0 : {
                items : 1,
            },
            768 : {
                items : 2,
            },

            1000: {
                items: 3
            }
        }
    });
    

    if($(".order-parent").children().length < 4) {
        console.log('Less then or equal to 3')   
   }else {
        $('.order-container').slice(5).addClass('hide');
        $('.hide').hide();
   }

   $(".load-more-btn").on("click", function(){
    $(this).val() == "Load more" ? play_int() : play_pause();
        $('.hide').slideToggle();
   })

   function play_int() {
    $('.load-more-btn').val("Show less");
}

function play_pause() {
    $('.load-more-btn').val("Load more");
}

$('.review-carousel').owlCarousel({
    loop:true,
        margin:10,
        nav:true,
        items: 1,
        autoplay: true,
        autoplayTimeout:5000, 
        autoplayHoverPause:false,
})


});


$(document).ready(function(){
    // $(".payment_mode").click(function(){
    //     // var myname = $("input[name=myname]").val();
    //     // var city = $("input[name=city]").val();
    //     var payment_mode = $("input[name='payment_mode']:checked").val();

    //     $.ajax({
    //         url: "updates/js/ajax_sample.php",
    //         type: "POST",
    //         data: {payment_mode:payment_mode},
    //         success:function(data){
    //            var totaldata = parseInt(data) + 1;
    //            $("#result").html(totaldata);
    //             // console.log(totaldata);
    //         }
    //     })
    // })

            $("#totalPriceV2").hide();
    $('.payment_mode').change(function(){
        if (this.checked && this.value == 'COD') {
            $("#totalPrice").hide();
            $("#totalPriceV2").show();
            $pricePerKm = $("#pricePerKm").text();
            $totalPrice = $("#totalPrice").text();
            $sumTotal = parseInt($totalPrice) + parseInt($pricePerKm);
            $("#totalPriceV2").text($sumTotal.toFixed());
        }
    });
    $('.payment_mode').change(function(){
        if (this.checked && this.value == 'Pick_Up') {
            $("#totalPrice").show();
            $("#totalPriceV2").hide();

        }
    })
})