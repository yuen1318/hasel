<?php
 abstract class DB{//cannot be instantiate but can be inherited
   
    protected $host = 'localhost';
    protected $dbname= 'it3c';
    protected $un = 'root';
    protected $pw = '';
    protected $dbConn;

    public function __construct(){
        try {
          $this->dbConn = new PDO("mysql:host=" .$this->host. ";dbname=" .$this->dbname. ";charset=utf8", $this->un, $this->pw);
          $this->dbConn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->dbConn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
          throw new Exception($e->getMessage());
        }//end of trycatch  
    }//end of construct

}//end of class
?>