<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop3:h-[84vh] laptop2:h-[81vh]">
        <div class="flex justify-between">
            <div class="flex justify-between w-[22%] px-7 py-3 border border-Neutral/30 rounded-full">
                <input type="search" name="" id="cari-karyawan" onkeyup="cariKaryawan()" class="outline-none"
                    placeholder="Cari karyawan">
                <img src="../public/Assets/svg/search-normal.svg" alt="search">
            </div>
            <button id="addKaryawan" class="addButton" onclick="openModal('modal')">Tambahkan</button>
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
                    foreach ($data['karyawan'] as $karyawan) : ?>
                    <tr>
                        <td class="tableContent text-Neutral/60"><?= $no; ?></td>
                        <td class="tableContent"><?= $karyawan['nama']; ?></td>
                        <td class="tableContent"><?= $karyawan['no_telp']; ?></td>
                        <td class="tableContent"><?= tgl_indo(date($karyawan['tgl_bergabung'])); ?></td>
                        <td class="tableContent flex justify-start gap-2">
                            <img onclick="openModal('modalEdit<?= $karyawan['id_user']; ?>')"
                                src="../public/Assets/svg/edit.svg" alt="edit" class="iconKaryawan edit">
                            <img onclick="openModal('modalDelete<?= $karyawan['id_user']; ?>')"
                                src="../public/Assets/svg/trash.svg" alt="delete" class="iconKaryawan delete">
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
            <div
                class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[28%] laptop1:w-[36%] laptop3:w-[42%]">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-Neutral/100">Tambah Data Karyawan</h2>
                    <button id="closeModal" class="cursor-pointer" onclick="closeModal('modal')">
                        <img src="../public/Assets/svg/close.svg" alt="close">
                    </button>
                </div>
                <form class="flex flex-col gap-8" action="<?= BASEURL; ?>/datakaryawan/tambahDataKaryawan"
                    method="POST">
                    <div class="flex flex-col g-3">
                        <label for="nama" class="textInputKaryawan">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="inputKaryawan"
                            placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="noTelp" class="textInputKaryawan">Nomor Telepon</label>
                        <input type="number" name="noTelp" id="noTelp" class="inputKaryawan"
                            placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="username" class="textInputKaryawan">Username</label>
                        <input type="text" name="username" id="username" class="inputKaryawan"
                            placeholder="Masukkan username">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="password" class="textInputKaryawan">Password</label>
                        <input type="text" name="password" id="password" class="inputKaryawan"
                            placeholder="Masukkan password">
                    </div>
                    <button class="addButton">Tambah</button>
                </form>
            </div>
        </div>
        <!-- end modal add -->
        <!-- modal edit -->
        <?php foreach ($data['karyawan'] as $karyawan) : ?>
        <div id="modalEdit<?= $karyawan['id_user']; ?>"
            class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
            <div
                class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[28%] laptop1:w-[36%] laptop3:w-[42%]">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-Neutral/100">Edit Data Karyawan</h2>
                    <button id="closeEdit" class="cursor-pointer">
                        <img onclick="closeModal('modalEdit<?= $karyawan['id_user']; ?>')"
                            src="../public/Assets/svg/close.svg" alt="close">
                    </button>
                </div>
                <form class="flex flex-col gap-8"
                    action="<?= BASEURL; ?>/datakaryawan/ubahDataKaryawanById/<?= $karyawan['id_user']; ?>"
                    method="POST">
                    <div class="flex flex-col gap-3">
                        <label for="nama" class="textInputKaryawan">Nama Lengkap</label>
                        <input type="text" name="nama" id="editnama" class="inputKaryawan"
                            placeholder="Masukkan nama lengkap" value="<?= $karyawan['nama']; ?>">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="noTelp" class="textInputKaryawan">Nomor Telepon</label>
                        <input type="number" name="noTelp" id="editnoTelp" class="inputKaryawan"
                            placeholder="Masukkan nomor telepon" value="<?= $karyawan['no_telp']; ?>">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="username" class="textInputKaryawan">Username</label>
                        <input type="text" name="username" id="editusername" class="inputKaryawan"
                            placeholder="Masukkan username" value="<?= $karyawan['username']; ?>">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="password" class="textInputKaryawan">Password</label>
                        <input type="text" name="password" id="editpassword" class="inputKaryawan"
                            placeholder="Masukkan password" value="<?= $karyawan['password']; ?>">
                    </div>
                    <button class="addButton">Simpan</button>
                </form>
            </div>
        </div>
        <!-- end modal edit -->
        <!-- modal delete -->
        <div id="modalDelete<?= $karyawan['id_user']; ?>"
            class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
            <div
                class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[20%] laptop1:w-[27%] laptop3:w-[30%]">
                <p class="text-Neutral/100 text-xl font-semibold text-center">Apakah anda yakin ingin menghapus data
                    ini?</p>
                <div class="flex justify-between">
                    <a href="<?= BASEURL; ?>/datakaryawan/hapusDataKaryawanById/<?= $karyawan['id_user']; ?>">
                        <button class="px-[3.25rem] py-3 text-white bg-red-600 rounded-full">Hapus</button>
                    </a>
                    <button class="px-[3.25rem] py-3 text-Neutral/100 bg-[#EEE] rounded-full"
                        onclick="closeModal('modalDelete<?= $karyawan['id_user']; ?>')">Batal</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- end modal delete -->
    </div>
</section>
<script>
const openModal = (modalId) => {
    const modalElement = document.getElementById(modalId);
    modalElement.classList.remove('hidden');
    modalElement.classList.add('flex');
};

const closeModal = (modalId) => {
    const modalElement = document.getElementById(modalId);
    modalElement.classList.add('hidden');
    modalElement.classList.remove('flex');
};

// Generate modal functions for each user
// <?php foreach ($data['karyawan'] as $karyawan) : ?>
//     const modalEdit<?= $karyawan['id_user']; ?> = document.getElementById('modalEdit<?= $karyawan['id_user']; ?>');
//     const modalDelete<?= $karyawan['id_user']; ?> = document.getElementById('modalDelete<?= $karyawan['id_user']; ?>');

//     const openModalEdit<?= $karyawan['id_user']; ?> = () => openModal('modalEdit<?= $karyawan['id_user']; ?>');
//     const closeModalEdit<?= $karyawan['id_user']; ?> = () => closeModal('modalEdit<?= $karyawan['id_user']; ?>');

//     const openModalDelete<?= $karyawan['id_user']; ?> = () => openModal('modalDelete<?= $karyawan['id_user']; ?>');
//     const closeModalDelete<?= $karyawan['id_user']; ?> = () => closeModal('modalDelete<?= $karyawan['id_user']; ?>');
// <?php endforeach; ?>
// End modal data karyawan

function cariKaryawan() {
    let input, filter, table, tr, td, i, txtValue;
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
