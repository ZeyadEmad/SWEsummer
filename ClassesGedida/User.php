<?php
require_once "../ClassesGedida/dbconnect.php";
  class User{
  public $fname;
  public $lname;
  public $email;
  public $address;
  public $phonenumber;
  public $id;
  public $Loans;
  public $login;
  public $db;
   function __construct(){
     $Loans = new loan;

   }
  }
?>
