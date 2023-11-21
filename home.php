<?php
$error = '';
$id = $_REQUEST['id'];
$fname = strlen($_REQUEST['firstname']) < 40 ? $_REQUEST['firstname'] : $error = 'error in fname';
$lname = strlen($_REQUEST['lastname']) < 40 ? $_REQUEST['lastname'] : $error = 'error in lname';
$phonenum = strlen($_REQUEST['phonenumber']) <= 11 ? $_REQUEST['phonenumber'] : $error = 'error in phone number';
$age = $_REQUEST['age'] > 18 ? $_REQUEST['age'] : $error = 'you have to be older than 18 to submit';
$pass = md5($_REQUEST['pass']);
$gender = $_REQUEST['gender'];
if ($error != '') {
    echo 'you have an error';
}
extract($_REQUEST , EXTR_PREFIX_SAME , "dup");

$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=makeen", $username, $password);
try {
    $conn = new PDO ("mysql:host=localhost;dbname=makeen", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("INSERT INTO users (firstname,lastname,phonenumber,age,password,gender)VALUES (:firstname,:lastname,:phonenumber,:age,:password,:gender)");
    $sql->bindParam(':firstname', $fname);
    $sql->bindParam(':lastname', $lname);
    $sql->bindParam(':phonenumber', $phonenum);
    $sql->bindParam(':age', $age);
    $sql->bindParam(':password', $pass);
    $sql->bindParam(':gender', $gender);
    $result=$sql->execute();
}
catch(PDOException $e) {
    echo $e->getMessage();
}
