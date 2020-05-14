<?php


include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="home.html" class="active">Home</a>
  <a href="insert.php">Add Students</a>
  <a href="view.php">List of Students</a>
  <a href="fview.php">View Detail of Student</a>
  <a href="Logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>



<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>


<div style="text-align: left;">
<h3>Welcome <?php echo $_SESSION['username']; ?>!</h3>

<!-- <p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a> -->


<div style="margin-bottom:0; position: fixed; left: 0;
  bottom: 0; width: 100%;">
  <p style="text-align: right;">Created by Priyank Nasit</p>
</div>
</div>
</body>
</html>
