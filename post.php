<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <h1 align='center'>Webboard Kakkak</h1>
    <hr>
    <div class="container">
        <?php
        session_start();
        if (!isset($_SESSION["id"])) {
            header("location:index.php");
        }
        include 'nav.php';
        $num = $_GET['id'];
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $sql = "SELECT post.title, post.content, user.login, post.post_date FROM post INNER JOIN user ON (post.user_id=user.id) WHERE post.id=$num";
        $result = $conn->query($sql);
        while ($row = $result->fetch()) {
            echo "<div class='card text-dark bg-white border-primary mx-auto' style='width: 60%;'>
            <div class='card-header bg-primary text-white'>$row[0]</div>
            <div class='card-body'>
                $row[1] <br><div class='small'>$row[2] - $row[3]</div>
            </div>
            </div><br>";
        }
        $conn = null;

        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $sql = "SELECT comment.content, user.login, comment.post_date FROM comment INNER JOIN user ON
        (comment.user_id=user.id) WHERE comment.post_id=$num ORDER BY comment.post_date ASC";
        $result = $conn->query($sql);
        $i = 0;
        while ($row = $result->fetch()) {
            $i++;
            echo "<div class='card text-dark bg-white border-info mx-auto' style='width: 60%;'>
        <div class='card-header bg-info text-white'>ความคิดเห็นที่ $i</div>
        <div class='card-body'>
            $row[0] <br>$row[1]- $row[2]
        </div>
        </div><br>";
        }
        $conn = null;
        ?>
        <!-- </div> -->

        <?php
        if ($_SESSION["role"] != "b") {
            echo "<div class='card text-dark bg-white border-success mx-auto' style='width: 60%;'>
                    <div class='card-header bg-success text-white'>เเสดงความคิดเห็น</div>
                    <div class='card-body'>
                        <form action='post_save.php' method='post'>
                            <input type='hidden' name='post_id' value=$_GET[id]>
        <div class='row mb-3 justify-content-center'>
            <div class='col-lg-10'>
                <textarea name='comment' class='form-control' rows='8'></textarea>
            </div>
        </div>
        <div class='row'>
            <div class='col-lg-12'>
                <center>
                    <button type='submit' class='btn btn-success btn-sm text-white'>
                        <i class='bi bi-box-arrow-up-right me-1'></i>ส่งข้อมูล
                    </button>
                </center>
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>";
        }
        ?>

</body>

</html>