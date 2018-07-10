<?php session_start(); ?>
<?php
  include '../ClassesGedida/Worker.php';
  require( '../ClassesGedida/Customer.php');

  $customer = new Customer;
  $worker = new Worker;

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
      
      $Fname = $_POST['FirstName'];;    
      $Lname = $_POST['LastName'];
      $Email = $_POST['Email'];
      $Address = $_POST['Address'];
      $Id = $_POST['pid'];
      $Phone = $_POST['MobileNum'];
      $birth = $_POST['birthday'];
      $pass = $_POST['Password'];
      $confpass = $_POST['ConfirmPassword'];
      
        $Fnamevalid   = empty ($Fname);
        $Lnamevalid   = empty ($Lname);
        $Emailvalid   = empty ($Email);
        $Addressvalid = empty ($Address);
        $Idvalid      = empty ($Id);
        $Phonevalid   = empty ($Phone);
        $birthvalid   = empty ($birth);
        $passvalid    = empty ($pass); 
        $confpassvalid = empty ($confpass);
      
        $Idvalid1  = is_numeric($Id);
        $Phonevalid1 = is_numeric($Phone);
      
      if ( $Fnamevalid == true || $Lnamevalid == true || $Emailvalid == true || $Addressvalid == true || $Idvalid == true || $Phonevalid == true || $birthvalid == true || $passvalid == true || $confpassvalid == true )
      {
        echo '<script language="javascript">';
        echo 'alert("Empty fields are not allowed")';
        echo '</script>';
      }
      
      if ( $Idvalid1 == false || $Phonevalid1 == false )
      {
        echo '<script language="javascript">';
        echo 'alert("ID and Phone number can only contain numbers")';
        echo '</script>';
      }
      
      if ( strlen( $pass ) < 4 )
      {
        echo '<script language="javascript">';
        echo 'alert("Password cannot be less than 4 characters *whitespaces included*")';
        echo '</script>';
      }
      else
      {
         if($_POST['Password'] == $_POST['ConfirmPassword']){

             $customer->fname = $_POST['FirstName'];
             $customer->lname = $_POST['LastName'];
             $customer->email = $_POST['Email'];
             $customer->address = $_POST['Address'];
             $customer->personalID = $_POST['pid'];
             $customer->phonenumber = $_POST['MobileNum'];
             $customer->dateOfBirth = $_POST['birthday'];

             $worker->addCustomer($customer);

             $lastid = $worker->getLastCustomerRecord();

             $password = md5($_POST['Password']);
             $worker->newCustomerLogin($lastid, $password);

             echo '<script language="javascript">';
             echo 'alert("Your AccountNumber is '.$lastid.'")';
             echo '</script>';
             echo '<script>window.location.replace("WorkerHomePage.php")</script>';
           }
          else
          {
            echo '<script language="javascript">';
            echo 'alert("Incorrect Password")';
            echo '</script>';
          }
      }
    }
    $href = "WorkerHomePage.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title> FDJZ Bank | New User</title>
    <link rel="stylesheet" type="text/css" href="../css/addworker.css">
    <link rel="shortcut icon" type="image/png" href="../img/WorkerLogo.png"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>
<body>
    <a href="WorkerHomePage.php"><img src="../img/WorkerLogo.png" id="logoanchor"></a>
  <h1>Add new Customer</h1>
    <form method="post" action="">
        <div class="contentform">
            <div class="leftgroup">
                <div class="form-group">
                    <p>First Name</p>
                    <span class="icon"><i class="fa fa-male"></i></span>
                    <input type="text" name="FirstName">
                </div>
                <div class="form-group">
                    <p>Last Name</p>
                    <span class="icon"><i class="fa fa-male"></i></span>
                    <input type="text" name="LastName">
                </div>
                <div class="form-group">
                    <p>E-mail</p>
                    <span class="icon"><i class="fa fa-envelope-o"></i></span>
                    <input type="email" name="Email">
                </div>
                <div class="form-group">
                    <p>Address</p>
                    <span class="icon"><i class="fa fa-home"></i></span>
                    <input type="text" name="Address">
                </div>
                <div class="form-group">
                    <p>PersonalID</p>
                    <span class="icon"><i class="fa fa-building-o"></i></span>
                    <input type="text" name="pid">
                </div>
                <div class="form-group">
                    <p>Phone number</p>
                    <span class="icon"><i class="fa fa-phone"></i></span>
                    <input type="text" name="MobileNum">
                </div>
            </div>
            <div class="rightgroup">
                <div class="form-group">
                    <p>Date Of Birth</p>
                    <span class="icon"><i class="fa fa-info"></i></span>
                    <input type="date" name="birthday" />
                </div>
                <div class="form-group">
                    <p>Password</p>
                    <span class="icon"><i class="fa fa-building-o"></i></span>
                    <input type="password" name="Password">
                </div>
                <div class="form-group">
                    <p>Confirm Password</p>
                    <span class="icon"><i class="fa fa-building-o"></i></span>
                    <input type="password" name="ConfirmPassword" />
                </div>
            </div>
        </div>
        <button type="submit" class="create-profile" value="Create profile">Create Customer Profile</button>
    </form>
</html>
