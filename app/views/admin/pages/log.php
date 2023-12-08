<?php
// Contoh data
$data_transaksi = array(
    array("No" => 1, "Nama Operator" => "Budi Setyaningrum", "Aksi Operator" => "Menghapus data barang", "Tanggal Transaksi" => "26 Oktober 2023"),
    array("No" => 2, "Nama Operator" => "Andi Saputra", "Aksi Operator" => "Menambah stok barang", "Tanggal Transaksi" => "28 Oktober 2023"),
    array("No" => 3, "Nama Operator" => "Citra Indah", "Aksi Operator" => "Mengedit detail produk", "Tanggal Transaksi" => "30 Oktober 2023"),
);

?>
<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <!-- Start table -->
        <div class="overflow-auto">
            <table class="table-auto w-full px-3">
                <thead class="bg-Neutral/20 rounded-thead">
                    <tr>
                        <th class="tableHead">No</th>
                        <th class="tableHead">Nama Operator</th>
                        <th class="tableHead">Aksi Operator</th>
                        <th class="tableHead">Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_transaksi as $data) : ?>
                    <tr>
                        <td class="tableContent text-Neutral/60">0<?php echo $data['No']; ?></td>
                        <td class="tableContent"><?php echo $data['Nama Operator']; ?></td>
                        <td class="tableContent"><?php echo $data['Aksi Operator']; ?></td>
                        <td class="tableContent"><?php echo $data['Tanggal Transaksi']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End Table -->
    </div>
</section>
