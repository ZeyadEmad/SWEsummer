<?php
		require ("../php/ConnectionToDB.php");

  class loans{
    public $loanID; //Counter ll 3dd (L key)
	public $counter; //LOANID
    public $accountNo;
    public $amount;
    public $rate;
    public $useOfLoan;
    public $acceptance;
    public $dateOfSubmission;
    //UserLoans page
    function getSpecificLoan(){
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
	





  }
?>
