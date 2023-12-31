</div>
</div>
</body>
<script>
    // sidebar
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
                fetch(`<?= BASEURL; ?>/Notif/getLastLaporan`)
                .then(response => response.ok ? response.json() :
                    handleError(response)),
                fetch(`<?= BASEURL; ?>/Notif/getLastLog`)
                .then(response => response.ok ? response.json() :
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


    let active = "<?= $data['page'] ?>";

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

    // modal
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
    // end

    // search
    function cariKaryawan() {
        let input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("cari-karyawan");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabel-karyawan");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function cariBarang() {
        const input = document.getElementById('cari-barang');
        const filter = input.value.trim().toUpperCase();
        const section = document.getElementById('section-barang');
        const items = section.querySelectorAll('.div-barang');

        items.forEach(item => {
            const title = item.querySelector('p.p-barang');
            const txtValue = title?.textContent?.trim() || title?.innerText?.trim();

            item.style.display = txtValue?.toUpperCase().includes(filter) ? '' : 'none';
        });
    }

    const closeModalAlert = () => {
        const modalElement = document.getElementById("flashMessage");
        modalElement.classList.add('hidden');
    };
</script>

</html>
