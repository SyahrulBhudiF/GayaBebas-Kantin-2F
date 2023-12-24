<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <div class="flex flex-col w-full gap-4">
            <a href="<?= BASEURL; ?>/databarang">
                <img src="Assets/svg/arrow-left.svg" alt="backArrow" class="w-fit">
            </a>
            <div class="flex justify-between">
                <div>
                    <p class="font-semibold text-Neutral/100 text-xl">Request Stock</p>
                    <p class="font-normal text-xs text-Neutral/60">List barang permintaan yang diajukan oleh operator
                        kantin</p>
                </div>
                <label for="cari-barang" aria-label="cari barang" title="search barang"
                    class="flex justify-between px-7 py-3 border border-Neutral/30 rounded-full">
                    <input type="search" name="" id="cari-barang" onkeyup="cariBarang()" class="outline-none"
                        placeholder="Cari barang">
                    <img src="Assets/svg/search-normal.svg" alt="search">
                </label>
            </div>
        </div>
        <!-- Start grid -->
        <section class="grid grid-cols-4 gap-4 p-2 overflow-auto" id="section-barang">
            <?php foreach ($data['request'] as $value) : ?>
            <div class="flex flex-col border border-Neutral/30 rounded-3xl p-[0.2rem] div-barang">
                <div class="flex flex-col items-center bg-Neutral/20 p-4 rounded-[1.25rem]">
                    <img src="../public/Assets/img/jajan.png" alt="jajan" class="w-[50%]">
                </div>
                <div class="flex flex-col gap-3 p-4">
                    <p
                        class="text-Neutral/100 font-semibold text-base w-full overflow-hidden whitespace-nowrap text-ellipsis p-barang">
                        <?= $value['nama_barang']; ?>
                    </p>
                    <p
                        class="text-Primary-blue font-semibold text-xl w-full overflow-hidden whitespace-nowrap text-ellipsis p-barang">
                        <?= $value['stok']; ?> pcs
                    </p>
                    <p
                        class="text-Neutral/70 font-medium text-sm w-full overflow-hidden whitespace-nowrap text-ellipsis p-barang">
                        by <?= $value['nama_user']; ?>
                    </p>

                </div>
                <div class="flex gap-2 p-4 -mt-2 w-full">

                    <button
                        class="w-full bg-Neutral/30 rounded-full text-center p-3 text-red-600 active:opacity-80 <?= $value['status'] === 'Sedang Diproses' ? 'cursor-pointer' : 'notActiveReject'; ?>"
                        onclick="openModal('modalReject<?= $value['id_request_stok']; ?>')" aria-label="reject"
                        title="reject">Tolak</button>
                    <button
                        class="w-full bg-Primary-blue rounded-full text-center p-3 text-white active:opacity-80 <?= $value['status'] === 'Sedang Diproses' ? 'cursor-pointer' : 'notActiveReject'; ?>"
                        onclick="openModal('modalAcc<?= $value['id_request_stok']; ?>')" aria-label="acc"
                        title="acc">Setujui</button>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- End grid -->
    </div>
    <!-- modal acc -->
    <?php foreach ($data['request'] as $value) : ?>
    <div id="modalAcc<?= $value['id_request_stok']; ?>"
        class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
        <div
            class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[20%] laptop1:w-[27%] laptop3:w-[30%]">
            <p class="text-Neutral/100 text-xl font-semibold text-center">Apakah anda yakin ingin menyetujui request
                ini?</p>
            <div class="flex justify-between">
                <a href="<?= BASEURL; ?>/requeststok/setujuiRequestStockById/<?= $value['id_request_stok']; ?>">
                    <button class="px-[3.25rem] py-3 text-white bg-Primary-blue rounded-full">Setuju</button>
                </a>
                <button class="px-[3.25rem] py-3 text-Neutral/100 bg-[#EEE] rounded-full"
                    onclick="closeModal('modalAcc<?= $value['id_request_stok']; ?>')">Batal</button>
            </div>
        </div>
    </div>
    <!-- end modal acc -->
    <!-- modal reject -->
    <div id="modalReject<?= $value['id_request_stok']; ?>"
        class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
        <div
            class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[20%] laptop1:w-[27%] laptop3:w-[30%]">
            <p class="text-Neutral/100 text-xl font-semibold text-center">Apakah anda yakin ingin menolak request
                ini?</p>
            <div class="flex justify-between">
                <a href="<?= BASEURL; ?>/requeststok/tolakRequestStockById/<?= $value['id_request_stok']; ?>">
                    <button class="px-[3.25rem] py-3 text-white bg-red-600 rounded-full">Tolak</button>
                </a>
                <button class="px-[3.25rem] py-3 text-Neutral/100 bg-[#EEE] rounded-full"
                    onclick="closeModal('modalReject<?= $value['id_request_stok']; ?>')">Batal</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <!-- end modal reject -->
</section>
