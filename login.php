<?php 
    session_start();
include 'database.php';

if(isset($_SESSION['user_id']) && $_SESSION['user_id']) {
    header('Location: projekti.php');
    exit();
}

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);


    if (!$result) {
        die("Error: " . $conn->error);
    }


    if($result->num_rows > 0){
            // Useri ekziston 
            $row = $result->fetch_assoc();
            if($row['password'] == $password){

                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['avatar'] = $row['avatar'];

                header("Location: projekti.php");
                exit();
            }else{
                $error_message = "Incorrect pasword";
            }
    }else{
            $eerror_message = "User not found";
    }

}

$conn->close();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
}

.form-box h2 {
    color: black;
    text-align: center;
    font-size: 32px;
}

.form-box .input-box {
    position: relative;
    margin: 30px 0;
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
    margin-top: 30px;
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
            <form action="" method="post" name="Formfill" onsubmit="return validation()">
                <h2>Login</h2>
                <p id="result"></p>
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
                <div class="button">
                    <input type="submit" class="btn" name="login_btn" value="Login">
                </div>
                <span><a href="register.php">Register</a></span>

              
            </form>
        </div>
    </div>

    <script>
        let emailRegex = /[a-zA-Z.-_]+@+[a-z]+\.+[a-z]{2,3}$/;
        let passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

        function validation() {
            let emailInput = document.getElementById('email');
            let emailError = document.getElementById('emailError');
            let passwordInput = document.getElementById('password');
            let passwordError = document.getElementById('passwordError');
            let result = document.getElementById('result');

            emailError.innerText = '';
            passwordError.innerText = '';
            result.innerText = '';

            if (!emailRegex.test(emailInput.value)) {
                emailError.innerText = 'Invalid email';
                return false;
            }
            if (!passwordRegex.test(passwordInput.value)) {
                passwordError.innerText = 'Invalid password (at least 8 characters, including at least one letter and one number)';
                return false;
            }

        }
    </script>
</body>
</html>
