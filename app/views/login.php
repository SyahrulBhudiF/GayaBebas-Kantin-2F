<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
Flasher::flash();
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
    <main class="flex items-center justify-center h-screen w-full bg-Neutral/30">
        <form action="<?= BASEURL; ?>/auth/login" method="POST" class="bg-Neutral/10 p-10 rounded-2xl shadow-sm w-[45vh] laptop2:w-[50vh]">
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
            <button type="submit" class="bg-Primary-blue w-full text-white py-2 rounded-full hover:bg-blue-700 transition-colors">
                Masuk
            </button>
        </form>

    </main>
</body>
<script>
    setTimeout(() => {
        const element = document.getElementById("flashMessage")
        element.classList.remove('flex')
        element.classList.add('hidden')
    }, 1500)
</script>

</html>
