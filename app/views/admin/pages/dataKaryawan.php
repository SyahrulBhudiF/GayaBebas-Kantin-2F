<?php
// Contoh data
$data_karyawan = $data['karyawan'];

// array(
//     array("No" => 1, "Nama Lengkap" => "Budi Setyaningrum", "No. Telepon" => "0812-7182-9102", "Tanggal Bergabung" => "26 Oktober 2023"),
//     array("No" => 2, "Nama Lengkap" => "Siti Rahmawati", "No. Telepon" => "0812-3456-7890", "Tanggal Bergabung" => "15 September 2023"),
//     array("No" => 3, "Nama Lengkap" => "John Doe", "No. Telepon" => "0812-1234-5678", "Tanggal Bergabung" => "10 Mei 2023"),
//     array("No" => 4, "Nama Lengkap" => "Jane Smith", "No. Telepon" => "0812-9876-5432", "Tanggal Bergabung" => "18 April 2023"),
// );
?>
<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <div class="flex justify-between">
            <div class="flex justify-between w-[22%] px-7 py-3 border border-Neutral/30 rounded-full">
                <input type="search" name="" id="cari-karyawan" onkeyup="cariKaryawan()" class="outline-none" placeholder="Cari karyawan">
                <img src="../public/Assets/svg/search-normal.svg" alt="search">
            </div>
            <button id="addKaryawan" class="addButton" onclick="openAddKaryawan()">Tambahkan</button>
        </div>
        <!-- Start table -->
        <div class="overflow-auto">
            <table class="table-auto w-full px-3" id="tabel-karyawan">
                <thead class="bg-Neutral/20 rounded-thead">
                    <tr>
                        <th class="tableHead">No</th>
                        <th class="tableHead">Nama Lengkap</th>
                        <th class="tableHead">No. Telepon</th>
                        <th class="tableHead">Tanggal Bergabung</th>
                        <th class="tableHead">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data_karyawan as $karyawan) : ?>
                        <tr>
                            <td class="tableContent text-Neutral/60"><?php echo $no; ?></td>
                            <td class="tableContent"><?php echo $karyawan['nama']; ?></td>
                            <td class="tableContent"><?php echo $karyawan['no_telp']; ?></td>
                            <td class="tableContent"><?php echo tgl_indo(date($karyawan['tgl_bergabung'])); ?></td>
                            <td class="tableContent flex justify-start gap-2">
                                <img onclick="openModalEdit<?php echo $karyawan['id_user']; ?>()" src="../public/Assets/svg/edit.svg" alt="edit" class="iconKaryawan edit">
                                <img onclick="openModalDelete<?php echo $karyawan['id_user']; ?>()" src="../public/Assets/svg/trash.svg" alt="delete" class="iconKaryawan delete">
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End Table -->
        <!-- modal add -->
        <div id="modal" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
            <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[28%] laptop1:w-[36%] laptop3:w-[42%]">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-Neutral/100">Tambah Data Karyawan</h2>
                    <button id="closeModal" class="cursor-pointer" onclick="closeModalBtn()">
                        <img src="../public/Assets/svg/close.svg" alt="close">
                    </button>
                </div>
                <form class="flex flex-col gap-8" action="<?= BASEURL; ?>/datakaryawan/tambahDataKaryawan" method="POST">
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
                        <input type="text" name="password" id="password" class="inputKaryawan" placeholder="Masukkan password">
                    </div>
                    <button class="addButton">Tambah</button>
                </form>
            </div>
        </div>
        <!-- end modal add -->
        <!-- modal edit -->
        <?php foreach ($data_karyawan as $karyawan) : ?>
            <div id="modalEdit<?php echo $karyawan['id_user']; ?>" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
                <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[28%] laptop1:w-[36%] laptop3:w-[42%]">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-Neutral/100">Edit Data Karyawan</h2>
                        <button id="closeEdit" class="cursor-pointer">
                            <img onclick="closeModalEdit<?php echo $karyawan['id_user']; ?>()" src="../public/Assets/svg/close.svg" alt="close">
                        </button>
                    </div>
                    <form class="flex flex-col gap-8" action="<?= BASEURL; ?>/datakaryawan/ubahDataKaryawanById/<?php echo $karyawan['id_user']; ?>" method="POST">
                        <div class="flex flex-col g-3">
                            <label for="nama" class="textInputKaryawan">Nama Lengkap</label>
                            <input type="text" name="nama" id="editnama" class="inputKaryawan" placeholder="Masukkan nama lengkap" value="<?php echo $karyawan['nama']; ?>">
                        </div>
                        <div class="flex flex-col gap-3">
                            <label for="noTelp" class="textInputKaryawan">Nomor Telepon</label>
                            <input type="number" name="noTelp" id="editnoTelp" class="inputKaryawan" placeholder="Masukkan nomor telepon" value="<?php echo $karyawan['no_telp']; ?>">
                        </div>
                        <div class="flex flex-col gap-3">
                            <label for="username" class="textInputKaryawan">Username</label>
                            <input type="text" name="username" id="editusername" class="inputKaryawan" placeholder="Masukkan username" value="<?php echo $karyawan['username']; ?>">
                        </div>
                        <div class="flex flex-col gap-3">
                            <label for="password" class="textInputKaryawan">Password</label>
                            <input type="text" name="password" id="editpassword" class="inputKaryawan" placeholder="Masukkan password" value="<?php echo $karyawan['password']; ?>">
                        </div>
                        <button class="addButton">Simpan</button>
                    </form>
                </div>
            </div>
            <!-- end modal edit -->
            <!-- modal delete -->
            <div id="modalDelete<?php echo $karyawan['id_user']; ?>" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
                <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[20%] laptop1:w-[27%] laptop3:w-[30%]">
                    <p class="text-Neutral/100 text-xl font-semibold text-center">Apakah anda yakin ingin menghapus data
                        ini?</p>
                    <div class="flex justify-between">
                        <a href="<?= BASEURL; ?>/datakaryawan/hapusDataKaryawanById/<?php echo $karyawan['id_user']; ?>">
                            <button class="px-[3.25rem] py-3 text-white bg-red-600 rounded-full">Hapus</button>
                        </a>
                        <button class="px-[3.25rem] py-3 text-Neutral/100 bg-[#EEE] rounded-full" onclick="closeModalDelete<?php echo $karyawan['id_user']; ?>()">Batal</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- end modal delete -->
    </div>
    <script>
        // modal data karyawan
        const modal = document.getElementById('modal');

        const openAddKaryawan = () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        const closeModalBtn = () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        };

        <?php foreach ($data_karyawan as $karyawan) : ?>
            const modalEdit<?php echo $karyawan['id_user']; ?> = document.getElementById('modalEdit<?php echo $karyawan['id_user']; ?>');

            const openModalEdit<?php echo $karyawan['id_user']; ?> = () => {
                modalEdit<?php echo $karyawan['id_user']; ?>.classList.remove('hidden');
                modalEdit<?php echo $karyawan['id_user']; ?>.classList.add('flex');
            };

            const closeModalEdit<?php echo $karyawan['id_user']; ?> = () => {
                modalEdit<?php echo $karyawan['id_user']; ?>.classList.add('hidden');
                modalEdit<?php echo $karyawan['id_user']; ?>.classList.remove('flex');
            };


            const modalDelete<?php echo $karyawan['id_user']; ?> = document.getElementById("modalDelete<?php echo $karyawan['id_user']; ?>");

            const openModalDelete<?php echo $karyawan['id_user']; ?> = () => {
                modalDelete<?php echo $karyawan['id_user']; ?>.classList.remove('hidden');
                modalDelete<?php echo $karyawan['id_user']; ?>.classList.add('flex');
            };

            const closeModalDelete<?php echo $karyawan['id_user']; ?> = () => {
                modalDelete<?php echo $karyawan['id_user']; ?>.classList.add('hidden');
                modalDelete<?php echo $karyawan['id_user']; ?>.classList.remove('flex');
            };
        <?php endforeach; ?>
        // end modal dataKaryawan
    </script>
</section>

<script>
    function cariKaryawan() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("cari-karyawan");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabel-karyawan");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
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