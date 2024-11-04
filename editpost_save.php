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
    $cat_id = $_POST["category"];
    $topic = $_POST["topic"];
    $content = $_POST["content"];
    $post_id = $_POST["post_id"];
    echo "$cat_id";
    echo "$topic";
    echo "$content";
    echo "$post_id";
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "UPDATE post SET cat_id=$cat_id, title='$topic', content='$content' WHERE id=$post_id";
    $conn->exec($sql);
    $conn = null;
    $_SESSION["editpost"] = true;
    header("location:editpost.php?id=$post_id");
    ?>
</body>

</html>