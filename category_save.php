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
    $category = $_POST['category'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

    $sql = "INSERT into category (name) values ('$category')";

    $conn->exec($sql);
    $conn = null;
    $_SESSION['cat_add'] = true;
    header("location: category.php");
    ?>

</body>

</html>