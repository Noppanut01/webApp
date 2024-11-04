<nav class="navbar navbar-expand-lg navbar-light bg-light my-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
        <ul class="navbar-nav">
            <?php
            // session_start();
            $user = $_SESSION['username'];
            $role = $_SESSION['role'];
            if (!isset($_SESSION['id'])) {
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='login.php'><i class='bi bi-pencil-square'></i> เข้าสู่ระบบ</a>";
                echo "</li>";
            } else if (isset($_SESSION['id']) && ($role == 'm' || $role == 'b')) {
                echo "<li class='nav-item'>";
                echo "<a class='btn btn-outline-secondary btn-sm dropdown-toggle' href='#' role='button'data-bs-toggle='dropdown' aria-expanded='false'><i class='bi bi-person-lines-fill'></i> $user</a>";
                echo "<ul class='dropdown-menu dropdown-menu-end'>";
                echo "<li><a class='dropdown-item' href='logout.php'><i class='bi bi-power'></i> ออกจากระบบ</a></li>";
                echo "</ul>";
                echo "</li>";
            } else if (isset($_SESSION['id']) && $role == 'a') {
                echo "<li class='nav-item'>";
                echo "<a class='btn btn-outline-secondary btn-sm dropdown-toggle' href='#' role='button'data-bs-toggle='dropdown' aria-expanded='false'><i class='bi bi-person-lines-fill'></i> $user</a>";
                echo "<ul class='dropdown-menu dropdown-menu-end'>";
                echo "<li><a class='dropdown-item' href='category.php'><i class='bi bi-tags-fill'></i> จัดการหมวดหมู่</a></li>";
                echo "<li><a class='dropdown-item' href='user.php'><i class='bi bi-person-fill-gear'></i> จัดการผู้ใช้งาน</a></li>";
                echo "<li><a class='dropdown-item' href='logout.php'><i class='bi bi-power'></i> ออกจากระบบ</a></li>";
                echo "</ul>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</nav>