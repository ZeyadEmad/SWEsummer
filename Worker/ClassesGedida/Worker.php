<?php
include_once '../ClassesGedida/WorkerAdminCommon.php';
include_once '../ClassesGedida/dbconnect.php';
include_once '../ClassesGedida/Transactions.php';
class Worker extends WorkerAdminCommon{
    public $jobRole;
    public $city;
	public $transactions;

      public function __construct()
      {
        $this->db = new dbconnect();
        $this->db->connect();
		$this->transactions=new Transactions;
      }

      function AddnewLoanAccount($UserId,$AccountNumber,$Balance){
					$db = new dbconnect;
					$db->connect();
					$sql= "INSERT INTO bank_accounts(UserID,AccountNumber,AccountTypeId,Balance,DateAdded)
									VALUES ('$UserId','$AccountNumber',2,'$Balance',NOW())";
					$result=$db->executesql($sql);


		}



	function addCurrentAccount($UserID,$AccountNumber){
		 $db= new dbconnect;
		 $db->connect();
     $conn = $db->connect();
		 $sql= "INSERT INTO bank_accounts(UserID,AccountNumber,AccountTypeId,Balance,DateAdded)
              VALUES ('$UserID','$AccountNumber',1,0,NOW())";
		 $result=$db->executesql($sql);
     $sql1= "UPDATE chart
              SET Number = Number + 1
              WHERE ID = 1
              ";
     $result=$db->executesql($sql1);
		 echo '<script language="javascript">';
		 echo 'alert("Your AccountNumber is '.$AccountNumber.'")';
		 echo '<window.location.replace("WorkerHomePage.php")';
		 echo '</script>';
	}
    function addCustomer($customer){
      $db = new dbconnect();
      $db->connect();
      $workerid=$_SESSION["userID"];
      $conn = $db->connect();
      $sql="INSERT INTO customer_account (`FNAME`,`LNAME`,`PersonalID`,`Address`,`MobileNumber`,`Email`, `WorkerID`, `DateOfBirth`, `DateAdded`)
            VALUES ('$customer->fname','$customer->lname','$customer->personalID',
                    '$customer->address','$customer->phonenumber',
                    '$customer->email','$workerid', '$customer->dateOfBirth', NOW() )";
      $res = mysqli_query($conn,$sql);
    }
    function getLastCustomerRecord(){
      $db = new dbconnect();
      $db->connect();
      $sql = "SELECT `ID`
          FROM `customer_account`
          ORDER BY `id` DESC LIMIT 1";
          // echo $sql;
      $result = $db->executesql($sql);
      if ($row = mysqli_fetch_array($result)){
      return $row['ID'];
      }
    }
    //insert new customer login
    function newCustomerLogin($userID, $password){

      $db = new dbconnect();
      $conn=$db->connect();

      $sql = "INSERT INTO `LOGIN` (`userID`, `Password`, `PositionId`)
              VALUES ('$userID', '$password', '3')";
      $res = mysqli_query($conn,$sql);
    }
  }
?>
