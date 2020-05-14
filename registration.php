<?php
/*
Author: Priyank Nasit
*/
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Student Database</h1>
  <p>Add, delete & edit...!</p> 
</div>	
	<div class="topnav" id="myTopnav">
  <a href="home.html" class="active">Home</a>
  <a href="insert.php">Add Students</a>
  <a href="view.php">List of Students</a>
  <a href="fview.php">View Detail of Student</a>
  <a href="login.php">Login</a>
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
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<form name="registration" action="" method="post" class="main-form needs-validation" class="form-control">
<h1 style="text-align: center;">Registration</h1>

<div class="row">
            <div class="col">
                <div class="form-group">
                	<br><br>
                    <label for="firstname">User Name</label>
                    <input type="text" name="username" id="firstname" class="form-control" required="">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="lastname">Email</label>
                    <input type="email" name="email" id="lastname" class="form-control" required="">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="lastname">Password</label>
                    <input type="text" name="password" id="lastname" class="form-control" required="">
                </div>
            </div>
</div>


<input type="submit" name="submit" value="Register" class="btn btn-primary"/>
</form>

<?php } ?>

<div class="jumbotron text-center" style="margin-bottom:0; position: fixed; left: 0;
  bottom: 0; width: 100%;">
  <p>Created by Priyank Nasit</p>
</div>

</body>
</html>
