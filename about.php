<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | BELLE</title>
  <link rel="stylesheet" href="projekti.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  
</head>
<body>
<?php include 'navbar.php'; ?>

<section class="about" id="about">
    <div class="img">
        <img decoding="async" src="Foto/model1.jpg" alt="">
    </div>
    <div class="content">
        <div class="box">
            <h3>Our store</h3>
            <p>Step into a world of beauty and endless possibilities at Belle,
                your go-to destination for all things makeup! Immerse yourself in a haven
                where every shade tells a story and every product is a brushstroke of creativity.
                Our store is a treasure trove of the latest trends and timeless classics, offering
                a curated selection of high-quality cosmetics that cater to every style and skin tone.</p>

        </div>
    </div>
</section>
<!--testimonials-->
<div class="container2">
    <div class="container2__left">
    <b> <h1>Read what our customers love about us</h1></b>
      <p>
         The loyalty of our customers is also fostered by our dedication to ethical and cruelty-free beauty, aligning with the values of those who seek products with a conscience. 
      </p>
      <p>
        Our makeup store has become a beloved haven for beauty enthusiasts, and our customers express their adoration for several reasons.
      </p>
      <button>Read our success stories</button>
    </div>
    <div class="container2__right">
      <div class="card">
        <img src="foto/girl.jpg" alt="user" />
        <div class="card__content">
          <span><i class="ri-double-quotes-l"></i></span>
          <div class="card__details">
            <p>
                Exceptional product variety,
                 impeccable customer service, and a chic ambiance make this makeup store a standout choice.
            </p>
            <h4>- Emma Hudgens</h4>
          </div>
        </div>
      </div>
      <div class="card">
        <img src="foto/g2.jpg" alt="user" />
        <div class="card__content">
          <span><i class="ri-double-quotes-l"></i></span>
          <div class="card__details">
            <p>
                This makeup store consistently exceeds expectations, 
                offering a diverse range of high-quality products.
            </p>
            <h4>- Anne James</h4>
          </div>
        </div>
      </div>
      <div class="card">
        <img src="foto/g5.jpeg" alt="user" />
        <div class="card__content">
          <span><i class="ri-double-quotes-l"></i></span>
          <div class="card__details">
            <p>
                From trendsetting products to personalized advice,
                this makeup store seamlessly blends quality and customer care.
                I highly recommend it!
            </p>
            <h4>- Lacy Stone</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
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