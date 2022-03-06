<?php

function check_values(string $value, string $key, array &$errors)
{
    if ($value == "") {
        $errors[$key] = "Champ obligatoire";
    } else {
        if ($key == "email") {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $errors[$key] = "Email invalide";
            }
        }
    }
}


function check_passwords(string $password, string $confirmPassword, string $key, array &$errors)
{
    if (strlen($password) < 6) {
        $errors['passwords'] = "Le mot de passe doit contenir au moins 6 caracteres";
    }
    if ($password != $confirmPassword) {
        $errors = "Les mots de passes sont differents";
    }
}
