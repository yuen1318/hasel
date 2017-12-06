<?php require "../../model/session_user.php";?>
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
    <?php require "partials/side_nav2.php";?>
    <main>

        <div class="row">
            <div class="col s12 m12 l12">
                <br>
                <h5>Manage Account</h5>
            </div>
        </div>


        <form id="frm_update_account">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card">
                        <input class="hide" type="text" name="id" value="<?php echo $_SESSION['user_id'] ?>">
                        <div class="row">
                            <br>
                            <div class="col s12 m4 l4">
                                <label>First Name</label>
                                <input type="text" name="fn" value="<?php echo $_SESSION['user_fn'] ?>">
                            </div>
                            <div class="col s12 m4 l4">
                                <label>Middle Name</label>
                                <input type="text" name="mn" value="<?php echo $_SESSION['user_mn'] ?>">
                            </div>
                            <div class="col s12 m4 l4">
                                <label>Last Name</label>
                                <input type="text" name="ln" value="<?php echo $_SESSION['user_ln'] ?>">
                            </div>
                        </div>
                        <!--row-->

                        <div class="row">
                            <br>
                            <div class="col s12 m4 l4">
                                <label class="active">Gender</label>
                                <select name="gender" class="browser-default">
                                    <option value="<?php echo $_SESSION['user_gender'] ?>" selected>Default</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col s12 m4 l4">
                                <label>Mobile</label>
                                <input type="number" name="mobile" value="<?php echo $_SESSION['user_mobile'] ?>">
                            </div>
                            <div class="col s12 m4 l4">
                                <label>Email</label>
                                <input type="text" name="email" value="<?php echo $_SESSION['user_email'] ?>">
                            </div>

                        </div>

                        <div class="row">
                            <br>
                            <div class="col s12 m12 l12">
                                <label>Address</label>
                                <input type="text" name="address" value="<?php echo $_SESSION['user_address'] ?>">
                            </div>
                        </div>
                        <!--row-->
                        <br>


                    </div>
                    <!--card-->
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col s12 m6 l6">
                <a href="#modal_update_password" class="modal-trigger right btn waves-effect indigo" id="">Change Password</a>
            </div>
            <div class="col s12 m6 l6">
                <button type="button" class="right btn waves-effect indigo" id="btn_update_account">Submit</button>
            </div>
        </div>

        <!-- Modal Password -->
        <div id="modal_update_password" class="modal">

            <form id="frm_update_password">
                <div class="modal-content">

                    <h5>Update Password</h5>
                    <br>


                    <div class="row hide">
                        <div class="col s12 m12 l12">
                            <label>ID</label>
                            <input type="text" name="id" readonly value="<?php echo $_SESSION['user_id'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m6 l6 input-field">
                            <label for="pw">Password</label>
                            <input type="password" name="pw" id="pw">
                        </div>
                        <div class="col s12 m6 l6 input-field">
                            <label for="rpw">Re-enter Password</label>
                            <input type="password" name="rpw" id="rpw">
                        </div>
                    </div>


                </div>
            </form>

            <div class="modal-footer">
                <button class="btn waves-effect indigo" id="btn_update_password">Submit</button>
            </div>
        </div>

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
    $(function () {

        $('#btn_update_account').on('click', function () { //validate on btn click
            if ($("#frm_update_account").valid()) { //check if all field is valid
                update_account("../../model/tbl_user/update/update_account.php","#frm_update_account");
            } else {
                $('.val').addClass('animated bounceIn');
                $('.val').one(
                    'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                    function () {
                        $('.val').removeClass('animated');
                    });
            } //end of else   
        }); //end of btn click

        $('#btn_update_password').on('click', function () { //validate on btn click
            if ($("#frm_update_password").valid()) { //check if all field is valid
                update_password("../../model/tbl_user/update/update_password.php",
                    "#frm_update_password");
            } else {
                $('.val').addClass('animated bounceIn');
                $('.val').one(
                    'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                    function () {
                        $('.val').removeClass('animated');
                    });
            } //end of else   
        }); //end of btn click


        $("#frm_update_account").validate({ //form validation
            rules: {
                fn: {
                    required: true
                },
                ln: {
                    required: true
                },
                mn: {
                    required: true
                },
                gender: {
                    required: true
                },
                address: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    number: true
                }
            }, //end of rules

            messages: {
                fn: {
                    required: "<small class='right val red-text'>This field is required</small>"
                },
                ln: {
                    required: "<small class='right val red-text'>This field is required</small>"
                },
                mn: {
                    required: "<small class='right val red-text'>This field is required</small>"
                },
                gender: {
                    required: "<small class='right val red-text'>This field is required</small>"
                },
                address: {
                    required: "<small class='right val red-text'>This field is required</small>"
                },
                email: {
                    required: "<small class='right val red-text'>This field is required</small>",
                    email: "<small class='right val red-text'>Must be a valid Email Address</small>"
                },
                mobile: {
                    required: "<small class='right val red-text'>This field is required</small>",
                    number: "<small class='right val red-text'>Must be numeric value</small>"
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

        $("#frm_update_password").validate({ //form validation
            rules: {
                pw: {
                    required: true,
                    nowhitespace: true,
                    minlength: 6
                },
                rpw: {
                    required: true,
                    nowhitespace: true,
                    equalTo: "#pw"
                },
            }, //end of rules

            messages: {
                pw: {
                    required: "<small class='right val red-text'>This field is required</small>",
                    nowhitespace: "<small class='right val red-text'>White spaces are invalid</small>",
                    minlength: "<small class='right val red-text'>Minimum password character is 6</small>"
                },
                rpw: {
                    required: "<small class='right val red-text'>This field is required</small>",
                    nowhitespace: "<small class='right val red-text'>White spaces are invalid</small>",
                    equalTo: "<small class='right val red-text'>Password didn't match</small>"
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
    function update_account(model_url, form_name) {
        $.ajax({
            url: model_url,
            method: "POST",
            data: $(form_name).serialize(),
            dataType: "text",
            success: function (Result) {
                if (Result == "success") {
                    $('.modal').modal('close');

                    swal({
                        title: 'Success',
                        text: "Account Updated",
                        type: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonClass: 'btn waves-effect indigo',
                        buttonsStyling: false,
                        allowOutsideClick: false
                    }).then(function () {
                        // Redirect the user
                        window.location.href = "account.php";
                    }); //end of swal

                } else {
                    Materialize.toast("An Error Occured", 8000, 'red');
                }

            } //end of success function
        }) //end of ajax
    } //end of add_patient


    function update_password(model_url, form_name) {
        $.ajax({
            url: model_url,
            method: "POST",
            data: $(form_name).serialize(),
            dataType: "text",
            success: function (Result) {
                if (Result == "success") {
                    $('.modal').modal('close');

                    swal({
                        title: 'Success',
                        text: "Password Updated",
                        type: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonClass: 'btn waves-effect indigo',
                        buttonsStyling: false,
                        allowOutsideClick: false
                    }).then(function () {
                        // Redirect the user
                        window.location.href = "account.php";
                    }); //end of swal

                } else {
                    Materialize.toast("An Error Occured", 8000, 'red');
                }

            } //end of success function
        }) //end of ajax
    } //end of add_patient
</script>

</html>