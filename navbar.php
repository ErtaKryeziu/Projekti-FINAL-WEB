</head>
<section id="header" class="header">

<a href="#" class="logo">BELLE</a>
<?php if(isset($_SESSION['email'])):?>
    <p style="font-size: 20px;"><?php echo $_SESSION['email'] ?></p>
    <?php endif;?>
<nav class="navbar">
    <a href="projekti.php">Home</a>
    <a href="about.php">About</a>
    <a href="products.php">Products</a>
    <a href="contact.php">Contact</a>

    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'administrator'): ?>
        <a href="add_products.php">Add Products</a>
        <a href="dashboard.php?page=users">Dashboard</a>
    <?php endif; ?>


    <?php if(isset($_SESSION['user_id'])): ?>
    <a href="logout.php">Logout</a>
    <?php endif; ?>

   
</nav>
</section>

