<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" name="wcat_nameth=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    $cat_name = $_GET["cat_name"];
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "Delete from category where name='$cat_name'";
    $conn->exec($sql);
    $_SESSION["cat_del"] = true;
    header("location: category.php");
    ?>
</body>

</html>