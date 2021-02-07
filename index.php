<?php // line added to turn on color syntax highlight
require_once "pdo1.php";

$stmt=$pdo->query("SELECT Temperature FROM dht11 WHERE DATE= (SELECT max(Date) FROM dht11)");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$fetched_temp=$row['Temperature'];

$stmt=$pdo->query("SELECT Humidity FROM dht11 WHERE DATE= (SELECT max(Date) FROM dht11)");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$fetched_humidity=$row['Humidity'];
$percent_fetched_humidity=$fetched_humidity/100;

$stmt=$pdo->query("SELECT Moisture FROM dht11 WHERE DATE= (SELECT max(Date) FROM dht11)");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
    $fetched_Moist=$row['Moisture'];
?>
<!DOCTYPE html>
<html>
<title>Smart Monitor</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/fixed.css">
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide"><img src="LOGOFARM.PNG" style="float:right width:20px;height:20px" >Smart Tech</a>
    <div class="w3-right w3-hide-small">
    <a href="index.php" class="w3-bar-item w3-button">HOME</a>
      <a href="about.html" class="w3-bar-item w3-button">ABOUT</a>
      <a href="#footer" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACT</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
		  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<img class="d-block w-100" src="farm.jpg" alt="First slide">
		  </div>
		  <div class="carousel-item">
			<img class="d-block w-100" src="farm3.jpg" alt="Second slide">
		  </div>
		  <div class="carousel-item">
			<img class="d-block w-100" src="farm5.jpeg" alt="Third slide">
		  </div>
		  <div class="carousel-item">
			<img class="d-block w-100" src="farm1.jpg" alt="Third slide">
		  </div>
    </div>
    
  <header  id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px;">

  <pre>
    <span class="w3-jumbo w3-hide-small"  class="header" style="color: black">        Smart Farm Monitoring  </span><br>
  </pre> 
    <span class="w3-xxlarge w3-hide-large w3-hide-medium">Start something that matters</span><br>
    <p id="headbutton"><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Read more</a></p>
    
  </div> 

</header>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>



<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
</nav>



<!--current readings-->
<div>
<div class="card">
<span><img src="temp.png" alt="Temperature icon " width="120" height="140"  style="float:right"></span> 
  <header class="container">
    <h4>Current Temperature</h4>
  </header>
  <div class="container"> 
    <?php
    echo("<p id='reading'>".$fetched_temp." Degree Celcius </p>");
    ?>
   
  </div>
  
  </div>
  <div class="card">
    <br>
  <span><img src="humid.png" alt="Humidity icon " width="100" height="100"  style="float:right"></span> 
    <header class="container">
      <h4> Current Humidity</h4>
    </header>
    <div class="container"> 
    <?php

    echo("<p id='reading'>".$fetched_humidity." Percent</p>");
    ?> 
    </div>
    </div>
    <div class="card">

    <span><img src="moisture.png" alt="Moisture icon " width="120" height="170"  style="float:right"></span> 
      <header class="container">
        <h4> Current Soil Moisture</h4>
      </header>
      <div class="container"> 
      <?php
  
    echo("<p id='reading'>".$fetched_Moist." Units </p>");
    ?> 
      </div>
      </div>
      <div style="overflow-x:auto; background-color: lightgrey">
      <br>
    <h4><textalign><center> Current Air Parameters For Relative Humidity Range [0-100]</center></textalign></h4>
    <br>
