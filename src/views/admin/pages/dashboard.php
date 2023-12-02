<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <!-- start card grid -->
    <div class="grid grid-cols-custom justify-center gap-2">
        <div class="cardDashboard">
            <div class="flex justify-between">
                <div class="flex items-center gap-3">
                    <img src="../../../../src/Assets/svg/moneys.svg" alt="money" class="p-3 bg-Primary-surface rounded-xl">
                    <p class="text-Neutral/100 text-base font-semibold">Total Pendapatan</p>
                </div>
                <div class="flex g-2 border border-Neutral/30 px-4 py-3 rounded-full">
                    <p>Hari Ini</p>
                    <img src="../../../src/Assets/svg/Frame.svg" alt="frame">
                </div>
            </div>
            <div class="mt-10">
                <p class="text-Neutral/100 text-[2.5rem] font-semibold">Rp 3.450.000</p>
                <p class="text-Neutral/50">Total pendapatan kotor hari ini</p>
            </div>
        </div>
        <div class="cardDashboard">
            <div class="flex justify-between">
                <div class="flex items-center gap-3">
                    <img src="../../../../src/Assets/svg/box-tick.svg" alt="box" class="p-3 bg-Primary-surface rounded-xl">
                    <p class="text-Neutral/100 text-base font-semibold">Terjual</p>
                </div>
                <div class="flex g-2 border border-Neutral/30 px-4 py-3 rounded-full">
                    <p>Hari Ini</p>
                    <img src="../../../src/Assets/svg/Frame.svg" alt="frame">
                </div>
            </div>
            <div class="mt-10">
                <p class="text-Neutral/100 text-[2.5rem] font-semibold">524</p>
                <p class="text-Neutral/50">Barang laku terjual ke pembeli</p>
            </div>
        </div>
        <div class="cardDashboard">
            <div class="flex justify-between">
                <div class="flex items-center gap-3">
                    <img src="../../../../src/Assets/svg/3d-cube-scan.svg" alt="money" class="p-3 bg-Primary-surface rounded-xl">
                    <p class="text-Neutral/100 text-base font-semibold">Total Stok</p>
                </div>
                <div class="flex g-2 border border-Neutral/30 px-4 py-3 rounded-full">
                    <p>Hari Ini</p>
                    <img src="../../../src/Assets/svg/Frame.svg" alt="frame">
                </div>
            </div>
            <div class="mt-10">
                <p class="text-Neutral/100 text-[2.5rem] font-semibold">412</p>
                <p class="text-Neutral/50">Jumlah stok barang tersedia di kantin</p>
            </div>
        </div>
    </div>
    <!-- end card -->
    <!-- start table -->
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] py-6 px-5 gap-2 h-[65%] laptop1:h-[61%] laptop2:h-[55%] laptop3:h-[62%]">
        <!-- header -->
        <div class="flex justify-between items-center">
            <div>
                <p class="text-Neutral/100 font-semibold text-xl">Aktivitas Produk</p>
                <p class="text-Neutral/50">List barang dengan jumlah penjualan terbanyak</p>
            </div>
            <div class="flex gap-3">
                <div class="flex gap-3 bg-Neutral/20 rounded-full items-center px-7 py-4">
                    <img src="../../../../src/Assets/svg/filter.svg" alt="filter">
                    <p>Filter</p>
                </div>
                <div class="flex justify-between px-7 py-4 border border-Neutral/30 rounded-full">
                    <input type="search" name="" id="" class="outline-none" placeholder="Cari barang">
                    <img src="../../../../src/Assets/svg/search-normal.svg" alt="search">
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- start table -->
        <div class="overflow-auto">
            <table class="table-auto w-full px-3">
                <thead class="bg-Neutral/20">
                    <tr>
                        <th class="tableHead">No</th>
                        <th class="tableHead">Nama Barang</th>
                        <th class="tableHead">Kategori</th>
                        <th class="tableHead">Tersedia</th>
                        <th class="tableHead">Harga (Rp)</th>
                        <th class="tableHead">Terjual</th>
                        <th class="tableHead">Total (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                    <tr>
                        <td class="tableContent">1</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">Makanan</td>
                        <td class="tableContent">218</td>
                        <td class="tableContent">4.000</td>
                        <td class="tableContent">50</td>
                        <td class="tableContent">200.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end table -->
</section>
