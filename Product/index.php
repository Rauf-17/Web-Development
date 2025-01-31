<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "product");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle deleting a product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
    $id = $_POST['product_id'];
    $sql = "DELETE FROM products WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<b style='color: red;'>Product deleted successfully!</b>";
    } else {
        echo "Error: " . $conn->error;
    }
    
}

// Fetch products from the database
$sql = "SELECT * FROM products";
$products = $conn->query($sql);

if (!$products) {
    die("Error fetching products: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Product</title>
</head>
<body>
    
    <h1>Products</h1>
    <table style="border: 1px;">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php while ($product = $products->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit" name="delete_product" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <h2>Add Product</h2>
    <form method="post" action="process.php">
        <input type="text" name="name" placeholder="Product Name" required><br>
        <textarea name="description" placeholder="Product Description" required></textarea><br>
        <input type="number" name="price" placeholder="Price" required><br>
        <button type="submit" name="add_product" id="add_button">Add Product</button>
    </form>
</body>
</html>