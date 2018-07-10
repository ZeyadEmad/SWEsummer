<?php
    session_start();
    if ($_SESSION['PositionId'] == 1){
      $href = "AdminHomePage.php";
    }else if ($_SESSION['PositionId'] == 2){
      $href = "WorkerHomePage.php";
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>FDJZ Bank/View Loans</title>
<link rel="stylesheet" type="text/css" href="../css/ViewLoans.css">
<link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
</head>
<body>
<?php
	require("../ClassesGedida/Loans.php") ;
	$loan = new loans;
	$num = $loan->GetAllLoans(); // return number and fill the array
	$accountnumbers= $loan->ReturnAccountNumbers();
	$amounts= $loan->ReturnLoanAmounts();
	$usesOfLoan= $loan->ReturnUsesOfLoans();
	$datesOfSubmissions= $loan->ReturnAllDatesofSubmission();
	$flag = $loan->ReturnAcceptance();
?>


 <?php   if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	 $ButtonClickedAccountNumber = $_POST['Stall'];//which button clicked is selected
	 $_SESSION["ChoosenAccountNumber"]=$ButtonClickedAccountNumber;//clicked Accountnumber ll session
	header('Location: LoanDetails.php');
	exit();

}


?>
<div class="logo">
    <h1><a href="<?php echo $href; ?>" id="logoposition"><img  src="../img/WorkerLogo.png" alt="" /></a></h1>
</div>
<div id="title">
    <h1 id="x">Bank Loans</h1>
</div>
<div class="loanstable">
<table>
<thead>
<tr>
	<th>Account Number</th>
    <th>Remaining Account</th>
    <th>Use Of Loan</th>
	<th>Date Of Submit</th>
	<th>Acceptance </th>
	<th>Action </th>
</tr>
</thead>
<form method="post">
<?php
	for ($i=0;$i<=$num;$i++){
		echo "<tr>";
		echo "<td>" .$accountnumbers[$i]."</td>";
		echo "<td>" .$amounts[$i]."</td>";
		echo "<td>" .$usesOfLoan[$i]."</td>";
		echo "<td>" .$datesOfSubmissions[$i]."</td>";
		if ($flag[$i]==1){
			echo "<td>" ."Accepted" . "</td>";
			echo "<td>";
			echo "No Actions";
			echo "</td>";
		}
		if ($flag[$i]==-1){
			echo "<td>" . "Stall" . "</td>";
			echo '<td>';
			echo '<button name="Stall" value="'.$accountnumbers[$i].'" type="Submit">'. "Show Loan details";

			echo "</td>";
		}
		if ($flag[$i]==0){
			echo "<td>" . "Rejected" . "</td>";
			echo "<td>";
			echo "No Actions";
			echo "</td>";
		}
		echo "</tr>";

		}
?>
</form>
</table>
</div>
</body>
</html>
