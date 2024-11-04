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
    <nav class="navbar navbar-expand-lg navbar-light bg-light my-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
            <ul class="navbar-nav">
                <?php
                session_start();
                $user = $_SESSION['username'];
                $role = $_SESSION['role'];
                if (!isset($_SESSION['id'])) {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='login.php'><i class='bi bi-pencil-square'></i> เข้าสู่ระบบ</a>";
                    echo "</li>";
                } else if (isset($_SESSION['id']) && $role == 'm') {
                    echo "<li class='nav-item dropdown'>";
                    echo "<a class='btn btn-outline-secondary btn-sm dropdown-toggle' href='#' role='button'data-bs-toggle='dropdown' aria-expanded='false'><i class='bi bi-person-lines-fill'></i> $user</a>";
                    echo "<ul class='dropdown-menu'>";
                    echo "<li><a class='dropdown-item' href='logout.php'><i class='bi bi-power'></i> ออกจากระบบ</a></li>";
                    echo "</ul>";
                    echo "</li>";
                } else if (isset($_SESSION['id']) && $role == 'a') {
                    echo "<li class='nav-item dropdown'>";
                    echo "<a class='btn btn-outline-secondary btn-sm dropdown-toggle' href='#' role='button'data-bs-toggle='dropdown' aria-expanded='false'><i class='bi bi-person-lines-fill'></i> $user</a>";
                    echo "<ul class='dropdown-menu'>";
                    echo "<li><a class='dropdown-item' href='category.php'><i class='bi bi-tags-fill'></i> จัดการหมวดหมู่</a></li>";
                    echo "<li><a class='dropdown-item' href='logout.php'><i class='bi bi-person-fill-gear'></i> จัดการผู้ใช้งาน</a></li>";
                    echo "<li><a class='dropdown-item' href='logout.php'><i class='bi bi-power'></i> ออกจากระบบ</a></li>";
                    echo "</ul>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>
    </nav>
</body>

</html>