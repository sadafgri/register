<?php
extract($_REQUEST, EXTR_PREFIX_SAME, "dup");
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=makeen", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("UPDATE users SET firstname=:firstname, lastname=:lastname,phonenumber=:phonenumber,age=:age,gender=:gender WHERE id=:id");
    $sql->bindParam(':firstname', $firstname);
    $sql->bindParam(':lastname', $lastname);
    $sql->bindParam(':phonenumber', $phonenumber);
    $sql->bindParam(':age', $age);
    $sql->bindParam(':gender', $gender);
    $sql->bindParam(':id', $id);
    $result = $sql->execute();

} catch (PDOException $e) {
    echo $e->getMessage();
}