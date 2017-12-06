<?php
    require "../../session_admin.php";
    require "../../class/Sanitize.php";
    require "../../class/QueryBuilder.php";

    if(isset(
        $_POST["name"],
        $_POST["description"],
        $_POST["price"],
        $_POST["quantity"],
        $_POST["tag"]
    )){
        $query = new QueryBuilder();
        
            $name = ucwords(sanitize($_POST["name"]));
            $description = sanitize($_POST["description"]);
            $price = $_POST["price"];
            $tag = sanitize($_POST["tag"]);
            $quantity = $_POST["quantity"];
        
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
        
            $sql = "INSERT INTO tbl_product(image,name,description,price,tag,quantity) VALUES(?,?,?,?,?,?)";
            $input =[$image_name,
                    $name,
                    $description,
                    $price,
                    $tag,
                    $quantity];
            $add_product = $query->set_data($sql,$input);
         
            if($upload_image == true && $add_product == true){
                echo "success";
            }
            else{
                echo "error";
            }
         
    }//end of isset
    
?>