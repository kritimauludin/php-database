<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "kriti";
$password = "rahasia";

$sql = "INSERT INTO admin(username, password) VALUES (:username, :password)";
$statement = $connection->prepare($sql);
/*
 * Binding Parameter
    ● Setelah menentukan dimana kira-kira parameter akan digunakan di kode SQL
    ● Kita wajib melakukan binding parameter dengan input dari user
    ● Secara otomatis, semua input dari user akan di quote() oleh prepare statement, jadi kita tidak perlu
    melakukannya lagi secara manual
    ● Hal ini membuat penggunaan prepare statement lebih aman dibandingkan manual melakukan
    quote()
 */
$statement->bindParam("username", $username);
$statement->bindParam("password", $password);
$statement->execute();

$connection = null;