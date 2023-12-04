</div>
</div>
</body>
<script>
    let active = "<?php echo $data['page'] ?>";

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

    const openModalBtn = document.getElementById('addKaryawan');
    const closeModalBtn = document.getElementById('closeModal');
    const modal = document.getElementById('modal');

    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });

    closeModalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });

    const openModalEdit = document.querySelectorAll('.edit');
    const closeModalEdit = document.getElementById('closeEdit');
    const modalEdit = document.getElementById('modalEdit');

    openModalEdit.forEach(e => {
        e.addEventListener('click', () => {
            modalEdit.classList.remove('hidden');
            modalEdit.classList.add('flex');
        });
    })

    closeModalEdit.addEventListener('click', () => {
        modalEdit.classList.add('hidden');
        modalEdit.classList.remove('flex');
    });

    const openModalDelete = document.querySelectorAll(".delete");
    const closeModalDelete = document.querySelectorAll(".close");
    const modalDelete = document.getElementById("modalDelete");

    openModalDelete.forEach(e => {
        e.addEventListener('click', () => {
            modalDelete.classList.remove('hidden');
            modalDelete.classList.add('flex');
        });
    })

    closeModalDelete.forEach(e => {
        e.addEventListener('click', () => {
            modalDelete.classList.add('hidden');
            modalDelete.classList.remove('flex');
        });
    })
</script>

</html>
