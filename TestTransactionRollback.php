<?php
/*
 * Database Transaction
    ● Salah satu fitur andalan di database adalah transaction
    ● Materi database transaction sudah saya bahas dengan tuntas di materi MySQL database, jadi
    silahkan pelajari di course tersebut
    ● Di course ini kita akan fokus bagaimana menggunakan database transaction di PHP menggunakan
    PDO
 */
/*
 * Transaction di PDO
    ● Secara default, semua perintah SQL yang kita kirim menggunakan PDO akan otomatis di commit,
    atau istilahnya auto commit
    ● Namun kita bisa menggunakan fitur transaksi sehingga SQL yang kita kirim tidak secara otomatis di
    commit ke database
    ● Untuk memulai transaksi, kita bisa menggunakan function beginTransaction() di PDO
    ● Dan untuk commit transaksi, kita bisa menggunakan function commit()
    ● Sedangkan jika kita ingin melakukan rollback, kita bisa menggunakan function rollback()
 */

require_once __DIR__. "/GetConnection.php";

$connection = getConnection();

//di database transaksi akan dianggap sukses jika semua perintah yg dikirim berhasil diexcute
//jika salah satu gagal maka seluruh perintah gagal dilakukan

$connection->beginTransaction();

$connection->exec("INSERT INTO comments (email, comment) VALUES ('mauludin@gmail.com', 'comment lagi')");
$connection->exec("INSERT INTO comments (email, comment) VALUES ('mauludin@gmail.com', 'comment lagi')");
$connection->exec("INSERT INTO comments (email, comment) VALUES ('mauludin@gmail.com', 'comment lagi')");
$connection->exec("INSERT INTO comments (email, comment) VALUES ('mauludin@gmail.com', 'comment lagi')");

$connection->rollBack();




$connection = null;