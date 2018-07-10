<?php
class Worker extends WorkerAdminCommon{
    public $jobRole;

      public function __construct()
      {
      }

      function addLoanAccount($loan){
      $this->$db->connect();
      $sql= "INSERT INTO bank_accounts(UserID,AccountNumber,AccountTypeId,Balance,DateAdded)
              VALUES ('$UserId','$AccountNumber',2,'$Balance',NOW())";
      $result=$db->executesql($sql);
    }
    function addCustomer($customer){
      $workerid=$_SESSION["userID"];
      $conn = $hits->$db->connect();
      $sql="INSERT INTO customer_account (`FNAME`,`LNAME`,`PersonalID`,Address,MobileNumber,Email, `WorkerID`, `DateAdded`)
          VALUES ('$Fname','$Lname','$ID','$Address','$MobNum','email', '$workerid', NOW() )";
      $res = mysqli_query($conn,$sql);
    }
    function getLastCustomerRecord(){
      $this->db->connect();
      $sql = "SELECT `ID`
          FROM `customer_account`
          ORDER BY `id` DESC LIMIT 1
          ";
          // echo $sql;
      $result = $this->$db->executesql($sql);
      if ($row = mysqli_fetch_array($result)){
      return $row['ID'];
      }
    }
    //insert new customer login
    function newCustomerLogin($userID, $password){
      $conn=$this->$db->connect();
      $sql = "INSERT INTO `LOGIN` (`userID`, `Password`, `PositionId`)
              VALUES ('$userID', '$password', '3')
              ";
      $res = mysqli_query($conn,$sql);
    }
  }
?>
