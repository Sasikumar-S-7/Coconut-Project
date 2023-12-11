
<?php

session_start();
include('header.php');
include('function.php');

if (isset($_POST['submit'])) 
{
    $ordererid = $_POST['orderer_id'];
    $orderername = $_POST['orderer_name'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $tot = $_POST['total'];

    $obje = new DB_con();
    $ret = $obje->insertorder($ordererid,$orderername,$type,$quantity,$price,$tot); 
    if ($ret) 
    {
            echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Successfully</title>
    <!-- Include Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container mt-5 bg-success">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">Your Order Is Successfully Placed. </h3>
                        <p class="card-text">Thank you for Ordering!.</p>
                        <a href="customer.php" class="btn btn-primary">Please Continue To Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    <!-- Include Bootstrap JS (optional) -->
   
</body>
</html>

';        
//header('Location:customer.php');
  //      exit;
       
    }
    else
    {
         echo "<script>alert('Your Order Not Placed.');</script>";
    }



}

$obj = new DB_con();
$lastId = $obj->fetchId();

$return =$obj->selectcustomer();
if ($return) {  

if($row=$return->fetch_assoc()) {
   
}
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coconut Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $_SESSION['cusername'];?></h1>
        <h1 class="mt-4">Coconut Order Summary</h1>

  <?php
if ($lastId !== false) {
  //  echo "The last ID in the table is: " . $lastId;
} else {
    echo "No records in the table.";
}

if ($lastId !== false) {
    $result = $obj->fetchCustomerById($lastId);

    if ($result !== false && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    
}
?>

        <!-- Display order details here -->
        <div class="mt-4">
            <h2>Your Order:</h2>
            <ul><?php

            $total = $row['quantity'] * $row['price'];
            
            ?>
            </ul>
        </div>

        <div class="container mt-3">
            
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th></th>
        <th>Customer</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Name</td>
        <td><?php echo $row['customer_name'];  ?></td>
      </tr>
      <tr>
        <td>Product</td>
        <td><?php echo $row['type'];  ?></td>
      </tr>
      <tr>
        <td>Quantity</td>
        <td><?php echo $row['quantity'];  ?></td>
      </tr>
       <tr>
        <td>Price</td>
        <td>₹<?php echo $row['price'];  ?></td>
      </tr>
       <tr>
        <td>Total</td>
        <td>₹<?php echo $total;  ?></td>
      </tr>
    </tbody>
  </table>
</div>

        <form action="" method="post">
             <input type="hidden" name="orderer_id" value="<?php echo $row['customerid'];?>">

            <input type="hidden" name="orderer_name" value="<?php echo $row['customer_name'];?>">

            <input type="hidden" name="type" value="<?php echo $row['type'];?>">

            <input type="hidden" name="quantity" value="<?php echo $row['quantity'];?>">

            <input type="hidden" name="price" value="<?php echo $row['price'];?>">

            <input type="hidden" name="total" value="<?php echo $total?>">

            <button type="submit" name="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.
