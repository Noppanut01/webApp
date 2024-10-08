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
    $title = $_POST["topic"];
    $content = $_POST["content"];
    $category = $_POST["category"];
    $id = $_SESSION["user_id"];
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    echo "connected";
    $sql = "INSERT INTO post (title, content, post_date, cat_id, user_id) VALUES ( $title, $content,NOW(),$category, $id)";
    $conn->exec($sql);
    echo "insert";
    $conn = null;
    header("location:index.php")
    ?>
</body>

</html>