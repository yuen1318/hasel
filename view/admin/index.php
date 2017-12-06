<?php 
    session_start();
    if(isset($_SESSION["admin_id"])){
        header("location:home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../assets/qs/font.css">
  <link rel="stylesheet" href="../../assets/materialize/css/animate.css">
  <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
  <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">
  <title>Document</title>
  <style>
        .bg {
            background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
  </style>
</head>

<body>

<div class="bg valign-wrapper" style="width:100%;height:100%;position: absolute;">
        <div class="valign" style="width:100%;">
            <div class="container">
                <div class="row">
                    <div class="col s12 m4 offset-m4">
                        <div class=" card grey lighten-3 z-depth-5">

                            <div class="card-content">
                                <form id="frm_login">
                                    
                                    <div class="center">
                                        <a href="index.php">
                                            <img class="center-align" src="../../img/logob.png" width="100%" height="100px">
                                        </a>
                                        
                                    </div>
                                    
                                     

                                    <div class="row">
                                        <div class="input-field col s12 m12 l12">
                                            <input class="indigo-text" name="un" id="un" type="text">
                                            <label class="indigo-text" for="un"><span class="fa fa-user fa-lg"></span>&emsp;Username</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12 m12 l12">
                                            <input class="indigo-text" name="pw" id="pw" type="password">
                                            <label class="indigo-text" for="pw"><span class="fa fa-key fa-lg"></span>&emsp;Password</label>
                                        </div>
                                    </div>

                                    <div id="error_login">
                                        <small class='right val red-text hide animated bounceIn'>Invalid Email or Password</small>
                                    </div>


                            </div>

                            <div class="card-action">                      
                                <button type="button" class="btn waves-effect indigo lighten-1 z-depth-3" id="btn_login" style="width:100% !important">Log In</button><br>
                            </div>
                            <div class="center-align">
                            <a href="signup.php" class="indigo-text ">Don't have an account?</a><br><br>
                            </div>
                            
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="../../assets/jquery/jquery.min.js"></script>
<script src="../../assets/jquery/jquery.validate.min.js"></script>
<script src="../../assets/jquery/jquery.additionalMethod.min.js"></script>
<script src="../../assets/materialize/js/materialize.min.js"></script>
<script src="../../assets/sweetalert2/sweetalert2.min.js"></script>
<script>
$(document).ready(function() {
    
        $('#btn_login').on('click', function() { //validate on btn click
            if ($("#frm_login").valid()) { //check if all field is valid
                auth_admin("../../model/tbl_admin/select/auth.php", "#frm_login");
            } else {
                $('.val').addClass('animated bounceIn');
                $('.val').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                    $('.val').removeClass('animated');
                });
            } //end of else
        }); //end of btn click
    
        $("#frm_login").validate({ //form validation
            rules: {
                un: {
                    required: true
                },
                pw: {
                    required: true,
                    nowhitespace: true
                }
            }, //end of rules
            messages: {
                un: {
                    required: "<small class='right val red-text'>This field is required</small>"
                },
                pw: {
                    required: "<small class='right val red-text'>This field is required</small>",
                    nowhitespace: "<small class='right val red-text'>White spaces are invalid</small>"
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
    
    ///////////////////////////////Functions/////////////////////////////////
    function auth_admin(model_url, form_name) {
        $.ajax({
                url: model_url,
                method: "POST",
                data: $(form_name).serialize(),
                dataType: "text",
                success: function(data) {
                    if($.trim(data) == "success"){
                        location.href = "home.php";
                    }
                    else{
                        $("#error_login small").removeClass("hide");
                    }
                
                } //end of success function
            }) //end of ajax
    } //end of auth_tbl_user
</script>

</html>