<?php
include 'database.php';
session_start();

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> Details</title>
    <link rel="stylesheet" href="projekti.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fcd9d9; /* Light pink background color */
            margin: 0;
            padding: 0;
        }

        .product-details {
            padding: 50px 0;
            text-align: center;
            background-color: #fcd9d9; /* Light pink background color */
            height: 600px; /* Set a static height for the product details section */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .product-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .product-img img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .product-info {
            max-width: 600px;
            text-align: left;
            padding-left: 20px; /* Add some padding to the left for better readability */
        }

        .product-info h2 {
            color: #333;
            margin-bottom: 10px;
            font-size: 2em;
        }

        .description {
            color: #555;
            margin-bottom: 20px;
            font-size: 1.2em;
            line-height: 1.5; /* Increase line height for better readability */
        }

        .price {
            color: #ff0080;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .added-by {
            color: #555;
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            background-color: #ff0080;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            font-size: 1.2em;
        }

        .btn:hover {
            background-color: #c60055;
        }

        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 15px 30px;
            font-size: 1.2em;
            cursor: pointer;
            border-radius: 8px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #555;
        }

        footer {
            background-color: #fff;
            padding: 20px 0;
            margin-top: 50px;
        }

        .social-links a {
            margin: 0 10px;
            color: #555;
            font-size: 1.5em;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php' ?>

    <section class="product-details">
        <div class="container">
            <div class="product-container">
                <div class="product-img">
                    <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>">
                </div>
                <div class="product-info">
                    <h2><?php echo $product['name']; ?></h2>
                    <p style="font-size: 20px;" class="description"><?php echo $product['description']; ?></p>
                    <p style="font-size: 18px;" class="price">$<?php echo $product['price']; ?></p>
                    <p style="font-size: 18px;" class="stock">In stock: <?php echo $product['stock']; ?></p>


                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'administrator'): ?>
                        <p class="added-by">Added by: <?php echo $product['username']; ?></p>
                    <?php endif; ?>

                    <a href="#" class="btn">Add to cart</a>
                    <a href="products.php"><button>Back</button></a>
                </div>
                
            </div>
        </div>
    </section>

    <footer class="footer">
        <!-- Your footer content here -->
    </footer>
</body>
</html>
