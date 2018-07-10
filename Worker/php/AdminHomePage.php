<!DOCTRYPE html>
<html>
    <head>
        <title> FDJZ Bank | Admin</title>
        <link rel="stylesheet" type="text/css" href="../css/adminhomepage.css">
        <link rel="shortcut icon" type="image/png" href="../img/WorkerLogo.png"/>
    </head>
    <body>
        <a href="AdminHomePage.php"><img src="../img/workerlogo.png" id="logo"></a>
        <button type="button" onclick="location.href='Addworker.php'" id="topleft">Add New Worker</button>
        <button type="button" onclick="location.href='ShowWorkers.php'" id="currentWorker">View Current Workers</button>
        <button type="button" onclick="location.href='Showusers.php'" id="currentUser">View Current Customers</button>
        <button type="button" onclick="location.href='ViewTransaction.php'" id="transaction">View Bank Transactions</button>
        <button type="button" onclick="location.href='ViewLoans.php'" id="loan">View Loans</button>
		<button type="button" onclick="location.href='chart.php'" id="Statistics">View Statistics</button>
        <button type="button" onclick="location.href='log.php'" id="log">Log</button>
		<button type="button" onclick="location.href='WorkerSignIn.php'" id="signout">Sign Out</button>
	</body>
</html>
