<?php

require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="main.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a href="insert.php">Add Students</a>
  <a href="view.php">List of Students</a>
  <a href="fview.php">View Detail of Student</a>
  <a href="logout.php">Logout</a>
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


<div class="form">
<h2>View Records</h2><br>
<table width="100%" border="1" class="table table-hover">
<thead>
<tr><th><strong>S.No</strong></th><th><strong>First Name</strong></th><th><strong>Last Name</strong></th><th><strong>Gender</strong></th><th><strong>Date of Birth</strong></th><th><strong>Address</strong></th><th><strong>Qualification</strong></th>
	
	<th><strong>University</strong></th>
	<th><strong>Passed / Perusing</strong></th>
	<th><strong>Score</strong></th>
	<th><strong>Interested in Course</strong></th>
	<!-- <th><strong>Edit</strong></th>
	<th><strong>Delete</strong></th></tr> -->
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from new_record ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["fname"]; ?></td>
	<td align="center"><?php echo $row["lname"]; ?></td>
	<td align="center"><?php echo $row["gender"]; ?></td>
	<td align="center"><?php echo $row["date"]; ?></td>
	<td align="center"><?php echo $row["address"]; ?></td>
	<td align="center"><?php echo $row["qualification"]; ?></td>
	<td align="center"><?php echo $row["uni"]; ?></td>
	<td align="center"><?php echo $row["pass"]; ?></td>
	<td align="center"><?php echo $row["score"]; ?></td>
	<td align="center"><?php echo $row["course"]; ?></td>
	<!-- <td align="center"><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
	<td align="center"><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td></tr> -->
<?php $count++; } ?>
</tbody>
</table>


</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div style="margin-bottom:0; position: fixed; left: 0;
  bottom: 0; width: 100%;">
  <p style="text-align: right;">Created by Priyank Nasit</p>
</div>
</body>
</html>
