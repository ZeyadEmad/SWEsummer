<?php
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


class Customer extends User{
public $Accounts;
public $Loans;
public $personalID;
function ShowDataOnUpdate(){

				$this->db = new dbconnect;
				$db->connect();
				$this->id = $_SESSION["userID"];
				$sql = "SELECT * FROM customer_account
									WHERE `ID` = '$this->CustomerID'
									";
				$result = $db->executesql($sql);
				if ($row = mysqli_fetch_array($result)){
					$this->fname = $row['FNAME'];
					$this->lname = $row['LNAME'];
					$this->personalID = $row['PersonalID'];
					$this->address = $row['Address'];
					$this->phonenumber = $row['MobileNumber'];
					$this->email= $row['Email'];
					$this->Date=$row['Date'];
				}
}

    public function __construct()
    {
    }

    function updateUserProfile($address,$mobnum,$mail){
				$db = new dbconnect;
				$db->connect();
				$this->CustomerID = $_SESSION["userID"];
				$sql = "UPDATE customer_account SET Address = '$address', MobileNumber= $mobnum, Email='$mail' WHERE ID = $this->CustomerID;";
				$result = $db->executesql($sql);
				return true;
				}

				function showUserProfile(){
				$userID = $_SESSION["userID"];
				$db_obj = new dbconnect;
				$sql = "SELECT FNAME, LNAME, PersonalID, Address, MobileNumber, Email, bank_accounts.AccountNumber
							FROM `customer_account`, `bank_accounts`
							WHERE ID = '$userID'
							AND bank_accounts.UserID = customer_account.ID";
				$result = $db_obj->executesql($sql);
				return $result;
				}

