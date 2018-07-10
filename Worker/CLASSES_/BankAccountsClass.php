<?php
require_once("../php/ConnectionToDB.php");
class bank_accounts{

	public $UserId;
	public $AccountNumber;
	public $AccountTypeId;
	public $Balance;

	//betshoof el id mawgood wala la2 w howa beyda5al el data
	function CheckUserId($UserID)
	{
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
				for ($j=0;$j<=$i;$j++)
				{
					if($accountnumbers[$i]==$UserID)
						return true;
				}
					return false;

	}
	function AddnewLoanAccount($UserId,$AccountNumber,$Balance){
					$db = new dbconnect;
					$db->connect();
					$sql= "INSERT INTO bank_accounts(UserID,AccountNumber,AccountTypeId,Balance,DateAdded)
									VALUES ('$UserId','$AccountNumber',2,'$Balance',NOW())";
					$result=$db->executesql($sql);


		}


}


?>
