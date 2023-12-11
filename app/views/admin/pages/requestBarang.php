<?php
$data = array(
    array("No" => 1, "Nama Operator" => "Syahrul", "Nama Barang" => "Nasi Goreng", "Status" => "proses"),
    array("No" => 2, "Nama Operator" => "John", "Nama Barang" => "Mie Goreng", "Status" => "tolak"),
    array("No" => 3, "Nama Operator" => "Jane", "Nama Barang" => "Ayam Bakar", "Status" => "setuju")
);

function getStatusLabel($status)
{
    switch ($status) {
        case 'proses':
            return 'Sedang Diproses';
        case 'tolak':
            return 'Ditolak';
        case 'setuju':
            return 'Disetujui';
    }
}
?>
<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <div class="flex flex-col w-full gap-4">
            <a href="<?= BASEURL; ?>/databarang">
                <img src="Assets/svg/arrow-left.svg" alt="backArrow" class="w-fit">
            </a>
            <div class="flex justify-between">
                <div>
                    <p class="font-semibold text-Neutral/100 text-xl">Request Barang</p>
                    <p class="font-normal text-xs text-Neutral/60">List barang permintaan yang diajukan oleh operator
                        kantin</p>
                </div>
                <div class="flex justify-between px-7 py-3 border border-Neutral/30 rounded-full">
                    <input type="search" name="" id="" class="outline-none" placeholder="Cari barang">
                    <img src="Assets/svg/search-normal.svg" alt="search">
                </div>
            </div>
        </div>
        <!-- Start table -->
        <div class="overflow-auto">
            <table class="table-auto w-full px-3">
                <thead class="bg-Neutral/20 rounded-thead">
                    <tr>
                        <th class="tableHead">No</th>
                        <th class="tableHead">Nama Operator</th>
                        <th class="tableHead">Nama Barang</th>
                        <th class="tableHead">Status</th>
                        <th class="tableHead">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $value) : ?>
                        <?php
                        $no = $value['No'];
                        $namaOperator = $value['Nama Operator'];
                        $namaBarang = $value['Nama Barang'];
                        $status = $value['Status'];
                        ?>
                        <tr>
                            <td class="tableContent text-Neutral/60"><?= $no; ?></td>
                            <td class="tableContent"><?= $namaOperator; ?></td>
                            <td class="tableContent"><?= $namaBarang; ?></td>
                            <td class="tableContent">
                                <div>
                                    <?php
                                    if ($status === 'proses') : ?>
                                        <span class="statusProses">
                                            <img src="Assets/svg/kuning.svg" al t="">
                                            <?= getStatusLabel($status); ?>
                                        </span>
                                    <?php elseif ($status === 'tolak') : ?>
                                        <span class="statusProses">
                                            <img src="Assets/svg/merah.svg" al t="">
                                            <?= getStatusLabel($status); ?>
                                        </span>
                                    <?php elseif ($status === 'setuju') : ?>
                                        <span class="statusProses">
                                            <img src="Assets/svg/hijau.svg" al t="">
                                            <?= getStatusLabel($status); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="tableContent flex justify-start gap-2">
                                <button onclick="openModalReject()" class="buttonReq <?= $status === 'proses' ? 'activeReject' : 'notActiveReject'; ?>">Tolak</button>
                                <button onclick="openModalAcc()" class="buttonReq <?= $status === 'proses' ? 'activeAcc' : 'notActiveAcc'; ?>">Setujui</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End Table -->
    </div>
    <!-- modal acc -->
    <div id="modalAcc" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
        <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[20%] laptop1:w-[27%] laptop3:w-[30%]">
            <p class="text-Neutral/100 text-xl font-semibold text-center">Apakah anda yakin ingin menyetujui request
                ini?</p>
            <div class="flex justify-between">
                <button class="px-[3.25rem] py-3 text-white bg-Primary-blue rounded-full" onclick="closeModalAcc()">Setuju</button>
                <button class="px-[3.25rem] py-3 text-Neutral/100 bg-[#EEE] rounded-full" onclick="closeModalAcc()">Batal</button>
            </div>
        </div>
    </div>
    <!-- end modal acc -->
    <!-- modal reject -->
    <div id="modalReject" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
        <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[20%] laptop1:w-[27%] laptop3:w-[30%]">
            <p class="text-Neutral/100 text-xl font-semibold text-center">Apakah anda yakin ingin menolak request
                ini?</p>
            <div class="flex justify-between">
                <button class="px-[3.25rem] py-3 text-white bg-red-600 rounded-full" onclick="closeModalReject()">Tolak</button>
                <button class="px-[3.25rem] py-3 text-Neutral/100 bg-[#EEE] rounded-full" onclick="closeModalReject()">Batal</button>
            </div>
        </div>
    </div>
    <!-- end modal reject -->
</section>
<script>
    const openModalReject = () => {
        const modal = document.getElementById('modalReject')
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    const closeModalReject = () => {
        const modal = document.getElementById('modalReject')
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

    const openModalAcc = () => {
        const modal = document.getElementById('modalAcc')
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    const closeModalAcc = () => {
        const modal = document.getElementById('modalAcc')
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
</script>
