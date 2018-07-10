<?php
  include_once("User.php");
  class WorkerAdminCommon extends User{
    public $salary;

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
        if($accountnumbers[$j]==$customerID)
          return true;
      }
      return false;
    }
    //show all users
    function showAllCustomers(){
      $db = new dbconnect;
      $db->connect();
      $sql = "SELECT `FName`, `LName`, `Email`, `id`
              FROM `customer_account`
              ";//worker

      $result = $db->executesql($sql);
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
    function showSpecificCustomer($id){
      $this->db->connect();
      $sql = "SELECT *
              FROM `customer_account`
              WHERE `id` = $id
              ";
      $result = $this->db->executesql($sql);
      return $result;
    }
    function showSpecificCustomerFromSearch($id){
      $this->db->connect();
      $sql = "SELECT *
              FROM `customer_account`
              WHERE `id` = $id
              ";


      $result = $this->db->executesql($sql);
      $counter = 1;
      foreach($result as $row){
          echo'<tr>';
          echo'<td>'.$counter++.'</td>';
          echo'<td><a href="Usersreport.php?id='.$row['ID'].'">'.$row['FNAME']." ".$row['LNAME'].'</a></td>';
          echo'<td>'.$row['Email'].'</td>';
          echo'<td>'.$row['ID'].'</td>';
          echo'</tr>';
        }
    }
  }

?>
