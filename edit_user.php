<?php

include 'database.php';
session_start();

if ($_SESSION['role'] != 'administrator') {
    die("Not authorized to edit users.");
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    
    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        die("User not found");
    }
} else {
    die("User ID not provided");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];
    $newRole = $_POST['new_role'];
    $newAvatar = $_POST['new_avatar']; 

    $updateSql = "UPDATE users SET username = '$newUsername', email = '$newEmail', role = '$newRole', avatar = '$newAvatar' WHERE id = $userId";

    if ($conn->query($updateSql) === TRUE) {
        echo "User updated successfully!";
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            background-color: #fcd9d9;
            font-family: Arial, sans-serif;
            padding: 50px;
            box-sizing: border-box;
        }

        h2 {
            color: #333; 
        }

        form {
            background-color: #fff; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"], .btn {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover, .btn:hover {
            background-color: #b089a4;
        }
    </style>
</head>
<body>
    <h2>Edit User</h2>
    <form method="post" action="">
        <label for="new_username">Username:</label>
        <input type="text" id="new_username" name="new_username" value="<?php echo $user['username']; ?>"><br>

        <label for="new_email">Email:</label>
        <input type="email" id="new_email" name="new_email" value="<?php echo $user['email']; ?>"><br>

        <label for="new_role">Role:</label>
        <input type="text" id="new_role" name="new_role" value="<?php echo $user['role']; ?>"><br>

        <label for="new_avatar">New Profile Picture URL:</label>
        <input type="text" id="new_avatar" name="new_avatar" value="<?php echo $user['avatar']; ?>"><br>

        <input type="submit" value="Update">
        <a href="dashboard.php"><button class="btn">Back</button></a>
    </form>
</body>
</html>
