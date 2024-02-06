<?php

include 'database.php';
session_start();

if ($_SESSION['role'] != 'administrator') {
    die("Not authorized to delete products.");
}

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $deleteSql = "DELETE FROM products WHERE id = $productId";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Product deleted successfully!";
        header("Location: dashboard.php");
    } else {
        echo "Error deleting product: " . $conn->error;
    }
} else {
    die("Product ID not provided");
}


if ($conn->query($deleteSql) === TRUE) {
    header("Location: dashboard.php?page=products");
    exit();
} else {
    echo "Error deleting product: " . $conn->error;
}



$conn->close();
?>
