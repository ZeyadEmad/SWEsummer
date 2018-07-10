<?php
include_once("WorkerAdminCommon.php");
class Admin extends WorkerAdminCommon{
  function __construct(){
    $loan = new Loan;
  }
  function checkCustomerID($customerID){
    $db = new dbconnect;
    $db->connect();
    $sql= "SELECT ID FROM customer_account";
    $result=$db->executesql($sql);
    $accountnumbers;
    $i=-1;
    while($row = mysqli_fetch_array($result)){
      $i++;
      $accountnumbers[$i]=$row["ID"];
    }
    for ($j=0;$j<=$i;$j++){
      if($accountnumbers[$i]==$UserID)
        return true;
    }
    return false;
  }
  function addNewWorker($worker){
     $conn=$this->$db->connect();
     $sql = "INSERT INTO `worker_admin_account` (`id`, `FName`, `LName`, `Email`, `Address`, `City`, `PhoneNumber`, `JobRole`, `Salary`, `PositionID`, `DateAdded`)
             VALUES (NULL, '$Fname', '$Lname', '$Email', '$Address', '$City', '$PhoneNumber', '$JobRole', '$Salary', '2', NOW())";
     $res = mysqli_query($conn,$sql);
   }
   function showAllWorkers(){
     $this->db->connect();
     $sql = "SELECT `FName`, `LName`, `Email`, `id`, `JobRole`
             FROM worker_admin_account
             WHERE PositionID = 2
             ";//worker

     $result = $this->db->executesql($sql);
     $counter = 1;
     foreach($result as $row){
         echo'<tr>';
         echo'<td>'.$counter++.'</td>';
         echo'<td><a href="WorkerReport.php?id='.$row['id'].'">'.$row['FName']." ".$row['LName'].'</a></td>';
         echo'<td>'.$row['Email'].'</td>';
         echo'<td>'.$row['id'].'</td>';
         echo'<td>'.$row['JobRole'].'</td>';
         echo'</tr>';
     }
   }
   function showSpecificWorker($id){
     $this->$db->connect();
     $sql = "SELECT *
             FROM `worker_admin_account`
             WHERE `id` = $id
             ";
     $result = $db->executesql($sql);
     return $result;
   }
   function updateWorker($id, $salary, $jobrole){
     $this->$db->connect();
     $sql = "UPDATE `worker_admin_account`
             SET `Salary` = '$salary', `JobRole` = '$jobrole'
             WHERE `id` = '$id'
             ";
     $result = $this->$db->executesql($sql);
     return $result;
   }
   function getLastWorker(){
     $this->$db->connect();
     $sql = "SELECT `id`
             FROM `worker_admin_account`
             ORDER BY `id` DESC LIMIT 1
             ";
             // echo $sql;
     $result = $this->$db->executesql($sql);
     if ($row = mysqli_fetch_array($result)){
       return $row['id'] + 1;
     }
   }
   function newWorkerLogin($userID, $password){
     $conn=$this->$db->connect();
     $sql = "INSERT INTO `LOGIN` (`userID`, `Password`, `PositionId`)
             VALUES ('$userID', '$password', '2')
             ";
     $res = mysqli_query($conn,$sql);
   }
}

?>
