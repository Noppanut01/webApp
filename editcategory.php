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
    $sql = "UPDATE category Set name='$cat_name' Where id='$id'";
    $conn->exec($sql);
    $conn = null;

    $_SESSION["cat_edit"] = true;
    header("location: category.php");
    ?>
</body>

</html>