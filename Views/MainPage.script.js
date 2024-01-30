let error_label = document.getElementById("error_label");

let form__login = document.getElementById("form__login");
let button__redirect_login = document.getElementById("button__redirect_login");


let input_email = document.getElementById("email");
let warning_email = document.getElementById("incorrect_email");
let input_password = document.getElementById("password");
let warning_password = document.getElementById("incorrect_password");

let carousel = document.getElementsByClassName("carousel");

let choosed_button = document.getElementById("choosed_button");
let button__next_article = document.getElementById("button__next_article");
let button_login = document.getElementById("button_login");
let button_register = document.getElementById("button_register");
let button__close = document.getElementById("button__close");

input_email.addEventListener("change", checkEmail);
input_password.addEventListener("change", checkPassword);

button__next_article.addEventListener("click", nextArticle);
button__redirect_login.addEventListener("click", redirectLogin);
button_login.addEventListener("click", validateLogin);
button_register.addEventListener("click", validateRegistration);
button__close.addEventListener("click", closeLogin);


function redirectLogin() {
    form__login.style.display = "block";
    input_email.focus();
}

if (error_label.value !== "") {
    redirectLogin();
    showError(error_label.value);
}

carousel[0].style.display = "block";
function nextArticle() {
    let id_carousel;
    for (let i=0; i<carousel.length; i++)
    {
        if (carousel[i].style.display === "block")
        {
            id_carousel = i;
            break;
        }
    }
    carousel[id_carousel].style.display = "none";
    id_carousel++;
    if(id_carousel === carousel.length)
        id_carousel = 0;
    carousel[id_carousel].style.display = "block";
}

function closeLogin() {
    input_email.value = "";
    input_password.value = "";
    warning_email.innerHTML = "";
    warning_password.innerHTML = "";
    form__login.style.display = "none";
}

function checkEmail() {
    if (!(input_email.value.includes("@") && input_email.value.includes(".") && input_email.value.length>5)) {
        warning_email.innerHTML = "E-mail must contain '@' and '.'";
    } else {
        warning_email.innerHTML = "";
    }
}

function checkPassword() {
    if (input_password.value.length < 8) {
        warning_password.innerHTML = "Password must be longer than 8 characters";
    } else {
        warning_password.innerHTML = "";
    }
}

function validateRegistration() {
    let btn = "register";
    validateSubmit(btn);
}
function validateLogin() {
    let btn = "login";
    validateSubmit(btn);
}
function validateSubmit(btn) {
    checkEmail();
    checkPassword();
    if ((input_email.value.length > 0) && (input_password.value.length > 0) && 
        (warning_email.innerHTML === warning_password.innerHTML))
    {
        form__login.setAttribute('action', '/projects/CatNanny/main.php');
        form__login.setAttribute('method', 'post');
        choosed_button.setAttribute('name', 'uri');
        choosed_button.setAttribute('value', btn);
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