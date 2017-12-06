<?php
    session_start();
    require "../../class/Sanitize.php";
    require "../../class/QueryBuilder.php";

    if(isset(
        $_SESSION["user_id"],
        $_POST["cart"],
        $_POST["total"],
        $_POST["mop"],
        $_POST["mopi"],
        $_POST["address"]
    )){
        $query = new QueryBuilder();  
        $cust_id = $_SESSION["user_id"];
        $mop  = $_POST["mop"];
        $mopi = $_POST["mopi"];
        $item = $_POST["cart"];
        $total = $_POST["total"];
        $address = $_POST["address"];
        $date = date("Y, F j g:i a");
        $input = [$cust_id, $mop, $mopi, $item, $total, $address,$date];
        $sql = "INSERT INTO tbl_order(cust_id,mop,mopi,item,total,address,date) VALUES(?,?,?,?,?,?,?)";     
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