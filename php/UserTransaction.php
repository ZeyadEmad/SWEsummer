<?php session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title> FDJZ Bank | Customer Transactions</title>
        <link rel="stylesheet" type="text/css" href="../css/UserTransaction.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
    </head>
    <body>
	  <?php require("../ClassesGedida/Transactions.php") ;
      $Transaction=new Transactions;
    ?>
        <div class="logo">
            <h1><a href="UserProfile.php" id="logoposition"><img  src="../img/banklogo.png" alt="" /></a></h1>
        </div>
        <form name="accounttoview" method="post">
             <select name = "AccountOption">
                 <optgroup label="Your accounts" id="list">
                  <?php
             			 $arr=$Transaction->getAccountNumbers();
             			 $result = count($arr);

               			for ($x=0;$x< $result;$x++){
                       echo "<option value='$arr[$x]'>" . $arr[$x].  "</option>";
                       $a++;
                     }
     			        ?>
     			       </optgroup>
     			   </select>
     			   <input type="submit" value="Change Account" id="AccountButton">
     		</form>
            <div id="title">
                <h1 id="x">Customer Transactions</h1>
            </div>
		        <div>
              <table class="transactiontable" style="overflow-x:auto;" width="100%">
                <thead>
                  <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Transaction Amount</th>
                    <th>Transaction Number</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    $selected_val = $_POST['AccountOption'];
                    $counter=$Transaction->ViewDataOfTransactions($selected_val);
                    $IDS=$Transaction->GetID();
                    $FROM=$Transaction->GetFrom();
                    $TO=$Transaction->GetTo();
                    $Amounts=$Transaction->GetAmount();

                    for($count=0;$count<=$counter;$count++){
                      echo "<tr>";
                      echo "<td>" .$FROM[$count] ."</td>" ;
                      echo "<td>" .$TO[$count] ."</td>" ;
                      echo "<td>" .$Amounts[$count] ."</td>" ;
                      echo "<td>" .$IDS[$count] ."</td>" ;
                      echo "</tr>";
                    }
                  }
                  ?>
                </tbody>
              </table>
        </div>
    </body>
</html>
