var form = document.querySelector('#signup-form');
var firstNameField = document.querySelector('input[name=firstName]');
var lastNameField = document.querySelector('input[name=lastName]');
var emailField = document.querySelector('input[name=email]');
var passwordField = document.querySelector('input[name=password]');
var confirmPasswordField = document.querySelector('input[name=passwordConfirm]');

function setString(field) {
    var fieldName = field.id;
    return fieldName.substring(0, 1).toUpperCase() + fieldName.substring(1, fieldName.length);
}

function checkValues(field) {
    if (field.value == "") {
        return setString(field) + " obligatoire";
    } else {
        if (field.name == "email") {
            const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            if (field.value.match(re)) {
                return "";
            } else {
                return setString(emailField) + " invalide";
            }
        }
        if (field.name == "password") {
            if (field.value.length < 6) {
                return "Le mot de passe doit contenir au moins 6 caractères";
            }
            return "";
        }
        return ""
    }
}

form.addEventListener('submit', (e) => {
    var firstNameError = checkValues(firstNameField);
    if (firstNameError != "") {
        e.preventDefault();
        var errorDisplay = firstNameField.parentElement.querySelector('small');
        errorDisplay.innerText = firstNameError;
        firstNameField.className = "error";
        errorDisplay.style.visibility = "visible";
    }

    var lastNameError = checkValues(lastNameField);
    if (lastNameError != "") {
        e.preventDefault();
        var errorDisplay = lastNameField.parentElement.querySelector('small');
        errorDisplay.innerText = lastNameError;
        lastNameField.className = "error";
        errorDisplay.style.visibility = "visible";
    }

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

    var confirmPasswordError = checkValues(confirmPasswordField);
    if (confirmPasswordError != "") {
        e.preventDefault();
        var errorDisplay = confirmPasswordField.parentElement.querySelector('small');
        errorDisplay.innerText = confirmPasswordError;
        confirmPasswordField.className = "error";
        errorDisplay.style.visibility = "visible";
    }

    if (confirmPasswordError == "" && passwordError == "") {
        if (passwordField.value != confirmPasswordField.value) {
            e.preventDefault();
            var passwordErrorDisplay = passwordField.parentElement.querySelector('small');
            var confirmPasswordErrorDisplay = confirmPasswordField.parentElement.querySelector('small');
            passwordErrorDisplay.innerText = "Les mots de passe sont différents";
            confirmPasswordErrorDisplay.innerText = "Les mots de passe sont différents";
            passwordField.className = "error";
            confirmPasswordField.className = "error";
            passwordErrorDisplay.style.visibility = "visible";
            confirmPasswordErrorDisplay.style.visibility = "visible";
        }
    }
})