<?php
/*
Author: Priyank Nasit
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>

<link rel="stylesheet" href="main.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">
	
<form action="" method="post" name="login"  class="main-form needs-validation" class="form-control">


<div class="row">
            <div class="col">
                <div class="form-group">
                	<h1 style="text-align: center;">Log In</h1>
                	<br><br>
                    <label for="firstname">User Name</label>
                    <input type="text" name="username" id="firstname" class="form-control" required="">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="lastname">Password</label>
                    <input type="text" name="password" id="lastname" class="form-control" required="">
                </div>
            </div>
</div>

<!-- <input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required /> -->
<p><input name="submit" type="submit" value="Login" class="btn btn-primary" /></p>
<!-- <input name="submit" type="submit" value="Login" /> -->
</form>
<p style="text-align: center;">Not registered yet? <a href='registration.php'>Register Here</a></p>


</div>
<?php } ?>
<div class="jumbotron text-center" style="margin-bottom:0; position: fixed; left: 0;
  bottom: 0; width: 100%;">
  <p>Created by Priyank Nasit</p>
</div>

</body>
</html>
