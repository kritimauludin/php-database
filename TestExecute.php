<?php
/*
 * Execute SQL
    ● Setelah kita terkoneksi ke database, sudah pasti kita ingin mengirim perintah SQL ke database
    tersebut dari aplikasi PHP kita
    ● Untuk mengirim perintah SQL, kita bisa menggunakan function execute(sql) yang terdapat di
    object PDO yang sudah kita buat
    ● Function execute(sql) bisa kita gunakan untuk semua jenis SQL yang tidak membutuhkan result
    data, misal CREATE TABLE, INSERT, UPDATE, DELETE, ALTER TABLE, dan lain-lain
 */

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

$sql = <<<SQL
    INSERT INTO customers(id, name, email)
        VALUES("mauludin", "Mauludin", "mauludin@gmail.com");
SQL;

$connection->exec($sql);

$connection = null;