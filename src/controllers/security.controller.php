<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "home-admin") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // signin_user($email, $password);
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {
            case 'login':
                break;

            case 'signup':
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
    
}