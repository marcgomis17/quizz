<?php

require_once PATH_SRC . 'models' . DIRECTORY_SEPARATOR . 'user.model.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "home-user") {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['passwordConfirm'];
            signup_user($firstName, $lastName, $email, $password, $confirmPassword);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {
            case 'signup':
                break;

            case 'home-user':
                if (!is_connected()) {
                    header('location: ' . WEB_ROOT . 'controller=security&action=login');
                    exit();
                }
                require_once PATH_TEMPLATES . 'user' . DIRECTORY_SEPARATOR . 'home.user.html.php';
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
