<?php include "header.php"?>

<div class="container">
	<div class="row">
		<div class="col">
			<img src="images/atm2.jpg">
		</div>
		<div class="col">
			<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Details Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h2 class="mb-4">Payment Details</h2>
    <form>
      <div class="mb-3">
        <label for="nameOnCard" class="form-label">Name on Card</label>
        <input type="text" class="form-control" id="nameOnCard" placeholder="Enter name on card">
      </div>
      <div class="mb-3">
        <label for="cardNumber" class="form-label">Card Number</label>
        <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number">
      </div>
      <div class="row mb-3">
        <div class="col">
          <label for="validThrough" class="form-label">Valid Through</label>
          <input type="text" class="form-control" id="validThrough" placeholder="MM/YY">
        </div>
        <div class="col">
          <label for="cvv" class="form-label">CVV</label>
          <input type="text" class="form-control" id="cvv" placeholder="Enter CVV">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit Payment</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

		</div>
		
	</div>
	
</div>

<?php?>
