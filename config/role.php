<?php
function is_connected()
{
    return isset($_SESSION['current_user']);
}

function is_player()
{
    return is_connected() && $_SESSION['current_user']['role'] == "ROLE_PLAYER";
}

function is_admin()
{
    return is_connected() && $_SESSION['current_user']['role'] == "ROLE_ADMIN";
}
