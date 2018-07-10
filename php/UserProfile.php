<?php
  session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> FDJZ Bank | User Profile</title>
        <link rel="stylesheet" type="text/css" href="../css/UserProfile.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
    </head>

    <body>
		<?php
			include '../ClassesGedida/Customer.php';

      $customer = new Customer;
      $result = $customer->showUserProfile();
      $row =mysqli_fetch_array($result);
      $i=-1;
      while($RowOfAccountNumbers = mysqli_fetch_array($result))
      {$i++;
        $accountnumbers[$i]=$RowOfAccountNumbers["AccountNumber"];
      }

		?>
        <div class="logo">
            <h1><a href="UserProfile.php" id="logoposition"><img  src="../img/banklogo.png" alt="" /></a></h1>
        </div>

        <nav id="butts">
            <ul  class="nav">
                <li><a class="b1" href="Bank_Transaction.php">Make a new transaction</a></li>
                <li><a class="b1" href="UserTransaction.php">View My Transactions</a></li>
                <li><a class="b1" href="Editprofile.php">Edit Profile</a></li>
                <li><a class="b1" href="UserLoans.php">View My Loans</a></li>
                <li><a class="b1" href="Bank_Statement.php">Bank Statement</a></li>
                <li><a class="b1" href="Signout.php">Sign Out</a></li>
            </ul>
        </nav>
        <div id="data">
			<form id="form">
				<table border=15 width=100%>
					<tr>
						<th>First Name</th>
						<?php echo'<td>'.$row['FNAME'].'</td>'; ?>
					</tr>
					<tr>
						<th>Last Name</th>
						<?php echo'<td>'.$row['LNAME'].'</td>'; ?>
					</tr>
					<tr>
						<th>Personal ID Number</th>
						<?php echo'<td>'.$row['PersonalID'].'</td>'; ?>
					</tr>
					<tr>
						<th>Address</th>
						<?php echo'<td>'.$row['Address'].'</td>'; ?>
					</tr>
					<tr>
						<th>Mobile Number</th>
						<?php echo'<td>'.$row['MobileNumber'].'</td>'; ?>
					</tr>
					<tr>
						<th>E-mail Address</th>
						<?php echo'<td>'.$row['Email'].'</td>'; ?>
					</tr>
					<tr>
						<th rowspan="<?php echo $i + 2; ?>">Account Number</th>
  						<?php
              for ($k=0;$k<=$i;$k++){
                echo '<tr>';
                echo'<td>'.$accountnumbers[$k].'</td>';
                echo '</tr>';
              }
              ?>
					</tr>
				</table>
			</form>
        </div>
    </body>
</html>
