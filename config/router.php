<?php
if (isset($_REQUEST['controller'])) {
    switch ($_REQUEST['controller']) {
        case 'user':
            require_once PATH_SRC . 'controllers' . DIRECTORY_SEPARATOR . 'user.controller.php';
            break;

        case 'security':
            require_once PATH_SRC . 'controllers' . DIRECTORY_SEPARATOR . 'security.controller.php';
            break;

        default:
            echo 404;
            break;
    }
} else {
    require_once PATH_SRC . 'controllers' . DIRECTORY_SEPARATOR . 'security.controller.php';
}
