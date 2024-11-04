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
    $sql = "SELECT name From category WHERE name = '$category'";
    $count = $conn->query($sql)->fetchColumn();
    if ($count == 0) {
        $sql = "INSERT into category (name) values ('$category')";
        $conn->exec($sql);
        $_SESSION["cat_add"] = true;
    } else {
        $_SESSION["cat_add"] = false;
    }
    $conn = null;
    header("location: category.php");
    ?>

</body>

</html>