<section class="flex flex-col animateGlobal p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <div class="flex justify-between">
            <div class="flex justify-between w-[22%] px-7 py-3 border border-Neutral/30 rounded-full">
                <input type="search" name="" id="" class="outline-none" placeholder="Cari karyawan">
                <img src="../public/Assets/svg/search-normal.svg" alt="search">
            </div>
            <button id="addKaryawan" class="addButton">Tambahkan</button>
        </div>
        <!-- Start table -->
        <div class="overflow-auto">
            <table class="table-auto w-full px-3">
                <thead class="bg-Neutral/20 rounded-thead">
                    <tr>
                        <th class="tableHead">No</th>
                        <th class="tableHead">Nama Lengkap</th>
                        <th class="tableHead">No. Telepon</th>
                        <th class="tableHead">TanggalBergabung</th>
                        <th class="tableHead">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tableContent text-Neutral/60">01</td>
                        <td class="tableContent">Budi Setyaningrum</td>
                        <td class="tableContent">0812-7182-9102</td>
                        <td class="tableContent">26 Oktober 2023</td>
                        <td class="tableContent flex justify-start gap-2">
                            <img src="../public/Assets/svg/edit.svg" alt="edit" class="iconKaryawan edit">
                            <img src="../public/Assets/svg/trash.svg" alt="delete" class="iconKaryawan delete">
                        </td>
                    </tr>
                    <tr>
                        <td class="tableContent text-Neutral/60">02</td>
                        <td class="tableContent">Siti Rahmawati</td>
                        <td class="tableContent">0812-3456-7890</td>
                        <td class="tableContent">15 September 2023</td>
                        <td class="tableContent flex justify-start gap-2">
                            <img src="../public/Assets/svg/edit.svg" alt="edit" class="iconKaryawan edit">
                            <img src="../public/Assets/svg/trash.svg" alt="delete" class="iconKaryawan delete">
                        </td>
                    </tr>
                    <tr>
                        <td class="tableContent text-Neutral/60">03</td>
                        <td class="tableContent">John Doe</td>
                        <td class="tableContent">0812-1234-5678</td>
                        <td class="tableContent">10 Mei 2023</td>
                        <td class="tableContent flex justify-start gap-2">
                            <img src="../public/Assets/svg/edit.svg" alt="edit" class="iconKaryawan edit">
                            <img src="../public/Assets/svg/trash.svg" alt="delete" class="iconKaryawan delete">
                    </tr>
                    <tr>
                        <td class="tableContent text-Neutral/60">04</td>
                        <td class="tableContent">Jane Smith</td>
                        <td class="tableContent">0812-9876-5432</td>
                        <td class="tableContent">18 April 2023</td>
                        <td class="tableContent flex justify-start gap-2">
                            <img src="../public/Assets/svg/edit.svg" alt="edit" class="iconKaryawan edit">
                            <img src="../public/Assets/svg/trash.svg" alt="delete" class="iconKaryawan delete">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- End Table -->
        <!-- modal add -->
        <div id="modal" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
            <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[28%] laptop1:w-[36%] laptop3:w-[42%]">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-Neutral/100">Tambah Data Karyawan</h2>
                    <button id="closeModal" class="cursor-pointer">
                        <img src="../public/Assets/svg/close.svg" alt="close">
                    </button>
                </div>
                <form class="flex flex-col gap-8">
                    <div class="flex flex-col g-3">
                        <label for="nama" class="textInputKaryawan">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="inputKaryawan" placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="noTelp" class="textInputKaryawan">Nomor Telepon</label>
                        <input type="number" name="noTelp" id="noTelp" class="inputKaryawan" placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="username" class="textInputKaryawan">Username</label>
                        <input type="text" name="username" id="username" class="inputKaryawan" placeholder="Masukkan username">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="password" class="textInputKaryawan">Password</label>
                        <input type="password" name="password" id="password" class="inputKaryawan" placeholder="Masukkan password">
                    </div>
                    <button class="addButton">Tambah</button>
                </form>
            </div>
        </div>
        <!-- end modal add -->
        <!-- modal edit -->
        <div id="modalEdit" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
            <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[28%] laptop1:w-[36%] laptop3:w-[42%]">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-Neutral/100">Edit Data Karyawan</h2>
                    <button id="closeEdit" class="cursor-pointer">
                        <img src="../public/Assets/svg/close.svg" alt="close">
                    </button>
                </div>
                <form class="flex flex-col gap-8">
                    <div class="flex flex-col g-3">
                        <label for="nama" class="textInputKaryawan">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="inputKaryawan" placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="noTelp" class="textInputKaryawan">Nomor Telepon</label>
                        <input type="number" name="noTelp" id="noTelp" class="inputKaryawan" placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="username" class="textInputKaryawan">Username</label>
                        <input type="text" name="username" id="username" class="inputKaryawan" placeholder="Masukkan username">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="password" class="textInputKaryawan">Password</label>
                        <input type="password" name="password" id="password" class="inputKaryawan" placeholder="Masukkan password">
                    </div>
                    <button class="addButton">Simpan</button>
                </form>
            </div>
        </div>
        <!-- end modal edit -->
        <!-- modal delete -->
        <div id="modalDelete" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
            <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[20%] laptop1:w-[27%] laptop3:w-[30%]">
                <p class="text-Neutral/100 text-xl font-semibold text-center">Apakah anda yakin ingin menghapus data
                    ini?</p>
                <div class="flex justify-between">
                    <button class="px-[3.25rem] py-3 text-white bg-red-600 rounded-full close">Hapus</button>
                    <button class="px-[3.25rem] py-3 text-Neutral/100 bg-[#EEE] rounded-full close">Batal</button>
                </div>
            </div>
        </div>
        <!-- end modal delete -->
    </div>
</section>
