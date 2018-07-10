<?php
  include_once '../ClassesGedida/Admin.php';

  $id = $_GET["id"]; //customer id
  $admin = new Admin;
  $result = $admin->showSpecificCustomer($id);
  $row = mysqli_fetch_assoc($result);

?>
<html>
    <head>
        <title> FDJZ Bank | User Report </title>
        <link rel="stylesheet" type="text/css" href="../css/usersreport.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <tbody>
          <a href="Showusers.php"><img src="../img/leftarrow.png" id="leftarrow"></a>
		  <?php echo '<a id="viewtrans" href="ViewSpecificTransaction.php?id='.$row['ID'].'">View Transacations done by this user</a>'; ?>
		  <br>
      	<table class="container">
		<br>
              <tr>
                  <td>Account Number</td>
                  <?php echo'<td>'.$row['ID'].'</td>'; ?>
              </tr>
              <tr>
                <td>First Name : </td>
                <?php echo'<td>'.$row['FNAME'].'</td>'; ?>

              </tr>
              <tr>
                <td>Last Name : </td>
                <?php echo'<td>'.$row['LNAME'].'</td>'; ?>

              </tr>
              <tr>
                <td>Personal ID Number : </td>
                <?php echo'<td>'.$row['PersonalID'].'</td>'; ?>

              </tr>
              <tr>
                <td>Date of Birth : </td>
                <?php echo'<td>'.$row['DateOfBirth'].'</td>'; ?>
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
                <?php echo'<td>'.$row['MobileNumber'].'</td>'; ?>
              </tr> 
            </table>
			<br>
      </tbody>
    </body>
</html>
