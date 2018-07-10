<?php session_start(); ?>
<?php
        include'../ClassesGedida/Login.php' ;
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = $_POST['userID'];
            $password = $_POST['password'];
			if($username!="" &&$password!=""){
            $login = new Login();
            $positionID=$login->loginn($username,$password);
            if($positionID==3){
             echo '<script>window.location.replace("UserProfile.php")</script>';
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
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <title>FDJZ BANK | Sign In</title>
        <link rel="stylesheet" type="text/css" href="../css/signin.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
    </head>
<html>
    <body>
        <form method="post" action="">
            <div class="modal-content">
                <a href="Home.php"><img src="../img/bankwhite.png"></a>
                <br>
                UserID:  <br>
                <input type="text" name="userID" id="username"> <br><br>
                Password:  <br>
                <input type="password" name="password" id="password"> <br><br>
                <input  type="submit" value="Sign in" class="signin"><br>
            </div>
        </form>
    </body>
</html>
