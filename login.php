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
            echo "<div class='col-sm-8 col-md-6 col-lg-5'>";
            echo "<div class='alert alert-danger' role='alert'>ชื่อหรือรหัสผ่านไม่ถูกต้อง</div>";
            unset($_SESSION["error"]);
            echo "</div>";
            echo "</div>";
        }
        ?>

        <div class="row d-flex justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="verify.php" method="post">
                            <div class="form-group mb-3">
                                <label for="login" class="form-label">Username</label>
                                <input class="form-control" type="text" name="login" id="login">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input class="form-control" type="password" name="password" id="password">
                                    <span class="input-group-text" onclick="showHide()"><i class="bi bi-eye-fill"
                                            id="show_eye"></i><i class="bi bi-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center mt-3">
                                <input type="submit" value="Login" class="btn btn-success me-2">
                                <!-- <input type="submit" value="Reset" class="btn btn-danger ms-2"> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p align="center" class="my-3">ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a></p>
    </div>
    <script>
        function showHide() {
            let pwd = document.getElementById("password");
            let show_eye = document.getElementById("show_eye");
            let hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (pwd.type === "password") {
                pwd.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                pwd.type = "password"
                hide_eye.style.display = "none";
                show_eye.style.display = "block";
            }
        }
    </script>
</body>

</html>