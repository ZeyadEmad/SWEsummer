<?php
  session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> FDJZ Bank | Loans</title>
        <link rel="stylesheet" type="text/css" href="../css/UserLoans.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
    </head>
    <body>
	<?php
	 include '../ClassesGedida/Loans.php';
	 $loans = new Loans;
	 $num = $loans->getSpecificLoan();
	 $ids=$loans->ReturnLoansID();
	 $AccountNumbers=$loans->ReturnAccountNumbers();
	 $loanAmounts = $loans->ReturnLoanAmounts();
	 $IntrestRates= $loans->ReturnIntrestRates();
	 $usesOfLoans= $loans->ReturnUsesOfLoans();
   $Acceptances =$loans->ReturnAcceptance();
	
   for($x=0;$x<=$num;$x++)
   {
	   $RemainingAccounts[$x]=$loans->GetRemainingAccount($ids[$x]);
   }
   $AcceptanceOnScreen;
  ?>
        <div class="logo">
            <h1><a href="UserProfile.php" id="logoposition"><img  src="../img/banklogo.png" alt="" /></a></h1>
        </div>
            <div id="title">
                <h1 id="x">Loans</h1>
            </div>
            <div class="tableback">
                <table class="transactiontable" style="overflow-x:auto;" width="100%">
                    <thead>
                        <tr>
							              <th>  Loan ID </th>
                            <th>Account Number</th>
                            <th>Loan Amount</th>
                            <th>Interest Rate %</th>
                            <th>Use Of loan</th>
                            <th>Remaining Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      for ( $x=0;$x<=$num;$x++)
        						   {
                          echo "<tr>";
          							  echo "<td>". $ids[$x] . "</td>";
          								echo "<td>". $AccountNumbers[$x]  . "</td>";
          								echo "<td>". $loanAmounts[$x]  . "</td>";
          								echo "<td>". $IntrestRates[$x]  . "</td>";
          								echo "<td>". $usesOfLoans[$x]  . "</td>";
          								echo "<td>". $RemainingAccounts[$x]. "</td>";
                          if ($Acceptances[$x]==-1)
                          {  $AcceptanceOnScreen="Stall";
                            echo "<td>". $AcceptanceOnScreen. "</td>";
                          }
                          else if ($Acceptances[$x]==1)
                          {
                            $AcceptanceOnScreen="Accepted";
                          echo "<td>". $AcceptanceOnScreen. "</td>";
                          }
                          else if ($Acceptances[$x]==0)
                          {$AcceptanceOnScreen="Rejected";
                            echo "<td>". $AcceptanceOnScreen. "</td>";
                          }
          							 echo  "</tr>";
        						   }
        						   ?>
                    </tbody>
            </table>
        </div>
    </body>
</html>
