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
    <a style="float: right;" href="login.html">เข้าสู่ระบบ</a>
    <p>หมวดหมู่ : <select name="category" id="">
            <option value="all">-- ทั้งหมด --</option>
            <option value="general">เรื่องทั่วไป</option>
            <option value="study">เรื่องเรียน</option>
        </select>
    </p>

    <ul>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<li><a href='post.php?id=$i'>กระทู้ที่ $i</a></li>";
        }
        ?>
    </ul>
</body>

</html>