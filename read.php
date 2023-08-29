<?php 
include "config.php";

$sql = "SELECT * FROM inventory";
$result = $con->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h2>Products</h2>
        <div class="table-responsive">
            <table class="table b-5 border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product_name</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Date of Expiry</th>
                        <th>Available Inventory</th>
                        <th>Available Inventory Cost</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $availableInventory = intval($row['available_inventory']); // Convert to integer
                            $price = floatval($row['price']); // Convert to floating-point number
                            $availableInventoryCost = $availableInventory * $price;
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['unit']; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $row['date_of_expiry']; ?></td>
                        <td><?php echo $availableInventory; ?></td>
                        <td><?php echo $availableInventoryCost; ?></td>
                        <td><?php echo $row['image']; ?></td>
                        <td>
                            <a class="btn btn-success" href="update.php?updateid=<?php echo $row['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="delete.php?deleteid=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php 
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
