<?php
/*
 * Auto Increment
    ● Kadang kita membuat sebuah table dengan id auto increment
    ● Dan kadang pula, kita ingin mengambil data id yang sudah kita insert ke dalam MySQL
    ● Sebenarnya kita bisa melakukan query ulang ke database menggunakan SELECT
    LAST_INSERT_ID()
    ● Tapi untungnya di PDO ada cara yang lebih mudah
    ● Kita bisa menggunakan function lastInsertId() untuk mendapatkan Id terakhir yang dibuat secara
    auto increment
 */

require_once __DIR__. "/GetConnection.php";

$connection = getConnection();

$connection->exec("INSERT INTO comments (email, comment) VALUES ('kriti@gmail.com', 'hello')");
$id = $connection->lastInsertId();

echo $id . PHP_EOL;

$connection = null;