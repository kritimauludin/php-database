<?php
//helper untuk melakukan koneksi


function getConnection(): PDO {
    $host = "localhost";
    $port = 3306;
    $database = "php_database";
    $username = "root";
    $password = "";
   
    return new PDO("mysql:host=$host:$port; dbname=$database;", $username, $password);
}