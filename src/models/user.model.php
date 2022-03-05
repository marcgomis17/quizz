<?php

function find_user_credentials(string $email, string $password): array
{
    $users = read_data('users');
    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            return $user;
        }
    }
    return [];
}

function get_users()
{
    return read_data('users');
}
