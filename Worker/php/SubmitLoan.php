<?php
    session_start();
    if ($_SESSION['PositionId'] == 1){
      $href = "AdminHomePage.php";
    }else if ($_SESSION['PositionId'] == 2){
      $href = "WorkerHomePage.php";
    }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>FDJZ Bank | New Loan</title>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
  <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
  <link rel="stylesheet" href="../css/submitloan.css">
</head>

  <body>
      <a href="<?php echo $href; ?>"><img src="../img/WorkerLogo.png" id="logoanchor"></a>
	  <h1>New Loan</h1>

	  <?php
  	  require "../ClassesGedida/Loans.php";
      include "../ClassesGedida/Worker.php";
      include "../ClassesGedida/Accounts.php";
      $loans = new loans;
  	  $Worker=new Worker;
      $Accounts = new Accounts;

     if ($_SERVER["REQUEST_METHOD"] == "POST"){
  		 $AccountNumber = $Accounts->GettingNewAccountNumber();
  		 $counter=$loans->getNewLoanID();
  		 $UserID = $_POST["UserID"];
  		 $Amount =0-$_POST["LoanAmount"];
  		 $IntrestRate= $_POST["IntrestRate"];
  		 $useOfLoan=$_POST["UseOfLoan"];
         
  		 if($Worker->checkCustomerID($UserID)==true){
    		 $Worker->AddnewLoanAccount($UserID,$AccountNumber,$Amount);
    		 $loans->SubmitLoan($AccountNumber,$Amount,$IntrestRate,$useOfLoan);
  		   echo '<script language="javascript">';
  			 echo 'alert(" Loan Submited Your AccountNumber is '.$AccountNumber.'")';
         echo '</script>';
  			 echo '<script>window.location.replace("WorkerHomePage.php")</script>';
		 }
		 else {
			 echo '<script language="javascript">';
			 echo 'alert("not existing ID")';
      echo '</script>';
		 }
	 }

?>
  <form method="post">
        <div class="contentform">
            <div>
                <div class="form-group">
                    <p>User ID</p>
                    <span class="icon"><i class="fa fa-male"></i></span>
                    <input type="text" name="UserID"required class="auto"/>
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
                </div>

                <div class="form-group">
                    <p>Loan Amount</p>
                    <span class="icon"><i class="fa fa-usd"></i></span>
                    <input type="text" name="LoanAmount" required/>
                </div>

                <div class="form-group">
                <p>Interest Rate</p>
                <span class="icon"><i class="fa fa-percent"></i></span>
                    <input type="text" name="IntrestRate" required/>
                </div>

                <div class="form-group">
                <p>Use of loan</p>
                <span class="icon"><i class="fa fa-home"></i></span>
                    <input type="text" name="UseOfLoan"required/>
                </div>
           </div>
        </div>
        <button type="submit" class="create-profile">Submit</button>
    </form>
    </body>
</html>
