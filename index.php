<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lab Management</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 590px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"> <span class="glyphicon glyphicon-education"></span><strong> Lab Management</strong></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>-->
		<li><a href="file/timetable.php"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
		<!--<li><a href="file/aboutA.php"><span class="glyphicon glyphicon-question-sign"></span> About Us</a></li>-->

      </ul>
    </div>
  </div>
</nav>
  <br> <br>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
	<div class="col-sm-8">
<h3><span class="glyphicon glyphicon-education"></span> Welcome <span class="glyphicon glyphicon-book"></span></h3>
<hr color="#d5d5d5">
<!-- Start BODY section -->
<h4><span class="glyphicon glyphicon-open"></span> Currently Free labs <span class="glyphicon glyphicon-"></span></h4>
<?php
include("connection/connect.php");
$sqlTD="select hour(curtime()) as hour,dayofweek(curdate()) as day";
$resultTD=mysqli_query($conn,$sqlTD) or die("could not execute TD");
$rowsTD=mysqli_fetch_assoc($resultTD);
$day=$rowsTD['day'];
$tim=$rowsTD['hour'];
//$day=2;
//echo $tim;
$sql="select name,capacity,start,finish from lab join session ON lab.labid=session.labid WHERE subject is NULL AND day='".$day."' AND start>='".$tim.":00:00'";
$result=mysqli_query($conn,$sql) or die("could not execute Lab select");
echo"<br><br>";
echo"<center>
<table class='table table-hover table-bordered'>
    <thead>
      <tr class='info'>
        <th><span class='glyphicon glyphicon-home'></span> Lab</th>
        <th><span class='glyphicon glyphicon-hdd'></span> Capacity</th>
        <th><span class='glyphicon glyphicon-time'></span> Free from</th>
        <th><span class='glyphicon glyphicon-time'></span> Free till</th>
      </tr>
    </thead>
    <tbody>";
while($rows=mysqli_fetch_assoc($result))
   {
        echo"<tr>";
		echo "<td>".$rows['name']."</td>";
		echo "<td>".$rows['capacity']."</td>";
		echo "<td>".$rows['start']."</td>";
		echo "<td>".$rows['finish']."</td>";
		echo"</tr>";
   }
 echo"</tbody>
  </table>
  </center>";
include("connection/close.php");
?>
<!-- End BODY section -->
</div>
	    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Bhausaheb Bandodkar Technical Education Complex </p>
  <p>Farmagudi, Ponda, Goa 403401</p>

</footer>

</body>
</html>