</div>
      <div class="card">
        
    <span><img src="atmos.png" alt="Atmospheric pressure icon " width="120" height="170"  style="float:right"></span> 
  <header class="container">
    <h4>Atmospheric Pressure</h4>
  </header>
  <div class="container"> 
  <?php
  $pressure = 101325*pow(1 - 2.25577e-5*365,5.2559);
  $pressure=round($pressure,2);
  echo("<p id='reading'>".$pressure."  Pascal </p>");
  ?>
  </div>
  </div>


  <div class="card">
  <span><img src="vapour.png" alt="Saturated Vapour pressure icon " width="120" height="170"  style="float:right"></span> 
  <header class="container">
    <h4>Saturated Vapour Pressure  </h4>
  </header>
  <div class="container"> 
  <?php
  $c1 = -5.6745359e3;
  $c2 = 6.3925247e0;
  $c3 = -9.677843e-3;
  $c4 = 6.2215701e-7;
  $c5 = 2.0747825e-9;
  $c6 = -9.484024e-13;
  $c7 = 4.1635019e0;
  
  $c8=-5.8002206e3;
  $c9=1.3914993;
  $c10=-4.8640239e-2;
  $c11=4.1764768e-5;
  $c12=-1.4452093e-8;
  $c13=6.5459673;
  $t=$fetched_temp;
  
  if($t>0)
    {
      $t=$t+273.15;
      $saturation_pressure=exp($c8/$t+$c9+$c10*$t+$c11*$t*$t+$c12*$t*$t*$t+$c13*log($t));
      $saturation_pressure=round($saturation_pressure);
    }
  else
    { 
      $t=$t+273.15;
      $saturation_pressure=exp($c1/$t+$c2+$c3*$t+$c4*$t*$t+$c5*$t*$t*$t+$c6*$t*$t*$t*$t+$c7*log($t));
      $saturation_pressure=round($saturation_pressure); 
    }   
    
    echo("<p id='reading'>".$saturation_pressure."  Pascal </p>");
  ?>
    
  </div>
  </div>


  <div class="card">
  <header class="container">
    <h4>Partial Vapour Pressure</h4>
  </header>
  <div class="container"> 
    <?php
     $p_w=$saturation_pressure*$percent_fetched_humidity;
     echo("<p id='reading'>".$p_w."  Pascal </p>");
    ?>
  </div>
  </div>

  <div class="card">
  <span><img src="humidratio.png" alt="Humdity ratio icon " width="110" height="130"  style="float:right"></span> 
  <header class="container">
    <h4>Humidity Ratio</h4>
  </header>
  <div class="container"> 
    <?php
      $hum = 0.62198*$p_w/($pressure-$p_w);
      $hum=round($hum,4);
      echo("<p id='reading'>".$hum."  Kg/Kg </p>");
    ?>
  </div>
  </div>


  <div class="card">
  <header class="container">
    <h4>Dewpoint temperature </h4>
  </header>
  <div class="container"> 
   <?php
   $log_result=log($percent_fetched_humidity);
   $DPT=((4030*($fetched_temp+235))/(4030-($fetched_temp+235)*$log_result))-235;
   $DPT=round($DPT,2);
   echo("<p id='reading'>".$DPT."  Degree Celcius </p>");
   ?>
  </div>
  </div>

  <div class="card">
  <span><img src="enthalpy.png" alt="Enthalpy icon " width="120" height="130"  style="float:right"></span> 
  <header class="container">
    <h4>Enthalpy</h4>
  </header>
  <div class="container"> 
    <?php
     $enthalpy=1.006*$fetched_temp + $hum*(2501+1.805*$fetched_temp);
     $enthalpy=round($enthalpy,2);
     echo("<p id='reading'>".$enthalpy."  KJ/Kg </p>"); 
    ?>

  </div>
  </div>

  <div class="card">
  <span><img src="sv.png" alt="Specific Volume icon " width="120" height="130"  style="float:right"></span> 
  <header class="container">
    <h4>Specific Volume</h4>
  </header>
  <div class="container"> 
  <?php
  $specific_volume = 287.1*($fetched_temp+273.15)*(1+1.6078*$hum)/$pressure;
  $specific_volume=round($specific_volume,4);
  echo("<p id='reading'>".$specific_volume."  meter cube/Kg </p>"); 
  ?>
  </div>
  </div>
  
  <div class="card">
  <span><img src="density.png" alt="Density icon " width="120" height="130"  style="float:right"></span> 
  <header class="container">
    <h4>Density</h4>
  </header>
  <div class="container"> 
  <?php
  $density=(1.0/$specific_volume)*(1.0+$hum);
  $density=round($density,2);
  echo("<p id='reading'>".$density."  kg/meter cube </p>"); 
  ?>
  </div>
  </div>
<div>
<pre>
<p id='psychometry'> <b>               

                                                   Above values are the Values measured by the Psychometric chart based formulas that takes 
                                                                     relative humidity and Dry bulb temperature as input. 
                                                                All the above mentioned readings are the psychometric properties.</b><p>
 </pre>        
 </div>
</div>

<!--graphs-->
<div>

<div class="card2">
  <header class="container">
    <br>
    <h4><textalign><center>Temperature Sensor Data</center></textalign></h4>
  </header>
  <div class="container">
  <?php // line added to turn on color syntax highlight
