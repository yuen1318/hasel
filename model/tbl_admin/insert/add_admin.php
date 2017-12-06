<?php
    require "../../class/Sanitize.php";
    require "../../class/QueryBuilder.php";



    if(isset(
        $_POST["un"],
        $_POST["pw"],
        $_POST["fn"],
        $_POST["mn"],
        $_POST["ln"],
        $_POST["email"],
        $_POST["gender"],
        $_POST["mobile"],
        $_POST["address"]
    )){
        $query = new QueryBuilder();
        
        $un = sanitize($_POST["un"]);
        $pw = password_hash($_POST["pw"], PASSWORD_DEFAULT);
        $fn = ucfirst(sanitize($_POST["fn"]));
        $mn = ucfirst(sanitize($_POST["mn"]));
        $ln = ucfirst(sanitize($_POST["ln"]));
        $email = sanitize($_POST["email"]);
        $gender = sanitize($_POST["gender"]);
        $mobile = sanitize($_POST["mobile"]);
        $address = sanitize($_POST["address"]);

        $sql1 ="SELECT * FROM tbl_admin WHERE un=?";
        $input1 =[$un];

        $count = $query->auth($sql1,$input1);

        if($count == null){//check if theres no duplicate username
            $sql2 = "INSERT INTO tbl_admin(un,pw,fn,mn,ln,email,gender,mobile,address) VALUES (?,?,?,?,?,?,?,?,?)";
            $input2 = [$un,$pw,$fn,$mn,$ln,$email,$gender,$mobile,$address];
            
            $result = $query->set_data($sql2,$input2);
            
            if($result === true){
                echo "success";
            }
            else{
                echo "error";
            }
        }
        else{
            echo "exist";
        }

    }

    else{
        echo "no post data";
    }

?>