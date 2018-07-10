<?php
session_start();
?>	
<html>

    <head>
        <title> FDJZ Bank | Transaction </title>
        <link rel="stylesheet" type="text/css" href="../css/BankTransaction.css">
        <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        
        <?php 
            require("../ClassesGedida/Transactions.php") ;
            $Transaction = new Transactions ;
        ?>
        
        <div class="logo">
            <h1><a href="UserProfile.php" id="logoposition"><img  src="../img/banklogo.png" alt="" /></a></h1>
        </div>
        <span id="header">
            Transaction page
        </span>

        <br>
        <br>
        <div class="pictures">
             <marquee
                      scrollamount="30"
                      direction="right"
                      behavior="scroll">

                 <img src="../img/money.png" / id="img">
                 <img src="../img/right.png" / id="img">
             </marquee>
             <marquee
                      scrollamount="30"
                      direction="left"
                      behavior="scroll">

                 <img src="../img/left.png" / id="img">
                 <img src="../img/money.png" / id="img">
             </marquee>
        </div>
        
        <form id = "form" action = "" method = "post">
            <table>
                <tr>
                    <td>
                        From account :
                    </td>
                    <td>
                      <select name = "from" >
                          <optgroup label = "Your accounts" id = "list" >
                              
                              <?php
                                $array=$Transaction->getAccountNumbers();
                                $result=count($array);
                                
                                for ( $i=0 ; $i<$result ; $i++ )
                                {
                                    echo "<option value = ' $array[$i] '>" .$array[$i]. "</option>";
                                }
                              ?>         
                              
                          </optgroup>
                      </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        To account :
                    </td>
                    <td>
                        <input type="text" id="formID" name="to" >
                    </td>
                </tr>

                <tr>
                    <td>
                        Amount :
                    </td>
                    <td>
                        <input type="text" id="formID" name="amount" >
                    </td>
                </tr>

            </table>


            <input type="reset" value="Cancel" class="btn1" onclick="location.href='UserProfile.php'">

            <input value="Confirm Transaction" id="confirm" class="btn1" onclick="document.getElementById('id01').style.display='block'" >
             
            <div id="id01" class="modal">
                <form class="modal-content animate" action="/action_page.php">
                    <div class="container">

                        <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn">Accept</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </form>
        <script>
        var modal = document.getElementById('id01');

        window.onclick = function(event) 
        {
        if (event.target == modal) 
            {
                modal.style.display = "none";
            }
        }
        </script>

        <?php

            $db_obj = new dbconnect;
            include_once 'Validation.php';
            require_once("../ClassesGedida/dbconnect.php");

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $valid = new validation;
                $trans = new Transactions;

                $from   = $_POST['from'];
                $to     = $_POST['to'];
                $amount = $_POST['amount'];
                
                $toVlad = $trans->ExistingAccountNumber($to);
                $amVlad = $valid->IsNumber($amount);
//                $toVlad = true;
                $result = $trans->getBalance($from);
                $row = $result->fetch_assoc();
                $bal = $row['balance'];

                if ( $toVlad == true )
                {
                    echo '<script language="javascript">';
                    echo 'alert("The entered account is incorrect")';
                    echo '</script>';
                }
                
                if ( $amVlad == true )
                {
                    echo '<script language="javascript">';
                    echo 'alert("Entered ammount is incorrect")';
                    echo '</script>';
                }
                
                if ( $bal <= 0 )
                {
                    // balance is 0 or bellow
                    echo '<script language="javascript">';
                    echo 'alert("Sorry you do not have sufficient money")';
                    echo '</script>';
                }
                if ( $amount > $bal || $amount <= 0 )
                {
                    // amount greater than balance or wrong amount input
                    echo '<script language="javascript">';
                    echo 'alert("You have entered a wrong value")';
                    echo '</script>';
                }

                if ( $amount < $bal && $toVlad == false )
                {   
                    $result2 = $trans->toBalance($to);
                    $row2 = $result2->fetch_assoc();
                    $bom2 = $row2['balance'];

                    $newBalance = $bal - $amount ;
                    $trans->minus( $newBalance , $from ) ;
                    
                    $newBalance2 = $bom2 + $amount ;
                    $trans->plus( $newBalance2 , $to ) ;

                    $trans->pushTransaction( $from , $to , $amount );
            
                }
            }

        ?>
                             
    </body>

</html>
