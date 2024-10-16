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
            <ul class="dropdown-menu" aria-labelledby="Button2">
                <li><a class="dropdown-item" href="#">ทั้งหมด</a></li>
                <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql = "SELECT * FROM category";
                foreach ($conn->query($sql) as $row) {
                    echo "<li><a class=dropdown-item href=#>$row[name]</a></li>";
                }
                $conn = null;
                ?>
            </ul>
        </span>
        <?php
        if (isset($_SESSION["id"])) {
            echo "<a href='newpost.php' class='btn btn-success btn-sm' style='float: right;'><i class='bi bi-plus-lg'></i> สร้างกระทู้ใหม่</a>";
        }
        ?>
        <table class="table table-striped my-3">
            <tbody>
                <?php
                $role = $_SESSION["role"];
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql = "SELECT t3.name, t1.title, t1.id,t2.login,t1.post_date FROM post as t1 INNER JOIN user as t2 on(t1.user_id=t2.id) INNER JOIN category  as t3 ON (t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
                $result = $conn->query($sql);
                while ($row = $result->fetch()) {
                    if ($role == "m") {
                        echo "<tr><td>[$row[0]]<a href=post.php?id=$row[2] style=text-decoration:none;> $row[1]</a><br>$row[3] - $row[4]</td></tr>";
                    } else if ($role == "a") {
                        echo "<tr><td>[$row[0]]<a href=post.php?id=$row[2] style=text-decoration:none;> $row[1]</a><a class='btn btn-danger' onclick='return confdelete()' href='delete.php?id=$row[2]' style='float:right'><i class='bi bi-trash-fill'></i></a><br>$row[3] - $row[4]</td></tr>";
                    } else {
                        echo "<tr><td>[$row[0]]<a href=post.php?id=$row[2] style=text-decoration:none;> $row[1]</a><br>$row[3] - $row[4]</td></tr>";
                    }
                }
                $conn = null;
                ?>
            </tbody>
        </table>
        <script>
        function confdelete() {
            return confirm("ต้องการลบใช่หรือไม่");
        }
        </script>
    </div>
</body>

</html>