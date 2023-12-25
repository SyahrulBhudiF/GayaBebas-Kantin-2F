<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <div class="flex flex-col w-full gap-4">
            <div class="flex justify-between">
                <label for="cari-barang" class="flex justify-between px-7 py-3 border border-Neutral/30 rounded-full" aria-label="Search by nama barang" title="search By nama barang">
                    <input type="search" name="" id="cari-barang" onkeyup="cariBarang()" class="outline-none" placeholder="Cari barang">
                    <img src="Assets/svg/search-normal.svg" alt="search">
                </label>
            </div>
        </div>
        <!-- Start grid -->
        <section class="grid grid-cols-4 gap-4 p-2 overflow-auto" id="section-barang">
            <?php foreach ($data['barang'] as $barang) : ?>
                <div class="flex flex-col border border-Neutral/30 rounded-3xl p-[0.2rem] div-barang">
                    <div class="flex flex-col items-center bg-Neutral/20 p-4 rounded-[1.25rem]">
                        <span class="bg-Neutral/10 px-5 py-2 rounded-full w-fit self-start"><?= $barang['stok']; ?>
                            Tersedia</span>
                        <img src="../public/Assets/img/jajan.png" alt="jajan" class="w-[50%]">
                    </div>
                    <div class="flex flex-col gap-3 p-4">
                        <p class="text-Neutral/100 font-semibold text-base w-full overflow-hidden whitespace-nowrap text-ellipsis p-barang">
                            <?= $barang['nama']; ?>
                        </p>
                        <p class="text-Primary-blue text-xl font-semibold">Rp
                            <?= number_format($barang['hrg_jual'], 0, ',', '.'); ?><span class="text-Neutral/50 text-xs">/pcs</span></p>
                        <div class="flex gap-1 text-Neutral/70 font-medium text-sm">
                            <p><?= $barang['kategori']; ?></p>
                        </div>
                    </div>
                    <div class="flex gap-2 p-4 -mt-2 w-full">
                        <button class="EditItem w-full bg-Neutral/20 rounded-full text-center p-3 text-Primary-blue active:opacity-80" onclick="openModal('addReqStock<?= $barang['id_barang']; ?>')" aria-label="edit" title="edit">Request</button>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- End grid -->
    </div>
    <!-- add Modal -->
    <?php foreach ($data['barang'] as $barang) : ?>
        <div id="addReqStock<?= $barang['id_barang']; ?>" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
            <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[32%] laptop1:w-[38%] laptop3:w-[44%]">
                <div class="flex justify-between">
                    <p class="text-Neutral/100 font-semibold text-xl">Request Stock</p>
                    <button id="closeModal" class="cursor-pointer" onclick="closeModal('addReqStock<?= $barang['id_barang']; ?>')">
                        <img src="../public/Assets/svg/close.svg" alt="close">
                    </button>
                </div>
                <form class="flex flex-col gap-8" action="<?= BASEURL; ?>/operatorrequeststock/tambahDataRequest" method="POST">
                    <input type="text" name="id_barang" id="id_barang" value="<?= $barang['id_barang']; ?>" hidden>
                    <div class="flex flex-col gap-3">
                        <label for="display">Nama Barang</label>
                        <input type="text" name="display" id="display" class="outline-none px-6 py-4 rounded-xl bg-white border border-Neutral/30" value="<?= $barang['nama']; ?>" disabled>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="stok">Jumlah stock</label>
                        <input type="number" name="stok" id="stok" class="inputKaryawan">
                    </div>
                    <button type="submit" class="self-end w-fit px-7 py-3 text-white bg-Primary-blue rounded-full">Request</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<?php Flasher::flash(); ?>

<script>
    function cariBarang() {
        let input, filter, section, items, item, title, i, txtValue;
        input = document.getElementById('cari-barang');
        filter = input.value.toUpperCase();
        section = document.getElementById('section-barang');
        items = section.getElementsByClassName('div-barang');

        for (i = 0; i < items.length; i++) {
            item = items[i];
            title = item.querySelector('p.p-barang');
            txtValue = title.textContent || title.innerText;

            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        }
    }
</script>