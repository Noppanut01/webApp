<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 align="center">Webboard KakKak</h1>
    <hr>
    <?php
    $username = $_SESSION["username"];
    ?>
    <form action="">
        <form>
            <table>
                <tr>
                    <td><?php echo "ผู้ใช้ : $username" ?></td>
                </tr>
                <tr>
                    <td>หมวดหมู่ : </td>
                    <td><select name="category" id="">
                            <option value="all">-- ทั้งหมด --</option>
                            <option value="general">เรื่องทั่วไป</option>
                            <option value="study">เรื่องเรียน</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>หัวข้อ : </td>
                    <td><input type="text" name="header" id=""></td>
                </tr>
                <tr>
                    <td>เนื้อหา : </td>
                    <td><textarea name="" id=""></textarea></td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><input type="submit" value="บันทึกข้อความ"></td>
                </tr>
            </table>
        </form>
    </form>
</body>

</html>