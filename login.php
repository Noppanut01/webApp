<?php
session_start();
if (isset($_SESSION['id'])) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<link rel="stylesheet" href="style.css">

<body>
    <h1 align="center">Webboard Kakkak</h1>
    <hr>
    <form action="verify.php" method="post">
        <table align="center" style="border: 2px solid; width: 40%;">
            <tr>
                <td id="headTable" align="center" colspan="2">เข้าสู่ระบบ</td>
            </tr>
            <tr>
                <td>Login</td>
                <td><input type="text" name="login" id=""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
    <p align="center">ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a></p>
</body>

</html>