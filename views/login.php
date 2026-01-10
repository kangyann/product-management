<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- External CSS [Font] -->
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Internal CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style/auth/style.css">
    <link rel="stylesheet" href="/assets/style/template.css">


    <title>Login</title>
</head>

<body>
    <div class="container">
        <!-- Container -->
        <div class="d-flex justify-center items-center min-h-screen">
            <!-- Box Card -->
            <div id="box">
                <!-- Title -->
                <h1 class="text-lg text-center" id="box__title">Login as User</h1>
                <!-- Form Login -->
                <form action="/auth/login" method="POST">
                    <!-- Input & Label Group [Username] -->
                    <div class="input_group" id="box__inputgroup">
                        <label for="username" class="text-sm">Username</label>
                        <input type="text" id="username" name="username" placeholder="Masukan username anda" class="input">
                    </div>
                    <!-- Input & Label Group [Password] -->
                    <div class="input_group" id="box__inputgroup">
                        <label for="password" class="text-sm">Password</label>
                        <input type="password" id="password" name="password" placeholder="Masukan password anda" class="input">
                    </div>
                    <!-- Button Action -->

                    <div class="input_group" id="box__inputgroup">
                        <button type="submit" class="button">Masuk</button>
                        <?php if (isset($_SESSION['flash'])): ?>
                            <div class="alert <?= $_SESSION['flash']["status"] == 200 ? "alert-success" : "alert-danger" ?> mt-4">
                                <?= $_SESSION['flash']["message"]; ?>
                            </div>
                        <?php unset($_SESSION['flash']);
                        endif; ?>
                    </div>
                </form>
            </div>
        </div>
        <!-- Author -->
        <div class="author">
            <div class="author__box">
                <p>2025 &copy; by kangyann.dev </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>