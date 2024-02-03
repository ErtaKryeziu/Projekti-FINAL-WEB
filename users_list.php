<?php 
   
    if ($_SESSION['role'] != 'administrator') {
        header("Location: projekti.php");
        die("Not authorized to view users.");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
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
    </style>
</head>
<body>

    <?php

    
    include 'database.php';

    
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    echo "<table>
            <tr>
                <th>ID</th>
                <th>Profile picture</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td><img src={$row['avatar']} class='profile-pic' alt='No pic'/></td>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
                <td>{$row['role']}</td>
                <td>";
      
        if ($_SESSION['role'] == 'administrator') {
            echo "<a href='edit_user.php?id={$row['id']}'><i class='fas fa-edit action-icons'></i>Edit</a> | ";
            echo "<a href='delete_user.php?id={$row['id']}'><i class='fas fa-trash-alt action-icons'></i>Delete</a>";
        } else {
            echo "Not authorized";
        }

        echo "</td></tr>";
    }

    echo "</table>";

 
    $conn->close();
    ?>
</body>
</html>
