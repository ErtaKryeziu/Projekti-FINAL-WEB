<!-- products_list.php -->
<?php
include 'database.php';
session_start();

// Check if the user has administrative privileges
if ($_SESSION['role'] != 'administrator') {
    die("Not authorized to view products.");
}

// Fetch all products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #fcd9d9; /* Light pink background color */
            font-family: Arial, sans-serif;
            padding: 50px;
            box-sizing: border-box;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff; /* White background for the table */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #fcd9d9; /* Light pink background for table header */
        }

        td {
            background-color: #fff; /* White background for table cells */
        }

        a {
            text-decoration: none;
            color: #333; /* Dark text color for links */
        }

        a:hover {
            color: #f00; /* Change link color on hover */
        }

        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 20px; /* Adjusted margin to create space below the button */
        }

        button:hover {
            background-color: #f00;
        }

        .action-icons {
            font-size: 20px;
            margin-right: 5px;
        }

        .profile-pic {
            width: 50px; /* Set the width of the profile picture */
            height: auto; /* Maintain aspect ratio */
        }

        .back-btn {
            margin-left: 245px;
        }
    </style>
</head>
<body>


    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Description</th>
            <th>Added by</th>
            <th>Updated by</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><?php echo $row['description']; ?></td>
               
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['updated_by'] ?></td>
                <td>
                    <a href='edit_product.php?id=<?php echo $row['id']; ?>'><i class='fas fa-edit action-icons'></i>Edit</a> |
                    <a href='delete_product.php?id=<?php echo $row['id']; ?>'><i class='fas fa-trash-alt action-icons'></i>Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>

    </table>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
