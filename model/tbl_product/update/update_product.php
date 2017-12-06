<?php
    require "../../session_admin.php";
    require "../../class/Sanitize.php";
    require "../../class/QueryBuilder.php";

    if(isset(
        $_POST["id"],
        $_POST["name"],
        $_POST["description"],
        $_POST["price"],
        $_POST["quantity"],
        $_POST["tag"]
    )){
        $query = new QueryBuilder();
        $id = $_POST["id"];
        $name = ucwords(sanitize($_POST["name"]));
        $description = sanitize($_POST["description"]);
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $tag = $_POST["tag"];

        if($_POST["image_proxy"] != ""){
            //image file
            $image = $_FILES["image"];
        
            //get file extension of image
            $file_ext = explode("." , $image["name"]);
            $file_ext = strtolower(end($file_ext) );
        
            //create a unique id for image name
            $image_name = uniqid('img_', true);
            $image_name = str_replace(".", "", $image_name);
            $image_name = $image_name . "." . $file_ext;
            $directory = "../../../DB/img/";
        
            $upload_image = $query->upload_sf($image, $image_name , $directory);
        
            $sql = "UPDATE tbl_product SET image=?,name=?,description=?,price=?,quantity=?,tag=? WHERE id=?";
            $input = [$image_name,$name,$description,$price,$quantity,$tag,$id];
            $update_product = $query->set_data($sql,$input);
        
            if($upload_image == true && $update_product == true){
                echo "success";
            }
            else{
                echo "error";
            }
        
        }//end of if

        else{

            $sql = "UPDATE tbl_product SET name=?,description=?,price=?,quantity=?,tag=? WHERE id=?";
            $input = [$name,$description,$price,$quantity,$tag,$id];
            $update_product = $query->set_data($sql,$input);

            if($update_product == true){
                echo "success";
            }
            else{
                echo "error";
            }
        }

}//end of isset
else{
    echo "no post data";
}
?>