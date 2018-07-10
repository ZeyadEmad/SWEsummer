<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FDJZ Bank/Loan Details</title>
        <link rel="stylesheet" type="text/css" href="../css/LoanDetails.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
    </head>
    <body>
        <a href="AdminHomePage.php" id="logoposition"><img src="../img/WorkerLogo.png" id="logoanchor"></a>
        <h1 id="header"> Loan Details</h1>
		<?php
		require("../ClassesGedida/Loans.php") ;
    require("../ClassesGedida/Admin.php") ;
		$loan = new loans;
    $admin = new Admin;
		$CustomerName= $loan->GetDetailsOfSpecificStallLoan($_SESSION["ChoosenAccountNumber"]); // arrays filled of class and name returned
		$AccountNumber=$loan->ReturnAccountNumbers();
		$LoanAmount = $loan->ReturnLoanAmounts();
		$rate = $loan->ReturnIntrestRates();
		$UseOfLoan= $loan->ReturnUsesOfLoans();
		?>

		<?php

		if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	 $ButtonClicked = $_POST['selection'];//which button clicked is selected
	 if($ButtonClicked=="LoanRejected")
	 {
		$admin->RejectedLoan();

	 }

	 if ($ButtonClicked=="LoanAccepted")
	 {
		 $admin->AcceptedLoan();
	 }

 }
		?>
         <div class="data">
             <table>
                <tr>
                    <th><v>Account Number</v></th>
                    <td><z><?php echo $AccountNumber;?> </z></td>
                </tr>
                <tr>
                    <th><v>Customer Name</v></th>
                    <td><z><?php echo $CustomerName;?> </z></td>
                </tr>
                <tr>
                    <th><v>Loan Amount</v></th>
                    <td><z><?php echo 0-$LoanAmount;?></z></td>
                </tr>
                <tr>
                    <th><v>Interest Rate</v></th>
                    <td><z><?php echo $rate;?></z></td>
                </tr>
                <tr>
                    <th><v>Use of loan</v></th>
                    <td><z><?php echo $UseOfLoan;?></z></td>
                </tr>
            </table>
        </div>

        <div class="bs">
          <form method="post">
              <button type="submit" name="selection" value="LoanAccepted" id="accept"> Loan Accepted</button>
              <button type="submit" name="selection" value="LoanRejected" id="reject">Loan Rejected</button>
			     </form>
        </div>
    </body>
</html>
