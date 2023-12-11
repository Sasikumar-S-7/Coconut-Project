<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Quantity Editor</title>
    <style type="text/css">
       #myform {
  text-align: center;
  padding: 5px;
  border: 1px dotted #ccc;
  margin: 2%;
}
.qty {
  width: 40px;
  height: 25px;
  text-align: center;
}
input.qtyplus {
  width: 25px;
  height: 25px;
}
input.qtyminus {
  width: 25px;
  height: 25px;
}

    </style>
</head>
<body>
    <div class="container mt-4">
        <h3>Product Name</h3>
        <div class="input-group">
            <span class="input-group-btn">
                <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quantity">
                    <i class="bi bi-dash"></i>
                </button>
            </span>
            <input type="text" name="quantity" class="form-control input-number" value="1">
            <span class="input-group-btn">
                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quantity">
                    <i class="bi bi-plus"></i>
                </button>
            </span>
        </div>
    </div>

    <form id='myform' method='POST' class='quantity' action='#'>
  <input type='button' value='-' class='qtyminus minus' field='quantity' />
  <input type='text' name='quantity' value='0' class='qty' />
  <input type='button' value='+' class='qtyplus plus' field='quantity' />
</form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        jQuery(document).ready(($) => {
  $(".quantity").on("click", ".plus", function (e) {
    let $input = $(this).prev("input.qty");
    let val = parseInt($input.val());
    $input.val(val + 1).change();
  });

  $(".quantity").on("click", ".minus", function (e) {
    let $input = $(this).next("input.qty");
    var val = parseInt($input.val());
    if (val > 0) {
      $input.val(val - 1).change();
    }
  });
});

    </script>
</body>
</html>
s