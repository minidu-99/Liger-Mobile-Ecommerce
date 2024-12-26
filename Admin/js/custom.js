$(document).ready(function () {
    
    $(document).on('click', '.delete_prod_btn', function (e) { 
        e.preventDefault();

        var id = $(this).val();

        // alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'product_id':id,
                        'delete_prod_btn':true,
                    },
                    
                    success: function (response) {
                        console.log(response);
                        if(response == 200)
                        {
                        
                            swal("Success !", "Product Deleted Successfully !", "success");
                            $("#product-table").load(location.href + " #product-table");
                        }else if(response == 500)
                        {
                            swal("Error !", "Something went Wrong !", "error");
                        }
                    
                    }
              });
            } 
          });
        
    });


    $(document).on('click', '.delete_cat_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        // alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'category_id':id,
                        'delete_cat_btn':true,
                    },
                    
                    success: function (response) {
                        console.log(response);
                        if(response == 200)
                        {
                        
                            swal("Success !", "Category Deleted Successfully !", "success");
                            $("#category-table").load(location.href + " #category-table");
                        }else if(response == 500)
                        {
                            swal("Error !", "Something went Wrong !", "error");
                        }
                    
                    }
              });
            } 
          });
        
    });
});