<?php
session_start();
if ($_SESSION['role'] != 'a') {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <h1 style="text-align: center;">Webboard Easy</h1>
    <div class="container-fluid">
        <?php
        include "nav.php"
        ?>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 mt-3">
                <?php
                if (isset($_SESSION["cat_del"]) && $_SESSION["cat_del"]) {
                    echo "<div class='alert alert-success'>ลบหมวดหมู่เรียบร้อยเเล้ว</div>";
                    unset($_SESSION["cat_del"]);
                } else if (isset($_SESSION["cat_edit"])) {
                    if ($_SESSION["cat_edit"]) {
                        echo "<div class='alert alert-success'>แก้ไขหมวดหมู่เรียบร้อยเเล้ว</div>";
                    } else {
                        echo "<div class='alert alert-danger'>หมวดหมู่นี้มีอยู่เเล้ว</div>";
                    }
                    unset($_SESSION["cat_edit"]);
                } else if (isset($_SESSION["cat_add"])) {
                    if ($_SESSION["cat_add"]) {
                        echo "<div class='alert alert-success'>เพิ่มหมวดหมู่เรียบร้อยเเล้ว</div>";
                    } else {
                        echo "<div class='alert alert-danger'>หมวดหมู่นี้มีอยู่เเล้ว</div>";
                    }
                    unset($_SESSION["cat_add"]);
                }
                ?>
            </div>
        </div>

        <br>
        <div class="container-lg">
            <div class="col-sm-8 col-md-6 col-lg-5 mx-auto">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="cols">ลำดับ</th>
                            <th scope="cols">ชื่อหมวดหมู่</th>
                            <th scope="cols">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                        $sql = "SELECT id,name From category Order by id ASC";
                        $result = $conn->query($sql);
                        $i = 1;
                        while ($row = $result->fetch()) {
                            echo "<tr class=text-center>
                                    <td scope='row'>$i</td>
                                    <td>$row[1]</td>
                                    <td>
                                        <a class='btn btn-warning' role='button' data-bs-toggle='modal' data-bs-target='#editModal' data-value-catID='$row[0]' data-value-name='$row[1]' onclick='setModalContent(this)'>
                                            <i class='bi bi-pencil-fill'></i>
                                        </a>
                                        <a onclick='deleteCategory(\"$row[1]\")' class='btn btn-danger' role='button'>
                                            <i class='bi bi-trash'></i>
                                        </a>
                                    </td>
                                </tr>";
                            $i++;
                        }
                        $conn = null;
                        ?>
                    </tbody>
                </table>
                <center>
                    <a class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="bi bi-bookmark-plus">เพิ่มหมวดหมู่ใหม่</i>
                    </a>
                </center>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เพิ่มหมวดหมู่ใหม่</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="category_save.php" method="post">
                        <div class="modal-body">
                            <div class="mb-1">ชื่อหมวดหมู่ : </div>
                            <input class="form-control" type="text" name="category" require>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แก้ไขหมวดหมู่</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="editcategory.php" method="post">
                        <div class="modal-body">
                            <div class="mb-1">ชื่อหมวดหมู่ : </div>
                            <input id="EditMod_cat_id" type="hidden" name="cat_id" value="0" require>
                            <input id="EditMod_cat_name" class="form-control" type="text" name="cat_name" value=""
                                require>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
        function deleteCategory(a) {
            if (confirm("ต้องการจะลบจริงหรือไม่") == true) {
                location.href = `deletecategory.php?cat_name=${a}`;
            } else {
                text = "You canceled!";
            }
        };

        function setModalContent(button) {
            const cat_id = button.getAttribute('data-value-catID');
            const cat_name = button.getAttribute('data-value-name');
            document.getElementById('EditMod_cat_id').value = cat_id;
            document.getElementById('EditMod_cat_name').value = cat_name;
        }
        </script>
    </div>
</body>


</html>