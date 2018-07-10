<?php
		require ("../php/ConnectionToDB.php");

		class login {
		public $UserId;
		public $password;
		public $PositionId;

			//check for user available in db
			function userLogin($CustomerID,$password){
					$db = new dbconnect;
					$db->connect();
					$sql = "SELECT * FROM LOGIN
									WHERE `userID` = '$CustomerID'
									";
					$result = $db->executesql($sql);
					// echo $sql;

					if ($row = mysqli_fetch_array($result)){
						if($row['Password'] == $password){
							if($row['PositionId'] == 3){ //if user
								$_SESSION["userID"] = $row['userID'];
								// echo $_SESSION["userID"];
								echo '<script>window.location.replace("C:\xampp\htdocs\FDJZ-BANK\php\UserProfile.php")</script>';
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
			}
?>
