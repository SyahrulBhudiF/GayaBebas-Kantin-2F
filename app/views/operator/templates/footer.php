</div>
</div>
</body>
<script>
    async function fetchData() {
        const handleError = (error) => {
            console.error('Fetch error:', error);
            throw error;
        };

        try {
            const [dot, laporan, log] = await Promise.all([
                fetch(`<?= BASEURL; ?>/Notif/getNotif/${<?= $_SESSION["id"] ?>}`)
                .then(response => response.ok ?
                    response.json() : handleError(response)),
                fetch(`<?= BASEURL; ?>/Notif/getLastLaporanId/${<?= $_SESSION["id"] ?>}`)
                .then(response =>
                    response.ok ? response.json() :
                    handleError(response)),
                fetch(`<?= BASEURL; ?>/Notif/getLastLogId/${<?= $_SESSION["id"] ?>}`)
                .then(response => response
                    .ok ? response.json() :
                    handleError(response)),
            ]);

            processNotif(dot, laporan, log);
        } catch (error) {
            handleError(error);
        }
    }

    function processNotif(dot, laporan, log) {
        if (dot.page_visited === "") {
            document.getElementById("laporanDot").classList.remove("hidden");
            document.getElementById("logDot").classList.remove("hidden");

        } else if (laporan.tgl_transaksi > dot.created_at && log.tgl_aksi > dot.created_at) {
            document.getElementById("laporanDot").classList.remove("hidden");
            document.getElementById("logDot").classList.remove("hidden");

        } else if (laporan.tgl_transaksi > dot.created_at) {
            document.getElementById("laporanDot").classList.remove("hidden");


        } else if (log.tgl_aksi > dot.created_at) {
            document.getElementById("logDot").classList.remove("hidden");
        }
    }

    fetchData();

    let active = "<?php echo $data['page']; ?>";

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
            nav.innerHTML = active == 'transaksi' ? 'Transaksi' :
                active == 'requestBarang' ? 'Request Barang' :
                active == 'requestStock' ? 'Request Stock' :
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

    const openModal = (modalId) => {
        const modalElement = document.getElementById(modalId);
        modalElement.classList.remove('hidden');
        modalElement.classList.add('flex');
    };

    const closeModal = (modalId) => {
        const modalElement = document.getElementById(modalId);
        modalElement.classList.add('hidden');
        modalElement.classList.remove('flex');
    };

    const closeModalAlert = () => {
        const modalElement = document.getElementById("flashMessage");
        modalElement.classList.add('hidden');
    };

    setTimeout(() => {
        const element = document.getElementById("flashMessage")
        element.classList.add('hidden')
    }, 1500)
</script>

</html>
