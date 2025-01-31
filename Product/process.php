<?php


$conn = new mysqli("localhost", "root", "", "product");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle adding a product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "<b style = 'color: green;'>Product added successfully!</b>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: index.php", 3000);
    exit();
}


// Fetch products
$products = $conn->query("SELECT * FROM products");

$conn->close();
?>


