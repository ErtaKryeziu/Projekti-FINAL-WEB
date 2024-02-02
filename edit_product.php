<?php
include 'database.php';
session_start();

// Check if the user has administrative privileges
if ($_SESSION['role'] != 'administrator') {
    die("Not authorized to edit products.");
}

// Check if the product ID is provided in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Fetch product data by ID
    $productQuery = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($productQuery);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die("Product not found");
    }
} else {
    die("Product ID not provided");
}

// Check if the form is submitted for product update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $price = floatval($_POST['price']);
    $stock = intval($_POST['stock']);
    $description = htmlspecialchars($_POST['description']);
    $username = htmlspecialchars($_POST['username']);
    $image_url = htmlspecialchars($_POST['image_url']); // Add this line

    // Update the product in the database
    $updateQuery = "UPDATE products SET name = '$name', price = $price, stock = $stock, description = '$description', updated_by = '{$_SESSION['username']}', image_url = '$image_url' WHERE id = $productId";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: dashboard.php?page=products");
        exit();
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #fcd9d9; /* Light pink background color */
            font-family: Arial, sans-serif;
            padding: 50px;
            box-sizing: border-box;
        }

        form {
            width: 60%;
            margin: 20px auto;
            background-color: #fff; /* White background for the form */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
        }

      

        button:hover {
            background-color: #c75072;
        }

        .back-btn {
            margin-top: 20px;
            margin-left: 245px;
        }
    </style>
</head>
<body>
    <a style="margin-left: 470px;" href="dashboard.php?page=products" class="back-btn"><button>Back to Products</button></a>

    <form method="post">
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $product['name']; ?>" required>

        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="<?php echo $product['price']; ?>" required>

        <label for="stock">Stock:</label>
        <input type="text" name="stock" id="stock" value="<?php echo $product['stock']; ?>" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4" required><?php echo $product['description']; ?></textarea>

        <!-- Add the input field for image_url -->
        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url" id="image_url" value="<?php echo $product['image_url']; ?>" required>

        <img src="<?php echo $product['image_url'] ?>" width= " 155px;" alt=""> <br><br>

        <button type="submit">Update Product</button>
    </form>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
