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
