<?php

$server = 'localhost';
$dbname = 'atu';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname",$username , $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

    //echo 'connection is made ';
} catch(PDOException $e) {
    echo "connection failed " . $e->getMessage();
}