<?php
    session_start();
    require "../../class/Sanitize.php";
    require "../../class/QueryBuilder.php";

    $query = new QueryBuilder();
    if(isset($_POST["pw"])){
        $id = $_SESSION["user_id"];
        $pw = password_hash($_POST["pw"], PASSWORD_DEFAULT);
    
        $sql = "UPDATE tbl_user SET pw=? WHERE id=?";
        $input = [$pw,$id];
        $result = $query->set_data($sql,$input);
     
        if($result == true){
            echo "success";
        }
        else{
            echo "error";
        }
     
    }
    else{
        echo "no post data";
    }

    
?>