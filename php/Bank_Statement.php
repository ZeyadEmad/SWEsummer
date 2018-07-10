<?php session_start();
?>
<html>
    <head>
        <title>FDJZ Bank | Bank Statement</title>
        <link rel="stylesheet" type="text/css" href="../css/BankStatement.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
	<?php
    require_Once '../ClassesGedida/Accounts.php';
    require_Once '../ClassesGedida/Transactions.php';
    $Accounts = new Accounts;
    $thisCustomerAccount = $Accounts->getCurrentAccountNumbers();
    $NumberofAccounts= count ($thisCustomerAccount);
    $transactions = new Transactions;
  ?>


    <body>
        <div class="logo">
            <a href="UserProfile.php" id="logoposition"><img  src="../img/banklogo.png" alt="" /></a>
        </div>
        <span id="header">
            <a href="Bank_Statement.php">Bank Statement</a>
        </span>
        <form>
          <input type="date" name="dateFrom" id="dateFrom" />
          <input type="date" name="dateTo" id="dateTo"/>
          <input type="submit" value="Change Date" name="changeDate" id="changeDate" />
        </form>
        <form name ="SelectedAccount" method="post">
          <select name = "Account" >
              <optgroup label="Your accounts" id="list">

                <?php
      				      for ($i=0;$i<$NumberofAccounts;$i++){
      				        echo '<option value="'.$thisCustomerAccount[$i].'">'.$thisCustomerAccount[$i].'</option>';
                    }
      				  ?>
              </optgroup>
          </select>
          <input type="submit" value="Change Account" name="changeAccount" id="changeAccount" />
        </form>

        <table>
              <thead>
                <tr>
                  <th>
                      Date
                  </th>
                  <th>
                      Debit
                  </th>
                  <th>
                      Credit
                  </th>
                  <th>
                      Balance
                  </th>
              </tr>
              </thead>
              <tbody>
        			  <?php
                  if ($_SERVER["REQUEST_METHOD"] == "POST"){
                      if (isset($_POST['changeAccount'])){
                        $SelectedAccount = $_POST["Account"];
                      	$NumOfArrays= $transactions->DebitAndCredit($SelectedAccount); //array filled and num of arrays returned
                      	$ddates=$transactions->gettdate();
                      	$Amounts=$transactions->GetAmount();
                      	$Balance=0;

              				   for ($j=0;$j<=$NumOfArrays;$j++){
              					       echo   "<tr>";
              				         echo "<td>". $ddates[$j] . "</td>";
              				   if ($Amounts[$j]>0)
              				   {
              					   echo "<td>". "-" . "</td>";
              					   echo "<td>". $Amounts[$j] . "</td>";
              					   $Balance += $Amounts[$j];
              				   }
              				   else if ($Amounts[$j]<0){
              						$NewAmount = 0-$Amounts[$j];
              					  echo "<td>". $NewAmount . "</td>";
              					  echo "<td>". "-". "</td>";
              					  $Balance-= $NewAmount; // negative amount -ve -ve = +ve
              					  }
              				    echo "<td>". $Balance. "</td>";
              				    echo "</tr>";
              				   }
                      }else if(isset($_POST['changeDate'])){
                        $dateFrom = $_POST['dateFrom'];
                        $dateTo = $_POST['dateTo'];
                        echo $dateFrom;
                        $SelectedAccount = $_POST["Account"];
                      	$NumOfArrays= $transactions->DebitAndCreditForSpecificDate($SelectedAccount, $dateFrom, $dateTo); //array filled and num of arrays returned
                      	$ddates=$transactions->gettdate();
                      	$Amounts=$transactions->GetAmount();
                      	$Balance=0;

              				   for ($j=0;$j<=$NumOfArrays;$j++){
              					       echo   "<tr>";
              				         echo "<td>". $ddates[$j] . "</td>";
              				   if ($Amounts[$j]>0)
              				   {
              					   echo "<td>". "-" . "</td>";
              					   echo "<td>". $Amounts[$j] . "</td>";
              					   $Balance += $Amounts[$j];
              				   }
              				   else if ($Amounts[$j]<0){
              						$NewAmount = 0-$Amounts[$j];
              					  echo "<td>". $NewAmount . "</td>";
              					  echo "<td>". "-". "</td>";
              					  $Balance-= $NewAmount; // negative amount -ve -ve = +ve
              					  }
              				    echo "<td>". $Balance. "</td>";
              				    echo "</tr>";
              				   }
                      }

            				}
        				   ?>
              </tbody>
        </table>
    </body>
</html>
