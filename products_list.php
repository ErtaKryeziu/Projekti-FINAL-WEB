<?php
include 'database.php';



if ($_SESSION['role'] != 'administrator') {
    die("Not authorized to view products.");
}


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
            background-color: #fcd9d9; 
            font-family: Arial, sans-serif;
            padding: 50px;
            box-sizing: border-box;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #fcd9d9; 
        }

        td {
            background-color: #fff; 
        }

        a {
            text-decoration: none;
            color: #333; 
        }

        a:hover {
            color: #f00; 
        }

        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 20px; 
        }

        button:hover {
            background-color: #f00;
        }

        .action-icons {
            font-size: 20px;
            margin-right: 5px;
        }

        .profile-pic {
            width: 50px; 
            height: auto; 
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
  
    $conn->close();
    ?>
</body>
</html>
