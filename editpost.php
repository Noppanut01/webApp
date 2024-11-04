<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
$id = $_GET['id'];
$sql = "SELECT id,title,content,cat_id,user_id FROM post where id =$id";
$result = $conn->query($sql);
$data = $result->fetch(PDO::FETCH_ASSOC);
$conn = null;
if (!isset($_SESSION['id']) || $data['user_id'] != $_SESSION['user_id']) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <h1 align="center">Webboard KakKak</h1>
    <hr>
    <div class="container">
        <?php include "nav.php";
        if (($_SESSION["editpost"])) {
            echo "<div class='alert alert-success'>แก้ไขข้อมูลเรียบร้อยเเล้ว</div>";
            unset($_SESSION["editpost"]);
        } ?>

        <div class="card">
            <div class="card-header bg-warning border border-warning text-white">
                แก้ไขกระทู้
            </div>
            <div class="card-body border border-warning">
                <form action="editpost_save.php" method="post">
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">หมวดหมู่ :</label>
                        <div class="col-lg-9">
                            <select name="category" class="form-select">
                                <?php
                                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                                $sql = "SELECT * FROM category";
                                foreach ($conn->query($sql) as $row) {
                                    if ($row[0] == $data['cat_id']) {
                                        echo "<option value=" . $row[0] . " selected>" . $row[1] . "</option>";
                                    } else {
                                        echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
                                    }
                                }

                                $conn = null;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <input type="hidden" name="post_id" value=<?php echo $id ?>>
                        <label class="col-lg-3 col-form-label">หัวข้อ :</label>
                        <div class="col-lg-9">
                            <input type="text" name="topic" class=" form-control" value=<?php echo $data['title'] ?>
                                required>
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label class="col-lg-3 col-form-label">เนื้อหา :</label>
                        <div class="col-lg-9">
                            <textarea name="content" class=" form-control" rows="8"
                                required><?php echo $data['content'] ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <center> <button class="btn btn-warning text-white" type="submit"><i
                                        class="bi bi-pencil-square"></i>
                                    บันทึกข้อความ</button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>