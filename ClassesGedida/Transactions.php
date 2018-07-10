<?php
require_Once ("dbconnect.php");

class Transactions
{
    public $TansactionId;
    public $accountFrom;
    public $accountTo;
    public $amount;
	public $datee;
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

    function ExistingAccountNumber($AccountNumber)
    {
      $db_obj = new dbconnect;
      $db_obj->connect();
      $userID= $_SESSION["userID"];

      $sql=" SELECT AccountNumber from bank_accounts
             WHERE AccountTypeID =1";
      $result = $db_obj->executesql($sql);
      while ($row = mysqli_fetch_array($result))
      {
          if($row['AccountNumber']==$AccountNumber)
          {
              return true;
          }
      }
        return false;
    }

    function plus ( $amount , $ToAccount )
    {
        $db_obj = new dbconnect;
        $db_obj->connect();
        $userID = $_SESSION["userID"];
        $sql = "UPDATE `bank_accounts` SET balance = '$amount' WHERE UserID = '$userID' AND AccountNumber = '$ToAccount' ";
        $result = $db_obj->executesql($sql);
    }

    function pushTransaction( $FromAccount , $ToAccount , $Amount )
    {
        $db = new dbconnect;
        $conn=$db->connect();
        $sql =  "INSERT INTO `transactions`(`TransactionID`, `FromAccount`, `ToAccount`, `Amount`, `TransactionDate`, `WorkerID`)
                 VALUES (NULL,'$FromAccount','$ToAccount','$Amount',NOW(),'4')" ;
        $res = mysqli_query($conn,$sql);
    }

    function getAccountNumbers()
    {
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


	//bank statment
	function DebitAndCredit($selectedAccount)//
	{

		$db_obj = new dbconnect;
		$db_obj->connect();
		$userID= $_SESSION["userID"];
		$sql="SELECT Amount,TransactionDate
      from transactions
      where FromAccount=$selectedAccount AND ToAccount=$selectedAccount ";
	  $i=-1;
	  $result=$db_obj->executesql($sql);

		while ($row = mysqli_fetch_array($result)){

			$i++;
			$this->amount[$i]=$row["Amount"];
			$this->datee[$i]=$row["TransactionDate"];
		}
		// echo $i;
		return $i;
	}
  //bank statment
	function DebitAndCreditForSpecificDate($selectedAccount, $dateFrom, $dateTo)
	{

		$db_obj = new dbconnect;
		$db_obj->connect();
		$userID= $_SESSION["userID"];
    echo $dateFrom;
		$sql="SELECT Amount,TransactionDate
          FROM transactions
          WHERE FromAccount=$selectedAccount
          AND ToAccount=$selectedAccount
          AND `DateAdded` >= '$dateFrom'
          AND `DateAdded` <= '$dateTo' ";
	  $i=-1;
	  $result=$db_obj->executesql($sql);

		while ($row = mysqli_fetch_array($result)){
			$i++;
			$this->amount[$i]=$row["Amount"];
			$this->datee[$i]=$row["TransactionDate"];
		}
		echo $i;
		return $i;
	}


	function gettdate()
	{
		return $this->datee;

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
}

?>
