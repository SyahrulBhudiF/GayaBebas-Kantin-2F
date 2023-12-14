<?php
// Contoh data
$data_penjualan = array(
    array("No" => 1, "Nama Barang" => "Citato", "Jumlah Barang" => 123, "Total Penjualan" => "Rp 1.500.000", "Tanggal Transaksi" => "26 Oktober 2023"),
    array("No" => 2, "Nama Barang" => "Pocari Sweat", "Jumlah Barang" => 75, "Total Penjualan" => "Rp 800.000", "Tanggal Transaksi" => "27 Oktober 2023"),
    array("No" => 3, "Nama Barang" => "Indomie Goreng", "Jumlah Barang" => 200, "Total Penjualan" => "Rp 2.000.000", "Tanggal Transaksi" => "28 Oktober 2023"),
);

?>
<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <div class="flex justify-between w-full">
            <div class="flex gap-3">
                <label for="hari" class="inputRadioLapor checked" onchange="toggleCheckedClass(this)">
                    <input type="radio" name="waktu" id="hari" class="check" checked>
                    Hari ini
                </label>
                <label for="bulan" class="inputRadioLapor" onchange="toggleCheckedClass(this)">
                    <input type="radio" name="waktu" id="bulan" class="check">
                    Bulan ini
                </label>
            </div>
        </div>

        <!-- Start table -->
        <div class="overflow-auto">
            <table class="table-auto w-full px-3">
                <thead class="bg-Neutral/20 rounded-thead">
                    <tr>
                        <th class="tableHead">No</th>
                        <th class="tableHead">Nama Barang</th>
                        <th class="tableHead">Jumlah Barang</th>
                        <th class="tableHead">Total Penjualan</th>
                        <th class="tableHead">Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_penjualan as $data) : ?>
                        <tr>
                            <td class="tableContent text-Neutral/60"><?= $data['No']; ?></td>
                            <td class="tableContent"><?= $data['Nama Barang']; ?></td>
                            <td class="tableContent"><?= $data['Jumlah Barang']; ?></td>
                            <td class="tableContent"><?= $data['Total Penjualan']; ?></td>
                            <td class="tableContent"><?= $data['Tanggal Transaksi']; ?></td>
                        </tr>
                    <?php endforeach; ?>
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
