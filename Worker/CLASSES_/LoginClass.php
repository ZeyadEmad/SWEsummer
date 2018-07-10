<?php
		require_once ("../php/ConnectionToDB.php");

		class login {
		public $UserId;
		public $password;
		public $PositionId;

			//check for user available in db
			function userLogin($CustomerID,$password){
					$db = new dbconnect;
					$db->connect();
					$sql = "SELECT * FROM LOGIN
									WHERE `userID` = '$CustomerID'";
					$result = $db->executesql($sql);// echo $sql;
					if ($row = mysqli_fetch_array($result)){
						if($row['Password'] == $password){
							if($row['PositionId'] == 3){ //if user
								$_SESSION["userID"] = $row['userID'];
								// echo $_SESSION["userID"];
								header('Location: UserProfile.php');
							}
							else{
								echo '<script language="javascript">';
				        echo 'alert("You are not a customer")';
				        echo '</script>';
							}
						}
						else{
							echo '<script language="javascript">';
			        echo 'alert("Incorrect Password")';
			        echo '</script>';
						}
					}
			}
			function workersLogin($CustomerID,$password){
				$db = new dbconnect;
				$db->connect();
				$sql = "SELECT * FROM LOGIN
						WHERE userID = '$CustomerID'";
						$result = $db->executesql($sql);// echo $sql;
				if ($row = mysqli_fetch_array($result)){
						if($row['Password'] == $password){
							if($row['PositionId'] == 2){ //if worker
									$_SESSION["userID"] = $row['userID'];
									$_SESSION["PositionId"] = $row['PositionId'];
									// echo $_SESSION["userID"];
									header('Location: WorkerHomePage.php');
							exit();

							}
						if($row['PositionId'] == 1){ //if admin
							$_SESSION["userID"] = $row['userID'];
							$_SESSION["PositionId"] = $row['PositionId'];
							// echo $_SESSION["userID"];
							 header('Location: AdminHomePage.php');
								exit();
						}
						else{
							echo '<script language="javascript">';
		        	echo 'alert("Incorrect Username")';
							echo '</script>';
						}
								}
						else{
							echo '<script language="javascript">';
		        	echo 'alert("Incorrect Password")';
		       		echo '</script>';
						}
					}
					else{
							echo '<script language="javascript">';
		        	echo 'alert("Incorrect Username or Password")';
		       		echo '</script>';
						}
				}

				//get last user id from db
				function getLastRecord(){
					$db = new dbconnect;
					$db->connect();
					$sql = "SELECT userID
									FROM LOGIN
									ORDER BY userID DESC LIMIT 1
									";
					$result = $db->executesql($sql);
					if ($row = mysqli_fetch_array($result)){
						return $row['userID'] + 1;
					}
				}

				//insert new login
				function newWorkerLogin($userID, $password){
					$db = new dbconnect;
					$conn=$db->connect();
					$sql = "INSERT INTO `LOGIN` (`userID`, `Password`, `PositionId`)
									VALUES ('$userID', '$password', '2')
									";
					$res = mysqli_query($conn,$sql);
				}
				//insert new customer login
				function newCustomerLogin($userID, $password){
					$db = new dbconnect;
					$conn=$db->connect();
					$sql = "INSERT INTO `LOGIN` (`userID`, `Password`, `PositionId`)
									VALUES ('$userID', '$password', '3')
									";
					$res = mysqli_query($conn,$sql);
				}
		}

?>
