<?php
/*
 * SQL dengan Parameter
    ● Saat membuat aplikasi, kita tidak mungkin akan melakukan hardcode perintah SQL di kode PHP
    kita
    ● Biasanya kita akan menerima input data dari user, lalu membuat perintah SQL dari input user, dan
    mengirimnya menggunakan perintah SQL
 */
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

/*
 * SQL Injection
    ● SQL Injection adalah sebuah teknik yang menyalahgunakan sebuah celah keamanan yang terjadi
    dalam lapisan basis data sebuah aplikasi.
    ● Biasa, SQL Injection dilakukan dengan mengirim input dari user dengan perintah yang salah,
    sehingga menyebabkan hasil SQL yang kita buat menjadi tidak valid
    ● SQL Injection sangat berbahaya, jika sampai kita salah membuat SQL, bisa jadi data kita tidak aman
 */
// $username = "admin";

/*
 * Solusinya?
    ● Jangan membuat query SQL secara manual dengan menggabungkan String secara bulat-bulat
    ● Function query() dan execute() tidak bisa menangani celah SQL Injection, jadi kita harus
    menanganinya secara manual
    ● Direkomendasikan menggunakan function query() dan execute() jika memang kita tidak butuh
    parameter dari input user ketika membuat perintah SQL
    ● Jika membutuhkan parameter dari input user, kita wajib menggunakan function prepare(sql) yang
    akan kita bahas selanjutnya
    ● Atau bisa juga memastikan input user aman dengan menggunakan function quote()
 */
$username = $connection->quote("admin'; #");
$password = $connection->quote("salah");

$sql = "SELECT * FROM admin WHERE username=$username AND password=$password";
$statement = $connection->query($sql);

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