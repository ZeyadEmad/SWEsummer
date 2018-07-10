<?php
  class Accounts{
    public $accountnumber;
    public $accounttypeID;
    public $balance;
    public $DateAdded;
        public function __construct()
        {
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

  }

?>
