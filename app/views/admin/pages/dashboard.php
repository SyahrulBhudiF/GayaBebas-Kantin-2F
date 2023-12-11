<?php
foreach ($data['total_penjualan'] as $tp) :
    $total_penjualan = "Rp " . number_format($tp, 0, ',', '.');
endforeach;

foreach ($data['barang_terjual'] as $bt) :
    $barang_terjual = $bt;
endforeach;

foreach ($data['total_stok'] as $ts) :
    $total_stok = $ts;
endforeach;

$data_dashboard = array(
    array("Icon" => "Assets/svg/moneys.svg", "Title" => "Total Pendapatan", "Value" => $total_penjualan, "Subtitle" => "Total pendapatan kotor"),
    array("Icon" => "Assets/svg/box-tick.svg", "Title" => "Terjual", "Value" => $barang_terjual, "Subtitle" => "Barang laku terjual ke pembeli"),
    array("Icon" => "Assets/svg/3d-cube-scan.svg", "Title" => "Total Stok", "Value" => $total_stok, "Subtitle" => "Jumlah stok barang tersedia di kantin"),
);

$data_produk = $data['barang'];
?>
<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <!-- start card grid -->
    <div class="grid grid-cols-custom justify-center gap-2">
        <?php foreach ($data_dashboard as $card) : ?>
            <div class="cardDashboard">
                <div class="flex justify-between">
                    <div class="flex items-center gap-3">
                        <img src="<?= $card['Icon']; ?>" alt="money" class="p-3 bg-Primary-surface rounded-xl">
                        <p class="text-Neutral/100 text-base font-semibold"><?= $card['Title']; ?></p>
                    </div>
                </div>
                <div class="mt-10">
                    <p class="text-Neutral/100 text-[2.5rem] font-semibold"><?= $card['Value']; ?></p>
                    <p class="text-Neutral/50"><?= $card['Subtitle']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- end card -->
    <!-- start table -->
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] py-6 px-5 gap-2 h-[65%] laptop1:h-[61%] laptop2:h-[55%] laptop3:h-[62%] laptop4:h-[53%]">
        <!-- header -->
        <div class="flex justify-between items-center">
            <div>
                <p class="text-Neutral/100 font-semibold text-xl">Produk dengan stok paling sedikit</p>
                <p class="text-Neutral/50">List barang dengan jumlah stok paling sedikit</p>
            </div>
            <div class="flex justify-between px-7 py-3 border border-Neutral/30 rounded-full">
                <input type="search" name="" id="cari-barang" onkeyup="cariBarang()" class="outline-none" placeholder="Cari barang">
                <img src="../public/Assets/svg/search-normal.svg" alt="search">
            </div>
        </div>
        <!-- end header -->
        <!-- start list item -->
        <div class="overflow-auto">
            <section class="grid grid-cols-4 gap-4 p-2 overflow-auto" id="section-barang">
                <!-- item -->
                <?php foreach ($data_produk as $produk) : ?>
                    <div class="flex flex-col border border-Neutral/30 rounded-3xl p-[0.2rem] div-barang">
                        <div class="flex flex-col items-center bg-Neutral/20 p-4 rounded-[1.25rem]">
                            <span class="bg-Neutral/10 px-5 py-2 rounded-full w-fit self-start"><?= $produk['stok']; ?>
                                Tersedia</span>
                            <img src="<?= /* $produk['Image']; */ "Assets/img/jajan.png"; ?>" alt="jajan" class="w-[50%]">
                        </div>
                        <div class="flex flex-col gap-3 p-4">
                            <p class="text-Neutral/100 font-semibold text-base w-full overflow-hidden whitespace-nowrap text-ellipsis p-barang">
                                <?= $produk['nama']; ?>
                            </p>
                            <p class="text-Neutral/70 text-sm"><?= $produk['kategori']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- item end -->
            </section>
        </div>
    </div>
    <!-- end list item -->
</section>

<script>
    function cariBarang() {
        var input, filter, section, items, item, title, i, txtValue;
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
