<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    $id = $_POST['ID'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $mail = $_POST['email'];
    $role = $_POST['role'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

    $sql = "UPDATE user Set name='$name',gender='$gender',email='$mail',role='$role' Where id='$id'";

    $conn->exec($sql);
    $conn = null;
    $_SESSION['user_edit'] = true;
    header("location: user.php");
    ?>
</body>

</html>