<?php
include_once "../ClassesGedida/dbconnect.php";
Class Accounts {
public $accountnumber;
public $accounttypeID;
public $balance;
public $DateAdded;


function getAccountNumbers(){
$db = new dbconnect;
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

//creating new Current Account, checking if id existing
function ExistingAccountNumber($UserID){
	$db = new dbconnect;
  $db->connect();
$sql= "SELECT ID FROM customer_account";
$result	=$db->executesql($sql);

while($row = mysqli_fetch_array($result)){
if ($row["ID"]==$UserID)
	return true;
}
return false;
}
	
	
	//
}

?>
