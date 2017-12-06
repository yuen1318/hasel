<?php
session_start();
require "../../class/Sanitize.php";
require "../../class/QueryBuilder.php";

if(isset($_SESSION["user_id"])){
    $query = new QueryBuilder();
    $sql = "SELECT * FROM tbl_order WHERE cust_id=?";
    $input = [$_SESSION["user_id"]];
    
    $table = $query->get_data($sql, $input);
    
    foreach ($table as $row) {
    
        echo "<tr><td>$row[id]</td><td class='name'>";
        $arr =json_decode($row["item"], TRUE);
    
        foreach((array) $arr as $value){
            echo"$value[name] (&#8369; $value[price]) x $value[count] = &#8369; $value[total]<br>"; 
        }
        echo "</td>
              <td>$row[address]</td>
              <td>&#8369; $row[total]</td>
              <td class='date'>$row[date]</td>
              </tr>";
    }//end of foreach
}else{
    echo "your are not logged in";
}
?>        

  

