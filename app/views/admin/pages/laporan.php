<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <div class="flex justify-between w-full">
            <label for="cari-karyawan" aria-label="cari karyawan" title="search karyawan" class="flex justify-between items-center gap-1 px-7 py-3 border border-Neutral/30 rounded-full">
                <input type="search" name="" id="cari-karyawan" onkeyup="cariKaryawan()" class="outline-none" placeholder="Cari karyawan">
                <img src="../public/Assets/svg/search-normal.svg" alt="search">
            </label>
            <label for="date" aria-label="search date" title="search date" class="flex items-center py-4 px-6 rounded-full outline-none bg-Neutral/20">
                <input type="date" name="date" id="date-search" onchange="searchByDate()" onclick="this.value = ''" class="outline-none bg-Neutral/20">
            </label>
        </div>

        <!-- Start table -->
        <div class="overflow-auto">
            <table class="table-auto w-full px-3" id="tabel-karyawan">
                <thead class="bg-Neutral/20 rounded-thead">
                    <tr>
                        <th class="tableHead">No</th>
                        <th class="tableHead">Nama Operator</th>
                        <th class="tableHead">Jumlah Barang</th>
                        <th class="tableHead">Total Penjualan</th>
                        <th class="tableHead">Tanggal Transaksi</th>
                        <th class="tableHead">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data['laporan'] as $laporan) : ?>
                        <tr>
                            <td class="tableContent"><?= $no; ?></td>
                            <td class="tableContent"><?= $laporan['nama_user']; ?></td>
                            <td class="tableContent"><?= $laporan['jumlah']; ?></td>
                            <td class="tableContent"><?= "Rp " . number_format($laporan['total'], 0, ',', '.'); ?></td>
                            <td class="tableContent date"><?= tgl_indo($laporan['tgl_transaksi']); ?></td>
                            <td class="tableContent">
                                <button class="py-3 px-6 bg-Neutral/20 text-Primary-blue rounded-full active:brightness-95 " onclick="openDetailModal('modal<?= $laporan['id_transaksi'] ?>', '<?= $laporan['id_transaksi'] ?>')" aria-label="Open Detail" title="Open Detail">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End Table -->
        <!-- start modal detail -->
        <?php foreach ($data['laporan'] as $laporan) : ?>
            <div id="modal<?= $laporan['id_transaksi'] ?>" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
                <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[32%] laptop1:w-[38%] laptop3:w-[44%]">
                    <div class="flex justify-between">
                        <p class="text-Neutral/100 font-semibold text-xl">Detail Transaksi</p>
                        <button id="closeModal" class="cursor-pointer" onclick="closeDetailModal('modal<?= $laporan['id_transaksi'] ?>', '<?= $laporan['id_transaksi'] ?>')">
                            <img src="../public/Assets/svg/close.svg" alt="close">
                        </button>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-3">
                            <label for="operator">Operator</label>
                            <input type="text" name="operator" id="operator" class="outline-none px-6 py-4 rounded-xl bg-white border border-Neutral/30" value="<?= $laporan['nama_user']; ?>" disabled>
                        </div>
                        <div class="flex flex-col gap-3">
                            <label for="tgl">Tanggal Transaksi</label>
                            <input type="text" name="tgl" id="tgl" class="outline-none px-6 py-4 rounded-xl bg-white border border-Neutral/30" value="<?= tgl_indo($laporan['tgl_transaksi']); ?>" disabled>
                        </div>
                    </div>
                    <div class="flex flex-col p-3 gap-5 border border-Neutral/30 rounded-2xl h-[40vh]">
                        <p class="text-base text-Neutral/100 font-semibold">Rincian Pembayaran</p>
                        <div class="flex flex-col gap-3">
                            <div class="flex flex-col gap-4 h-[10vh] overflow-auto" id="detailBarang<?= $laporan['id_transaksi'] ?>">
                            </div>
                            <div class="flex justify-between items-center py-3 border-t border-b  border-t-Neutral/40 border-b-Neutral/40">
                                <p class="text-Neutral/100 text-sm font-semibold">
                                    Total</p>
                                <p class="text-Neutral/100 text-sm font-semibold">
                                    <?= "Rp " . number_format($laporan['total'], 0, ',', '.'); ?></p>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-Neutral/80 text-sm font-medium">Bayar</p>
                                <p class="text-Neutral/80 text-sm font-medium">
                                    <?= "Rp " . number_format($laporan['bayar'], 0, ',', '.'); ?></p>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-Neutral/80 text-sm font-medium">Kembali</p>
                                <p class="text-Neutral/80 text-sm font-medium">
                                    <?= "Rp " . number_format($laporan['kembali'], 0, ',', '.'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- end modal detail -->
</section>
<script>
    const openDetailModal = (modalId, id_transaksi) => {
        const modalElement = document.getElementById(modalId);
        modalElement.classList.remove('hidden');
        modalElement.classList.add('flex');
        getData(id_transaksi);
    };

    const closeDetailModal = (modalId, id_transaksi) => {
        const modalElement = document.getElementById(modalId);
        modalElement.classList.add('hidden');
        modalElement.classList.remove('flex');

        const container = document.getElementById(`detailBarang${id_transaksi}`);
        container.innerHTML = '';
    };

    async function getData(id) {
        const url = `<?= BASEURL; ?>/laporan/getDetailTransaksi/${id}`;

        try {
            const response = await fetch(url);

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const data = await response.json();

            const container = document.getElementById(`detailBarang${id}`);

            data.forEach(e => {
                const barang = `<div class="flex justify-between items-center mx-2">
                                    <p class="text-Neutral/100 text-sm font-medium overflow-hidden whitespace-nowrap text-ellipsis w-[8rem] p-nama-barang">${e.nama_barang}</p>
                                    <p class="text-Neutral/100 text-sm font-medium p-harga-quantity">${e.hrg_jual}x${e.jumlah}</p>
                                </div>`;

                container.innerHTML += barang;
            });
        } catch (error) {
            console.error('Fetch error:', error);
        }
    }

    function formatDateString(dateString) {
        const [year, month, day] = dateString.split('-');
        const months = [
            'Januari', 'Februari', 'Maret', 'April',
            'Mei', 'Juni', 'Juli', 'Agustus',
            'September', 'Oktober', 'November', 'Desember'
        ];
        const monthName = months[parseInt(month, 10) - 1];
        return `${day} ${monthName} ${year}`;
    }
    // Function to search by date
    function searchByDate() {
        const searchDate = document.getElementById('date-search').value;
        const rows = document.querySelectorAll('#tabel-karyawan tbody tr');

        rows.forEach(row => {
            const dateCell = row.querySelector('.date');

            if (dateCell.textContent === formatDateString(searchDate)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
