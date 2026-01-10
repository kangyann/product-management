<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style/template.css">
    <link rel="stylesheet" href="/assets/style/dashboard/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="text-nowrap" id="sidebar">
            <!-- Sidebar Info User -->
            <p class="text-sm mb-0">Hallo, <b id="username"><?= $users["username"] ?></b></p>

            <!-- Sidebar Menu -->
            <div class="" id="sidebar_menu">
                <small class="fw-semibold">Menu</small>
                <ul class="text-sm">
                    <a href="/dashboard">
                        <li id="<?= $currentPath === "/dashboard" ? "menu_active" : "" ?>">Dashboard</li>
                    </a>
                </ul>
            </div>
        </div>
        <!-- Main Layout -->
        <div class="" id="mainlayout">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center" id="header">
                <img src="/assets/images/icons/bars.svg" alt="sidebar_icons_menu" width="24" height="24" id="menu" style="cursor: pointer;">
                <p class="mb-0">Selamat datang di dashboard</p>
                <form action="/auth/logout" method="POST">
                    <button class="btn btn-primary" style="font-size: 12px;">Keluar</button>
                </form>
            </div>


            <div class="" id="main">
                <?php require $content; ?>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
<script>
    let clicked = true;
    const sidebar = document.getElementById("sidebar")
    document.getElementById("menu").addEventListener("click", () => {
        if (clicked) {
            sidebar.style.flex = "none";
            sidebar.style.minWidth = "0";
            sidebar.style.padding = "0";
            clicked = false
        } else {
            sidebar.style.flex = "0.15";
            sidebar.style.minWidth = "256px";
            sidebar.style.padding = "16px";
            clicked = true
        }
    })
</script>

</html>