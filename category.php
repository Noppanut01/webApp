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
</head>

<body>
    <div class="container-lg">
        <h1 align="center">Webboard Kakkak</h1>
        <?php include 'nav.php'; ?>
        <div class="col-sm-8 col-md-6 col-lg-5 mx-auto">
            <?php
            if (isset($_SESSION["cat_del"]) && $_SESSION["cat_del"]) {
                echo "<div class='alert alert-success'>ลบหมวดหมู่เรียบร้อยเเล้ว</div>";
                unset($_SESSION["cat_del"]);
            } else if (isset($_SESSION["cat_edit"]) && $_SESSION["cat_edit"]) {
                echo "<div class='alert alert-success'>แก้ไขหมวดหมู่เรียบร้อยเเล้ว</div>";
                unset($_SESSION["cat_edit"]);
            } else if (isset($_SESSION["cat_add"]) && $_SESSION["cat_add"]) {
                echo "<div class='alert alert-success'>เพิ่มหมวดหมู่เรียบร้อยเเล้ว</div>";
                unset($_SESSION["cat_add"]);
            }
            ?>
            <table class="table table-striped my-3">
                <thead>
                    <tr class="text-center">
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อหมวดหมู่</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                    $sql = "SELECT name FROM category";
                    $result = $conn->query($sql);
                    $i = 0;
                    while ($row = $result->fetch()) {
                        $i++;
                        echo "<tr class='text-center'>
                        <td scope='row'>$i</td><td>$row[0]</td>
                        <td>
                        <a class='btn btn-warning' role='button' data-bs-toggle='modal' data-bs-target='#editModal' data-value-catID='$row[0]' data-value-name='$row[1]' onclick='setModalContent(this)'>
                        <i class='bi bi-pencil-fill'></i>
                        </a>
                        <a onclick='deleteCategory('$row[1]')' class='btn btn-danger' role='button'>
                        <i class='bi bi-trash'></i>
                        </a>
                        </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <center><button class="btn btn-success bi bi-bookmark" data-bs-toggle="modal"
                    data-bs-target="#addModal">เพิ่มหมวดหมู่ใหม่</button></center>
        </div>
        <!-- เพิ่มหมวดหมู่่ -->
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

        <!-- แก้ไข -->
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
</body>

</html>