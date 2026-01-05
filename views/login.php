<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- External CSS [Font] -->
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Internal CSS -->
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
                <form action="">
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
                    <button type="submit" class="button">Masuk</button>
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
</body>

</html>