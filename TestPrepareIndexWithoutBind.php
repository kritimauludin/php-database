<?php
/*
 * Binding Parameter dengan Index
    ● Selain menggunakan kata kunci :namaparameter
    ● Untuk melakukan binding parameter, kita juga bisa menggunakan index (angka)
    ● Kita cukup mengganti :namaparameter dengan ? (tanda tanya)
    ● Lalu gunakan nomor index, saat melakukan bindParam(index, value)
 */
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "kriti";
$password = "rahasia";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
$statement = $connection->prepare($sql);
$statement->execute([$username, $password]);

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