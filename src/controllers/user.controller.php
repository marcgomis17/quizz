<?php

require_once PATH_SRC . 'models' . DIRECTORY_SEPARATOR . 'user.model.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['action'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['passwordConfirm'];
        if ($_REQUEST['action'] == "home-user") {
            signup_user($firstName, $lastName, $email, $password, $confirmPassword, "ROLE_PLAYER");
        }
        if ($_REQUEST['action'] == "add-admin") {
            signup_user($firstName, $lastName, $email, $password, $confirmPassword, "ROLE_ADMIN");
        }
        if ($_REQUEST['action'] == "add-question") {
            $question = $_POST['question'];
            $points = $_POST['points'];
            $answerType = $_POST['answerType'];
            $newQuestion = array(
                "question" => $question,
                "points" => $points,
                "Type de reponse" => $answerType
            );
            add_question($newQuestion);
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

            case 'question-list':
                if (!is_admin()) {
                    header('location: ' . WEB_ROOT . '?controller=security&action=login');
                    exit();
                }
                // display_questions();
                break;

            case 'add-admin':
                add_admin_display();
                break;

            case 'player-list':
                if (!is_admin()) {
                    header('location: ' . WEB_ROOT . '?controller=security&action=login');
                    exit();
                }
                display_player_list();
                break;

            case 'add-question':
                add_question_display();
                break;

            default:
                break;
        }
    }
}

function signup_user($firstName, $lastName, $email, $password, $passwordConfirm, string $role)
{
    $errors = [];
    check_values($firstName, 'firstName', $errors);
    check_values($lastName, 'lastName', $errors);
    check_values($email, 'email', $errors);
    check_values($password, 'password', $errors);
    check_passwords($password, $passwordConfirm, 'passwords', $errors);
    if (count($errors) == 0) {
        $user = find_user_credentials($email, $password);
        $score = 0;
        $newUser = array(
            "first_name" => $firstName,
            "last_name" => $lastName,
            "email" => $email,
            "password" => $password,
            "role" => $role,
            "score" => $score
        );
        if ($role == "ROLE_PLAYER") {
            if (count($user) == 0) {
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
        }
        if ($role == "ROLE_ADMIN") {
            if (count($user) != 0) {
                set_admin($user);
                header('location:' . WEB_ROOT . '?controller=user&action=add-admin');
                exit();
            }
            save_data("users", $newUser);
            header('location:' . WEB_ROOT . '?controller=user&action=add-admin');
            exit();
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('location:' . WEB_ROOT . '?controller=security&action=login');
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

function add_admin_display()
{
    ob_start();
    $users = get_users();
    require_once PATH_TEMPLATES . 'includes' . DIRECTORY_SEPARATOR . 'signup-form.html.php';
    $view = ob_get_clean();
    require_once PATH_TEMPLATES . 'security' . DIRECTORY_SEPARATOR . 'home.admin.html.php';
}

/* function display_questions()
{
    ob_start();
    $users = get_users();
    require_once PATH_VIEWS . 'admin' . DIRECTORY_SEPARATOR . 'player-list.html.php';
    $view = ob_get_clean();
    require_once PATH_TEMPLATES . 'security' . DIRECTORY_SEPARATOR . 'home.admin.html.php';
} */

function add_question_display()
{
    ob_start();
    $users = get_users();
    require_once PATH_VIEWS . 'admin' . DIRECTORY_SEPARATOR . 'question-add.html.php';
    $view = ob_get_clean();
    require_once PATH_TEMPLATES . 'security' . DIRECTORY_SEPARATOR . 'home.admin.html.php';
}


function add_question(array $question)
{
    save_data("questions", $question);
    header('location: ' . WEB_ROOT . '?controller=user&action=add-question');
}
