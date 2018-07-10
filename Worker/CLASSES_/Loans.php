<?php
		require ("../php/ConnectionToDB.php");

  class loans{
    public $loanID; //Counter ll 3dd (L key)
		public $counter; //LOANID
    public $accountNo;
    public $Amount;
    public $rate;
    public $useOfLoan;
    public $acceptance;
    public $dateOfSubmission;
    //UserLoans page
    function getLoans(){
		$db = new dbconnect;
					$db->connect();
					$Userid= $_SESSION["userID"];
					$sql = "SELECT ID,AccountNo,Amount,Rate,UseOfLoan,Counter FROM LOANS,bank_accounts
									WHERE bank_accounts.UserID = '$Userid'
									AND bank_accounts.AccountNumber=AccountNo AND bank_accounts.AccountTypeID=2;
									";
					$result = $db->executesql($sql);
					$i =-1;

					while ($row = mysqli_fetch_array($result))
					{
						$i++;
						$this->loanID[$i] = $row["ID"];
						$this->counter[$i]= $row["Counter"];
						$this->accountNo[$i]=$row["AccountNo"];
						$this->Amount[$i]=$row["Amount"];
						$this->rate[$i]=$row["Rate"];
						$this->useOfLoan[$i] = $row["UseOfLoan"];



					}
      return $i;
    }



	//View Loans in Admin
	function GetAllLoans()
	{
					$db = new dbconnect;
					$db->connect();
					$sql = "SELECT AccountNo,Amount,UseOfLoan,DateOfSubmission,Acceptance FROM LOANS";
					$result = $db->executesql($sql);
					$i =-1;

					while ($row = mysqli_fetch_array($result))
					{
						$i++;
						$this->accountNo[$i]=$row["AccountNo"];
						$this->Amount[$i]=$row["Amount"];
						$this->useOfLoan[$i] = $row["UseOfLoan"];
						$this->dateOfSubmission[$i] =$row["DateOfSubmission"];
						$this->acceptance[$i]=$row["Acceptance"];
					}
      return $i;


	}







	function GetDetailsOfSpecificStallLoan($AccountNumber)
	{
		$db = new dbconnect;
		$db->connect();
		$sql = "SELECT Amount,Rate,UseOfLoan,FNAME,LNAME FROM LOANS,bank_accounts,customer_account
		WHERE Loans.AccountNo=$AccountNumber AND bank_accounts.AccountNumber=Loans.AccountNo AND customer_account.ID =bank_accounts.UserID";
		$result = $db->executesql($sql);
		$row = mysqli_fetch_array($result);
		$this->accountNo=$AccountNumber;
		$this->rate=$row["Rate"];
		$this->Amount=$row["Amount"];
		$this->useOfLoan=$row["UseOfLoan"];
		return $row["FNAME"]." ".$row["LNAME"]; // returning first name and lastname
	}

	//reject loan
	function RejectedLoan()
	{
		$AccountNumber=$_SESSION["ChoosenAccountNumber"];
		$db = new dbconnect;
		$db->connect();
		$sql =
		"UPDATE LOANS
		SET Acceptance=0
			WHERE AccountNo= $AccountNumber";
			$result = $db->executesql($sql);
		header('Location: ViewLoans.php');
	    exit();
	}

		//accepting loan
	function AcceptedLoan(){$AccountNumber=$_SESSION["ChoosenAccountNumber"];
		$db = new dbconnect;
		$db->connect();
		$sql = "UPDATE LOANS
		SET Acceptance=1
			WHERE AccountNo= $AccountNumber";
			$result = $db->executesql($sql);
		header('Location: ViewLoans.php');
	    exit();
		}

		//Getting New AccountNumber for creating new account
		function GettingNewAccountNumber(){
		$db = new dbconnect;
		$db->connect();
		$sql= "SELECT AccountNumber FROM bank_accounts Order by AccountNumber ASC ";
		$result	=$db->executesql($sql);

		while($row = mysqli_fetch_array($result)){
		$AccountNumb=$row["AccountNumber"];
		}
		$AccountNumb+=1;
		return $AccountNumb;
		}


		function getNewLoanID()
		{
			$db = new dbconnect;
		$db->connect();
		$sql= "SELECT counter FROM loans Order by counter ASC ";
		$result	=$db->executesql($sql);
		while($row = mysqli_fetch_array($result)){
		$this->counter=$row["counter"];
		}
		return $this->counter+=1;


		}

		function SubmitLoan($AccountNumber,$counter,$Amount,$IntrestRate,$UseOfLoan){
		    $this->acceptance=-1;
			$this->accountNo;
			$db = new dbconnect;
			$Connection=$db->connect();

			$sql = "INSERT INTO LOANS(ID,Counter,AccountNo,Amount,Rate,UseOfLoan,Acceptance,DateOfSubmission) VALUES(NULL,'$counter','$AccountNumber','$Amount','$IntrestRate','$UseOfLoan','-1',NOW())";
			$result = mysqli_query($Connection,$sql);


		}


	//getting arrays

		function ReturnLoansID()
	{

		return $this->counter;

	}

	function ReturnAccountNumbers()
	{
		return $this->accountNo;

	}

	function ReturnLoanAmounts()
	{
		return $this->Amount;
	}

	function ReturnIntrestRates()
	{
		return $this->rate;

	}

	function ReturnUsesOfLoans()
	{
		return $this->useOfLoan;
	}

	function ReturnAllDatesofSubmission()
	{
		return $this->dateOfSubmission;
	}

	function ReturnAcceptance()
	{
		return $this->acceptance;
	}
  }
?>
