/************* ClientPage *************/

let form_client = document.getElementById("form_client");
let form_email_password = document.getElementById("form_email_password");
let form_cat = document.querySelectorAll("#form_cat");

let input__client_name = document.getElementById("input__client_name");
let input__client_address = document.getElementById("input__client_address");
let input__client_phone = document.getElementById("input__client_phone");
let input__client_additional_information = document.getElementById("input__client_additional_information");
let input__client_email = document.getElementById("input__client_email");
let input__client_password = document.getElementById("input__client_password");

let warning__client_name = document.getElementById("label__client_name");
let warning__client_address = document.getElementById("label__client_address");
let warning__client_phone = document.getElementById("label__client_phone");
let warning__client_email_password = document.getElementById("label__client_email_password");

let input__cat_id = document.querySelectorAll("#input__cat_id");
let input__cat_name = document.querySelectorAll("#input__cat_name");
let input__cat_age = document.querySelectorAll("#input__cat_age");
let input__cat_character = document.querySelectorAll("#input__cat_character");
let input__cat_problems = document.querySelectorAll("#input__cat_problems");
let input__cat_individual_requests = document.querySelectorAll("#input__cat_individual_requests");

let warning__cat_name = document.querySelectorAll("#label__cat_name");
let warning__cat_age = document.querySelectorAll("#label__cat_age");

let carousel = document.getElementsByClassName("carousel");
let label__button_next_cat = document.getElementById("label__button_next_cat");
let current_cat = document.getElementById("error_label");


let button__change_client_info = document.getElementById("button__change_client_info");
let button__save_client_info = document.getElementById("button__save_client_info");
let button__change_client_email = document.getElementById("button__change_client_email");
let button__change_client_password = document.getElementById("button__change_client_password");
let button__save_client_email = document.getElementById("button__save_client_email");
let button__save_client_password = document.getElementById("button__save_client_password");

let button__change_cat_info = document.getElementById("button__change_cat_info");
let button__save_cat_info = document.getElementById("button__save_cat_info");
let button__next_cat = document.getElementById("button__next_cat");
let button__add_cat = document.getElementById("button__add_cat");

button__change_client_info.addEventListener("click", changeInfo);
button__save_client_info.addEventListener("click", validateInfo);
button__change_client_email.addEventListener("click", showEmail);
button__save_client_email.addEventListener("click", validateEmail);
button__change_client_password.addEventListener("click", showPassword);
button__save_client_password.addEventListener("click", validatePassword);

button__change_cat_info.addEventListener("click", changeCatInfo);
button__save_cat_info.addEventListener("click", validateCatInfo);
button__next_cat.addEventListener("click", nextCat);
button__add_cat.addEventListener("click", addNewCat);


if (carousel.length <= 1)
{
    label__button_next_cat.hidden = true;
    button__next_cat.hidden = true;
} 
if (current_cat.value !== "")
{
    for (let i=0; i<carousel.length; i++)
    {
        let cat = 'name=\"cat_id\" value=\"'+current_cat.value+'\"';
        if (carousel[i].innerHTML.includes(cat)) {
            carousel[i].style.display = "block";
        }
        else {
            carousel[i].style.display = "none";
        }
    }
} else {
    carousel[0].style.display = "block";
}


function changeInfo() {
    input__client_name.disabled = false;
    input__client_address.disabled = false;
    input__client_phone.disabled = false;
    input__client_additional_information.disabled = false;
    input__client_name.className = "input_clientPage";
    input__client_address.className = "input_clientPage";
    input__client_phone.className = "input_clientPage";
    input__client_additional_information.className = "input_clientPage full_width";

    button__save_client_info.hidden = false;
    button__change_client_info.hidden = true;
}

function validateInfo() {
    if (input__client_name.value.length < 1) {
        warning__client_name.innerHTML = "Name must be filled";
    } else warning__client_name.innerHTML = "";

    if (input__client_address.value.length < 1) {
        warning__client_address.innerHTML = "Address must be filled";
    } else warning__client_address.innerHTML = "";

    if (input__client_phone.value.length < 1) {
        warning__client_phone.innerHTML = "Phone must be filled";
    } else warning__client_phone.innerHTML = "";

    if (warning__client_name.innerHTML === warning__client_address.innerHTML
        && warning__client_address.innerHTML === warning__client_phone.innerHTML) {
        submitInfo();
    }
}

function submitInfo() {
    form_client.setAttribute('action', '/projects/CatNanny/main.php');
    form_client.setAttribute('method', 'post');
    form_client.submit();
}

function showEmail() {
    button__change_client_email.hidden = true;
    button__change_client_password.hidden = true;
    input__client_email.hidden = false;
    button__save_client_email.hidden = false;
}

function showPassword() {
    button__change_client_email.hidden = true;
    button__change_client_password.hidden = true;
    input__client_password.hidden = false;
    button__save_client_password.hidden = false;
}

function validateEmail() {
    if (!(input__client_email.value.includes("@") && input__client_email.value.includes(".") 
        && input__client_email.value.length>5)) {
            warning__client_email_password.innerHTML = "E-mail must contain '@' and '.'";
    } else {
        submitData();
    }
}

function validatePassword() {
    if (input__client_password.value.length < 8) {
        warning__client_email_password.innerHTML = "Password must be longer than 8 characters";
    } else {
        submitData();
    }
}

