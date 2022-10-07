<?php

$data = [
    [
        "name" => "Haha",
        "value" => 158,
        "color" => "green",
    ],
    [
        "name" => "Hehe",
        "value" => 269,
        "color" => "green",
    ],
];

$names = array_column($data, 'name');
$values = array_column($data, 'values');
$color = array_column($data, 'color');

echo "<pre>";
var_dump($names);
echo "</pre>";