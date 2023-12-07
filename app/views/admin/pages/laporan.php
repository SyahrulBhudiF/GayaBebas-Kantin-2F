<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <div class="flex justify-between w-full">
            <div class="flex justify-between px-7 py-3 border border-Neutral/30 rounded-full">
                <input type="search" name="" id="" class="outline-none" placeholder="Cari karyawan">
                <img src="../public/Assets/svg/search-normal.svg" alt="search">
            </div>
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
                        <th class="tableHead">Nama Operator</th>
                        <th class="tableHead">Nama Barang</th>
                        <th class="tableHead">Jumlah Barang</th>
                        <th class="tableHead">Total Penjualan</th>
                        <th class="tableHead">Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tableContent text-Neutral/60">01</td>
                        <td class="tableContent">Budi Setyaningrum</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">123</td>
                        <td class="tableContent">Rp 1.500.000</td>
                        <td class="tableContent">26 Oktober 2023</td>
                    </tr>
                    <tr>
                        <td class="tableContent text-Neutral/60">02</td>
                        <td class="tableContent">Budi Setyaningrum</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">123</td>
                        <td class="tableContent">Rp 1.500.000</td>
                        <td class="tableContent">26 Oktober 2023</td>
                    </tr>
                    <tr>
                        <td class="tableContent text-Neutral/60">03</td>
                        <td class="tableContent">Budi Setyaningrum</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">123</td>
                        <td class="tableContent">Rp 1.500.000</td>
                        <td class="tableContent">26 Oktober 2023</td>
                    </tr>
                    <tr>
                        <td class="tableContent text-Neutral/60">04</td>
                        <td class="tableContent">Budi Setyaningrum</td>
                        <td class="tableContent">Citato</td>
                        <td class="tableContent">123</td>
                        <td class="tableContent">Rp 1.500.000</td>
                        <td class="tableContent">26 Oktober 2023</td>
                    </tr>
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
