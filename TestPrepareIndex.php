<?php
/*
 * Binding Parameter dengan Index
    ● Selain menggunakan kata kunci :namaparameter
    ● Untuk melakukan binding parameter, kita juga bisa menggunakan index (angka)
    ● Kita cukup mengganti :namaparameter dengan ? (tanda tanya)
    ● Lalu gunakan nomor index, saat melakukan bindingParam(index, value)
 */
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "admin";
$password = "admin";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
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
$statement->bindParam(1, $username);
$statement->bindParam(2, $password);
$statement->execute();

$success = false;
$success = false;
$find_user = null;
foreach($statement as $row) {
    //sukses
    $success = true;
    $find_user = $row['username'];
}

if($success) {
    echo "Sukses login : ". $find_user. PHP_EOL;
}else {
    echo "gagal login". PHP_EOL;
}

$connection = null;