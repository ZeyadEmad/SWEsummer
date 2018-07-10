<?php session_start();
?>
<html>
    <head>
        <title> FDJZ Bank | Withdraw</title>
        <link rel="stylesheet" type="text/css" href="../css/DepositandWithdraw.css">
        <link rel="shortcut icon" type="image/png" href="../img/workerlogolq.png"/>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    </head>
    <body>
	<div class="Word">Withdraw
	</div>
	<div class="Border">
        <a href="WorkerHomePage.php"><img src="../img/WorkerLogo.png" id="logo"></a>
		</br></br></br>
		<form id="WithdrawDepositForm"  action="" method="post">
		<div class="AccountNum">Account Number: </br>
		<input class="AccountNumId"  name="AccountNumId"  id="AccountNumId" size="25">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
    $(function() {

      //autocomplete
      $(".AccountNumId").autocomplete({
        source: "AutoCompleteAccount.php",
        minLength: 1
      });
    });
    </script>
		</br></br>
		Amount:
		</br>
		<input class="AmountId" id="AmountId" name="AmountId"  size="25">

		</div>
		</br>
		<input type="Submit" class="Sub" Value="Submit">
		</form>

		</div>
		<?php

 if ($_SERVER["REQUEST_METHOD"] == "POST"){
			include '../ClassesGedida/Worker.php';
            $AccountNum = $_POST['AccountNumId'];
            $Amount = $_POST['AmountId'];
            $Worker = new Worker();
			if ($Worker->transactions->ExistingAccountNumber($AccountNum)==true)
			{
            $Worker->transactions->WithDraw($AccountNum,$Amount);
			 echo '<script>window.location.replace("WorkerHomePage.php")</script>';

			}
			else
			{
				echo '<script language="javascript">';
				echo 'alert("No existing ID")';
				echo '</script>';
			}

        }


		/*	include 'Validation.php';
	if ($_POST)
	{

		$AccountId = "AccountNumId";
		$AmountId="AmountId";
		$validation = new Validation();
		$flagAccountId = $validation->IsNumber($AccountId);
		$flagAmountId = $validation->IsNumber($AmountId);

		$flagAmoutpositive= $validation->IsPositive($AmountId);

		if ($flagAccountId==false || $flagAmountId ==false)
		{
							echo '<script language="javascript">';
							echo 'alert("Non numeric field")';
							echo '</script>';
		}
			else if ($flagAmoutpositive==false)
						{
							echo '<script language="javascript">';
							echo 'alert("negative amount")';
							echo '</script>';

						}

			else

				header('Location: WorkerHomePage.php');
				exit();






	}
	*/



		?>

		</body>

</html>
