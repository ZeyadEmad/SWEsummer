<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FDJZ BANK | About Us</title>
	<link rel="stylesheet" type="text/css" href="../css/aboutus.css">
    
	
	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
		  
		left:500px; 
        height: 200px;
		width:400px;
      }
     
    </style>



</head>
<html>
	<body>
        <?php include '../php/navigationbar.php'; ?>

        <article>
        <h1>History</h1>
            <p>Founded in 1952, FDJZ bank has been an avid contributor to the Egyptian economy through supporting its multileveled sectors by consistently offering our clients a full range of value-added products, services and ensuring an outstanding level of customer service.
            </p>
			<hr>
        <h1>Founders</h1>
            <p>
            FDJZ is a bank made by the people for the people with leading corporate executives Fady, David, John and Zeyad, we deliver you the best of the best and we guarantee you nothing less. FDJZ is the number one leading bank in Egypt, with over half a century’s worth of experience, the numbers speak for themselves and not a single dissatisfied business partner throughout the years.
            </p>
			<hr>
        <h1>Mission</h1>
            <p>
            Our plan is to change what a bank is and what bank can do more importantly what it has to offer, while contributing to the revitalization of the economic cycle and development.The bank is adamant to continue applying the best standards in its management, corporate governance, products and services, in addition, to its continuous focus on the development of its human resources skills and competencies by providing exclusively tailored effective training programs to its staff’s. <br> In a few years, FDJZ has become one of the fastest growing banks in Egypt with a total of 157 branches and 391000 ATMs spread nationwide, we will continue along the same path for many more years to come.
            </p>
			<h1>Our Branches </h1>
			<p>
			<div id="map"></div>
			</p>
			
			
        </article>

        <?php include 'Footer.php'; ?>

		
		 <script>

      function initMap() {
        var Abbas = {lat: 30.0565, lng: 31.3378};
		var Makram = {lat: 30.0621, lng: 31.345};


        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: Abbas
        });

        var marker = new google.maps.Marker({
          position: Abbas,
          map: map,
          title: 'Abbas branch'
        });
		var marker = new google.maps.Marker({
          position: Makram,
          map: map,
          title: 'Makram branch!'
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxzhrX6XaKW_TxN05meC8jrNp7dYu0mao&callback=initMap">
    </script>
	</body>
</html>