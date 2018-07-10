<?php
include"../ClassesGedida/dbconnect.php";
class Loans{
    public $loanid;
    public $counter;
    public $accountnumber;
    public $rate;
    public $useofloan;
    public $acceptance;
    public $amount;

        public function __construct()
        {
        }
        //Show Loans of One User many accounts
        function getSpecificLoan(){
        $db = new dbconnect;
              $db->connect();
              $Userid= $_SESSION["userID"];
              $sql = "SELECT ID,AccountNo,Amount,Rate,UseOfLoan,Counter,Acceptance FROM LOANS,bank_accounts
                      WHERE bank_accounts.UserID = '$Userid'
                      AND bank_accounts.AccountNumber=AccountNo AND bank_accounts.AccountTypeID=2;
                      ";
              $result = $db->executesql($sql);
			  $i =-1;
		if($result!=""){ 

              while ($row = mysqli_fetch_array($result))
              {
                $i++;
                $this->loanid[$i] = $row["ID"];
                $this->counter[$i]= $row["Counter"];
                $this->accountnumber[$i]=$row["AccountNo"];
                $this->amount[$i]=$row["Amount"];
                $this->rate[$i]=$row["Rate"];
                $this->useofloan[$i] = $row["UseOfLoan"];
                $this->acceptance[$i]=$row["Acceptance"];



              }
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
              $this->accountnumber[$i]=$row["AccountNo"];
              $this->amount[$i]=$row["Amount"];
              $this->useOfLoan[$i] = $row["UseOfLoan"];
              $this->dateOfSubmission[$i] =$row["DateOfSubmission"];
              $this->acceptance[$i]=$row["Acceptance"];
            }
        return $i;
    }

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
            $this->accountnumber[$i]=$row["AccountNo"];
            $this->amount[$i]=$row["Amount"];
            $this->rate[$i]=$row["Rate"];
            $this->useofloan[$i] = $row["UseOfLoan"];
          }
      return $i;
    }

    function GetDetailsOfSpecificStallLoan($AccountNumber){
      $db = new dbconnect;
      $db->connect();
      $sql = "SELECT Amount,Rate,UseOfLoan,FNAME,LNAME FROM LOANS,bank_accounts,customer_account
      WHERE Loans.AccountNo=$AccountNumber AND bank_accounts.AccountNumber=Loans.AccountNo AND customer_account.ID =bank_accounts.UserID";
      $result = $db->executesql($sql);
      $row = mysqli_fetch_array($result);
      $this->accountnumber=$AccountNumber;
      $this->rate=$row["Rate"];
      $this->amount=$row["Amount"];
      $this->useofloan=$row["UseOfLoan"];
      return $row["FNAME"]." ".$row["LNAME"]; // returning first name and lastname
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
	
	function GetRemainingAccount($LoanID)
	{
		$db = new dbconnect;
        $db->connect();
		$OriginalAmountOfLoan =0;
		$sql= "SELECT * FROM loans WHERE ID='$LoanID'";
		$result	=$db->executesql($sql);
		$row = mysqli_fetch_array($result);
		$OriginalAmountOfLoan=$row["Amount"];
		$sql= "SELECT * FROM loanscounter WHERE LoanID='$LoanID'";
		$result	=$db->executesql($sql);
		$RemainingAmount = $OriginalAmountOfLoan;
		while ($row = mysqli_fetch_array($result))
		{
			$RemainingAmount+=$row["Amount"];
		}
		
		return $RemainingAmount;
	}

    //getting arrays
      function ReturnLoansID(){
      return $this->loanid;
    }

    function ReturnAccountNumbers(){
      return $this->accountnumber;
    }

    function ReturnLoanAmounts(){
      return $this->amount;
    }

    function ReturnIntrestRates(){
      return $this->rate;
    }

    function ReturnUsesOfLoans(){
      return $this->useofloan;
    }

    function ReturnAllDatesofSubmission(){
      return $this->dateOfSubmission;
    }

    function ReturnAcceptance(){
      return $this->acceptance;
    }

  }
?>
