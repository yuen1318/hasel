
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
            background-image: linear-gradient(to top, #9795f0 0%, #fbc8d4 100%);
        }
  </style>
</head>

<body>
<div class="bg valign-wrapper" style="width:100%;height:100%;position: absolute;" id="div_login">
        <div class="valign" style="width:100%;">
            <div class="container">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class=" card grey lighten-3 z-depth-5">

                            <div class="card-content">
                                <form id="frm_signup" name="frm_signup">

                                    <div class="row">
                                       <div class="col s12 m12 l12 center">
                                       <a href="index.php" class="center-align">
                                            <img  src="../../img/logob.png"  width="40%" height="100px">
                                        </a>
                                       </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12 m4 l4">
                                            <input class="indigo-text " name="fn" id="fn" type="text">
                                            <label class="indigo-text " for="fn">First Name</label>
                                        </div>
                                        <div class="input-field col s12 m4 l4">
                                            <input class="indigo-text " name="mn" id="mn" type="text">
                                            <label class="indigo-text " for="mn">Middle Name</label>
                                        </div>

                                        <div class="input-field col s12 m4 l4">
                                            <input class="indigo-text " name="ln" id="ln" type="text">
                                            <label class="indigo-text " for="ln">Last Name</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col s12 m6 l6">
                                            <label class="active indigo-text ">Gender</label>
                                            <select name="gender" class="indigo-text  grey lighten-3 browser-default">
                                                <option disabled selected>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        <div class="input-field col s12 m6 l6">
                                            <input class="indigo-text " name="un" id="un" type="text">
                                            <label class="indigo-text " for="un">Username</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12 m6 l6">
                                            <input class="indigo-text " name="pw" id="pw" type="password">
                                            <label class="indigo-text " for="pw">Password</label>
                                        </div>
                                        <div class="input-field col s12 m6 l6">
                                            <input class="indigo-text " name="rpw" id="rpw" type="password">
                                            <label class="indigo-text " for="rpw">Re-enter Password</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12 m6 l6">
                                            <input class="indigo-text " name="mobile" id="mobile" type="number">
                                            <label class="indigo-text " for="mobile">Mobile</label>
                                        </div>
                                        <div class="input-field col s12 m6 l6">
                                            <input class="indigo-text " name="email" id="email" type="text">
                                            <label class="indigo-text " for="email">Email</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12 m12 l12">
                                            <input class="indigo-text " name="address" id="address" type="text">
                                            <label class="indigo-text " for="address">Address</label>
                                        </div>
                                    </div>

                            </div>

                            <div class="card-action">
                                <button type="button" class="btn waves-effect indigo lighten-1 z-depth-3" id="btn_signup" style="width:100% !important">Create Account</button>
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
 $(document).ready(function () {
    
            $('#btn_signup').on('click', function () { //validate on btn click
                if ($("#frm_signup").valid()) { //check if all field is valid
                    register_user("../../model/tbl_user/insert/add_user.php", "#frm_signup");
               
                } else {
                    $('.val').addClass('animated bounceIn');
                    $('.val').one(
                        'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                        function () {
                            $('.val').removeClass('animated');
                        });
                } //end of else
            }); //end of btn click
    
            $("#frm_signup").validate({ //form validation
                rules: {
                    un: {
                        required: true
                    },
                    fn: {
                        required: true
                    },
                    ln: {
                        required: true
                    },
                    mn: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
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
                    gender: {
                        required: true
                    },
                    mobile: {
                        required: true,
                        number: true,
                        maxlength: 11
                    },
                    address: {
                        required: true
                    }
                }, //end of rules
        
                messages: {
                    un: {
                        required: "<small class='right val red-text'>This field is required</small>"
                    },
                    fn: {
                        required: "<small class='right val red-text'>This field is required</small>"
                    },
                    ln: {
                        required: "<small class='right val red-text'>This field is required</small>"
                    },
                    mn: {
                        required: "<small class='right val red-text'>This field is required</small>"
                    },
                    email: {
                        required: "<small class='right val red-text'>This field is required</small>",
                        email: "<small class='right val red-text'>Must be a valid Email Address</small>"
                    },
                    pw: {
                        required: "<small class='right val red-text'>This field is required</small>",
                        nowhitespace: "<small class='right val red-text'>White spaces are invalid</small>",
                        minlength: "<small class='right val red-text'>Minimum password character is 6</small>"
                    },
                    rpw: {
                        required: "<small class='right val red-text'>This field is required</small>",
                        nowhitespace: "<small class='right val red-text'>White spaces are invalid</small>",
                        equalTo: "<small class='right val red-text'>Password didn't match</small>"
                    },
                    gender: {
                        required: "<small class='right val red-text'>This field is required</small>"
                    },
                    mobile: {
                        required: "<small class='right val red-text'>This field is required</small>",
                        number: "<small class='right val red-text'>Numbers Only</small>",
                        maxlength: "<small class='right val red-text'>Maximum length is 11</small>"
                    },
                    address: {
                        required: "<small class='right val red-text'>This field is required</small>"
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
        function register_user(model_url, form_name) {
            $.ajax({
                url: model_url,
                method: "POST",
                data: $(form_name).serialize(),
                dataType: "text",
                success: function (Result) {
                    if (Result == "success") {
                        swal({
                            title: 'Success',
                            text: "Registration Successfull!",
                            type: 'success',
                            confirmButtonText: 'Ok',
                            confirmButtonClass: 'btn waves-effect indigo ligthen-1',
                            buttonsStyling: false,
                            allowOutsideClick: false
                        }).then(function() {
                            // Redirect the user
                            window.location.href = "login.php";
                        }); //end of swal
                    } 
                    else if(Result == "exist"){
                        swal({
                            title: 'Error',
                            text: "Username already exist",
                            type: 'error',
                            confirmButtonText: 'Ok',
                            confirmButtonClass: 'btn waves-effect indigo ligthen-1',
                            buttonsStyling: false,
                            allowOutsideClick: false
                        });
                    }
                    else {
                        alert("error");
                    }
    
                } //end of success function
            }) //end of ajax
        } //end of auth_tbl_user
</script>

</html>