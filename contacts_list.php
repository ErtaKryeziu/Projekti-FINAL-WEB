<?php 


    if ($_SESSION['role'] != 'administrator') {
    die("Not authorized to view products.");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
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
    </style>
</head>
<body>

    <?php
    // Include the database connection file
    include 'database.php';

    // Step 2: Fetch all contacts from the "contacts" table
    $sql = "SELECT * FROM contacts";
    $result = $conn->query($sql);

    // Step 3: Display contact data in an HTML table
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Sent</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['message']}</td>
                <td>{$row['created_at']}</td>
            </tr>";
    }

    echo "</table>";

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
