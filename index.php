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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<body>
    <div class="container-lg">
        <h1 align="center">Webboard Kakkak</h1>
        <?php include 'nav.php'; ?>
        <label for="">หมวดหมู่ :</label>
        <span class="dropdown">
            <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                --ทั้งหมด--
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">ทั้งหมด</a></li>
                <li><a class="dropdown-item" href="#">เรื่องเรียน</a></li>
                <li><a class="dropdown-item" href="#">เรื่องทั่วไป</a></li>
            </ul>
        </span>
        <?php
        if (isset($_SESSION["id"])) {
            echo "<a href='newpost.php' class='btn btn-success btn-sm' style='float: right;'><i class='bi bi-plus-lg'></i> สร้างกระทู้ใหม่</a>";
        }
        ?>
        <?php
        // if (!isset($_SESSION['id'])) {
        //     echo "<a style='float: right;' href='login.php'>เข้าสู่ระบบ</a>";
        // } else {
        //     echo "<span style='float: right;'>ผู้ใช้งานระบบ : $_SESSION[username] &nbsp <a href='logout.php'>ออกจากระบบ</a></span>";
        //     echo "<p><a href='newpost.php'>สร้างกระทู้ใหม่</a></p>";
        // }
        ?>

        <table class="table table-striped my-3">
            <tbody>
                <?php
                if (isset($_SESSION['id']) && $_SESSION['role'] == 'a') {
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<tr><td><a href='post.php?id=$i' class='link-underline link-underline-opacity-0'>กระทู้ที่ $i</a><a href='delete.php?id=$i' class='btn btn-danger btn-sm' style='float: right;'></i><i class='bi bi-trash'></i></a></td></tr>";
                    }
                } else {
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<tr><td><a href='post.php?id=$i' class='link-underline link-underline-opacity-0'>กระทู้ที่ $i</a></td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>