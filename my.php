<html>
<header>
    <style>
        body {
            text-align: center;
            background-color: aqua;
            margin-top: 50px;
        }
    </style>
</header>
<body>
<?php

extract($_REQUEST, EXTR_PREFIX_SAME, "dup");
$servername = "localhost";
$username = "root";
$password = "";
$database = "makeen";
$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare(
    "SELECT * FROM users where id = :id2");
$stmt->bindParam(':id2', $_REQUEST['id2']);
$stmt->execute();
$users = $stmt;
while ($users = $stmt->fetch()): ?>
    <form action="" method="post">
        <label>id:</label>
        <input type="text" name="id" value="<?php echo $users['id']; ?>"><br><br>
        <label>first name:</label>
        <input type="text" name="firstname" value="<?php echo $users['firstname']; ?>"><br><br>
        <label>last name:</label>
        <input type="text" name="lastname" value="<?php echo $users['lastname']; ?>"><br><br>
        <label>phone number:</label>
        <input type="number" name="phonenumber" value="<?php echo $users['phonenumber']; ?>"><br><br>
        <label>your age:</label>
        <input type="number" name="age" value="<?php echo $users['age']; ?>"><br><br>
        <input type="text" name="gender" value="<?php echo $users['gender']; ?>"><br><br>
        <button type="submit" formaction="save.php">save</button>
        <button type="submit" formaction="delet.php">Delet</button>
    </form>
<?php endwhile; ?>
</body>
</html>
