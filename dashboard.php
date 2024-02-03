<?php 
    session_start();

    if($_SESSION['role'] != 'administrator'){
        header("Location: projekti.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Dashboard</title>
    <style>
        body {
            display: flex;
            font-family: Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            background-color: #fcd9d9; 
        }

        #navigation {
            width: 250px;
            background-color: #333;
            padding: 20px;
            color: #fff;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 10px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        

        button.active {
            background-color: #cf7d99;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        #goBack {
            margin-top: auto;
        }

        #goBack:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div id="navigation">
        <?php
            $activePage = isset($_GET['page']) ? $_GET['page'] : 'users';

            $pages = [
                'users' => 'Users',
                'products' => 'Products',
                'contacts' => 'Contacts'
            ];

           
            foreach ($pages as $key => $label) {
                $isActive = $key === $activePage ? 'active' : '';
                echo "<a href='dashboard.php?page=$key'><button class='$isActive'>$label</button></a>";
            }
        ?>
        <a href="projekti.php"><button id="goBack">Go back</button></a>
    </div>

    <div class="content">
        <?php
     
        if ($activePage == 'users') {
            include 'users_list.php';
        } elseif ($activePage == 'products') {
            include 'products_list.php';
        } elseif ($activePage == 'contacts') {
            include 'contacts_list.php';
        }
        ?>
    </div>
</body>
</html>
