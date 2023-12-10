function validation() {
    var username = document.Formfill.Username.value;
    var email = document.Formfill.Email.value;
    var password = document.Formfill.Password.value;
    var cpassword = document.Formfill.CPassword.value;

    if (username == "") {
        document.getElementById("result").innerHTML = "Enter Username*";
        return false;
    } else if (username.length < 6) {
        document.getElementById("result").innerHTML = "At least six letters*";
        return false;
    } else if (email == "") {
        document.getElementById("result").innerHTML = "Enter your Email*";
        return false;
    } else if (password == "") {
        document.getElementById("result").innerHTML = "Enter your Password";
        return false;
    } else if (password.length < 6) {
        document.getElementById("result").innerHTML = "Password must be 6 digits";
        return false;
    } else if (cpassword == "") {
        document.getElementById("result").innerHTML = "Enter Confirm Password";
        return false;
    } else if (cpassword !== password) {
        document.getElementById("result").innerHTML = "Password doesn't match";
        return false;
    } else {
        CloseSlide();
        return false;
    }
}

var popup = document.getElementById('popup');

document.getElementById('registrationForm').addEventListener('submit', function (event) {
    event.preventDefault();
    validation();
});

function CloseSlide() {
    popup.classList.add("open-slide");
} 