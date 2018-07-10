<?php
  require ("../php/ConnectionToDB.php");
  class WorkerAdminAccount{
    public $Id;
    public $Fname;
    public $LName;
    public $Email;
    public $address;
    public $City;
    public $PhoneNumber;
    public $JobRole;
    public $Salary;
    public $PositionId;



    function addNewWorker($Fname, $Lname, $Email, $Address, $City, $PhoneNumber, $JobRole, $Salary){
        $db = new dbconnect;
        $conn=$db->connect();
        $sql = "INSERT INTO `worker_admin_account` (`id`, `FName`, `LName`, `Email`, `Address`, `City`, `PhoneNumber`, `JobRole`, `Salary`, `PositionID`, `DateAdded`)
                VALUES (NULL, '$Fname', '$Lname', '$Email', '$Address', '$City', '$PhoneNumber', '$JobRole', '$Salary', '2', NOW())";
        $res = mysqli_query($conn,$sql);
        //$db->executesql($sql);
        // return true;
    }

    function showAllWorkers(){
        $db = new dbconnect;
        $db->connect();
        $sql = "SELECT `FName`, `LName`, `Email`, `id`, `JobRole`
                FROM worker_admin_account
                WHERE PositionID = 2
                ";//worker

        $result = $db->executesql($sql);
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
        $db = new dbconnect;
        $db->connect();
        $sql = "SELECT *
                FROM `worker_admin_account`
                WHERE `id` = $id
                ";
        $result = $db->executesql($sql);
        return $result;
    }
    function updateWorker($id, $salary, $jobrole){
        $db = new dbconnect;
        $db->connect();
        $sql = "UPDATE `worker_admin_account`
                SET `Salary` = '$salary', `JobRole` = '$jobrole'
                WHERE `id` = '$id'
                ";
        $result = $db->executesql($sql);
        return $result;
    }
    //get last user id from db
    function getLastRecord(){
      $db = new dbconnect;
      $db->connect();
      $sql = "SELECT `id`
              FROM `worker_admin_account`
              ORDER BY `id` DESC LIMIT 1
              ";
              // echo $sql;
      $result = $db->executesql($sql);
      if ($row = mysqli_fetch_array($result)){
        return $row['id'] + 1;
      }
    }
  }

?>
