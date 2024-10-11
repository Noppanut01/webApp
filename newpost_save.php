<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $cat_id = $_POST['category'];
    $topic = $_POST['topic'];
    $content = $_POST['content'];
    session_start();
    $user_id = $_SESSION['user_id'];
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "INSERT INTO post (title, content, post_date, cat_id, user_id) 
    VALUES('$topic', '$content', NOW() , '$cat_id', '$user_id')";
    $conn->exec($sql);
    $conn = null;
    header("location:index.php");
    die();

    ?>
</body>

</html>