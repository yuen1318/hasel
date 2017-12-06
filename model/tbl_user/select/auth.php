<?php
    session_start();
    require "../../class/Sanitize.php";
    require '../../class/QueryBuilder.php';

    if(isset($_POST["un"],$_POST["pw"] )){
        $query = new QueryBuilder();
        
            $un = sanitize($_POST["un"]);
            $pw = $_POST["pw"];
        
            $sql = "SELECT * FROM tbl_user WHERE un=?";
            $input = [$un];
            $row = $query->auth($sql, $input);
        
            if(password_verify($pw, $row["pw"])){
                echo "success";   
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["user_un"] = $row["un"];
                $_SESSION["user_fn"] = $row["fn"];
                $_SESSION["user_mn"] = $row["mn"];
                $_SESSION["user_ln"] = $row["ln"];
                $_SESSION["user_gender"] = $row["gender"];
                $_SESSION["user_mobile"] = $row["mobile"];
                $_SESSION["user_email"] = $row["email"];
                $_SESSION["user_address"] = $row["address"];
            }
            else{
                echo "error";
            }
    }
    else{
        echo "no post data";
    }
?>