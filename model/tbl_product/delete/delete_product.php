<?php
    require "../../session_admin.php";
    require "../../class/Sanitize.php";
    require "../../class/QueryBuilder.php";

    if(isset($_POST["id"])){
        $query = new QueryBuilder();
        $id = $_POST["id"];

        $sql = "DELETE FROM tbl_product WHERE id=?";
        $input = [$id];
        $delete = $query->set_data($sql,$input);
    
        if($delete == true){
            echo "success";
        }
        else{
            echo "error";
        } 
    }  
?>