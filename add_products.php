<?php
include 'database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
} else if (!$_SESSION['role'] == 'administrator') {
    header("Location: projekti.php");
    exit();
}

if (isset($_POST['add_product_btn'])) {
    // Retrieve form data
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $imageUrl = $_POST['imageUrl'];
    $stock = $_POST['stock'];
    $description = $_POST['descriptionProduct'];
    $userId = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    // SQL command to insert product
    $insertProductSQL = "INSERT INTO products (name, price, image_url, stock, description, user_id, username) 
                         VALUES ('$productName', $productPrice, '$imageUrl', $stock, '$description', $userId, '$username')";

    // Execute the SQL command
    if ($conn->query($insertProductSQL) === TRUE) {
        echo "Product added successfully!";
        header('Location: products.php');
        exit();
    } else {
        echo "Error adding product: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="projekti.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Scoped styles for add_products.php */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: rgb(245, 212, 218);
        }

        
        .form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 86px); /* Adjusted to consider header height */
        }

        .form-box {
            background-color: rgba(255, 255, 255, 0.8);
            border: 2px solid rgba(0, 0, 0, 0.514);
            border-radius: 20px;
            padding: 20px;
            width: 400px;
        }

        .form-box h2 {
            color: black;
            text-align: center;
            font-size: 32px;
            margin-bottom: 20px;
        }

        .form-box .input-box {
            margin: 15px 0;
        }

        .form-box .input-box label {
            display: block;
            margin-bottom: 5px;
            color: black;
        }

        .form-box .input-box input {
            width: 100%;
            height: 35px;
            background: transparent;
            border: 1px solid #000;
            border-radius: 5px;
            outline: none;
            padding: 5px;
            color: black;
            font-size: 16px;
        }

        .form-box .button {
            margin-top: 20px;
            text-align: center;
        }

        .form-box .button .btn {
            color: #fff;
            background: rgb(210, 80, 102);
            width: 150px;
            height: 40px;
            border-radius: 5px;
            outline: none;
            border: none;
            font-size: 17px;
            cursor: pointer;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.5);
        }

        .form-box .button .btn:hover {
            background: #c75072;
        }
    </style>
    <title>Add Products Page</title>
</head>
<body>
<?php include 'navbar.php'; ?>

    <div class="form-container">
        <div class="form-box">
            <h2>Add New Makeup Product</h2>
            <form action="" method="post" id="productForm">
                <div class="input-box">
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="productName" required>
                </div>

                <div class="input-box">
                    <label for="productPrice">Price ($):</label>
                    <input type="number" id="productPrice" name="productPrice" min="0.01" step="0.01" required>
                </div>

                <div class="input-box">
                    <label for="imageUrl">Image URL:</label>
                    <input type="url" id="imageUrl" name="imageUrl" required>
                </div>

                <div class="input-box">
                    <label for="stock">Stock:</label>
                    <input type="number" id="stock" name="stock" min="0" required>
                </div>

                <div class="input-box">
                    <label for="descriptionProduct">Description:</label>
                    <input type="text" id="descriptionProduct" name="descriptionProduct" required>
                </div>

                <div class="button">
                    <button type="submit" name="add_product_btn" class="btn">Add Product</button>
                </div>                
            </form>
            <a href="products.php"><button class="btn">Go back</button></a>

        </div>
    </div>
</body>
</html>
