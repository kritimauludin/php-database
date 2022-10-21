<?php
/*
 * Prepare Statement
    ● Cara yang lebih aman untuk membuat SQL dengan input parameter dari user sebenarnya
    menggunakan function prepare()
    ● Function prepare() akan menghasilkan object PDOStatement, dimana kita bisa melakukan binding
    parameter ke perintah SQL yang kita buat
    ● Ini lebih aman dibandingkan menggunakan function quote() secara manual, karena rawan lupa
    ● Namun jika menggunakan function prepare(), pembuatan string SQL nya agak sedikit berbeda.
    Ketika kita ingin menambahkan parameter, kita harus menggunakan :namaparameter
 */
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "admin'; #";
$password = "admin";

$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
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