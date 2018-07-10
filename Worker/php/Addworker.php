<?php
  include_once '../ClassesGedida/Admin.php';
  include_once '../ClassesGedida/Login.php';
  include_once '../ClassesGedida/Worker.php';

  //getting the last userID
  // $user = new login;
  $admin = new Admin();
  $worker = new Worker();

  if ($_SERVER["REQUEST_METHOD"] == "POST"){

      $Fname = $_POST['fname'];;    
      $Lname = $_POST['lname'];
      $Email = $_POST['mail'];
      $Address = $_POST['address'];
      $City = $_POST['city'];
      $Phone = $_POST['number'];
      $Role = $_POST['jobrole'];
      $Salary = $_POST['salary'];
      
      $Fnamevalid   = empty ($Fname);
      $Lnamevalid   = empty ($Lname);
      $Emailvalid   = empty ($Email);
      $Addressvalid = empty ($Address);
      $Cityvalid    = empty ($City);
      $Phonevalid   = empty ($Phone);
      $Rolevalid    = empty ($Role);
      $Salaryvalid  = empty ($Salary);
      
      $Phonevalid1 = is_numeric ( $Phone );
      $Salaryvalid1 = is_numeric ( $Salary );
      
      if ($Fnamevalid == true || $Lnamevalid == true || $Emailvalid == true || $Addressvalid == true || $Cityvalid == true || $Phonevalid == true || $Rolevalid == true || $Salaryvalid == true )
      {        
        echo '<script language="javascript">';
        echo 'alert("Empty fields are not allowed")';
        echo '</script>';
      }
          
      if ( $Phonevalid1 == false || $Salaryvalid1 == false )
      {
        echo '<script language="javascript">';
        echo 'alert("Salary and Phone number can only contain numbers")';
        echo '</script>';
      }
      
      $worker->fname = $_POST['fname'];
      $worker->lname = $_POST['lname'];
      $worker->email = $_POST['mail'];
      $worker->address = $_POST['address'];
      $worker->city = $_POST['city'];
      $worker->phonenumber = $_POST['number'];
      $worker->jobRole = $_POST['jobrole'];
      $worker->salary = $_POST['salary'];

      $AccountNumber = $admin->getLastWorker();
      echo '<script language="javascript">';
      echo 'alert("Your AccountNumber is '.$AccountNumber.'")';
      echo '</script>';
      echo '<script>window.location.replace("AdminHomePage.php")</script>';
      // $loginid = $_POST['username'];
      $password = md5($_POST['pass']);

      $admin->addNewWorker($worker);

      $admin->newWorkerLogin($AccountNumber, $password);

  }

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>FDJZ Bank | Add New Worker</title>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
  <link rel="stylesheet" href="../css/addworker.css">
</head>
<body>
    <a href="AdminHomePage.php"><img src="../img/WorkerLogo.png" id="logoanchor"></a>
	<h1>Add new worker</h1>
    <form method="post" action="">
        <div class="contentform">
            <div class="leftgroup">
                <div class="form-group">
                    <p>First Name</p>
                    <span class="icon"><i class="fa fa-male"></i></span>
                    <input type="text" name="fname">
                </div>
                <div class="form-group">
                    <p>Last Name</p>
                    <span class="icon"><i class="fa fa-male"></i></span>
                    <input type="text" name="lname">
                </div>
                <div class="form-group">
                    <p>E-mail</p>
                    <span class="icon"><i class="fa fa-envelope-o"></i></span>
                    <input type="email" name="mail">
                </div>
                <div class="form-group">
                    <p>Home Address</p>
                    <span class="icon"><i class="fa fa-home"></i></span>
                    <input type="text" name="address">
                </div>
                <div class="form-group">
                    <p>City</p>
                    <span class="icon"><i class="fa fa-building-o"></i></span>
                    <input type="text" name="city">
                </div>
                <div class="form-group">
                    <p>Phone number</p>
                    <span class="icon"><i class="fa fa-phone"></i></span>
                    <input type="text" name="number">
                </div>
            </div>
            <div class="rightgroup">
                <div class="form-group">
                    <p>Job Role</p>
                    <span class="icon"><i class="fa fa-info"></i></span>
                    <select name="jobrole" class="form-control selectpicker">
                      <optgroup label="Please select the job role" id="list">
                        <option>Accounts Manager</option>
                        <option>Area Manager</option>
                        <option >Bank Director</option>
                        <option >Customer Service</option>
                        <option >Teller</option>
                      </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <p>Salary</p>
                    <span class="icon"><i class="fa fa-dollar"></i></span>
                    <input type="text" name="salary">
                </div>
                <div class="form-group">
                    <p>Password</p>
                    <span class="icon"><i class="fa fa-building-o"></i></span>
                    <input type="password" name="pass" />
                </div>
            </div>
        </div>
        <button type="submit" class="create-profile" value="Create profile">Create profile</button>
    </form>
    <?php
        // include 'Validation.php';
        // if ($_POST)
        // {
        //     $firstname = "fname";
        //     $lastname = "lname";
        //     $mail="mail";
        //     $choose="state";
        //     $address = "address";
        //     $city = "city";
        //     $number = "num";
        //     $salary = "sal";
        //     $username = "username";
        //     $password = "pass";
        //
        //     $validation = new Validation();
        //
        //     $flagfirstname= $validation->IsEmpty($firstname);
        //     $flaglastname= $validation->IsEmpty($lastname);
        //     $flagmail=$validation->IsEmpty($mail);
        //     $flagchoose=$validation->IsEmpty(choose);
        //     $flagaddress= $validation->IsEmpty($address);
        //     $flagcity= $validation->IsEmpty($city);
        //     $flagnum= $validation->IsEmpty($number);
        //     $flagsal= $validation->IsEmpty($salary);
        //     $flagusername= $validation->IsEmpty($username);
        //     $flagpass= $validation->IsEmpty($password);
        //
        //     if ($flagfirstname==false || $flaglastname==false || $flagmail==false || $flagaddress==false || $flagcity==false || $flagnum==false || $flagsal==false || $flagusername==false || $flagpass==false || $flagchoose==false){
        //             echo '<script language="javascript">';
        //             echo 'alert("Missing field")';
        //             echo '</script>';
        //         }
        //     else header('Location: WorkerReport.php');
        //         exit();
        // }

    ?>
</body>
</html>
