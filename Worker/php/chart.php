<?php
/* Your Database Name */

$DB_NAME = 'FDJZ';

/* Database Host */
$DB_HOST = 'localhost';

/* Your Database User Name and Passowrd */
$DB_USER = 'root';
$DB_PASS = '';

  /* Establish the database connection */
  $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }

   /* select all the weekly tasks from the table googlechart */
  $result = $mysqli->query('SELECT * FROM `chart`');

  /*
      ---------------------------
      example data: Table (googlechart)
      --------------------------
      Weekly_Task     percentage
      Sleep           30
      Watching Movie  10
      job             40
      Exercise        20
  */



  $rows = array();
  $table = array();
  $table['cols'] = array(

    // Labels for your chart, these represent the column titles.
    /*
        note that one column is in "string" format and another one is in "number" format
        as pie chart only required "numbers" for calculating percentage
        and string will be used for Slice title
    */

    array('label' => 'AccountType', 'type' => 'string'),
    array('label' => 'Number Of Accounts', 'type' => 'number')

);
    /* Extract the information from $result */
    foreach($result as $r) {

      $temp = array();

      // The following line will be used to slice the Pie chart

      $temp[] = array('v' => (string) $r['Type']);

      // Values of the each slice

      $temp[] = array('v' => (int) $r['Number']);
      $rows[] = array('c' => $temp);
    }

$table['rows'] = $rows;

// convert data into JSON format
$jsonTable = json_encode($table);
//echo $jsonTable;


?>
<html>
  <head>
    <title>FDJZ Bank | Statistics</title>
    <link rel="stylesheet" type="text/css" href="../css/chart.css">
    <link rel="shortcut icon" type="image/png" href="../img/banklogo.png"/>

    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">


    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: 'Number of loans from total bank accounts',
          is3D: 'true',
          width: 800,
          height: 600
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
  </head>

  <body>
    <div class="logo">
        <h1><a href="AdminHomePage.php" id="logoposition"><img  src="../img/WorkerLogo.png" alt="" /></a></h1>
    </div>
    <!--this is the div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>
