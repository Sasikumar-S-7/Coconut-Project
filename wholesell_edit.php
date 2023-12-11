
<?php

session_start();
    if(!isset($_SESSION["susername"]))
     {
        header("Location: login.php");
      }

 include"header.php";

// include Function  file
include_once('function.php');
// Object creation
$wholesellerdata=new DB_con();

if (isset($_POST['submit'])) 
{
  $username = $_POST['username'];
  $date = $_POST['date'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $total = $_POST['total'];
  $comments = $_POST['comments'];
  $quality = $_POST['quality'];
  $color = $_POST['color'];
  $type = $_POST['type'];
  $size = $_POST['size'];
  $address = $_POST['address'];
  //Function Calling
  $whole=$wholesellerdata->wholeseller($username,$date,$quantity,$price,$total,$comments,$quality,$color,$type,$size,$address);
 
  if ($whole) 
  {
    // Message for successfull insertion
  echo "<script>alert('Uploaded successfull.');</script>";
  echo "<script>window.location.href='wholeseller.php'</script>";
  }
  else
  {
    // Message for unsuccessfull insertion
  echo "<script>alert('Something went wrong. Please try again');</script>";
  echo "<script>window.location.href='wholeseller.php'</script>";
  }
}




 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Form edit</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
  <div>
    <button><a href="logout.php">Logout</a></button>
  </div>
  <div class="container mt-5">
    <h2 class="mb-4">Order Form</h2>


    <?php

    if (isset($_GET['wholeseller_id'])) 
    {
      
    }
    else
    {
      echo "<h4>Something went wrong</h4>";
    }


    ?>
    <form action="" method="post">
      <div class="mb-3">

        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username" value='<?php echo $_SESSION['susername'];?>' placeholder="Enter your username" readonly>
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control" name="date" id="date">
      </div>
     
      <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price/piece</label>
        <input type="number" class="form-control" name="price" id="price" placeholder="Max 10rs  per piece">
      </div>

      <div class="mb-3">
        <label for="total" class="form-label">Total</label>
        <input type="text" class="form-control" name="total" id="total" value="
       " >
      </div>
      <div class="mb-3">
        <label for="comments" class="form-label">Comments</label>
        <textarea class="form-control" name="comments" id="comments" rows="3" placeholder="Enter your comments"></textarea>
      </div>
      <div class="mb-3">
        <label for="quality" class="form-label">Quality</label>
        <select class="form-select" name="quality" id="quality">
          <option value="excellent">Excellent</option>
          <option value="good">Good</option>
          <option value="average">Average</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="color" class="form-label">Color</label>
        <select class="form-select" name="color" id="color">
          <option value="red">Red</option>
          <option value="blue">Blue</option>
          <option value="green">Green</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" name="type" id="type">
          <option value="type1">Type 1</option>
          <option value="type2">Type 2</option>
          <option value="type3">Type 3</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="size" class="form-label">Size</label>
        <select class="form-select" name="size" id="size">
          <option value="small">Small</option>
          <option value="medium">Medium</option>
          <option value="large">Large</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter your address"></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

</body>
</html>
<?php

?>
