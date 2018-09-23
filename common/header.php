<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lab Management</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
	<script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.js"></script>
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
	.bg-purple {
  background-color: #d7b8fe;
}
.vericaltext{
    width:1px;
    word-wrap: break-word;
    font-family: monospace; /* this is just for good looks */
}

.col-sm-8 {
    width: 84.667%;
    background-color: rgb(215, 215, 215);
}
.col-sm-2 {
    width: 8.667%;
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
      <a class="navbar-brand" href="../index.php"><span class="glyphicon glyphicon-education"></span> <strong>Lab Management</strong></a>
	  <!--?Tid=<?php //$Tid ?>&Name=<?php //$Name ?>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	   <li><a href="timetable.php"><span class='glyphicon glyphicon-th-list'></span> Time Table</a></li>
	   <li><a href="asset.php"><span class='glyphicon glyphicon-list-alt'></span> Assets</a></li>
	   <li><a href="datepick.php"><span class='glyphicon glyphicon-calendar'></span> Calendar</a></li>
	   <li><a href="condemn.php"><span class='glyphicon glyphicon-trash'></span>Condemned</a></li>
	   <!--<li><a href="subject.php">InFo</a></li>-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
	 <!--<li><a href="file/aboutA.php"><span class="glyphicon glyphicon-question-sign"></span> About Us</a></li>-->
        <li><a href=""><span class="glyphicon glyphicon-user"></span>[<?php echo $_SESSION['name'] ?>]</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
  <br><br>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>