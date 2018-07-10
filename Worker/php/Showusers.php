<?php
  session_start();
  $flag = 1; //3ashan el filter

  include_once '../ClassesGedida/Admin.php';

  if ($_SESSION['PositionId'] == 1){
    $href = "AdminHomePage.php";
  }else if ($_SESSION['PositionId'] == 2){
    $href = "WorkerHomePage.php";
  }

  $admin = new Admin;

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST['search'])){
      $flag = 1;
    }else{
      $searchId = $_POST['search'];
      // echo $searchId;
      $flag = 2;
    }

  }
 ?>
<html>
    <head>
        <title> FDJZ Bank | Show Customers</title>
        <link rel="stylesheet" type="text/css" href="../css/showusers.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <form action="" method="post">
        <div class="logo">
            <a href="<?php echo $href; ?>" id="logoposition"><img  src="../img/workerlogo.png" alt="" /></a>
        </div>
		      <div>
			         <div id="s">
                  <a id="d">Customers</a>
                  <input type="search" placeholder="Type Here.." name="search" id="y" class="auto">

                    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
                    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
                    <script type="text/javascript">
                    $(function() {

                  	//autocomplete
                    $(".auto").autocomplete({
                      source: "AutoCompleteUser.php",
                      minLength: 1
                      });
                    });
                    </script>
                  <input type="submit" value="Search" id="x">
                  <hr>
			           </div>
	        </div>
        <div class="tableback">
            <table class="userstable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Account number</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($flag == 1){ //batala3 el table awel ma el page tefta7
                    $admin->showAllCustomers();
                  }else if ($flag == 2){
                    $admin->showSpecificCustomerFromSearch($searchId);
                  }
                  ?>
                </tbody>
            </table>
        </div>
		</form>
    </body>
</html>
