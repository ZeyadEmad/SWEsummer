<?php
  include_once'../ClassesGedida/Admin.php';


  $id = $_GET["id"]; //worker id
  $admin = new Admin;
  $result = $admin->showSpecificWorker($id);
  $row = mysqli_fetch_assoc($result);

    //updating worker Profile
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $jobrole= $_POST['jobrole'];
        $salary = $_POST['salary'];
        $result =	$admin->updateWorker($id, $salary, $jobrole);
      if($result==true){
        header('Location: ShowWorkers.php');
        exit();
      }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> FDJZ Bank | Worker Report </title>
        <link rel="stylesheet" type="text/css" href="../css/workerreport.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>



<tbody>
    <a href="ShowWorkers.php"><img src="../img/leftarrow.png" id="leftarrow"></a>
	<table class="container">
        <tr>
            <td>Account Number</td>
            <?php echo'<td>'.$row['id'].'</td>'; ?>
        </tr>
        <tr>
          <td>First Name : </td>
          <?php echo'<td>'.$row['FName'].'</td>'; ?>

        </tr>
        <tr>
          <td>Last Name : </td>
          <?php echo'<td>'.$row['LName'].'</td>'; ?>

        </tr>
        <tr>
          <td>Full Address : </td>
          <?php echo'<td>'.$row['Address'].'</td>'; ?>
        </tr>
        <tr>
          <td>E-mail Address : </td>
          <?php echo'<td>'.$row['Email'].'</td>'; ?>
        </tr>
        <tr>
          <td>Phone Number : </td>
          <?php echo'<td>'.$row['PhoneNumber'].'</td>'; ?>
        </tr>
		      <tr>
              <td>Position : </td>
              <?php echo'<td>'.$row['JobRole'].'</td>'; ?>

            </tr>
            <tr>
              <form  method="post" action="">
              <td>Salary : </td>
              <td> <input type="text" name="salary" value="<?php echo $row['Salary']; ?>"> </td>
            </tr><tr>
            <input type="submit" id="updateworker" value="Update Worker">
        </form>
      </table>


</tbody>



</html>
