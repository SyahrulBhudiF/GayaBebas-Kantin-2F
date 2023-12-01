<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

$active = 'Dashboard';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $_SESSION['page'] = $page;
} elseif (isset($_SESSION['page'])) {
    $page = $_SESSION['page'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../../../dist/output.css">
</head>

<body class="w-full h-screen bg-Neutral/40 bg-opacity-60 overflow-hidden">
    <?php include_once '../components/navbar.php'; ?>
    <div class="flex w-full">
        <?php include_once '../components/sideBar.php'; ?>
        <div class="w-full">
            <?php
            if (isset($page)) {
                include './pages/' . $page . '.php';
            } else {
                include './pages/dashboard.php';
            }
            ?>
        </div>
    </div>
</body>
<script>
    let active = "<?php echo $_SESSION['page']; ?>";

    const nav = document.getElementById('activeValue')
    const sidebarElements = document.querySelectorAll('.containerSidebar');

    sidebarElements.forEach(element => {
        const textElement = element.querySelector('.textSidebar');
        const svgElement = element.querySelector('svg');
        const path = svgElement.querySelectorAll('path');

        if (element.id == active) {
            element.classList.add('activeSidebar');
            textElement.classList.remove('text-Neutral/70');
            textElement.classList.add('text-Primary-blue');
            element.classList.add('fadeIn');
            nav.innerHTML = active == 'dashboard' ? 'Dashboard' :
                active == 'dataKaryawan' ? 'Data Karyawan' :
                active == 'dataBarang' ? 'Data Barang' :
                active == 'laporan' ? 'Laporan' : 'Log Aktivitas';

            nav.classList.add('fadeIn')

            path.forEach(e => {
                e.setAttribute('fill', '#5E51D9')
            })

        } else {
            element.classList.remove('activeSidebar');
            textElement.classList.remove('text-Primary-blue');
            textElement.classList.add('text-Neutral/70');

            path.forEach(e => {
                e.setAttribute('fill', '#7F7F7F')
            })
        }
    });
</script>

</html>
