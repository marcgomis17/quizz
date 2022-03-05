<?php

function read_data(string $key)
{
    $json = file_get_contents(PATH_DB);
    $data = json_decode($json, true);
    return $data[$key];
}

function save_data($key, array $array)
{
    $currentData = file_get_contents(PATH_DB);
    $arrayData = json_decode($currentData, true);
    array_push($arrayData[$key], $array);
    $newData = json_encode($arrayData);
    file_put_contents(PATH_DB, $newData);
}
