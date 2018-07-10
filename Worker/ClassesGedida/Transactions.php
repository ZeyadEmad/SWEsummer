<?php
require_once "../ClassesGedida/dbconnect.php";

  class Transactions
  {
      public $TansactionId;
      public $accountFrom;
      public $accountTo;
      public $amount;
      public $database;



      function getBalance( $FromAccount )
      {
          $db_obj = new dbconnect;
          $db_obj->connect();
          $userID = $_SESSION["userID"];
          $sql = " SELECT balance FROM bank_accounts WHERE UserID = '$userID' AND AccountNumber = '$FromAccount' ";
          $result = $db_obj->executesql($sql);

          return $result;
      }

      function toBalance( $ToAccount )
      {
          $db_obj = new dbconnect;
          $db_obj->connect();
          $userID = $_SESSION["userID"];
          $sql = " SELECT balance FROM bank_accounts WHERE UserID = '$userID' AND AccountNumber = '$ToAccount' ";
          $result = $db_obj->executesql($sql);

          return $result;
      }

      function minus ( $amount , $FromAccount )
      {
          $db_obj = new dbconnect;
          $db_obj->connect();
          $userID = $_SESSION["userID"];
          $sql = "UPDATE `bank_accounts` SET balance = '$amount' WHERE UserID = '$userID' AND AccountNumber = '$FromAccount' ";
          $result = $db_obj->executesql($sql);

      }

      function plus ( $amount , $ToAccount )
      {
          $db_obj = new dbconnect;
          $db_obj->connect();
          $userID = $_SESSION["userID"];
          $sql = "UPDATE `bank_accounts` SET balance = '$amount' WHERE UserID = '$userID' AND AccountNumber = '$ToAccount' ";
          $result = $db_obj->executesql($sql);
      }
	  
	  function ExistingAccountNumber($AccountNumber)
	  {
		  $db_obj = new dbconnect;
          $db_obj->connect();
          
		  $sql=" SELECT AccountNumber from bank_accounts";
          $result = $db_obj->executesql($sql);
		  while ($row = mysqli_fetch_array($result))
		  {
			  if($row["AccountNumber"]==$AccountNumber)
			  {
				  return true;
				  
				  
			  }
			}
			return false;
	  }

      function pushTransaction( $FromAccount , $ToAccount , $Amount )
      {
          $db = new dbconnect;
          $conn=$db->connect();
          $sql =  "INSERT INTO `transactions`(`TransactionID`, `FromAccount`, `ToAccount`, `Amount`, `TransactionDate`, `WorkerID`)
                   VALUES (NULL,'$FromAccount','$ToAccount','$Amount',NOW(),'4')" ;
          $res = mysqli_query($conn,$sql);
      }

      function getAccountNumbers(){
          $db_obj = new dbconnect;
          $db_obj->connect();
          $userID= $_SESSION["userID"];

          $sql=" SELECT *
          from bank_accounts
          where userID=$userID ";
          $result = $db_obj->executesql($sql);
          $i=-1;
          while ($row = mysqli_fetch_array($result))
          {
              $i++;
              $arrayOfAccountNumber[$i]=$row['AccountNumber'];
          }

          return $arrayOfAccountNumber;
  		}
      function ViewDataOfTransactions($selectedAccount)
      {
        $db_obj = new dbconnect;
        $db_obj->connect();
        $userID= $_SESSION["userID"];
        $sql=" SELECT TransactionID,FromAccount,ToAccount,Amount
        from transactions
        where FromAccount=$selectedAccount OR ToAccount=$selectedAccount";
        $result=$db_obj->executesql($sql);
        $i=-1;
        while ($row = mysqli_fetch_array($result)){
          $i++;
        $this->TansactionId[$i]=$row['TransactionID'];
        $this->accountFrom[$i]=$row['FromAccount'];
        $this->accountTo[$i]=$row['ToAccount'];
        $this->amount[$i]=$row['Amount'];
        }
      return $i;
      }
      function viewTransactionsBySpecificCustomer($id){
      			$db = new dbconnect;
      			$db->connect();
      			$sql = "SELECT * FROM `TRANSACTIONS`, bank_accounts
      							WHERE  bank_accounts.UserID = '$id'
      							AND FromAccount = bank_accounts.AccountNumber
      							";
      			$result = $db->executesql($sql);

      			foreach($result as $row){
      					echo'<tr>';
      					echo'<td>'.$row['TransactionID'].'</td>';
      					echo'<td>'.$row['FromAccount'].'</td>';
      					echo'<td>'.$row['ToAccount'].'</td>';
      					echo'<td>'.$row['Amount'].'</td>';
      					echo'<td>'.$row['TransactionDate'].'</td>';
      					echo'<td><a href="WorkerReportFromTransaction.php?id='.$row['WorkerID'].'">'.$row['WorkerID'].'</a></td>';
      					echo'</tr>';
      			}
	  }
	  function WithDraw($AccountNumber,$Amount)
	  {
		  $db = new dbconnect;
		$Connection=$db->connect();
		$sql = "SELECT * FROM bank_accounts WHERE AccountNumber='$AccountNumber'";
		$result = $db->executesql($sql);
		$row = mysqli_fetch_array($result);
		$row["balance"]=$row["balance"]-$Amount;
		$NewAmount = $row["balance"];
		if($NewAmount<0)
		{
			echo '<script language="javascript">';
			echo 'alert("No Enough Money")';
			echo '</script>';
			
		}
		  else{
			  $sql = "UPDATE bank_accounts SET balance=$NewAmount WHERE AccountNumber='$AccountNumber'";
			  $result = $db->executesql($sql);
			  $amount=0-$Amount;
			  $WorkerID= $_SESSION["userID"];
			  $sql1 = "INSERT INTO transactions(TransactionID,FromAccount,ToAccount,Amount,TransactionDate,WorkerID) VALUES (null,'$AccountNumber','$AccountNumber','$amount',NOW(),'$WorkerID')";
              $result = mysqli_query($Connection,$sql1);			  
		  } 
			
	  } 
	  

	  
	  function Deposite($AccountNumber,$Amount)
	  {
		  $db = new dbconnect;
		$Connection=$db->connect();
		$sql = "SELECT * FROM bank_accounts WHERE AccountNumber='$AccountNumber'";
		$result = $db->executesql($sql);
		$row = mysqli_fetch_array($result);
		$row["balance"]=$row["balance"]+$Amount;
		
		$NewAmount = $row["balance"];
		if($row["AccountTypeID"]==2)
		{   $dbc = new dbconnect;
		$Connection=$dbc->connect();
			$sql2 = "SELECT * FROM loans WHERE AccountNo='$AccountNumber'";
			$result = $dbc->executesql($sql2);
			$row1 = mysqli_fetch_array($result);
			echo $row1['ID'];
			$LoanNumber = $row1['ID'];
			
			$sql3="INSERT INTO loanscounter (TransactionID,LoanID,Amount) VALUES(NULL,'$LoanNumber','$Amount')";
			$res = mysqli_query($Connection,$sql3);
			
		}
				
			  $sql = "UPDATE bank_accounts SET balance=$NewAmount WHERE AccountNumber='$AccountNumber'";
			  $result = $db->executesql($sql);
			  $amount=$Amount;
			  $WorkerID= $_SESSION["userID"];
			  $sql1 = "INSERT INTO transactions(TransactionID,FromAccount,ToAccount,Amount,TransactionDate,WorkerID) VALUES (null,'$AccountNumber','$AccountNumber','$amount',NOW(),'$WorkerID')";
              $result = mysqli_query($Connection,$sql1);			  
		  
			
	  }
	  
	  

          function GetID()
          {
            return $this->TansactionId;
          }
          function GetFrom()
          {

            return $this->accountFrom;
          }

          function GetTo()
          {
            return $this->accountTo;
          }
          function GetAmount()
          {

            return $this->amount;
          }
        
        function ReturnAllIDs() //Return all for admin
    		{

    			return $this->TansactionId;
    		}

    		function ReturnAllFromAccounts() //Return all for admin
    		{

    			return $this->FromAccount;
    		}

    		function ReturnAllToAccounts() //Return all for admin
    		{
    			return $this->ToAccount;

    		}

    		function ReturnAllAmounts() //Return all for admin
    		{
    			return 	$this->Amount;
    		}

    		function ReturnAllTransactionsDates() //Return all for admin
    		{
    			return $this->TransactionDate;

    		}

    		function ReturnAllWorkerIDs() //Return all for admin
    		{

    			return $this->workerId;
    		}
        function GetAllTransactions() //fill the arrays with data and get the num for admin
    		{
    			$db_obj = new dbconnect;
    			$db_obj->connect();
    			$userID= $_SESSION["userID"];
    			$sql=" SELECT *
    			from transactions";
    			$result=$db_obj->executesql($sql);
    			$i=-1;
    			while ($row = mysqli_fetch_array($result))
    			{
    				$i++;
    				$this->TansactionId[$i]=$row['TransactionID'];
    			$this->FromAccount[$i]=$row['FromAccount'];
    			$this->ToAccount[$i]=$row['ToAccount'];
    			$this->Amount[$i]=$row['Amount'];
    			$this->TransactionDate[$i]=$row['TransactionDate'];
    			$this->workerId[$i]=$row['WorkerID'];
    			}
    			return $i;
    		}
    }

?>
