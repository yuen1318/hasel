<?php require "../../model/session_admin.php";?>
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
    <link rel="stylesheet" href="../../assets/holdon/holdon.min.css">

    <title>Document</title>
</head>

<body class=" blue-grey lighten-5">
    <?php require "partials/nav.php"; ?>
    <?php require "partials/side_nav2.php";?>

    <main>
        <br>
        <br>
        <div class="row">

            <div class="col s12 m12 l12" id="list_product">
                <!--Table-->
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5>Manage Product</h5>
                    </div>
                    <div class="col s12 m6 l6">
                        <label>Search </label>
                        <input type="text" class="search">
                    </div>
                </div>



                <table class="bordered centered striped responsive-table">
                    <thead>
                        <tr>
                            <th class="hide">ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Tag</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <!--end of thead-->

                    <tbody class="list" id="tbl_product"></tbody>
                    <!--end of tbody-->
                </table>
                <!--end of table-->

                <tfoot>
                    <tr>
                        <td>
                            <ul class="pagination center"></ul>
                        </td>
                    </tr>
                </tfoot>
                <!--end of tfoot-->
            </div>
            <!--end of col s12-->

            <div class="not-found" style="display:none">
                <br>
                <br>
                <h1 class="center">Sorry no results found</h1>
                <br>
            </div>
        </div>



        <div class="fixed-action-btn vertical">
            <a href="#modal_add_product" class="btn-floating btn-large indigo btn modal-trigger tooltipped waves-effect " data-position="left"
                data-delay="50" data-tooltip="Add Product">
                <span class="fa fa-plus fa-lg"></span>
            </a>
        </div>

    </main>

    <?php require "partials/modal_product.php"; ?>
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
<script src="../../assets/holdon/holdon.min.js"></script>
<script>
    $(document).ready(function () {

        manage_product("../../model/tbl_product/select/manage_product.php", "#tbl_product");

        $('.search').on('keyup', function (event) { // Fired on 'keyup' event
            if ($('.list').children().length === 0) { // Checking if list is empty
                $('.not-found').css('display', 'block'); // Display the Not Found message
            } else {
                $('.not-found').css('display', 'none'); // Hide the Not Found message
            }
        });

        $('#btn_add_product').on('click', function () { //validate on btn click
            if ($("#frm_add_product").valid()) { //check if all field is valid
                add_product("../../model/tbl_product/insert/add_product.php", "#frm_add_product");
                $('#frm_add_product')[0].reset();
                $('.modal').modal('close');
            } else {
                $('.val').addClass('animated bounceIn');
                $('.val').one(
                    'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                    function () {
                        $('.val').removeClass('animated');
                    });
            } //end of else   
        }); //end of btn click




        $(document).on('click', '.p_delete', function () {
            //bind html5 data attributes to variables
            var id = $(this).attr('data-delete_id')
            //set values to id
            $('#d1').val(id);
            //show modal
            $('#modal_delete').modal('open');
        }); //end of onclick

        $(document).on('click', '#btn_delete', function () {
            delete_product("../../model/tbl_product/delete/delete_product.php", "#frm_delete_product");
        }); //end of onclick


        $("#frm_add_product").validate({ //form validation
            rules: {
                image_proxy: {
                    required: true
                },
                name: {
                    required: true
                },
                description: {
                    required: true
                },
                price: {
                    required: true,
                    number: true
                },
                quantity: {
                    required: true,
                    number: true
                },
                tag: {
                    required: true 
                }
            }, //end of rules

            messages: {
                image_proxy: {
                    required: "<small class='right val red-text'>This field is required</small>"
                },
                name: {
                    required: "<small class='right val red-text'>This field is required</small>"
                },
                description: {
                    required: "<small class='right val red-text'>This field is required</small>"
                },
                price: {
                    required: "<small class='right val red-text'>This field is required</small>",
                    number: "<small class='right val red-text'>Must be numeric value</small>"
                },
                quantity: {
                    required: "<small class='right val red-text'>This field is required</small>",
                    number: "<small class='right val red-text'>Must be numeric value</small>"
                },
                tag: {
                    required: "<small class='right val red-text'>This field is required</small>"
                }
            }, //end of messages

            errorElement: 'div',
            errorPlacement: function (error, element) {
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



    function delete_product(model_url, form_name) {
        $.ajax({
            url: model_url,
            method: "POST",
            data: $(form_name).serialize(),
            dataType: "text",
            success: function (Result) {
                if (Result == "success") {
                    $('.modal').modal('close');
                    Materialize.toast("Product Successfully Deleted", 8000, 'indigo');
                    manage_product("../../model/tbl_product/select/manage_product.php", "#tbl_product");
                } else {
                    Materialize.toast("An Error Occured", 8000, 'red');
                }

            } //end of success function
        }) //end of ajax
    } //end of add_patient

    function manage_product(model_url, html_class_OR_id) {
        $.ajax({
            url: model_url,
            method: "GET",
            success: function (Result) {
                //push the result on id or class
                $(html_class_OR_id).html(Result);
            }, //end of success function
            complete: function () {
                //initialize pagination after data loaded
                $('.materialboxed').materialbox();
                var monkeyList = new List('list_product', {
                    valueNames: ['s1', 's2', 's3', 's4', 's5'],
                    page: 7,
                    plugins: [ListPagination({})]
                });
            } //end of complete function
        }) //end of ajax
    } //end of select_publish_powerpoint



    function add_product(model_url, form_name) {
        var formData = new FormData($(form_name)[0]);
        var options = {
            theme: "sk-bounce",
            message: "Uploading image, this will take a while...",
            backgroundColor: "#212121",
            textColor: "white"
        };
        HoldOn.open(options);
        $.ajax({
            url: model_url,
            type: 'POST',
            data: formData,
            async: true,
            success: function (data) {
                if (data == "success") {
                    Materialize.toast("Product Successfully Added", 8000, 'indigo');
                } else {
                    Materialize.toast("An Error Occured", 8000, 'red');
                }
            }, //end of success
            complete: function () {
                HoldOn.close();
                manage_product("../../model/tbl_product/select/manage_product.php", "#tbl_product");
            },
            cache: false,
            contentType: false,
            processData: false
        }); //end of ajax
        return false;
    } //end of add_data
</script>

</html>