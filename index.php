<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard</title>
</head>

<!-- <link rel="stylesheet" href="style.css"> -->

<body>
    <h1 align="center">Webboard Kakkak</h1>
    <hr>
    หมวดหมู่ : <select name="category" id="">
        <option value="all">-- ทั้งหมด --</option>
        <option value="general">เรื่องทั่วไป</option>
        <option value="study">เรื่องเรียน</option>
    </select>
    <?php
    if (!isset($_SESSION['id'])) {
        echo "<a style='float: right;' href='login.php'>เข้าสู่ระบบ</a>";
    } else {
        echo "<span style='float: right;'>ผู้ใช้งานระบบ : $_SESSION[username] &nbsp <a href='logout.php'>ออกจากระบบ</a></span>";
        echo "<p><a href='newpost.php'>สร้างกระทู้ใหม่</a></p>";
    }
    ?>
    <ul>
        <?php
        if (isset($_SESSION['id']) && $_SESSION['role'] == 'a') {
            for ($i = 1; $i <= 10; $i++) {
                echo "<li><a href='post.php?id=$i'>กระทู้ที่ $i</a> &nbsp <a href='delete.php?id= $i'>ลบ</a></li>";
            }
        } else {
            for ($i = 1; $i <= 10; $i++) {
                echo "<li><a href='post.php?id=$i'>กระทู้ที่ $i</a></li>";
            }
        }
        ?>
    </ul>
</body>

</html>