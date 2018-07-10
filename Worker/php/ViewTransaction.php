<?php session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title> FDJZ Bank | View Transactions </title>
        <link rel="stylesheet" type="text/css" href="../css/ViewTransaction.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
    </head>
<body>

    <?php
    	require_once("../ClassesGedida/Transactions.php") ;
    	$Transaction = new Transactions;
    	$num= $Transaction->GetAllTransactions(); //fill the arrays with data and get the num


    	$ids=$Transaction->ReturnAllIDs();
    	$FromAccounts= $Transaction->ReturnAllFromAccounts();
    	$ToAccounts=$Transaction->ReturnAllToAccounts();
    	$Amounts=$Transaction->ReturnAllAmounts();
    	$Dates= $Transaction->ReturnAllTransactionsDates();
    	$WorkerIDs= $Transaction->ReturnAllWorkerIDs();

      if ($_SESSION['PositionId'] == 1){
        $href = "AdminHomePage.php";
      }else if ($_SESSION['PositionId'] == 2){
        $href = "WorkerHomePage.php";
      }
	?>

    <div class="logo">
        <h1><a href="<?php echo $href; ?>" id="logoposition"><img  src="../img/WorkerLogo.png" alt="" /></a></h1>
    </div>
    <div id="title">
        <h1 id="x">Bank Transactions</h1>
    </div>
    <div class="tableback">
        <table class="transactiontable" style="overflow-x:auto;" width="100%">
            <thead>
                <tr>
				    <th>Transaction Number</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Transaction Amount</th>
					<th>Transaction Date</th>
					<th>Worker ID </th>
                </tr>
            </thead>
              <?php
    						for($i=0;$i<=$num;$i++){//num variable rag3 mn l function
    						    echo "<tr>";
    				        echo "<td>" .$ids[$i]."</td>";
                    echo "<td>" .$FromAccounts[$i]."</td>";
    				        echo "<td>" .$ToAccounts[$i]."</td>";
    				        echo "<td>" .$Amounts[$i]."</td>";
    				        echo "<td>".$Dates[$i]."</td>";
                    echo'<td><a href="WorkerReportFromTransaction.php?id='.$WorkerIDs[$i].'">'.$WorkerIDs[$i].'</a></td>';
                    echo "</tr>";
						     }
            ?>
        </table>
    </div>
</body>
</html>
