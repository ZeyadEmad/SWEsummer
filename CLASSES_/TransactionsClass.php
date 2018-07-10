<?php
require ("../php/ConnectionToDB.php");

	class Transaction{
		public $TansactionId;
		public $FromAccount;
		public $ToAccount;
		public $Amount;
		public $TransactionDate;
		public $workerId;
		
        function getBalance( $accountNumber )
        {
            $db_obj = new dbconnect;
			$db_obj->connect();
			$userID = $_SESSION["userID"];
            $accountNo = $accountNumber;
            
            $sql = " SELECT balance FROM bank_accounts WHERE UserID = '$userID' AND AccountNumber = '$accountNo' ";
            $result = $db_obj->executesql($sql);
            
            return $result;
        }
        
                function pushTransaction( $recfrom , $recto , $recmo )
        {
            $db_obj = new dbconnect;
			$db_obj->connect();
            $FromAccount = $recfrom ;
            $ToAccount = $recto ;
            $Amount = $recmo ;
            $sql =  "INSERT INTO `transactions`(TransactionID, FromAccount, ToAccount, Amount, TransactionDate, WorkerID)
                    VALUES (NULL,'$FromAccount','$ToAccount','$Amount',NOW(),'4')";
            $result = $db_obj->executesql($sql);
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
	}
?>
