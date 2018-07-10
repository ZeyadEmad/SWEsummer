<?php
require_once "../ClassesGedida/dbconnect.php";
class Loans{
    public $loanid;
   
    public $accountnumber;
    public $rate;
    public $useofloan;
    public $acceptance;
    public $loans;

        public function __construct()
        {
        }

    //View Loans in Admin
    function GetAllLoans()
    {
            $db = new dbconnect;
            $db->connect();
            $sql = "SELECT AccountNo,Amount,UseOfLoan,DateOfSubmission,Acceptance FROM LOANS ORDER BY `ID` DESC";
            $result = $db->executesql($sql);
            $i =-1;

            while ($row = mysqli_fetch_array($result))
            {
              $i++;
              $this->accountnumber[$i]=$row["AccountNo"];
              $this->Amount[$i]=$row["Amount"];
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
          if($result!="")
		  {$i =-1;

          while ($row = mysqli_fetch_array($result))
          {
            $i++;
            $this->loanID[$i] = $row["ID"];
            $this->counter[$i]= $row["Counter"];
            $this->accountnumber[$i]=$row["AccountNo"];
            $this->Amount[$i]=$row["Amount"];
            $this->rate[$i]=$row["Rate"];
            $this->useOfLoan[$i] = $row["UseOfLoan"];
          }
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
      $this->Amount=$row["Amount"];
      $this->useOfLoan=$row["UseOfLoan"];
      return $row["FNAME"]." ".$row["LNAME"]; // returning first name and lastname
    }

    function getNewLoanID()
    {
      $db = new dbconnect;
    $db->connect();
    $sql= "SELECT ID FROM loans Order by ID ASC ";
    $result	=$db->executesql($sql);
    while($row = mysqli_fetch_array($result)){
    $this->loanid=$row["ID"];
    }
    return $this->loanid+=1;
    }

    function SubmitLoan($AccountNumber,$Amount,$IntrestRate,$UseOfLoan){
        $this->acceptance=-1;

      $db = new dbconnect;
      $Connection=$db->connect();
      $sql = "INSERT INTO LOANS(ID,AccountNo,Amount,Rate,UseOfLoan,Acceptance,DateOfSubmission) VALUES(NULL,'$AccountNumber','$Amount','$IntrestRate','$UseOfLoan','-1',NOW())";
      $result = mysqli_query($Connection,$sql);
    }

    //getting arrays
      function ReturnLoansID(){
      return $this->counter;
    }

    function ReturnAccountNumbers(){
      return $this->accountnumber;
    }

    function ReturnLoanAmounts(){
      return $this->Amount;
    }

    function ReturnIntrestRates(){
      return $this->rate;
    }

    function ReturnUsesOfLoans(){
      return $this->useOfLoan;
    }

    function ReturnAllDatesofSubmission(){
      return $this->dateOfSubmission;
    }

    function ReturnAcceptance(){
      return $this->acceptance;
    }

  }
?>
