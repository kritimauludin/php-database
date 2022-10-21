<?php
/*
 * Fetch Data
    ● Sebelumnya saat kita melakukan query, kita biasanya menggunakan perulangan foreach untuk
    melakukan iterasi terhadap object PDOStatement
    ● Permasalahannya, foreach akan melakukan seluruh perulangan di hasil result. Bagaimana jika kita
    hanya ingin mengambil data pertama saja misal? Maka kita harus membuat counter secara manual
    ● Untungnya PDOStatemen memiliki sebuah function bernama fetch(), fetch() digunakan untuk
    menarik satu data dari hasil query, ketika kita memanggil function fetch() lagi, maka otomatis akan
    menarik data selanjutnya, jika panggil fetch() lagi, maka akan mengambil data ketiga, dan
    seterusnya
    ● Jika function fetch() mengembalikan nilai false, artinya sudah tidak ada data lagi yang bisa diambil
    dari hasil query
    ● Jika kita ingin mengambil seluruh data sekaligus, kita bisa menggunakan fetchAll()
 */
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "kriti";
$password = "rahasia";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
$statement = $connection->prepare($sql);
$statement->execute([$username, $password]);

if($row = $statement->fetch()) {
    echo "Sukses login : ". $row["username"]. PHP_EOL;
}else {
    echo "gagal login". PHP_EOL;
}

var_dump($statement->fetch());

$connection = null;