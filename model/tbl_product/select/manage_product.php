<?php
    require "../../session_admin.php";
    require "../../class/Sanitize.php";
    require "../../class/QueryBuilder.php";

    $query = new QueryBuilder();
    $sql = "SELECT * FROM tbl_product";   
    $input = NULL;
    $table = $query->get_data($sql, $input);

    
    foreach ($table as $row) {
       
            echo 
            "<tr>
            <td class='hide'>$row[id]</td>
            <td><img class='materialboxed' style='width: 60px !important; height: auto !important;' src='../../DB/img/$row[image]'></td>

            <td class='s1'>$row[name]</td>
            <td class='s2'>$row[description]</td>
            <td class='s3'>$row[price]</td>
            <td class='s4'>$row[quantity]</td>
            <td class='s5'>$row[tag]</td>

            <td> <a href='update_product.php?id=$row[id]' class='indigo-text fa fa-pencil fa-lg'></a>  </td>

            <td class=''> 
            <a href='#' class='indigo-text fa fa-times fa-lg p_delete' 
            data-delete_id='$row[id]'></a>  
            </td>
  
            </tr>";
 
      }//end of foreach
?>