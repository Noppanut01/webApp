<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $login = $_POST['login'];
    $password = $_POST['password'];
    echo "<h1 align='center'>Webboard Kakkak</h1>";
    echo "<hr>";
    if ($login == "admin" && $password == "ad1234") {
        echo "<p align='center'>ยินดีต้อนรับคุณ ADMIN</p>";
    } elseif ($login == "member" && $password == "mem1234") {
        echo "<p align='center'>ยินดีต้อนรับคุณ MEMBER</p>";
    } else {
        echo "<p align='center'>ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</p>";
    }
    echo "<p align='center'><a href='index.php'>กลับไปยังหน้าหลัก</a></p>"
    ?>
</body>

</html>