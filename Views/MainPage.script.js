let error_label = document.getElementById("error_label");

let form__login = document.getElementById("form__login");
let button__redirect_login = document.getElementById("button__redirect_login");


let input_email = document.getElementById("email");
let warning_email = document.getElementById("incorrect_email");
let input_password = document.getElementById("password");
let warning_password = document.getElementById("incorrect_password");

let button_login = document.getElementById("button_login");
let button_register = document.getElementById("button_register");


input_email.addEventListener("change", checkEmail);
input_password.addEventListener("change", checkPassword);

button__redirect_login.addEventListener("click", redirectLogin);

button_login.addEventListener("click", validateLogin);
button_register.addEventListener("click", validateLogin);


function redirectLogin() {
    form__login.style.display = "block";
    input_email.focus();
}

if (error_label.value !== "") {
    redirectLogin();
    showError(error_label.value);
}

function checkEmail() {
    if (!(this.value.includes("@") && this.value.includes(".") && this.value.length>5)) {
        warning_email.innerHTML = "E-mail must contain '@' and '.'";
    } else {
        warning_email.innerHTML = "";
    }
}

function checkPassword() {
    if (this.value.length < 8) {
        warning_password.innerHTML = "Password must be longer than 8 characters";
    } else {
        warning_password.innerHTML = "";
    }
}

function validateLogin() {
    if ((input_email.value.length > 0) && (input_password.value.length > 0) && 
        (warning_email.innerHTML === warning_password.innerHTML))
    {
        form__login.setAttribute('action', '/projects/CatNanny/main.php');
        form__login.setAttribute('method', 'post');
        form__login.submit();
    }
}

function showError(message) {
    switch (message) {
        case "wrong_password":
            input_password.focus();
            warning_password.innerHTML = "Password is incorrect";
            break;
        case "wrong_email":
            warning_email.innerHTML = "This email didn't register or written incorrect";
            break;
        case "user_exists":
            warning_email.innerHTML = "This email already registered";
            break;
    }
}