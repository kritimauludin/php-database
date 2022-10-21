<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$sql = "SELECT * FROM customers";
//karena tidak ada input dari user kita bisa lgsg gunakan query/exce tanpa prepare
$statement = $connection->query($sql);

var_dump($statement->fetchAll());

$connection = null;