require_once "pdo1.php";
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script  type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Temperature'],
          <?php
         $stmt=$pdo->query("SELECT Temperature,Date FROM dht11 ORDER BY DATE");
         
          while ($result=$stmt->fetch(PDO::FETCH_ASSOC)){
            echo"['".$result['Date']."',".$result['Temperature']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Temperature Data',
          hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
          colors: ['rgb(0,255,255)', 'blue', '#3fc26b'],
          vAxis: {minValue: 0},
          vAxis: {
           gridlines: {
            color: 'transparent'
    }
}
          
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
  </body>
</html>
<br>
  </div>
</div>

<br>
<br>
<div class="card2">
  
  <header class="container">
    <br>
    <h4><textalign><center>Humidity Sensor Data</center></textalign></h4>
  </header>
  <div class="container">
  <?php // line added to turn on color syntax highlight
require_once "pdo1.php";
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data2 = google.visualization.arrayToDataTable([
          ['Date', 'Humidity'],
          <?php
         $stmt=$pdo->query("SELECT Humidity,Date FROM dht11 ORDER BY DATE");
         
          while ($result=$stmt->fetch(PDO::FETCH_ASSOC)){
            echo"['".$result['Date']."',".$result['Humidity']."],";
          }

         ?>
        ]);

        var options2 = {
          title: 'Humidity Data',
          hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          colors: ['rgb(0,255,255)', 'blue', '#3fc26b'],
          vAxis: {
           gridlines: {
            color: 'transparent'
    }
}
        };

        var chart2 = new google.visualization.AreaChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);
      }
    </script>
  </head>
  <body>
    <div id="chart_div2" style="width: 100%; height: 500px;"></div>
  </body>
</html>
<br>
  </div>
</div>
<div class="card2">
  <header class="container">
    <br>
    <h4><textalign><center>Soil Moisture Sensor Data</center></textalign></h4>
  </header>
  <div class="container">
  <?php // line added to turn on color syntax highlight
require_once "pdo1.php";
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart3);
      function drawChart3() {
        var data3 = google.visualization.arrayToDataTable([
          ['Date', 'Moisture'],
          <?php
         $stmt=$pdo->query("SELECT Moisture,Date FROM dht11 ORDER BY DATE");
         
          while ($result=$stmt->fetch(PDO::FETCH_ASSOC)){
            echo"['".$result['Date']."',".$result['Moisture']."],";
          }

         ?>
        ]);

        var options3 = {
          title: 'Moisture Data',
          hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          colors: ['rgb(0,255,255)', 'blue', '#3fc26b'],
          vAxis: {
           gridlines: {
            color: 'transparent'
    }
}
        };

        var chart3 = new google.visualization.AreaChart(document.getElementById('chart_div3'));
        chart3.draw(data3, options3);
      }
    </script>
  </head>
  <body>
    <div id="chart_div3" style="width: 100%; height: 500px;"></div>
  </body>
  
</html>
<br>
  </div>
</div>

</div>




<!--Data-->
<div>
<div style="overflow-x:auto;">
    <h4><b><textalign><center>Readings</center></textalign></b></h4>
    <table border='1' >
<tr>
<td>Temperature</td>
<td>Humidity</td>
<td>Moisture</td>
<td>Date and Time </td>
</tr>
<?php // line added to turn on color syntax highlight
require_once "pdo1.php";

$stmt=$pdo->query("SELECT Temperature,Humidity,Moisture,Date FROM dht11 ORDER BY DATE");

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    
  echo "<tr><td>";
  echo($row['Temperature']);
  echo("</td><td>");
  echo($row['Humidity']);
  echo("</td><td>");
  echo($row['Moisture']);
  echo("</td><td>");
  echo($row['Date']);
  echo("</td></tr>\n");
}
?>
</table>
</div>
</div>



<!--- Script Source Files -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<!--- End of Script Source Files -->

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
<!--Facebook-->
<a class="fb-ic mr-3" role="button"><i class="fab fa-lg fa-facebook-f"></i></a>
<!--Twitter-->
<a class="tw-ic mr-3" role="button"><i class="fab fa-lg fa-twitter"></i></a>
<!--Google +-->
<a class="gplus-ic mr-3" role="button"><i class="fab fa-lg fa-google-plus-g"></i></a>
<!--Linkedin-->
<a class="li-ic mr-3" role="button"><i class="fab fa-lg fa-linkedin-in"></i></a>
<!--Instagram-->
<a class="ins-ic mr-3" role="button"><i class="fab fa-lg fa-instagram"></i></a>


  </div>
</footer>

</body>
</html>



 

