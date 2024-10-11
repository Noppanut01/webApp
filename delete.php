<?php
session_start();
$id = $_GET['id'];
if (isset($_SESSION['id']) && $_SESSION['role'] == 'a') {
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

    $sql = "Delete from post where post.id=$id";
    $conn->exec($sql);
    $sql = "Delete from comment where comment.post_id=$id";
    $conn->exec($sql);
    header('location:index.php');
} else {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>