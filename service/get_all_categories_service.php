<?php

include_once '../entity/Category.php';
include_once '../dao/CategoryDaoImpl.php';
include_once '../utility/DBUtil.php';

$categoryDao = new CategoryDaoImpl();
/* @var $result PDOStatement */
$result = $categoryDao->findAll();
$data = $result->fetchAll();
header('Content-type:application/json');
echo json_encode($data);
