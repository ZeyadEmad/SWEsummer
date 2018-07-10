<?php session_start();?>
<?php
  if ($_SESSION['PositionId'] == 1){
    $href = "AdminHomePage.php";
  }else if ($_SESSION['PositionId'] == 2){
    $href = "WorkerHomePage.php";
  }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title> FDJZ Bank | View Transactions </title>
        <link rel="stylesheet" type="text/css" href="../css/ViewTransaction.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
    </head>
<body>
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
            <tbody>
              <?php
              	require("../ClassesGedida/Transactions.php") ;
                $id = $_GET["id"]; //customer id
              	$Transaction = new Transactions;
              	$num = $Transaction->viewTransactionsBySpecificCustomer($id); //fill the arrays with data and get the num
          	   ?>
            </tbody>

        </table>
    </div>
</body>
</html>
