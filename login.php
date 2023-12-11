<?php
session_start();
// include Function  file
include_once('function.php');
// Object creation
$usercredentials=new DB_con();
if(isset($_POST['login']))
{
// Posted Values
$username=$_POST['username'];
$password=md5($_POST['password']);
//Function Calling
$ret=$usercredentials->signin($username,$password);
$num=mysqli_fetch_array($ret);
if($num>0)
{
  $_SESSION['uid']=$num['register_id'];
  $_SESSION['susername']=$num['user_name'];
// For success
echo "<script>window.location.href='wholeseller.php'</script>";
}
else
{
// Message for unsuccessfull login
echo "<script>alert('Invalid details. Please try again');</script>";
echo "<script>window.location.href='login.php'</script>";
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="background-image: url(images/map.jpg);background-repeat: no-repeat;background-position: cover;background-size:100% ;">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div style="background-color: greenyellow;" class="card">
        <div class="card-header text-center">
          Login 
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
            </div>
            <button type="submit" name="login" class="btn btn-info w-100">Login</button>
            <div class="controls pt-2 text-center">
      Not Registered yet? <a href="register.php">Register Here</a>
      </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

