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
	}

?>
