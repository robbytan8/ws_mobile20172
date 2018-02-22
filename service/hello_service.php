<?php

$name = filter_input(INPUT_GET, 'your_name');
if (isset($name)) {
    $data = array('status' => 1, "message" => "Hello " . $name);
} else {
    $data = array('status' => 0, "message" => "Name is empty");
}
header('Content-type:application/json');
echo json_encode($data);
