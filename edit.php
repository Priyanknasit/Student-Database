<?php
 
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from new_record where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap 4 Introduction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
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
<h1>Update Record</h1><br>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$fname =$_REQUEST['fname'];
$lname =$_REQUEST['lname'];
$gender =$_REQUEST['gender'];
$date =$_REQUEST['date'];
$address =$_REQUEST['address'];
$qualification =$_REQUEST['qualification'];
$uni =$_REQUEST['uni'];
$pass =$_REQUEST['pass'];
$score =$_REQUEST['score'];
$course =$_REQUEST['course'];
$submittedby = $_SESSION["username"];
$update="update new_record set trn_date='".$trn_date."', fname='".$fname."',  lname='".$lname."',gender='".$gender."',date='".$date."',address='".$address."',qualification='".$qualification."',uni='".$uni."',pass='".$pass."',score='".$score."',course='".$course."', submittedby='".$submittedby."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='fview.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action="" class="main-form needs-validation"> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />

<div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="fname" id="firstname" class="form-control" required value="<?php echo $row['fname'];?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lname" id="lastname" class="form-control" required value="<?php echo $row['lname'];?>">
                </div>
            </div>
</div>

<div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required value="<?php echo $row['gender'];?>">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
</div>

<label for="gender">Date of Birth</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="date" required value="<?php echo $row['date'];?>" />
        <br>

<div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control" id="address" rows="3" required value="<?php echo $row['address'];?>"></textarea>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="qualification">Qualification</label>
                    <input type="text" name="qualification" id="qualification" class="form-control" required value="<?php echo $row['qualification'];?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="study">University</label>
                    <input type="text" name="uni" id="study" class="form-control" required value="<?php echo $row['uni'];?>">
                </div>
            </div>
	</div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="firstname">Passed</label>
                    <input type="text" name="pass" id="pass" class="form-control" required value="<?php echo $row['pass'];?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="firstname">Score</label>
                    <input type="text" name="score" id="score" class="form-control" required value="<?php echo $row['score'];?>">
                </div>
            </div>
        </div>

<div class="form-group">
                    <label for="study">Interested in Course</label>
                    <input type="text" name="course" id="study" class="form-control" required value="<?php echo $row['course'];?>">
                </div>


<p><input name="submit" type="submit" value="Update" class="btn btn-primary"/></p>
</form>
<?php } ?>
</div>
</div>

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

</body>
</html>
