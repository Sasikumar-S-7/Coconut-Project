<?php
include "header.php";
session_start();

if (!isset($_SESSION["cusername"])) {
    header("Location: new.php");
}

include "function.php";
$obj = new DB_con();
$get = $obj->retailergetting();



               
$customername = $_SESSION["cusername"];
echo $customername;



if (isset($_POST['buynow'])) {
    $customername = $_SESSION["cusername"];
    $quantity = $_POST['Quantity'];
    $price = $_POST['price'];
    echo $price;
    echo $quantity;
    $type = $_POST['type']; // Fix: Retrieve the 'type' from the form
    $color = $_POST['color']; // Fix: Retrieve the 'color' from the form
    $quality = $_POST['quality'];
    $cus_id = $_SESSION['cid'];

    



// Fix: Retrieve the 'quality' from the form

    // Insert data into the database using your DB_con class here
      $obj = new DB_con();
  $return =$obj->insertcustomer($cus_id,$customername,$quantity,$price,$type,$color,$quality);
   if ($return) 
   {
     header('Location:order.php');
     exit();
   }
}

?>


<!-- Your HTML content here -->



<div class="container-fluid">
    <div class="row" style="">
        <div class="col p-4" style="margin-left:100px ;">
            <h4 class="text-primary">Buy Coconut on India's Largest Online Marketplace</h4>
            <h6>The fastest & easiest way to Buy your products</h6>
            <button style="border-radius: 0px;" class="btn btn-success btn-sm">Start Buying</button>
        </div>
        <div class="col">
            <img src="images/ccc.jpg">
            <button class="btn btn-warning float-end me-5"><a href="customer_logout.php">Logout</a></button>
        </div>
    </div>
</div>

<?php
if ($get) {
    while ($row = $get->fetch_assoc()) {
?>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 shadow-lg p-3 my-3  bg-body rounded border">
                    <p class="text-success"><?php echo $row['wholeseller_name']; ?></p>
                    <p class="text-secondary"><?php echo $row['address']; ?></p>
                    <p></p>
                    <hr>
                    <div class="container row">
                        <div class="col">
                            <p>Quantity</p>
                            <hr>
                            <p>Price/Piece</p>
                            <hr>
                            <p>Type</p>
                            <hr>
                            <p>Color</p>
                            <hr>
                            <p>Quality</p>
                            <hr>
                        </div>
                        <div class="col">
                            <form action="" method="post">
                                <p><?php echo $row['quantity']; ?>

                                    <label class="ps-3" for="quantity">Quantity:</label>
  <input style="width: 50px"; type="number" name="Quantity" id="quantity" value="1" min="1" max="<?php echo $row['quantity']; ?>" >

                                </p>
                                <hr>
                                <p><?php echo $row['price']; ?> <input type="hidden" name="price" value="<?php echo $row['price']; ?>"></p>
                                <hr>
                                <p><?php echo $row['type']; ?></p>
                                <hr>
                                <p><?php echo $row['color']; ?></p>
                                <hr>
                                <p><?php echo $row['quality']; ?></p>
                                <hr>
                                <input type="hidden" name="type" value="<?php echo $row['type']; ?>">

                                <input type="hidden" name="color" value="<?php echo $row['color']; ?>">
                                <input type="hidden" name="quality" value="<?php echo $row['quality']; ?>">
                                <button type="submit" name="buynow" class="btn btn-info"><a style="" class="text-decoration-none text-white">Buy Now</a></button>
                            </form>
                        </div>
                    </div>
                </div>
           


           
                <div class="col-12 col-md-6 shadow-lg p-3 my-3 bg-body rounded border">
                    <p class="text-success"><?php echo $row['wholeseller_name']; ?></p>
                    <p class="text-secondary"><?php echo $row['address']; ?></p>
                    <p></p>
                    <hr>
                    <div class="container row">
                        <div class="col">
                            <p>Quantity</p>
                            <hr>
                            <p>Price/Piece</p>
                            <hr>
                            <p>Type</p>
                            <hr>
                            <p>Color</p>
                            <hr>
                            <p>Quality</p>
                            <hr>
                        </div>
                        <div class="col">
                            <form action="" method="post">
                                <p><?php echo $row['quantity']; ?>

                                    <label class="ps-3" for="quantity">Quantity:</label>
  <input style="width: 50px"; type="number" name="Quantity" id="quantity" value="1" min="1" max="<?php echo $row['quantity']; ?>" >

                                </p>
                                <hr>
                                <p><?php echo $row['price']; ?> <input type="hidden" name="price" value="<?php echo $row['price']; ?>"></p>
                                <hr>
                                <p><?php echo $row['type']; ?></p>
                                <hr>
                                <p><?php echo $row['color']; ?></p>
                                <hr>
                                <p><?php echo $row['quality']; ?></p>
                                <hr>
                                <input type="hidden" name="type" value="<?php echo $row['type']; ?>">

                                <input type="hidden" name="color" value="<?php echo $row['color']; ?>">
                                <input type="hidden" name="quality" value="<?php echo $row['quality']; ?>">
                                <button type="submit" name="buynow" class="btn btn-info"><a style="" class="text-decoration-none text-white" href="#">Buy Now</a></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>

<div class="col shadow-lg p-3 m-3 bg-body rounded border ">
    <p class="text-success">Fresh Coconut</p>
    <p class="text-secondary">Chennai, Tamil Nadu </p>
    <p>I am interested in buying Pollachi Matured Coconut. Kindly send me price and other details.</p>
    <hr>
    <div class="container row">
        <div class="col">
            <p>Quantity</p>
            <hr>
            <p>Price/Piece</p>
            <hr>
            <p>Type</p>
            <hr>
            <p>Color</p>
            <hr>
        </div>
        <div class="col">
            <p>10</p>
            <hr>
            <p>15</p>
            <hr>
            <p>Type</p>
            <hr>
            <p>Color</p>
            <hr>
            <button class="btn btn-info"><a style="" class="text-decoration-none text-white" href="payment.php">Buy Now</a></button>
        </div>
    </div>
</div>

</div>

</body>
</html>