function submitData() {
    form_email_password.setAttribute('action', '/projects/CatNanny/main.php');
    form_email_password.setAttribute('method', 'post');
    form_email_password.submit();
}

function findCurrentCat() {
    let id_carousel;
    for (let i=0; i<carousel.length; i++)
    {
        if (carousel[i].style.display === "block")
        {
            id_carousel = i;
            break;
        }
    }
    return id_carousel;
}

function nextCat() {
    let id_carousel = findCurrentCat();
    carousel[id_carousel].style.display = "none";
    id_carousel++;
    if(id_carousel === carousel.length)
        id_carousel = 0;
    carousel[id_carousel].style.display = "block";
}

function changeCatInfo () {
    let id_carousel = findCurrentCat();
    input__cat_name[id_carousel].disabled = false;
    input__cat_age[id_carousel].disabled = false;
    input__cat_character[id_carousel].disabled = false;
    input__cat_problems[id_carousel].disabled = false;
    input__cat_individual_requests[id_carousel].disabled = false;
    input__cat_name[id_carousel].className = "input_clientPage width_60";
    input__cat_age[id_carousel].className = "input_clientPage width_60";
    input__cat_character[id_carousel].className = "input_clientPage width_60";
    input__cat_problems[id_carousel].className = "input_clientPage width_60";
    input__cat_individual_requests[id_carousel].className = "input_clientPage full_width";

    button__save_cat_info.hidden = false;
    button__change_cat_info.hidden = true;
}

function validateCatInfo() {
    let id_carousel = findCurrentCat();
    if (input__cat_name[id_carousel].value.length < 1) {
        warning__cat_name[id_carousel].innerHTML = "Name must be filled";
    } else warning__cat_name[id_carousel].innerHTML = "";

    if (input__cat_age[id_carousel].value == 0) {
        warning__cat_age[id_carousel].innerHTML = "Age must be greater than 0";
    } else warning__cat_age[id_carousel].innerHTML = "";

    if (warning__cat_name[id_carousel].innerHTML === warning__cat_age[id_carousel].innerHTML) {
        submitCatInfo();
    }
}

function submitCatInfo() {
    let id_carousel = findCurrentCat();
    form_cat[id_carousel].setAttribute('action', '/projects/CatNanny/main.php');
    form_cat[id_carousel].setAttribute('method', 'post');
    form_cat[id_carousel].submit();
}

function addNewCat() {
    form__add_cat.style.display = "flex";
    input__new_cat_name.focus();
}

/************* AddNewCat *************/

let form__add_cat = document.getElementById("form__add_cat");
let form__photo_new_cat = document.getElementById("form__photo_new_cat");

let adding_cat = document.getElementById("adding_cat");

let input__new_cat_name = document.getElementById("input__new_cat_name");
let input__new_cat_age = document.getElementById("input__new_cat_age");
let input__new_cat_character = document.getElementById("input__new_cat_character");
let input__new_cat_problems = document.getElementById("input__new_cat_problems");
let input__new_cat_individual_requests = document.getElementById("input__new_cat_individual_requests");
let new_cat_photo = document.getElementById("new_cat_photo");

let input_new_cat_photo = document.getElementById("input_new_cat_photo");

let warning__new_cat_name = document.getElementById("label__new_cat_name");
let warning__new_cat_age = document.getElementById("label__new_cat_age");
let warning__photo_new_cat = document.getElementById("label__photo_new_cat");
let form__add_cat__uri = document.getElementById("form__add_cat__uri");
let button_save_new_cat = document.getElementById("button_save_new_cat");

input_new_cat_photo.addEventListener("change", reloadPhoto);
input__new_cat_name.addEventListener("change", checkName);
button_save_new_cat.addEventListener("click", saveNewCat)

if (adding_cat.value === "active")
{
    addNewCat();
}

function reloadPhoto() {
    if (input_new_cat_photo.value !== "")
    {
        form__add_cat__uri.setAttribute('name', "uri");
        form__add_cat__uri.setAttribute('value', "upload_photo");
        form__add_cat.setAttribute('action', '/projects/CatNanny/main.php');
        form__add_cat.setAttribute('method', 'post');
        form__add_cat.submit();
    }
}

function checkName() {
    if (input__new_cat_name.value.length < 1)
    {
        warning__new_cat_name.innerHTML = "Name must be filled";
    } else 
        warning__new_cat_name.innerHTML = "";
}

function checkAge() {
    if (input__new_cat_age.value === "")
    {
        warning__new_cat_age.innerHTML = "Age must be filled";
    } else
        warning__new_cat_age.innerHTML = "";
}

function checkPhoto() {
    console.log(input__new_cat_age.value);
    if (new_cat_photo.getAttribute('src') == "Views/images/place_for_photo.png")
    {
        warning__photo_new_cat.innerHTML = "Please add a photo";
    } else
        warning__photo_new_cat.innerHTML = "";
}

function saveNewCat() {
    checkPhoto();
    checkName();
    checkAge();
    if ((input__new_cat_name.value.length > 0) && (warning__photo_new_cat.innerHTML === warning__new_cat_age.innerHTML))
    {
        form__add_cat__uri.setAttribute('name', "uri");
        form__add_cat__uri.setAttribute('value', "add_new_cat");
        form__add_cat.setAttribute('action', '/projects/CatNanny/main.php');
        form__add_cat.setAttribute('method', 'post');
        form__add_cat.submit();
    }
}


