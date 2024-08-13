<?php
session_start();
$id = $_GET['id'];
if (isset($_SESSION['id']) && $_SESSION['role'] == 'a') {
    echo "ลบกระทู้หมายเลข $id";
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