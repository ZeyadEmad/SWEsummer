<?php
require_once '../ClassesGedida/dbconnect.php' ;
  class Login{

      public $database;

   function __construct(){
              $this->database=new dbconnect;
              $this->database->connect();
            }

      function loginn($username,$password){
        $password = md5($password);
        $sql = "SELECT * FROM LOGIN
                WHERE `userID` = '$username'
                AND `Password`= '$password'
                ";
        $result = $this->database->executesql($sql);
        $row = mysqli_fetch_array($result);
        $_SESSION["userID"] = $row['userID'];
        $_SESSION["PositionId"] = $row['PositionId'];
        return $row['PositionId'];

      }

  }
?>
