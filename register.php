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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<link rel="stylesheet" href="style.css">

<body>
    <h1 align="center">Register</h1>
    <hr>
    <div class="row d-flex justify-content-center">
        <div class="col-sm-8 col-md-6 col-lg-4">
            <?php
            if (isset($_SESSION["add_login"])) {

                if ($_SESSION["add_login"] == "error") {
                    echo "<div class='alert alert-danger'>ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา</div>";
                } else {
                    echo "<div class='alert alert-success'>เพิ่มบัญชีเรียบร้อย</div>";
                }
                unset($_SESSION["add_login"]);
            }
            ?>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-sm-8 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">
                    <form action="register_save.php" method="post">
                        <div class="form-group mb-3">
                            <label for="login" class="form-label">Username: </label>
                            <input class="form-control" type="text" name="login" id="login" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password: </label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Fullname: </label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender" class="form-label">Gender: </label>
                            <input type="radio" name="gender" id="" value="m" required> Male <input type="radio"
                                name="gender" id="" value="f"> Female <input type="radio" name="gender" id="" value="o">
                            Other
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email: </label>
                            <input class="form-control" type="email" name="email" id="email" required>
                        </div>
                        <div class="form-group d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-success me-2"><i class=' bi bi-pencil-square'></i>
                                Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <p align="center"><a href="index.php">กลับไปหน้าหลัก</a></p>
</body>

</html>