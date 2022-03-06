<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "home-user") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // signin_user($email, $password);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {
            case 'signup':
                break;

            default:
                break;
        }
    }
}

function signup_user($firstName, $lastName, $email, $password, $passwordConfirm)
{
    $errors = [];
    check_values($firstName, 'firstName', $errors);
    check_values($lastName, 'lastName', $errors);
    check_values($email, 'email', $errors);
    check_values($password, 'password', $errors);
    check_passwords($password, $passwordConfirm, 'passwords', $errors);
    if (count($errors) == 0) {
        $user = find_user_credentials($email, $password);
        if (count($user) == 0) {
            $score = 0;
            $newUser = array(
                "first_name" => $firstName,
                "last_name" => $lastName,
                "email" => $email,
                "password" => $password,
                "role" => "ROLE_PLAYER",
                "score" => $score
            );
            save_data("users", $newUser);
            $_SESSION['current_user'] = $newUser;
            header('location:' . WEB_ROOT . '?controller=user&action=home-user');
            exit();
        } else {
            $errors['user_error'] = "Cet utilisateur existe déjà";
            $_SESSION['errors'] = $errors;
            header('location: ' . WEB_ROOT . '?controller=security&action=login');
            exit();
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('location:' . WEB_ROOT . '?controller=security&action=login');
        exit();
    }
}
