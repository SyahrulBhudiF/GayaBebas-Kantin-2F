<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <div class="flex justify-between w-full">
            <div class="flex justify-between items-center gap-1 px-7 py-3 border border-Neutral/30 rounded-full">
                <input type="search" name="" id="cari-karyawan" onkeyup="cariKaryawan()" class="outline-none" placeholder="Cari karyawan">
                <label for="cari-karyawan">
                    <img src="../public/Assets/svg/search-normal.svg" alt="search">
                </label>
            </div>
            <label for="date" class="flex items-center py-4 px-6 rounded-full outline-none bg-Neutral/20">
                <input type="date" name="date" id="date-search" onchange="searchByDate()" onclick="this.value = ''" class="outline-none bg-Neutral/20">
                <img src="../public/Assets/svg/calendar-2.svg" alt="">
            </label>
        </div>

        <!-- Start table -->
        <div class="overflow-auto">
            <table class="table-auto w-full px-3" id="tabel-karyawan">
                <thead class="bg-Neutral/20 rounded-thead">
                    <tr>
                        <th class="tableHead">No</th>
                        <th class="tableHead">Nama Operator</th>
                        <th class="tableHead">Nama Barang</th>
                        <th class="tableHead">Jumlah Barang</th>
                        <th class="tableHead">Total Penjualan</th>
                        <th class="tableHead">Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data['laporan'] as $data) : ?>
                        <tr>
                            <td class="tableContent text-Neutral/60"><?= $no; ?></td>
                            <td class="tableContent"><?= $data['nama_user']; ?></td>
                            <td class="tableContent"><?= $data['nama_barang']; ?></td>
                            <td class="tableContent"><?= $data['jumlah']; ?></td>
                            <td class="tableContent"><?= "Rp " . number_format($data['total'], 0, ',', '.'); ?></td>
                            <td class="tableContent"><?= tgl_indo($data['tgl_transaksi']); ?></td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End Table -->
</section>
<script>
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
            const dateCell = row.querySelector('.tableContent:last-child');

            if (dateCell.textContent === formatDateString(searchDate)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
