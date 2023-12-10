<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/output.css" />
</head>

<body>
    <main class="flex items-center justify-center h-screen bg-gray-100">
        <form action="<?= BASEURL; ?>/auth/login" method="POST">
            <div class="bg-white w-96 p-10 rounded-2xl shadow-sm">
                <div class="flex items-center justify-center mb-4">
                    <img src="<?= BASEURL; ?>/Assets/img/Logo Polinema.png" class="h-16" />
                </div>
                <div class="flex items-center justify-center mb-12">
                    <label class="text-2xl font-semibold">Kantin JTI</label>
                </div>
                <label class="text-gray-700 text-base font-semibold">Username</label>
                <input type="text" class="w-full py-2 bg-gray-50 text-gray-500 text-sm px-5 outline-none mt-2 mb-4 rounded-xl" name="username" placeholder="Masukkan username anda" required />
                <label class="text-gray-700 text-base font-semibold">Password</label>
                <input type="password" class="w-full py-2 bg-gray-50 text-gray-500 text-sm px-5 outline-none mt-2 mb-14 rounded-xl" name="password" placeholder="Masukkan password anda" required />
                <button type="submit" class="bg-purple-500 w-full text-white py-2 rounded-full hover:bg-purple-600 transition-colors">
                    Masuk
                </button>
            </div>
        </form>
    </main>
</body>

</html>