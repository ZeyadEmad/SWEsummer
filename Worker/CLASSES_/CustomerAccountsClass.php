<?php
require ("../php/ConnectionToDB.php");
	class Customer_Accounts{
		public $CustomerID;
		public $Fname;
		public $Lname;
		public $PersonalId;
		public $address;
		public $MobileNum;
		public $Email;
		public $Date;
		public $WorkerId;

		//awel haga ba3d el signin el table, fel user profile
		//edit profile page
		function ShowDataOnUpdate(){
				$db = new dbconnect;
				$db->connect();
				$this->CustomerID = $_SESSION["userID"];
				$sql = "SELECT * FROM customer_account
									WHERE `ID` = '$this->CustomerID'
									";
				$result = $db->executesql($sql);
				if ($row = mysqli_fetch_array($result)){
					$this->Fname = $row['FNAME'];
					$this->Lname = $row['LNAME'];
					$this->PersonalId = $row['PersonalID'];
					$this->address = $row['Address'];
					$this->MobileNum = $row['MobileNumber'];
					$this->Email= $row['Email'];
					$this->Date=$row['Date'];
				}
			}
		//edit profile page
		function updateUserProfile($address,$mobnum,$mail){
				$db = new dbconnect;
				$db->connect();
				$this->CustomerID = $_SESSION["userID"];
				$sql = "UPDATE customer_account SET Address = '$address', MobileNumber= $mobnum, Email='$mail' WHERE ID = $this->CustomerID;";
				$result = $db->executesql($sql);
				return true;
		}
		//display user profile data
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
		function AddCustomer($Fname,$Lname,$ID,$Address,$MobNum,$email){
			$workerid=$_SESSION["userID"];
			$db = new dbconnect;
			$conn = $db->connect();
			$sql="INSERT INTO customer_account (`FNAME`,`LNAME`,`PersonalID`,Address,MobileNumber,Email, `WorkerID`, `DateAdded`)
					VALUES ('$Fname','$Lname','$ID','$Address','$MobNum','email', '$workerid', NOW() )";
			$res = mysqli_query($conn,$sql);
			//$result = $db->executesql($sql);
		}
		//get last user id from db
		function getLastRecord(){
		  $db = new dbconnect;
		  $db->connect();
		  $sql = "SELECT `ID`
				  FROM `customer_account`
				  ORDER BY `id` DESC LIMIT 1
				  ";
				  // echo $sql;
		  $result = $db->executesql($sql);
		  if ($row = mysqli_fetch_array($result)){
			return $row['ID'];
		  }
		}
		//show all users
		function showAllCustomers(){
			$db = new dbconnect;
			$db->connect();
			$sql = "SELECT `FName`, `LName`, `Email`, `id`
							FROM `customer_account`
							";//worker

			$result = $db->executesql($sql);
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

		function showSpecificCustomer($id){
        $db = new dbconnect;
        $db->connect();
        $sql = "SELECT *
                FROM `customer_account`
                WHERE `id` = $id
                ";
        $result = $db->executesql($sql);
        return $result;
    }
}
?>
