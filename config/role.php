<?php
function is_connected()
{
    return isset($_SESSION['current_user']);
}

function is_player()
{
}

function is_admin()
{
}
