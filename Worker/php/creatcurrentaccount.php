<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<title>FDJZ BANK | Create Current Account</title>
    <link rel="stylesheet" type="text/css" href="../css/createcurrentacount.css">
    <link rel="shortcut icon" type="image/png" href="../img/workerlogolq.png"/>
</head>
<body>
	<form id="userform" method="post">
	<a href="WorkerHomePage.php"><img src="../img/workerlogolq.png" id="logo"></a>
	<div id="field">
    UserID:  <br><br>
    <input type="text" name="userid" id="userid" size="25">
    <br><br>
	</div>
    <input  type = "submit" class="Submit" value = "Submit"><br>
	</form>
</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
include "../ClassesGedida/Accounts.php";
include "../ClassesGedida/Worker.php";
$Accounts = new Accounts;
$Worker = new Worker;
//checl existing ID;
$UserID = $_POST["userid"];
$AccountNumber = $Accounts->GettingNewAccountNumber();
if ($Accounts->ExistingAccountNumber($UserID)==true)
{
$Worker->addCurrentAccount($UserID,$AccountNumber);
}
else{
	//
echo '<script language="javascript">';
echo 'alert("Unexisting account")';
echo '</script>';	
	
}

}
?>