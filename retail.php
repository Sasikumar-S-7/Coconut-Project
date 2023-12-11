<?php
include "header.php";
session_start();
?>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>S.No</th>
                
                <th>Wholeseller Name</th>
                <th>Date</th>
                <th>Quantity</th>
                <th>Price/Piece</th>
                <th>Comments</th>
                <th>Quality</th>
                <th>Color</th>
                <th>Type</th>
                <th>Size</th>
                <th>Address</th>
                <th>Buy</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once('function.php');
            $retailgetter = new DB_con();
            $result = $retailgetter->retailerget();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['sell'])) {
                    $id = $_POST['retailer_id'];
                    $price = intval($_POST['price']);
                    $retailgetter = new DB_con();

                    // Get the total quantity for the wholeseller
                    $res = $retailgetter->getpriceById($id);
                   
                    if ($res) {
                       // Update the total price in the database
                        $re =$retailgetter->updateprice($id, $price);
                        if ($re) {
                            
                        }
                    }
                        
                    
                }
            }

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                   
                   
                                ?>
                    <tr>
                        <td><?php echo $row['retailer_id']; ?></td>
                        <td><?php echo $row['wholeseller_name']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        
                        <td><?php echo $row['comments']; ?></td>
                        <td><?php echo $row['quality']; ?></td>
                        <td><?php echo $row['color']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['size']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="retailer_id" value="<?php echo $row['retailer_id']; ?>">
                                <input class="" style="width: 80%;" type="number" name="price" placeholder="Price">
                                <button type="submit" name="sell" class="btn btn-danger mt-3" id="sell">
                                    SELL
                                </button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php?>
