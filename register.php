
<?php 

// include Function  file
include_once('function.php');
// Object creation
$userdata=new DB_con();
if(isset($_POST['submit']))
{
// Posted Values
$username=$_POST['username'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$cpassword=md5($_POST['cpassword']);
$mobile=$_POST['mobile'];

//Function Calling
$sql=$userdata->registration($username,$email,$password,$cpassword,$mobile);
if($sql)
{
  
// Message for successfull insertion
echo "<script>alert('Registration successfull.');</script>";
echo "<script>window.location.href='login.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='login.php'</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body style="background-image: url(images/map.jpg);background-repeat: no-repeat;background-position: cover;background-size:100% ;">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
    
        <div class="card"style="background-color: hotpink;">
          <div class="card-body">
            <h3 class="card-title text-center">Register</h3>
            <form action="" method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
              </div>
              <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" id="confirmPassword" placeholder="Confirm your password">
              </div>
              <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="Enter your mobile number">
              </div>
              <button type="submit" name="submit" class="btn btn-primary w-100">Register</button>
              <div class="control-group">
      <div class="controls text-center pt-2">
       Already Registered <a class="text-white" href="login.php">Signin</a>
      </div>
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


<?php?>