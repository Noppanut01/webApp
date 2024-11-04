<?php
session_start();
if (isset($_SESSION['id'])) {
    header('location:index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $login = $_POST["login"];
    $password = $_POST["password"];
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "SELECT * FROM user WHERE login='$login' and password=sha1('$password')";
    $result = $conn->query($sql);
    if ($result->rowCount() == 1) {
        $data =  $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['username'] = $data["login"];
        $_SESSION['role'] = $data["role"];
        $_SESSION['user_id'] = $data["id"];
        $_SESSION['id'] = session_id();
        header("location:index.php");
        die();
    } else {
        $_SESSION["error"] = true;
        header('location:login.php');
        die();
    }
    $conn = null;
    ?>
</body>

</html>