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
                if (!is_admin()) {
                    header('location: ' . WEB_ROOT . '?controller=security&action=login');
                    exit();
                }
                display_player_list();
                break;

            case 'home-user':
                if (!is_player()) {
                    header('location: ' . WEB_ROOT . '?controller=security&action=login');
                    exit();
                }
                require_once PATH_TEMPLATES . 'user' . DIRECTORY_SEPARATOR . 'home.user.html.php';
                break;

            case 'signup':
                require_once PATH_TEMPLATES . 'user' . DIRECTORY_SEPARATOR . 'signup.html.php';
                break;

            case 'logout':
                logout();
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
            if ($user['role'] == "ROLE_ADMIN") {
                header('location: ' . WEB_ROOT . '?controller=security&action=home-admin');
                exit();
            }
            if ($user['role'] == "ROLE_PLAYER") {
                header('location: ' . WEB_ROOT . '?controller=security&action=home-user');
                exit();
            }
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

function display_player_list()
{
    ob_start();
    $users = get_users();
    require_once PATH_VIEWS . 'admin' . DIRECTORY_SEPARATOR . 'player-list.html.php';
    $view = ob_get_clean();
    require_once PATH_TEMPLATES . 'security' . DIRECTORY_SEPARATOR . 'home.admin.html.php';
}

function logout()
{
    session_unset();
    session_destroy();
    header('location: ' . WEB_ROOT . '?controller=security&action=login');
    exit();
}
