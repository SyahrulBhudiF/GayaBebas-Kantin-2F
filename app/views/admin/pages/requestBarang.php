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
                    <input type="search" name="" id="cari-barang" onkeyup="cariBarangReq()" class="outline-none"
                        placeholder="Cari barang">
                    <img src="Assets/svg/search-normal.svg" alt="search">
                </div>
            </div>
        </div>
        <!-- Start table -->
        <div class="overflow-auto">
            <table class="table-auto w-full px-3" id="tabel-request">
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
                    <?php $no = 1;
                    foreach ($data['request'] as $value) : ?>
                    <tr>
                        <td class="tableContent text-Neutral/60"><?= $no; ?></td>
                        <td class="tableContent"><?= $value['nama_user']; ?></td>
                        <td class="tableContent"><?= $value['nama_barang']; ?></td>
                        <td class="tableContent">
                            <div>
                                <?php
                                    if ($value['status'] === 'Sedang Diproses') : ?>
                                <span class="statusProses">
                                    <img src="Assets/svg/kuning.svg" alt="">
                                    <?= $value['status']; ?>
                                </span>
                                <?php elseif ($value['status'] === 'Ditolak') : ?>
                                <span class="statusProses">
                                    <img src="Assets/svg/merah.svg" alt="">
                                    <?= $value['status']; ?>
                                </span>
                                <?php elseif ($value['status'] === 'Disetujui') : ?>
                                <span class="statusProses">
                                    <img src="Assets/svg/hijau.svg" alt="">
                                    <?= $value['status']; ?>
                                </span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="tableContent flex justify-start gap-2">
                            <button onclick="openModal('modalReject<?= $value['id_request']; ?>')"
                                class="buttonReq <?= $value['status'] === 'Sedang Diproses' ? 'activeReject' : 'notActiveReject'; ?>">Tolak</button>
                            <button onclick="openModal('modalAcc<?= $value['id_request']; ?>')"
                                class="buttonReq <?= $value['status'] === 'Sedang Diproses' ? 'activeAcc' : 'notActiveAcc'; ?>">Setujui</button>
                        </td>
                    </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End Table -->
    </div>
    <!-- modal acc -->
    <?php foreach ($data['request'] as $value) : ?>
    <div id="modalAcc<?= $value['id_request']; ?>"
        class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
        <div
            class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[20%] laptop1:w-[27%] laptop3:w-[30%]">
            <p class="text-Neutral/100 text-xl font-semibold text-center">Apakah anda yakin ingin menyetujui request
                ini?</p>
            <div class="flex justify-between">
                <a href="<?= BASEURL; ?>/requestbarang/setujuiRequestBarangById/<?= $value['id_request']; ?>">
                    <button class="px-[3.25rem] py-3 text-white bg-Primary-blue rounded-full">Setuju</button>
                </a>
                <button class="px-[3.25rem] py-3 text-Neutral/100 bg-[#EEE] rounded-full"
                    onclick="closeModal('modalAcc<?= $value['id_request']; ?>')">Batal</button>
            </div>
        </div>
    </div>
    <!-- end modal acc -->
    <!-- modal reject -->
    <div id="modalReject<?= $value['id_request']; ?>"
        class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
        <div
            class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[20%] laptop1:w-[27%] laptop3:w-[30%]">
            <p class="text-Neutral/100 text-xl font-semibold text-center">Apakah anda yakin ingin menolak request
                ini?</p>
            <div class="flex justify-between">
                <a href="<?= BASEURL; ?>/requestbarang/tolakRequestBarangById/<?= $value['id_request']; ?>">
                    <button class="px-[3.25rem] py-3 text-white bg-red-600 rounded-full">Tolak</button>
                </a>
                <button class="px-[3.25rem] py-3 text-Neutral/100 bg-[#EEE] rounded-full"
                    onclick="closeModal('modalReject<?= $value['id_request']; ?>')">Batal</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <!-- end modal reject -->
</section>
<script>
function cariBarangReq() {
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("cari-barang");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabel-request");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
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
</script>
