<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/qs/font.css">
    <link rel="stylesheet" href="../../assets/materialize/css/animate.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/myStyle.css">
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">

    <title>Document</title>
</head>

<body class=" blue-grey lighten-5">
    <?php require "partials/nav.php"; ?>
    <?php require "partials/side_nav.php";?>

    <main>
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h4>Cart list</h4>
                    </div>

                    <div class="col s12 m6 l6">
                        <p class="right">Shipping fee: &#8369; 100</p>
                    </div>
                </div>
                <table class="bordered bordered centered striped responsive-table">
                    <thead>
                        <tr>
                            <th colspan='2'>Item</th>
                            <th>Quantity & Price</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody id="show-cart"></tbody>

                    <tfoot>
                        <tr>
                            <td id="total-cart"></td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>

        <div class="row container">
            <?php
        if(isset($_SESSION["user_un"])){
            echo "<a href='#modal_order' class='right btn waves-effect indigo modal-trigger right'>Buy</a>";
        }
        else{
            echo "<a href='login.php' class='btn waves-effect indigo right'>Login to buy</a>";
        }?>
        </div>

        <form id="frm_order">
            <!-- Modal Structure -->
            <div id="modal_order" class="modal ">

                <div class="modal-content">

                    <div class="row">
                        <div class="col s12 m6 l6 ">
                            <h5>Mode of Payment</h5>
                        </div>
                        <div class="col s12 m6 l6 ">
                            <p class="right">Shipping fee: &#8369; 100</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m6 l6">
                            <p>
                                <input name="mop" type="radio" id="mop1" checked/>
                                <label for="mop1">
                                    <i class="fa fa-truck fa-2x"></i>&emsp;Cash on Delivery</label>
                            </p>
                            <p>
                                <input name="mop" type="radio" id="mop2" />
                                <label for="mop2">
                                    <i class="fa fa-cc-visa fa-2x"></i>&emsp;Credit Card</label>
                            </p>

                        </div>

                        <div class="col s12 m6 l6">
                            <label for="mopi" id="mopi_label">Address</label>
                            <input type="text" name="mopi" id="mopi">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m12 l12 input-field">
                            <label for="address">Shipping Address</label>
                            <input type="text" name="address" id="address" value="<?php echo $_SESSION["user_address"]?>">
                        </div>
                    </div>

                    <div class="row hide">

                        <div class="col s12 m6 l6 ">
                            <label for="cart">Cart</label>
 
                            <textarea name="cart" id="cart"></textarea>
                        </div>

                        <div class="col s12 m6 l6 ">
                            <label for="total">Total</label>
                            <input type="number" name="total" id="total">
                        </div>
                    </div>


                </div>
                <!--end of modal content-->

                <div class="modal-footer">
                    <button type='button' class='btn waves-effect indigo' id='btn_submit'>Submit</button>
                </div>

            </div>

        </form>

    </main>
</body>

