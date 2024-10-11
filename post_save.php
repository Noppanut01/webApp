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
    $comment = $_POST['comment'];
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user_id'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root", "");

    $sql = "INSERT Into comment(content, post_date, user_id, post_id) Values ('$comment', NOW(), $user_id, $post_id)";

    $conn->exec($sql);
    header("location: post.php?id=$post_id");
?>
</body>

</html>