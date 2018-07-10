<?php
session_start();
?>

<!DOCTYPE html>


<html>
    <head>
        <title> FDJZ Bank | Edit User Profile</title>
        <link rel="stylesheet" type="text/css" href="../css/EditProfile.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
    </head>
    <body>
        <div class="logo">
            <h1><a href="UserProfile.php" id="logoposition"><img  src="../img/banklogo.png" alt="" /></a></h1>
        </div>
<!--
        <div id="edata">
            <form id="eform">
                <b>First Name:</b>
                <input type="text" placeholder="Dummy Data">
                <br> <br>
                <b>Last Name:</b>
                <input type="text" placeholder="Dummy Data">
                <br> <br>
                <b>Personal ID Number:</b>
                <input type="text" placeholder="Dummy Data" disabled>
                <br> <br>
                <b>Address:</b>
                <input type="text" placeholder="Dummy Data">
                <br> <br>
                <b>Mobile Number:</b>
                <input type="text" placeholder="Dummy Data">
                <br> <br>
                <b>E-mail Address:</b>
                <input type="text" placeholder="Dummy Data" disabled>
                <br> <br>
                <b>Account Number:</b>
                <input type="text" placeholder="Dummy Data">
                <br> <br>
                <button class="b3" type="button">Cancel</button>
                <button class="b3" type="button">Save</button>
            </form>
        </div>
-->
<?php
  require '../ClassesGedida/Customer.php';
  $Customer_Accounts = new Customer;
$Customer_Accounts->ShowDataOnUpdate();
?>
        <div id="edata">
            <form id="form" method="POST" action="">
                <table border=15 width=100%>
                    <tr>
                        <th>User ID</th>
                        <td><?php echo $Customer_Accounts->ShowID();
						?></td>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td><?php echo $Customer_Accounts->ShowFName();
						?></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><?php echo $Customer_Accounts->ShowLName();
						?></td>
                    </tr>
                    <tr>
                        <th>Personal ID Number</th>
                        <td><?php echo $Customer_Accounts->ShowPersonalID();
						?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            <input type="text" id="email" name="address" value ='<?php echo $Customer_Accounts->ShowAddress();?>'>

                        </td>
                    </tr>
                    <tr>
                        <th>Change Mobile Number</th>
                        <td>
                            <input type="text" id="email" name="mobile" value='<?php echo $Customer_Accounts->ShowMobile();?> '>
                        </td>
                    </tr>
                    <tr>
                        <th>Add E-mail Address</th>
                        <td>
                            <input type="text" id="email" name="email" value= '<?php echo $Customer_Accounts->ShowEmail();?>'>
                        </td>
                    </tr>

                </table>
                <input type="submit" value="Update Profile" id="submitbtn">
            </form>

            <?php


                include 'Validation.php';


				if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$address= $_POST['address'];
      $mobnum = $_POST['mobile'];
		$email = $_POST['email'];
			$result=	$Customer_Accounts->updateUserProfile($address,$mobnum, $email);
			if($result==true){
				 header('Location: UserProfile.php');
			exit();}
  }

           /* if ($_POST)
            {



				$validation = new Validation();

                $address = "address";
                $addressFlag = $validation->IsEmpty($address);

                $mobile = "mobile";
                $mobileFlag = $validation->IsNumber($mobile);

                $email = "email";
                $emailFlag = $validation->IsEmpty($email);

                if ( $addressFlag == false || $mobileFlag == false || $emailFlag == false )
                {
                    echo '<script language="javascript">';
                    echo 'alert("These fields are important please fill them in correctly")';
                    echo '</script>';
                }
                else
                {

                    exit();
                }
                */


            ?>

        </div>


    </body>
</html>
