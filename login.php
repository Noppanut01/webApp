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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<body>
    <div class="container-lg">
        <h1 align="center" class="my-3">Webboard Kakkak</h1>
        <?php
        include 'nav.php';
        if (isset($_SESSION["error"]) && $_SESSION["error"]) {
            echo "<div class='row d-flex justify-content-center'>";
            echo "<div class='col-sm-8 col-md-6 col-lg-4'>";
            echo "<div class='alert alert-danger' role='alert'>ชื่อหรือรหัสผ่านไม่ถูกต้อง</div>";
            unset($_SESSION["error"]);
            echo "</div>";
            echo "</div>";
        }
        ?>

        <div class="row d-flex justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        เข้าสู่ระบบ
                    </div>
                    <div class="card-body">
                        <form action="verify.php" method="post">
                            <div class="form-group mb-3">
                                <label for="login" class="form-label">Username: </label>
                                <input class="form-control" type="text" name="login" id="login">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password: </label>
                                <input class="form-control" type="password" name="password" id="password">
                            </div>
                            <div class="form-group d-flex justify-content-center mt-3">
                                <input type="submit" value="Login" class="btn btn-success me-2">
                                <input type="submit" value="Reset" class="btn btn-danger ms-2">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <p align="center" class="my-3">ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a></p>
    </div>
</body>

</html>