<?php

include_once '../entity/User.php';
include_once '../dao/UserDaoImpl.php';
include_once '../utility/DBUtil.php';

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if (isset($username) && isset($password) && !empty($username) && !empty($password)) {
    $userDao = new UserDaoImpl();
    $user = new User();
    $user->setPassword($password);
    $user->setUsername($username);
    $userDao->setData($user);
    $result = $userDao->login();
    if (isset($result) && isset($result->name)) {
        $data = array('status' => 1, 'message' => 'Login sucess', 'user' => $result);
    } else {
        $data = array('status' => 0, 'message' => 'Invalid username or password',
            'user' => NULL);
    }
} else {
    $data = array('status' => 0, 'message' => 'Please fill username and password');
}
header('Content-type:application/json');
echo json_encode($data);
