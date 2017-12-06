<?php
require "DB.php";
date_default_timezone_set('Asia/Manila');
class QueryBuilder extends DB{

    public function auth($sql, $input){ 
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute($input);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if($count == 1){
            return $results;
        }
        else{
            return null;
        }    
    }//end of method

    public function get_data($sql, $input){
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute($input);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }//end of method

    public function get_data_assoc($sql, $input){
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute($input);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }//end of method

    public function set_data($sql, $input){  
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute($input);
        if($stmt){//success
            return true;
        }
        else{//failed
            return false;
        }
    }//end of method

    
    public function upload_sf($file, $name , $directory){
        
        $file_name = $file['name'];//get the filename
        $file_tmp = $file['tmp_name'];//get the file itself
        $file_size = $file['size'];//get the file size
        $file_error = $file['error'];//check if there is a file error
        $file_id = $name;//set the unique file name
              
        $full_file = $directory . $file_id;
        
        //if file size is lessthan 2mb and had no error
        if ($file_size <= 2000000 && $file_error === 0)  {
            move_uploaded_file($file_tmp , $full_file);
            return true;
        }
        else{
            return false;
        }
    }//end of method

}//end of class
?>