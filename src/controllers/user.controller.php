<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "signup") {
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
