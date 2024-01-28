
<section id="header" class="header">

<a href="#" class="logo">BELLE</a>
<p style="font-size: 20px;"><?php echo $_SESSION['email'] ?></p>
<nav class="navbar">
    <a href="home.html">Home</a>
    <a href="about.html">About</a>
    <a href="products.html">Products</a>
    <a href="contact.html">Contact</a>
    <?php if(isset($_SESSION['user_id'])): ?>
    <a href="logout.php">Logout</a>
    <?php endif; ?>

</nav>
</section>

<style>
    /*header begins*/
.header {
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.5rem 9%;
}

.header .logo {
    font-size: 2.5rem;
    color: #222;
    font-weight: bolder;

}

.header .navbar a {
    margin: 0 1.5rem;
    font-size: 1.7rem;
    color: #222;
}

.header .navbar a:hover {
    color: #F08080;
}

.header #menu-btn {
    display: none;
}
</style>