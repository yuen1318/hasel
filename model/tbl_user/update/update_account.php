<?php
    session_start();
    require "../../class/Sanitize.php";
    require "../../class/QueryBuilder.php";

    if(isset(
        $_POST["fn"],
        $_POST["mn"],
        $_POST["ln"],
        $_POST["email"],
        $_POST["gender"],
        $_POST["mobile"],
        $_POST["address"]
    )){
        $query = new QueryBuilder();
        $id = $_SESSION["user_id"];

        $fn = ucfirst(sanitize($_POST["fn"]));
        $mn = ucfirst(sanitize($_POST["mn"]));
        $ln = ucfirst(sanitize($_POST["ln"]));
        $gender = sanitize($_POST["gender"]);
        $email = sanitize($_POST["email"]);
        $mobile = sanitize($_POST["mobile"]);
        $address = sanitize($_POST["address"]);

        $sql = "UPDATE tbl_user SET fn=?,mn=?,ln=?,gender=?,email=?,mobile=?,address=? WHERE id=?";
        $input = [$fn,$mn,$ln,$gender,$email,$mobile,$address,$id];
        $result = $query->set_data($sql,$input);
    
        if($result == true){
            echo "success";
            $_SESSION["user_id"] = $id;
            $_SESSION["user_fn"] = $fn;
            $_SESSION["user_mn"] = $mn;
            $_SESSION["user_ln"] = $ln;
            $_SESSION["user_gender"] = $gender;
            $_SESSION["user_mobile"] = $mobile;
            $_SESSION["user_email"] = $email;
            $_SESSION["user_address"] = $address;
        }
        else{
            echo "error";
        }
    }else{
        echo "no post data";
    }
    
    
?>