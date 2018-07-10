<?php
require ("../php/ConnectionToDB.php");

	class Transaction{
		public $TansactionId;
		public $FromAccount;
		public $ToAccount;
		public $Amount;
		public $TransactionDate;
		public $workerId;
		public $balance;

        function getAccountNumbers(){
			$db_obj = new dbconnect;
			$db_obj->connect();
			$userID= $_SESSION["userID"];

			$sql=" SELECT *
			from bank_accounts
			where userID=$userID ";
			$result = $db_obj->executesql($sql);
			$i=-1;
		while ($row = mysqli_fetch_array($result)){
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
			$this->FromAccount[$i]=$row['FromAccount'];
			$this->ToAccount[$i]=$row['ToAccount'];
			$this->Amount[$i]=$row['Amount'];
			}
		return $i;
		}

		function GetID()
		{
			return $this->TansactionId;
		}

		function GetFrom()
		{

			return $this->FromAccount;
		}

		function GetTo()
		{
			return $this->ToAccount;
		}
		function GetAmount()
		{

			return $this->Amount;
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
	}
?>