<script src="../../assets/jquery/jquery.min.js"></script>
<script src="../../assets/jquery/jquery.validate.min.js"></script>
<script src="../../assets/jquery/jquery.additionalMethod.min.js"></script>
<script src="../../assets/materialize/js/materialize.min.js"></script>
<script src="../../assets/sweetalert2/sweetalert2.min.js"></script>
<script src="../../assets/listjs/list.min.js"></script>
<script src="../../assets/listjs/list.pagination.min.js"></script>
<script src="../../assets/shoppingcart/shoppingCart.js"></script>
<script src="../../controller/init.js"></script>
<script>
    $(document).ready(function () {
 
        var address = $("#address").val();
            $("#mopi").val(address);
        $('#mop1').change(function () {
            $("#mopi_label").html("Address");
            $('#mopi').get(0).type = 'text';
            var address = $("#address").val();
            $("#mopi").val(address);
        });

        $('#mop2').change(function () {
            $("#mopi_label").html("Credit Cart No.");
            $('#mopi').get(0).type = 'number';
        });

 
 
        displayCart();
        $('.materialboxed').materialbox();

        $('#btn_submit').on('click', function () { //validate on btn click
            if ($("#frm_order").valid()) { //check if all field is valid
            var cart =JSON.stringify(shoppingCart.listCart());
            var total =parseFloat(shoppingCart.totalCart()) + 100.00;
            $("#cart").val(cart);
            $("#total").val(total);
                add_order("../../model/tbl_order/insert/add_order.php", "#frm_order");

            } else {
                $('.val').addClass('animated bounceIn');
                $('.val').one(
                    'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                    function () {
                        $('.val').removeClass('animated');
                    });
            } //end of else   
        }); //end of btn click




        $("#frm_order").validate({ //form validation
            rules: {
                address: {
                    required: true
                },
                mop: {
                    required: true
                },
                mopi: {
                    required: true
                }
            }, //end of rules

            messages: {
                address: {
                    required: "<small class='right val red-text'>This field is required</small>"
                },
                mop: {
                    required: "<small class='right val red-text'>This field is required</small>"
                },
                mopi: {
                    required: "<small class='right val red-text'>This field is required</small>"
                }
            }, //end of messages

            errorElement: 'div',
            errorPlacement: function (error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).text(error)
                } else {
                    error.insertAfter(element);
                }
            } //end of errorElement
        }); //end of validate




        $("#show-cart").on("click", ".delete-item", function (event) {
            var name = $(this).attr("data-name");
            shoppingCart.removeItemFromCartAll(name);
            displayCart();
        });

        $("#show-cart").on("click", ".subtract-item", function (event) {
            var name = $(this).attr("data-name");
            shoppingCart.removeItemFromCart(name);
            displayCart();
        });

        $("#show-cart").on("click", ".plus-item", function (event) {
            var img = $(this).attr("data-img");
            var name = $(this).attr("data-name");
            shoppingCart.addItemToCart(img, name, 0, 1);
            displayCart();
        });

        $("#show-cart").on("change", ".item-count", function (event) {
            var name = $(this).attr("data-name");
            var count = Number($(this).val());
            shoppingCart.setCountForItem(name, count);
            displayCart();
        });


        function displayCart() {
            var cartArray = shoppingCart.listCart();
            console.log(cartArray);
            var output = "";

            for (var i in cartArray) {
                output +=
                    "<tr>" +
                    "<td><img class='materialboxed' src='../../DB/img/" + cartArray[i].img +
                    "' style='height:50px !important; margin:0px !important;'></td>" +
                    "<td>" + cartArray[i].name + "</td>" +
                    "<td><input style='width:80px !important;' class='center-align item-count' type='number' data-name='" +
                    cartArray[i].name +
                    "' value='" + cartArray[i].count + "' >" +
                    "&emsp; x &emsp; &#8369;" + cartArray[i].price +
                    "&emsp; = &emsp; &#8369; " + cartArray[i].total + "</td>" +
                    "<td><a href='#' class='indigo-text fa fa-plus plus-item fa-lg' data-name='" +
                    cartArray[i].name + "'></a></td>" +
                    "<td><a href='#' class='indigo-text subtract-item fa fa-minus fa-lg' data-name='" +
                    cartArray[i].name + "'></a></td>" +
                    "<td><a href='#' class='indigo-text fa fa-times delete-item fa-lg' data-name='" +
                    cartArray[i].name + "'></a></td>" +
                    "</span></tr>";
            }
            output += "<td colspan='6' id='total-cart' class='right-align'></td>"

            $("#show-cart").html(output);
            $("#total-cart").html("Total: &#8369;" + (parseFloat(shoppingCart.totalCart()) + 100.00));

            if (shoppingCart.countCart() == 0) {
                $("#count-cart").html("");
            } else {
                $("#count-cart").html(
                    "&nbsp;<span style='font-family:roboto !important; font-size:15px !important;' class='red white-text'>&nbsp;" +
                    shoppingCart.countCart() + "&nbsp;</span>");
            }

        }
    }); //end of document.ready

    //function

    function add_order(model_url, form_name) {
        $.ajax({
                url: model_url,
                method: "POST",
                data: $(form_name).serialize(),
                dataType: "text",
                success: function (Result) {
                    if (Result == "success") {
                        shoppingCart.clearCart();
                        swal({
                            title: 'Success',
                            text: "Ready for shipping",
                            type: 'success',
                            confirmButtonText: 'Ok',
                            confirmButtonClass: 'btn waves-effect indigo',
                            buttonsStyling: false,
                            allowOutsideClick: false
                        }).then(function () {
                            // Redirect the user
                            window.location.href = "index.php";
                        }); //end of swal
                    } else {
                        alert("error");
                    }
            } //end of success function
        }) //end of ajax
    } //end of auth_tbl_user
</script>

</html>