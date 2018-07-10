<?php session_start(); ?>
<!DOCTRYPE html>
<html>
    <head>
        <title> FDJZ Bank | Worker</title>
        <link rel="stylesheet" type="text/css" href="../css/workerhomepage.css">
        <link rel="shortcut icon" type="image/png" href="../img/WorkerLogo.png"/>
    </head>
    <body>
        <a href="WorkerHomePage.php"><img src="../img/WorkerLogo.png" id="logo"></a>
        <button class="bu1" onclick="location.href='Showusers.php'">View Current Customers</button>
		    <button class="bu1 positioning" id="newUsers"onclick="location.href='NewUserData.php'">Add New Customer</button>
        <button class="bu1 positioning" id="transactions"onclick="location.href='ViewTransaction.php'">View Transactions</button>
		    <button class="bu1 positioning" id="submitLoans"onclick="location.href='CheckUser2.php'">Submit Loan</button>
		    <button class="bu1 positioning deposit" id="dep" onclick="location.href='Deposit.php'">Deposit</button>
    		<button class="bu1 positioning" id="withdraw" onclick="location.href='WithdrawPage.php'">Withdraw</button>
			<button class="bu1 positioning" id="Create" onclick="location.href='CheckUser3.php'">Create Current Account</button>
    		<button class="bu1 positioning" id="signout" onclick="location.href='Signout.php'">Sign Out</button>
  		
    </body>
</html>
