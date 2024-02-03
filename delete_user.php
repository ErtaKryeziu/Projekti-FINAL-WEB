<?php

include 'database.php';
session_start();

if ($_SESSION['role'] != 'administrator') {
    die("Not authorized to delete users.");
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $deleteSql = "DELETE FROM users WHERE id = $userId";

    if ($conn->query($deleteSql) === TRUE) {
        echo "User deleted successfully!";
        header("Location: dashboard.php");
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    die("User ID not provided");
}


$conn->close();
?>
