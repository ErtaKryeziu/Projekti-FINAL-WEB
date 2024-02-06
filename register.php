<?php 
    include 'database.php';
    session_start();

    if(isset($_SESSION['user_id']) && $_SESSION['user_id']) {
        header('Location: projekti.php');
        exit();
    }

    if(isset($_POST['register_btn'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $selectedRole = 'user'; 
        
       
        $avatar = isset($_POST['avatar']) ? $_POST['avatar'] : 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D';

        
        $checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($checkUsernameQuery);

       
        if (!$result) {
            die("Error: " . $conn->error);
        }

        
        if ($result->num_rows > 0) {
            echo '<div class="alert alert-danger" role="alert">Username is already taken. Please choose a different username.</div>';
        } else {
          
            $insertUserQuery = "INSERT INTO users (username, email, password, role, avatar) VALUES ('$username', '$email', '$password', '$selectedRole', '$avatar')";
            if ($conn->query($insertUserQuery) === TRUE) {
   
                $_SESSION['user_id'] = $conn->insert_id;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $selectedRole;
                $_SESSION['avatar'] = $avatar;

                echo '<div class="alert alert-success" role="alert">Registration successful! You are now logged in.</div>';
                header("Location: projekti.php");
                exit();
            } else {
                echo '<div class="alert alert-danger" role="alert">Error: ' . $conn->error . '</div>';
            }
        }

    }
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: rgb(245, 212, 218);
            background-position: center;
            background-size: cover;
            min-height: 100vh;
            width: 100%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-box {
            position: relative;
            width: 400px;
            height: 550px;
            border: 2px solid rgba(0, 0, 0, 0.514);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .form-box h2 {
            color: black;
            text-align: center;
            font-size: 32px;
        }

        .form-box .input-box {
            position: relative;
            margin: 20px 0;
            width: 310px;
            border-bottom: 2px solid black;
        }

        .form-box .input-box input {
            width: 100%;
            height: 45px;
            background: transparent;
            border: none;
            outline: none;
            padding: 0 20px 0 5px;
            color: black;
            font-size: 16px;
        }

        .form-box .error-message {
            color: red;
            font-weight: 600;
            position: absolute;
            top: 100%;
            left: 0;
            font-size: 14px;
        }

        .form-box .button {
            margin-top: 20px;
        }

        .form-box .button .btn {
            color: #fff;
            background: rgb(210, 80, 102);
            width: 100%;
            height: 50px;
            border-radius: 5px;
            outline: none;
            border: none;
            font-size: 17px;
            cursor: pointer;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.5);
        }

        .form-box .group {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .form-box .group a {
            color: black;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
        }

        #result {
            color: red;
            font-weight: 600;
            position: relative;
            top: 25px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-box">
            <form action="" method="post" name="Formfill" id="registrationForm" onsubmit="return validateRegistrationForm()">
                <h2>Register</h2>
                <p id="result"></p>
                <div class="input-box">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="username" id="username" placeholder="Username">
                    <div class="error-message" id="usernameError"></div>
                </div>
                <div class="input-box">
                    <i class='bx bxs-envelope'></i>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <div class="error-message" id="emailError"></div>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="password" id="password" placeholder="Password">
                    <div class="error-message" id="passwordError"></div>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="cpassword" id="confirmPassword" placeholder="Confirm Password">
                    <div class="error-message" id="confirmPasswordError"></div>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="avatar" id="avatar" placeholder="Place your avatar url">
                    <div class="error-message" id="confirmPasswordError"></div>
                </div>
                <div class="button">
                    <input type="submit" name = "register_btn" class="btn" value="Register">
                </div>
                <div class="group">
                    <span><a href="#">Forget-Password</a></span>
                    <span><a href="login.php">Login</a></span>
                </div>

            </form>
        </div>
    </div>

    <script>
        let usernameRegex = /^[a-zA-Z0-9_-]{3,16}$/;
        let emailRegex = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        let passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

        function validateRegistrationForm() {
            let usernameInput = document.getElementById('username');
            let emailInput = document.getElementById('email');
            let passwordInput = document.getElementById('password');
            let confirmPasswordInput = document.getElementById('confirmPassword');
            let usernameError = document.getElementById('usernameError');
            let emailError = document.getElementById('emailError');
            let passwordError = document.getElementById('passwordError');
            let confirmPasswordError = document.getElementById('confirmPasswordError');
            let result = document.getElementById('result');

            usernameError.innerText = '';
            emailError.innerText = '';
            passwordError.innerText = '';
            confirmPasswordError.innerText = '';
            result.innerText = '';

            if (!usernameRegex.test(usernameInput.value)) {
                usernameError.innerText = 'Invalid username (3-16 characters, letters, numbers, hyphen, and underscore allowed)';
                return false;
            }

            if (!emailRegex.test(emailInput.value)) {
                emailError.innerText = 'Invalid email';
                return false;
            }

            if (!passwordRegex.test(passwordInput.value)) {
                passwordError.innerText = 'Invalid password (at least 8 characters, including at least one letter and one number)';
                return false;
            }

            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordError.innerText = 'Passwords do not match';
                return false;
            }

            OpenSlide();
            return false; 
        }

        function OpenSlide() {
            document.getElementById('popup').classList.add('open-slide');
        }

        function CloseSlide() {
            document.getElementById('popup').classList.remove('open-slide');
        }
    </script>
</body>
</html>
    