				function ShowFName(){
				return  $this->Fname;
				}
				function ShowLName(){
				return $this->Lname;
				}
				function ShowPersonalID(){
				return $this->PersonalId;
				}
				function ShowID(){
				return $this->CustomerID;
				}
				function ShowAddress(){
				return $this->address;
				}
				function ShowMobile(){
				return $this->MobileNum;
				}
				function ShowEmail(){
				return $this->Email;
				}
			}
    class Transactions
    {
        public $accountFrom;
        public $accountTo;
        public $amount;
        public $database;

        function transfer()
        {

        }

        public function __construct()
        {
        }
    }

    class dbconnect
    {
        private $servername;
        private $username;
        private $password;
        private $db;
        private $con;

        function __construct()
        {
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->db = "FDJZ";
            $this->con = $this->Connect();
        }

        function connect()
        {
            $this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->db);

            if ($this -> con ->connect_error)
            {
                die("Failed to connect: " .$this->con->connect_error);
            }
            else
            {
                return $this->con;
            }
        }

        function disconnect()
        {
            return $this->con->close();
        }


        function executesql($sql)
        {
    			$result = mysqli_query($this->con, $sql);
    			if($result == TRUE)
                {
    				return $result;
    			}
    			else
                {
    				echo "Error executing SQL statement: " .$this->con->error;
    			}
    		}
    }



    class Login
    {
        public $username;
        public $password;
		public $database;
        function login()
		{


		}

        public function __construct()
        {
        }
    }
	  class WokrerAdminCommon extends User{
    public $salary;

    function showSpecificWorker($id){
      $this->$db->connect();
      $sql = "SELECT *
              FROM `worker_admin_account`
              WHERE `id` = $id
              ";
      $result = $this->$db->executesql($sql);
      return $result;
    }
    function showAllCustomers(){
      $this->$db->connect();
      $sql = "SELECT `FName`, `LName`, `Email`, `id`
              FROM `customer_account`
              ";//worker

      $result = $this->$db->executesql($sql);
      $counter = 1;
      foreach($result as $row){
          echo'<tr>';
          echo'<td>'.$counter++.'</td>';
          echo'<td><a href="Usersreport.php?id='.$row['id'].'">'.$row['FName']." ".$row['LName'].'</a></td>';
          echo'<td>'.$row['Email'].'</td>';
          echo'<td>'.$row['id'].'</td>';
          echo'</tr>';
      }
    }
    function showSpecificCustomer(){
      $this->$db->connect();
      $sql = "SELECT *
              FROM `customer_account`
              WHERE `id` = $id
              ";
      $result = $this->$db->executesql($sql);
      return $result;
    }
  }

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


  class Admin extends WorkerAdminCommon{
    function __construct(){
      $loan = new Loan;
    }
    function checkCustomerID($customerID){
      $db = new dbconnect;
      $db->connect();
      $sql= "SELECT ID FROM customer_account";
      $result=$db->executesql($sql);
      $accountnumbers;
      $i=-1;
      while($row = mysqli_fetch_array($result)){
        $i++;
        $accountnumbers[$i]=$row["ID"];
      }
      for ($j=0;$j<=$i;$j++){
        if($accountnumbers[$i]==$UserID)
          return true;
      }
      return false;
    }


   function addNewWorker($worker){
      $conn=$this->$db->connect();
      $sql = "INSERT INTO `worker_admin_account` (`id`, `FName`, `LName`, `Email`, `Address`, `City`, `PhoneNumber`, `JobRole`, `Salary`, `PositionID`, `DateAdded`)
              VALUES (NULL, '$Fname', '$Lname', '$Email', '$Address', '$City', '$PhoneNumber', '$JobRole', '$Salary', '2', NOW())";
      $res = mysqli_query($conn,$sql);
    }
    function showAllWorkers(){
      $this->db->connect();
      $sql = "SELECT `FName`, `LName`, `Email`, `id`, `JobRole`
              FROM worker_admin_account
              WHERE PositionID = 2
              ";//worker

      $result = $this->$db->executesql($sql);
      $counter = 1;
      foreach($result as $row){
          echo'<tr>';
          echo'<td>'.$counter++.'</td>';
          echo'<td><a href="WorkerReport.php?id='.$row['id'].'">'.$row['FName']." ".$row['LName'].'</a></td>';
          echo'<td>'.$row['Email'].'</td>';
          echo'<td>'.$row['id'].'</td>';
          echo'<td>'.$row['JobRole'].'</td>';
          echo'</tr>';
      }
    }
    function showSpecificWorker($id){
      $this->$db->connect();
      $sql = "SELECT *
              FROM `worker_admin_account`
              WHERE `id` = $id
              ";
      $result = $db->executesql($sql);
      return $result;
    }
    function updateWorker($id, $salary, $jobrole){
      $this->$db->connect();
      $sql = "UPDATE `worker_admin_account`
              SET `Salary` = '$salary', `JobRole` = '$jobrole'
              WHERE `id` = '$id'
              ";
      $result = $this->$db->executesql($sql);
      return $result;
    }
    function getLastWorker(){
      $this->$db->connect();
      $sql = "SELECT `id`
              FROM `worker_admin_account`
              ORDER BY `id` DESC LIMIT 1
              ";
              // echo $sql;
      $result = $this->$db->executesql($sql);
      if ($row = mysqli_fetch_array($result)){
        return $row['id'] + 1;
      }
    }
    function newWorkerLogin($userID, $password){
      $conn=$this->$db->connect();
      $sql = "INSERT INTO `LOGIN` (`userID`, `Password`, `PositionId`)
              VALUES ('$userID', '$password', '2')
              ";
      $res = mysqli_query($conn,$sql);
    }
  }

  class Accounts{
public $accountnumber;
public $accounttypeID;
public $balance;
public $DateAdded;
      public function __construct()
      {
      }
function getAccountNumbers(){
$db_obj = new dbconnect;
$db_obj->connect();
$userID= $_SESSION["userID"];

$sql=" SELECT *
from bank_accounts
where userID=$userID ";
$result = $db_obj->executesql($sql);
$i=-1;
while ($row = mysqli_fetch_array($result)){
$i++;
$arrayOfAccountNumber[$i]=$row['AccountNumber'];
}
return $arrayOfAccountNumber;
}

      //Getting New AccountNumber for creating new account
function GettingNewAccountNumber(){
$db = new dbconnect;
$db->connect();
$sql= "SELECT AccountNumber FROM bank_accounts Order by AccountNumber ASC ";
$result	=$db->executesql($sql);

while($row = mysqli_fetch_array($result)){
$AccountNumb=$row["AccountNumber"];
}
$AccountNumb+=1;
return $AccountNumb;
}

}

