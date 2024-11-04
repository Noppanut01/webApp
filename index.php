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
        <span>
            <select style="width: 15%;" name="category" class="form-select d-inline" onchange>
                <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql = "SELECT * FROM category";
                foreach ($conn->query($sql) as $row) {
                    echo "<option id='catID' onclick=getCatID() value=" . $row[0] . ">" . $row[1] . "</option>";
                }
                $conn = null;
                ?>
            </select>
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
                $username = $_SESSION["username"];
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql = "SELECT category.name, post.title, post.id,user.login,post.post_date FROM post INNER JOIN user on(post.user_id = user.id) INNER JOIN category ON (post.cat_id=category.id) ORDER BY post.post_date DESC";
                $result = $conn->query($sql);
                while ($row = $result->fetch()) {
                    echo "<tr><td>[$row[0]]<a href=post.php?id=$row[2] style=text-decoration:none;> $row[1]</a>";
                    if (isset($_SESSION["id"]) && $username == $row[3] && $role == "m") {
                        echo "<a class='btn btn-danger' onclick='return confdelete()' href='delete.php?id=$row[2]' style='float:right'><i class='bi bi-trash-fill'></i></a><a style='float:right'class='btn btn-warning bi bi-pencil-fill me-2' href='editpost.php?id=$row[2]'></a>";
                    } else if (isset($_SESSION["id"]) && $role == "a") {
                        if ($username == $row[3]) {
                            echo "<a class='btn btn-danger' onclick='return confdelete()' href='delete.php?id=$row[2]' style='float:right'><i class='bi bi-trash-fill'></i></a><a style='float:right'class='btn btn-warning bi bi-pencil-fill me-2' href='editpost.php?id=$row[2]'></a>";
                        } else {
                            echo "<a style='float:right'class='btn btn-danger' onclick='return confdelete()' href='delete.php?id=$row[2]' style='float:right'><i class='bi bi-trash-fill'></i></a>";
                        }
                    }
                    echo "<br>$row[3] - $row[4]</td></tr>";
                }
                $conn = null;
                ?>
            </tbody>
        </table>
        <script>
        function confdelete() {
            return confirm("ต้องการลบใช่หรือไม่");
        }

        function getCatID() {
            let catID = document.getElementById("catID").value
            console.log(catID)
        }
        </script>
    </div>
</body>

</html>