<?php
/*
 * Query SQL
    ● Setelah kita tahu bagaimana cara mengirim SQL ke MYSQL yang tidak membutuhkan result data,
    sekarang bagaimana melakukan Query SQL yang membutuhkan result data seperti SQL SELECT?
    ● PDO memiliki function bernama query(sql), ini digunakan untuk melakukan query data dari
    database
    ● Return value dari function query(sql) adalah sebuah object dari PDOStatement
 */
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$sql = "SELECT id, name, email FROM customers";
$result = $connection->query($sql); //result = PDOStatement

/*
 * PDOStatement
    ● PDOStatement adalah sebuah class turunan dari IteratorAggregate
    ● Seperti yang sudah kita bahas di materi PHP Object Oriented Programming, bahwa turunan
    IteratorAggregate secara otomatis bisa menggunakan perulangan foreach
    ● Oleh karena itu, untuk melakukan iterasi data hasil query, kita bisa melakukan perulangan foreach
    untuk tiap baris record hasil dari Query SQL nya
 */
foreach($result as $row) {
    $id = $row["id"];
    $name = $row["name"];
    $email = $row["email"];

    echo "id : $id". PHP_EOL;
    echo "name : $name". PHP_EOL;
    echo "email : $email". PHP_EOL;
    echo PHP_EOL;
}

$connection = null;