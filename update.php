<?php
include "config.php";

$id = $_GET['updateid'];

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $unit = $_POST['unit'];
    $price = $_POST['price'];
    $date_of_expiry = $_POST['date_of_expiry'];
    $available_inventory = $_POST['available_inventory'];
    $image = $_POST['image'];

    // Use prepared statement to update the record
    $sql = "UPDATE `inventory` SET product_name=?, unit=?, price=?, date_of_expiry=?, available_inventory=?, image=? WHERE id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssdsssi", $product_name, $unit, $price, $date_of_expiry, $available_inventory, $image, $id);

    if ($stmt->execute()) {
        header('location:read.php');
    } else {
        die(mysqli_error($con));
    }

    $stmt->close();
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container my-5">
    <h2>Update Form</h2>
    <form method="post">
        <div class="mb-3 form-group">
          <label class="form-label">Product Name</label>
          <input type="text" class="form-control" name="product_name">
        </div>
        <div class="mb-3 form-group">
          <label class="form-label">Price</label>
          <input type="text" class="form-control" name="price">
        </div>
        <div class="mb-3 form-group">
          <label class="form-label">Unit</label>
          <input type="text" class="form-control" name="unit">
        </div>
        <div class="mb-3 form-group">
          <label class="form-label">Date of Expiry</label>
          <input type="text" class="form-control" name="date_of_expiry">
        </div>
        <div class="mb-3 form-group">
          <label class="form-label">Available Inventory</label>
          <input type="text" class="form-control" name="available_inventory">
        </div>
        <div class="mb-3 form-group">
          <label class="form-label">Image</label>
          <img class="form-control" src="images/product-placeholder.png">
          <div class="mt-4">
            <input type="file" class="image" name="image" accept="image/*">
            <span>Choose file...</span>
          </div>
        </div>

        <button type="submit" class="btn btn-danger" name="submit" > Submit </button>
    </form>
    </div>
  </body>
</html>
