<?php
    require '../../model/session_admin.php';
    require '../../model/class/QueryBuilder.php';
    $query = new QueryBuilder();
    $id = $_GET["id"];
    $sql = "SELECT * FROM tbl_product WHERE id=?";  
    $input =[$id];
    $row = $query->get_data_assoc($sql, $input);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="../../assets/qs/font.css">
<link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
<link rel="stylesheet" href="../../assets/materialize/css/myStyle.css">
<link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
<link rel="stylesheet" href="../../assets/materialize/css/animate.css">
<link rel="stylesheet" href="../../assets/holdon/holdon.min.css">
<link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">
<title>Document</title>
</head>

<body class="blue-grey lighten-5">
<?php require "partials/nav.php"; 
      require "partials/side_nav2.php";?>

<main><br><br>
    <form id="frm_update_product">
        <div class="row">
            <div class="col s12 m4 l4">
                <img src="../../DB/img/<?php echo $row["image"]; ?>" height="250px">

                <input class="hide" name="id" type="text" value="<?php echo $row["id"]; ?>">

                <div class="file-field input-field col s12 m6 l6 ">
                    <div class="btn indigo right">
                        <span>Image</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper hide">
                        <input class="file-path validate" type="text" name="image_proxy">
                    </div>
                </div>
            </div>
        
            <div class="col s12 m8 l8">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $row["name"]; ?>">
                    </div>

                    <div class="col s12 m6 l6">
                        <label>Price</label>
                        <input type="number" name="price" value="<?php echo $row["price"]; ?>">
                    </div>
                </div>

                <div class="row">
                <div class="col s12 m6 l6">
                    <label class="active ">Tag</label>
                    <select name="tag" class=" grey lighten-3 browser-default">
                        <option selected value="<?php echo $row["tag"]; ?>">Default</option>
                        <option value="long sleeves">Long Sleeves</option>
                        <option value="polo">Polo</option>
                        <option value="t-shirt">T-Shirt</option>
                        <option value="shorts">Shorts</option>
                        <option value="jacket">Jacket</option>
                        <option value="skirt">Skirt</option>
                    </select>
                </div>

                <div class="col s12 m6 l6">
                    <label for="quantity">Quantity</label>
                    <input name="quantity" id="quantity" type="number" value="<?php echo $row["quantity"]; ?>">   
                </div>

                <div class="row">        
                    <div class="col s12 m12 l12">
                        <label>Description</label>
                        <input type="text" name="description" value="<?php echo $row["description"]; ?>">
                    </div>
                </div>


            </div>

            </div><br><br>

            <button type="button" class="btn waves-effect indigo right" id="btn_update_product">Submit</button>

        </div>

    </form>
</main>






</body>
<script src="../../assets/jquery/jquery.min.js"></script>
<script src="../../assets/jquery/jquery.validate.min.js"></script>
<script src="../../assets/jquery/jquery.additionalMethod.min.js"></script>
<script src="../../assets/materialize/js/materialize.min.js"></script>
<script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
<script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
<script src="../../controller/init.js" charset="utf-8"></script>
<script src="../../assets/holdon/holdon.min.js"></script>
<script src="../../assets/sweetalert2/sweetalert2.min.js"></script>
<script>
$(document).ready(function () {
  


$('#btn_update_product').on('click', function () { //validate on btn click
    if ($("#frm_update_product").valid()) { //check if all field is valid
        update_product("../../model/tbl_product/update/update_product.php", "#frm_update_product");
    } else {
        $('.val').addClass('animated bounceIn');
        $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        $('.val').removeClass('animated');
        });
    } //end of else   
}); //end of btn click




 $("#frm_update_product").validate({ //form validation
    rules: {
        name: {
            required: true
        },
        description: {
            required: true
        },
        quantity: {
            required: true
        },
        tag: {
            required: true
        },
        price: {
            required: true,
            number : true 
        } 
    }, //end of rules

    messages: {
        name: {
            required: "<small class='right val red-text'>This field is required</small>"
        },
        description: {
            required: "<small class='right val red-text'>This field is required</small>"
        },
        quantity: {
            required: "<small class='right val red-text'>This field is required</small>"
        },
        tag: {
            required: "<small class='right val red-text'>This field is required</small>"
        },
        price: {
            required: "<small class='right val red-text'>This field is required</small>",
            number: "<small class='right val red-text'>Must be numeric value</small>"
        }     
    }, //end of messages

    errorElement: 'div',
    errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        } //end of errorElement
}); //end of validate


}); //end of document.ready

//FUNCTIONS


function update_product(model_url, form_name){
  var formData = new FormData($(form_name)[0]);
            var options = {
                theme:"sk-bounce",
                message:"Uploading image, this will take a while...",
                backgroundColor:"#212121",
                textColor:"white"
            };   
           HoldOn.open(options);
            $.ajax({
                url: model_url,
                type: 'POST',
                data: formData,
                async: true,
                success: function(data) {
                  
                  if(data == "success"){
                    swal({
                        title: 'Success',
                        text: "Product Record Updated",
                        type: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonClass: 'btn waves-effect indigo',
                        buttonsStyling: false,
                        allowOutsideClick: false
                    }).then(function() {
                        // Redirect the user
                        window.location.href = "home.php";
                    }); //end of swal

                  }
                  else{
                    Materialize.toast("An Error Occured", 8000, 'red');
                  }
                },//end of success
                complete: function(){
                  HoldOn.close();  
                },
                cache: false,
                contentType: false,
                processData: false
            }); //end of ajax
            return false;
}//end of add_data
</script>