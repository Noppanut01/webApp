<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $login = $_POST["login"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "INSERT INTO user (login, password, name, gender, email, role) VALUES ('$login', '$password', '$name', '$gender', '$email', 'm')";

    $conn->exec($sql);
    $conn = null;
    header("location:index.php")
    ?>
</body>

</html>