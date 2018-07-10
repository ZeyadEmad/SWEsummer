<?php
  include_once("User.php");
  class WorkerAdminCommon extends User{
    public $salary;

    function showSpecificWorker($id){
      $this->$db->connect();
      $sql = "SELECT *
              FROM `worker_admin_account`
              WHERE `id` = $id
              ";
      $result = $this->$db->executesql($sql);
      return $result;
    }
    function showAllCustomers(){
      $this->$db->connect();
      $sql = "SELECT `FName`, `LName`, `Email`, `id`
              FROM `customer_account`
              ";//worker

      $result = $this->$db->executesql($sql);
      $counter = 1;
      foreach($result as $row){
          echo'<tr>';
          echo'<td>'.$counter++.'</td>';
          echo'<td><a href="Usersreport.php?id='.$row['id'].'">'.$row['FName']." ".$row['LName'].'</a></td>';
          echo'<td>'.$row['Email'].'</td>';
          echo'<td>'.$row['id'].'</td>';
          echo'</tr>';
      }
    }
    function showSpecificCustomer(){
      $this->$db->connect();
      $sql = "SELECT *
              FROM `customer_account`
              WHERE `id` = $id
              ";
      $result = $this->$db->executesql($sql);
      return $result;
    }
  }

?>
