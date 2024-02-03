<?php
    session_start();
    include 'database.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAKEUP | BELLE</title>
    <link rel="stylesheet" href="projekti.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

    <?php include 'navbar.php'; ?>

            <?php if(isset($_SESSION['user_id'])): ?>
               
            <?php endif; ?>


    <section class="home" id="home">

        <div class="slide active" style="background:url(foto/background.jpg) no-repeat; background-size:cover;
        background-position: center;">
            <div class="content">
                <span>Belle <br>Beauty</span>
                <h3>Indulge in the allure of beauty at BELLE – your one-stop destination for all about makeup!<br>
                    Unleash your inner diva with our exquisite collection of premium cosmetics, curated to enhance your
                    unique style.
                </h3>
                <a href="#" class="btn">Read more</a>
            </div>
        </div>

    </section>

    <section class="slideshow-container">
        <div class="mySlides">
            <img src="foto/pic1r.webp" id="slideshow" alt="Slide 1">
        </div>
        <div class="mySlides">
            <img src="foto/pic2r.jpg" id="slideshow" alt="Slide 2">
        </div>
        <div class="mySlides">
            <img src="foto/pic3r.png" id="slideshow" alt="Slide 3">
        </div>
        <div class="mySlides">
            <img src="foto/pic4.jpg" id="slideshow" alt="Slide 4">
        </div>
    </section>


    <section class="category">
        <h1 class="heading">Categories</h1>
        <div class="box-container">

            <a href="#" class="box">
                <img decoding="async" src="foto/primer.png">
                <h3>Skincare</h3>
            </a>

            <a href="#" class="box">
                <img decoding="async" src="foto/lips.png">
                <h3>Lips</h3>
            </a>

            <a href="#" class="box">
                <img decoding="async" src="foto/f.jpg">
                <h3>Foundation</h3>
            </a>

            <a href="#" class="box">
                <img decoding="async" src="foto/eye.JPG">
                <h3>Eye makeup</h3>
            </a>

            <a href="#" class="box">
                <img decoding="async" src="foto/blush.jpg">
                <h3>Blush</h3>
            </a>

            <a href="#" class="box">
                <img decoding="async" src="foto/Bronzer.png">
                <h3>Bronzer</h3>
            </a>

        </div>
    </section>



<!--arrivals-->
    <section class="sop" id="sop">
        <h1 class="heading">The new christmas collection</h1>
        <div class="box-container">
    
            <div class="box">
                <div class="img">
                    <img src="Foto/red.jpg">
    
                </div>
                <div class="content">
                    <h3>Red Matte Lipstick</h3>
                    <div class="price">$15</div>
                    <a href="#" class="btn">Add to cart</a>
                </div>
    
            </div>
            <div class="box">
                <div class="img">
                    <img src="foto/sy.jpg">
    
    
                </div>
                <div class="content">
                    <h3>The Elf Eyeshadow</h3>
                    <div class="price">$13.99 </div>
                    <a href="#" class="btn">Add to cart</a>
                </div>
    
            </div>
    
            <div class="box">
                <div class="img">
                    <img src="Foto/balm.jpg">
    
    
                </div>
                <div class="content">
                    <h3>Lip Balm</h3>
                    <div class="price">$5</div>
                    <a href="#" class="btn">Add to cart</a>
                </div>
    
            </div>
    
     </div>
    </section>

 
        <!--Special offer    -->
<section class="message">
    <div class="content">
        <span>Special <span>offer</span></span>
        <h3>Up to 50% off</h3>
        <p>Elevate your holiday glam and make spirits bright with our exclusive Christmas sale, offering up to a glamorous 50% off on a stunning array of beauty products. 
            Don't miss out on this merry opportunity to treat yourself or spread the joy of beauty this holiday season.  
        </p>
   <a href="#" class="btn">Shop now</a>

    </div>
</section>

<!--Slider-->
<section class=""></section>

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


    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1;
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2600); // Change slide every 2.6 seconds
        }
    </script>

</body>

</html>