class Loans{
public $loanid;
public $counter;
public $accountnumber;
public $rate;
public $useofloan;
public $acceptance;
public $loans = dbconnect;

    public function __construct()
    {
    }

//View Loans in Admin
function GetAllLoans()
{
        $db = new dbconnect;
        $db->connect();
        $sql = "SELECT AccountNo,Amount,UseOfLoan,DateOfSubmission,Acceptance FROM LOANS";
        $result = $db->executesql($sql);
        $i =-1;

        while ($row = mysqli_fetch_array($result))
        {
          $i++;
          $this->accountNo[$i]=$row["AccountNo"];
          $this->Amount[$i]=$row["Amount"];
          $this->useOfLoan[$i] = $row["UseOfLoan"];
          $this->dateOfSubmission[$i] =$row["DateOfSubmission"];
          $this->acceptance[$i]=$row["Acceptance"];
        }
    return $i;
}

//UserLoans page
function getLoans(){
$db = new dbconnect;
      $db->connect();
      $Userid= $_SESSION["userID"];
      $sql = "SELECT ID,AccountNo,Amount,Rate,UseOfLoan,Counter FROM LOANS,bank_accounts
              WHERE bank_accounts.UserID = '$Userid'
              AND bank_accounts.AccountNumber=AccountNo AND bank_accounts.AccountTypeID=2;
              ";
      $result = $db->executesql($sql);
      $i =-1;

      while ($row = mysqli_fetch_array($result))
      {
        $i++;
        $this->loanID[$i] = $row["ID"];
        $this->counter[$i]= $row["Counter"];
        $this->accountNo[$i]=$row["AccountNo"];
        $this->Amount[$i]=$row["Amount"];
        $this->rate[$i]=$row["Rate"];
        $this->useOfLoan[$i] = $row["UseOfLoan"];
      }
  return $i;
}

function GetDetailsOfSpecificStallLoan($AccountNumber){
  $db = new dbconnect;
  $db->connect();
  $sql = "SELECT Amount,Rate,UseOfLoan,FNAME,LNAME FROM LOANS,bank_accounts,customer_account
  WHERE Loans.AccountNo=$AccountNumber AND bank_accounts.AccountNumber=Loans.AccountNo AND customer_account.ID =bank_accounts.UserID";
  $result = $db->executesql($sql);
  $row = mysqli_fetch_array($result);
  $this->accountNo=$AccountNumber;
  $this->rate=$row["Rate"];
  $this->Amount=$row["Amount"];
  $this->useOfLoan=$row["UseOfLoan"];
  return $row["FNAME"]." ".$row["LNAME"]; // returning first name and lastname
}

function getNewLoanID()
{
  $db = new dbconnect;
$db->connect();
$sql= "SELECT counter FROM loans Order by counter ASC ";
$result	=$db->executesql($sql);
while($row = mysqli_fetch_array($result)){
$this->counter=$row["counter"];
}
return $this->counter+=1;
}

function SubmitLoan($AccountNumber,$counter,$Amount,$IntrestRate,$UseOfLoan){
    $this->acceptance=-1;
  $this->accountNo;
  $db = new dbconnect;
  $Connection=$db->connect();
  $sql = "INSERT INTO LOANS(ID,Counter,AccountNo,Amount,Rate,UseOfLoan,Acceptance,DateOfSubmission) VALUES(NULL,'$counter','$AccountNumber','$Amount','$IntrestRate','$UseOfLoan','-1',NOW())";
  $result = mysqli_query($Connection,$sql);
}

//getting arrays
  function ReturnLoansID(){
  return $this->counter;
}

function ReturnAccountNumbers(){
  return $this->accountNo;
}

function ReturnLoanAmounts(){
  return $this->Amount;
}

function ReturnIntrestRates(){
  return $this->rate;
}

function ReturnUsesOfLoans(){
  return $this->useOfLoan;
}

function ReturnAllDatesofSubmission(){
  return $this->dateOfSubmission;
}

function ReturnAcceptance(){
  return $this->acceptance;
}

}

?>
