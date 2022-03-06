<?php

require_once PATH_SRC . 'models' . DIRECTORY_SEPARATOR . 'user.model.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "home-admin") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            signin_user($email, $password);
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {
            case 'login':
                require_once PATH_TEMPLATES . 'security' . DIRECTORY_SEPARATOR . 'login.html.php';
                break;

            case 'home-admin':
                require_once PATH_TEMPLATES . 'security' . DIRECTORY_SEPARATOR . 'home.admin.html.php';
                break;

            case 'signup':
                require_once PATH_TEMPLATES . 'user' . DIRECTORY_SEPARATOR . 'signup.html.php';
                break;

            default:
                require_once PATH_TEMPLATES . 'security' . DIRECTORY_SEPARATOR . 'login.html.php';
                break;
        }
    } else {
        require_once PATH_TEMPLATES . 'security' . DIRECTORY_SEPARATOR . 'login.html.php';
    }
}

function signin_user($email, $password)
{
    $errors = [];
    check_values($email, 'email', $errors);
    check_values($password, 'password', $errors);
    if (count($errors) == 0) {
        $user = find_user_credentials($email, $password);
        if (count($user) != 0) {
            $_SESSION['current_user'] = $user;
            header('location: ' . WEB_ROOT . '?controller=security&action=home-admin');
            exit();
        } else {
            $_SESSION['login_errors'] = "Email ou mot de passe incorrect";
            header('location: ' . WEB_ROOT);
            exit();
        }
    } else {
        $_SESSION['form_errors'] = $errors;
        header('location:' . WEB_ROOT);
        exit();
    }
}
