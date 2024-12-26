const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);


// increment decrement btns

$(document).ready(function () {
   
   
   
   
  $(document).on('click', '.increment-btn', function (e) {
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


   $(document).on('click', '.decrement-btn', function (e) {
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

  
    $(document).on('click', '.addtoCart-btn', function (e) { 
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();

       

        $.ajax({
            type: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id" : prod_id,
                "prod_qty": qty,
                "scope": "add",
            },
            success: function (response) {

                if(response == 201)
                {
                    alertify.success("Product Added to cart");
                }else if(response == "existing")
                {
                    alertify.success("Product already in the cart");
                }else if(response == 401)
                {
                   
                    alertify.success("Log in to continue !");
                }else if(response == 500)
                {
                    alertify.success("Something went wrong !");
                }
                
            }
        });
        
    });

    $(document).on("click",".updateQty", function () {

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).closest('.product_data').find('.prodId').val();



        $.ajax({
            type: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id" : prod_id,
                "prod_qty": qty,
                "scope": "update"
            },
            
            success: function (response) {
                // alert(response);
                
            }
        });
        
    });

    
    $(document).on('click', '.deleteItem', function () {

        var cart_id = $(this).val();
        // alert(cart_id);

        $.ajax({
            type: "POST",
            url: "functions/handlecart.php",
            data: {
                "cart_id" : cart_id,
                "scope": "delete"
            },
            
            success: function (response) {
                // alert(response);

                if(response == 200)
                {
                    alertify.success("Item deleted successfully !");
                    $('#myCart').load(location.href + " #myCart")
                }else{
                    alertify.success(response);
                }
                
            }
        });
        
    });



    $("#livesearch").keyup(function (e) { 
        var input = $(this).val();
        //alert(input);

        if(input != "")
        {
            $.ajax({
                type: "POST",
                url: "livesearch.php",
                data: {input:input},
                
                success: function (data) {
                    $("#searchresult").html(data);
                }
            });
        }else
        {
            $("#searchresult").css("display","none");
        }
        
    });
});