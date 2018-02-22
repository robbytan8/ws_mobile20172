<?php

include_once '../entity/Item.php';
include_once '../entity/Category.php';
include_once '../dao/ItemDaoImpl.php';
include_once '../utility/DBUtil.php';

$itemDao = new ItemDaoImpl();
/* @var $result PDOStatement */
$result = $itemDao->findAll();
$data = $result->fetchAll();
header('Content-type:application/json');
echo json_encode($data);
