<?php
include 'database.php'; // Include your database connection file
session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}


if (isset($_POST['contact_btn'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // SQL query to insert data into the "contacts" table
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    // Perform the query
    if ($conn->query($sql) == TRUE) {
        header("Location: projekti.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | Belle</title>
  <link rel="stylesheet" href="projekti.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

<section class="contact">
    <div class="container1">
        <h2>Contact Us</h2>
        <div class="contact-wrapper">
          <div class="contact-form">
            <h3>Send us a message</h3>
          <form action="" method="post">
            <div class="form-group">
               <input type="text" name="name" placeholder="Your Name"> 
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Your Email"> 
             </div>
             <div class="form-group">
                <textarea name="message" placeholder="Your Message"></textarea> 
             </div>
            <button type="submit" name="contact_btn">Send Message</button>
          </form>
          </div>  
          <div class="contact-info">
            <h3>Contact Information</h3>
            <p><i class="fas fa-phone"></i>045 500 500</p>
            <p><i class="fas fa-envelope"></i>bellebeauty@gmail.com</p>
            <p><i class="fas fa-map-marker-alt"></i>123 Nëna Terezë, Prishtinë, Kosovë</p>
          </div>
        </div>
    </div>
</section>
<footer class="footer">
  <div class="container1">
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
  let nameRegex = /^[A-Za-z\s]+$/;
        let emailRegex = /[a-zA-Z.-_]+@+[a-z]+\.+[a-z]{2,3}$/;

        function validation() {
            let nameInput = document.getElementsByName('name')[0];
            let emailInput = document.getElementsByName('email')[0];
            let messageInput = document.getElementsByName('message')[0];

            if (!nameRegex.test(nameInput.value.trim())) {
                alert('Invalid name. Please use only letters and spaces.');
                return false;
            }

            if (!emailRegex.test(emailInput.value)) {
                alert('Invalid email');
                return false;
            }

            if (messageInput.value.trim() === '') {
                alert('Please enter a message');
                return false;
            }

            return true;
        }
</script>
</body>
</html>



