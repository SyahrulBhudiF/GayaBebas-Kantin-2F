<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <div class="flex justify-between w-full">
            <div class="flex justify-between items-center gap-1 px-7 py-3 border border-Neutral/30 rounded-full">
                <input type="search" name="" id="cari-karyawan" onkeyup="cariKaryawan()" class="outline-none"
                    placeholder="Cari karyawan">
                <label for="cari-karyawan">
                    <img src="../public/Assets/svg/search-normal.svg" alt="search">
                </label>
            </div>
            <div class="flex gap-3">
                <label for="hari" class="inputRadioLapor checked" onchange="toggleCheckedClass(this)">
                    <input type="radio" name="waktu" id="hari" class="check" id="hari-ini" checked>
                    Hari ini
                </label>
                <label for="bulan" class="inputRadioLapor" onchange="toggleCheckedClass(this)">
                    <input type="radio" name="waktu" id="bulan" id="bulan-ini" class="check">
                    Bulan ini
                </label>
            </div>
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
function toggleCheckedClass(label) {
    document.querySelectorAll('label.inputRadioLapor').forEach(label => label.classList.remove('checked'));
    if (label.control.checked) {
        label.classList.add('checked');
    }
}
</script>
