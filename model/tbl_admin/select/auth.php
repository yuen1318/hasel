<?php
    session_start();
    require "../../class/Sanitize.php";
    require '../../class/QueryBuilder.php';

    if(isset($_POST["un"],$_POST["pw"] )){
        $query = new QueryBuilder();
        
            $un = sanitize($_POST["un"]);
            $pw = $_POST["pw"];
        
            $sql = "SELECT * FROM tbl_admin WHERE un=?";
            $input = [$un];
            $row = $query->auth($sql, $input);
        
            if(password_verify($pw, $row["pw"]) && $row["status"]=="active"){
                echo "success";   
                $_SESSION["admin_id"] = $row["id"];
                $_SESSION["admin_un"] = $row["un"];
                $_SESSION["admin_fn"] = $row["fn"];
                $_SESSION["admin_mn"] = $row["mn"];
                $_SESSION["admin_ln"] = $row["ln"];
                $_SESSION["admin_gender"] = $row["gender"];
                $_SESSION["admin_mobile"] = $row["mobile"];
                $_SESSION["admin_email"] = $row["email"];
                $_SESSION["admin_address"] = $row["address"];
            }
            else{
                echo "error";
            }
    }
    else{
        echo "no post data";
    }
?>