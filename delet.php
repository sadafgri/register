<?php

extract($_REQUEST , EXTR_PREFIX_SAME , "dup");
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=makeen", $username, $password);

try {
    $conn = new PDO ("mysql:host=localhost;dbname=makeen", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("DELETE FROM users WHERE id =:id");
    $sql->bindParam(':id', $id);
    $sql->execute();
}
catch(PDOException $e) {
    echo $e->getMessage();
}