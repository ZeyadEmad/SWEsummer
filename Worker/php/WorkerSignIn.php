<?php session_start(); ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <title>FDJZ BANK | Sign in</title>
        <link rel="stylesheet" type="text/css" href="../css/signinworker.css">
        <link rel="shortcut icon" type="image/png" href="../img/workerlogolq.png"/>
    </head>
<html>
    <body>
      <?php
        include'../ClassesGedida/Login.php' ;
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = $_POST['username'];
            $password = $_POST['password'];
			if($username!="" &&$password!=""){
            $login = new Login();
            $positionID=$login->loginn($username,$password);
            if($positionID==2){
             echo '<script>window.location.replace("WorkerHomePage.php")</script>';
            }
            if($positionID==1){
             echo '<script>window.location.replace("AdminHomePage.php")</script>';
            }
            else{
              echo '<script language="javascript">';
              echo 'alert("Incorrect Username or Password")';
              echo '</script>';
            }
			}
			else if($username == ""){
			echo '<script language="javascript">';
			echo 'alert("You Must Write Your Username")';
            echo '</script>';
			}
			else if($password == ""){
				
				echo '<script language="javascript">';
              echo 'alert("You Must Write Your Password")';
              echo '</script>';
			}
        }
      ?>
        <form name="form" action="" method="post">
            <div class="modal-content">
                <a href="WorkerSignIn.php"><img src="../img/workerlogolq.png"></a>
                <br>
                Username:
					<br>
                <input type="text" name="username" id="username">
				<br><br>
                Password:  <br>
                <input type="password" name="password" id="password">
				<br><br>
                <input  type = "submit" class="signin" value = "Login"><br>
            </div>
        </form>

    </body>
</html>
