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
    $id = $_POST['cat_id'];
    $name = $_POST['cat_name'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "SELECT name From category WHERE name = '$name'";
    $count = $conn->query($sql)->fetchColumn();
    if ($count == 0) {
        $sql = "UPDATE category Set name='$name' Where id='$id'";
        $conn->exec($sql);
        $_SESSION["cat_edit"] = true;
    } else {
        $_SESSION["cat_edit"] = false;
    }
    $conn = null;
    header("location: category.php");
    ?>
</body>

</html>