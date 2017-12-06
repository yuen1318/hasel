<?php
session_start();
require "../../class/Sanitize.php";
require "../../class/QueryBuilder.php";

if(isset($_SESSION["admin_id"])){
    $query = new QueryBuilder();
    $sql = "SELECT o.id, o.item, o.total, o.address, o.date, u.fn, u.mn, u.ln 
            FROM tbl_order AS o
            JOIN tbl_user AS u
            ON o.cust_id = u.id";
    $input = null;
    
    $table = $query->get_data($sql, $input);
    
    foreach ($table as $row) {
    
        echo "<tr><td>$row[id]</td>
            <td class='s1'>$row[fn] $row[mn] $row[ln]</td>
            <td class='s2'>";
        $arr =json_decode($row["item"], TRUE);
    
        foreach((array) $arr as $value){
            echo"$value[name] (&#8369; $value[price]) x $value[count] = &#8369; $value[total]<br>"; 
        }
        echo "</td>
              <td>$row[address]</td>
              <td>&#8369; $row[total]</td>
              <td class='s3'>$row[date]</td>
              </tr>";
    }//end of foreach
}else{
    echo "your are not logged in";
}
?>        

  

