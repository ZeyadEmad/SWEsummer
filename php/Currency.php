<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FDJZ BANK | Currency</title>
	<link rel="stylesheet" type="text/css" href="../css/Currency.css">
    <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<html>
	<body>
        <?php include 'navigationbar.php'; ?>
		
            <form action="" method="post">
                <select id= "Dropbox-first" name= "First-dropbox">
                   <option value='USD' title='United States Dollar'>USD</option>
                </select>

                <div class="to" >
                    <b>  TO </b>
                </div>
                <select id= "Dropbox-second" name= "Second-dropbox">
                    <option value='AED' title='United Arab Emirates Dirham'>AED</option>
                    <option value='EUR' title='Euro'>EUR</option>
                    <option value='KWD' title='Kuwaiti Dinar'>KWD</option>
				    <option value='EGP' title='Egyptian Pound'>EGP</option>
				    <option value='GBP' title='British Pound Sterling'>GBP</option>
                </select>

                <div class="submit">
                    <input type="submit" value="CHANGE"> 
                </div>
            </form>

            <div class="screen">
                <img src="../img/NumScreen.png"> 
            </div> 
            
            <div class="Value"> 
			<?php 
                if ($_POST)
                {
                    include 'ConvertCurr.php';
                    $x = new Exchange();
                    $value= $x->change();
                    echo $value;
                }
			?>
                
            </div>
		<?php include 'Footer.php'; ?>
        
	</body>
	
</html>