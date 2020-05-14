<?php

 
require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");
$fname =$_REQUEST['fname'];
$lname =$_REQUEST['lname'];
$gender =$_REQUEST['gender'];
$date =$_REQUEST['date'];
$address =$_REQUEST['address'];
$qualification =$_REQUEST['qualification'];
$uni =$_REQUEST['uni'];
$pass = $_REQUEST['pass'];
$score = $_REQUEST['score'];
$course = $_REQUEST['course'];
$submittedby = $_SESSION["username"];
$ins_query="insert into new_record (`trn_date`,`fname`,`lname`,`gender`,`date`,`address`,`qualification`,`uni`,`pass`,`score`,`course`,`submittedby`) values ('$trn_date','$fname','$lname','$gender','$date','$address','$qualification','$uni','$pass','$score','$course','$submittedby')";
mysqli_query($con,$ins_query) or die(mysql_error());
$status = "New Record Inserted Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap 4 Introduction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="main.css">
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

<div>
<h1 style="text-align: center;">Add Student</h1>
<br>
<form name="form" method="post" action="" class="main-form needs-validation"> 
<input type="hidden" name="new" value="1" />
<!-- <p><input type="text" name="fname" placeholder="Enter First Name" class="form-control" required /></p>
<p><input type="text" name="lname" placeholder="Enter Last Name" class="form-control" required /></p> -->

<div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="fname" id="firstname" class="form-control" required="">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lname" id="lastname" class="form-control" required="">
                </div>
            </div>
</div>

<div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required="">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
</div>

<label for="gender">Date of Birth</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="date" required="" />
        <br>

<div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control" id="address" rows="3"></textarea>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="qualification">Qualification</label>
                    <input type="text" name="qualification" id="qualification" class="form-control" required="">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="study">University</label>
                    <input type="text" name="uni" id="study" class="form-control" required="">
                </div>
            </div>
	</div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="firstname">Passed</label>
                    <input type="text" name="pass" id="pass" class="form-control" required="">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="firstname">Score</label>
                    <input type="text" name="score" id="score" class="form-control" required="">
                </div>
            </div>
        </div>

        <div class="form-group">
                    <label for="study">Interested in Course</label>
                    <input type="text" name="course" id="study" class="form-control" required="">
                </div>

<p><input name="submit" type="submit" value="Submit" class="btn btn-primary" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script>
        var form = document.querySelector('.needs-validation');

        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        })
    </script>
<div style="margin-bottom:0; position: relative; left: 0;
  bottom: 0; width: 100%;">
  <p style="text-align: right;">Created by Priyank Nasit</p>
</div>
</body>
</html>
