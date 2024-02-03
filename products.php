<?php 

 
    include 'database.php';
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
        exit();
    }
    $produktetQUERY= "SELECT * FROM products";
    $result = $conn->query($produktetQUERY);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products | BELLE</title>
    <link rel="stylesheet" href="projekti.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


</head>
<body>
 <?php include 'navbar.php'?>
<section class="shop" id="shop">
    <h1 class="heading">Our products</h1>
    <div class="box-container">
        <?php
        if($result->num_rows > 0){
            // loop through each row in the result set
            while($row = $result->fetch_assoc()) {
                ?>
        <div class="box">
            <div class="img">
                <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['Name']; ?>">
            </div>
            <div class="content">
                <h3><?php echo $row['Name']; ?></h3>
                <div class="price">$<?php echo $row['Price']; ?></div>
                <a href="#" class="btn">Add to cart</a>
            </div>

        </div>
        <?php
            }
        } else{
            echo "No products found";
        }

        ?>


</section>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>COMPANY</h4>
                <ul>
                    <li><a href="#">about us</a></li>
                    <li><a href="#">our services</a></li>
                    <li><a href="#">privacy policy</a></li>
                    <li><a href="#">affiliate program</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>GET HELP</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">shipping</a></li>
                    <li><a href="#">returns</a></li>
                    <li><a href="#">order status</a></li>
                    <li><a href="#">payment options</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>ONLINE SHOP</h4>
                <ul>
                    <li><a href="#">face</a></li>
                    <li><a href="#">eyes</a></li>
                    <li><a href="#">lips</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>FOLLOW US</h4>
                <div class="social-links">
                     <a href="#"><i class="fab fa-facebook-f"></i></a>
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="#"><i class="fab fa-instagram"></i></a>
                     <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>