<?php
session_start();
require "model/class/Sanitize.php";
require "model/class/QueryBuilder.php";


    $query = new QueryBuilder();
    $sql = "SELECT * FROM tbl_order";
    $input = [null];

    $sql1 = "SELECT * FROM tbl_product";
    $input1 = [null];

    $table1 = $query->get_data($sql1, $input1);
    
    var_dump($table1);
    
    /*$table = $query->get_data($sql, $input);
    
    foreach ($table as $row) {
    
        $arr =json_decode($row["item"], TRUE);
    
        foreach((array) $arr as $value){
            if($value["name"] == "apple" && $value["count"]== "3")
                echo "ss";
            }  
    }//end of foreach
*/
?>        
