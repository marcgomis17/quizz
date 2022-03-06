var form = document.querySelector('form');
var emailField = document.querySelector('input[name=email]');
var passwordField = document.querySelector('input[name=password]');

function setString(field) {
    var fieldName = field.name;
    return fieldName.substring(0, 1).toUpperCase() + fieldName.substring(1, fieldName.length);
}

function checkValues(field) {
    if (field.value == "") {
        return setString(field) + " obligatoire";
    } else {
        if (field.name == "email") {
            const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            if (field.value.match(re)) {
                console.log("OK!");
                return "";
            } else {
                return setString(emailField) + " invalide";
            }
        }
        return ""
    }
}

form.addEventListener('submit', (e) => {
    var emailError = checkValues(emailField);
    if (emailError != "") {
        e.preventDefault();
        var errorDisplay = emailField.parentElement.querySelector('small');
        errorDisplay.innerText = emailError;
        emailField.className = "error";
        errorDisplay.style.visibility = "visible";
    }

    var passwordError = checkValues(passwordField);
    if (passwordError != "") {
        e.preventDefault();
        var errorDisplay = passwordField.parentElement.querySelector('small');
        errorDisplay.innerText = passwordError;
        passwordField.className = "error";
        errorDisplay.style.visibility = "visible";
    }
})