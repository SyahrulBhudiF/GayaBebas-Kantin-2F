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
            <div class="flex justify-between">
                <div class="flex justify-between px-7 py-3 border border-Neutral/30 rounded-full">
                    <input type="search" name="" id="" class="outline-none" placeholder="Cari barang">
                    <img src="Assets/svg/search-normal.svg" alt="search">
                </div>
                <div>
                    <button class="py-3 px-5 rounded-full text-white bg-Primary-blue active:opacity-80" onclick="openModal('addReqBarang')">Tambahkan</button>
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
                                <img onclick="openModal('editReqBarang')" src="../public/Assets/svg/edit.svg" alt="edit" class="iconKaryawan edit">
                                <img onclick="openModal('deleteReq')" src="../public/Assets/svg/trash.svg" alt="delete" class="iconKaryawan delete">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End Table -->
    </div>
    <!-- add Modal -->
    <div id="addReqBarang" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
        <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[50%] laptop1:w-[62%] laptop3:w-[68%]">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-Neutral/100">Tambah Data Barang</h2>
                <button id="closeModal" class="cursor-pointer" onclick="closeModal('addReqBarang')">
                    <img src="../public/Assets/svg/close.svg" alt="close">
                </button>
            </div>
            <form id="formAdd" class="flex flex-col gap-8 justify-center items-stretch" action="<?= BASEURL; ?>/databarang/tambahDataBarang" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-8">
                    <div class="flex flex-col gap-3">
                        <label for="namaBarang" class="textInputKaryawan">Nama Barang</label>
                        <input type="text" name="nama" id="namaBarang" class="inputKaryawan" placeholder="Masukkan nama barang">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="stok" class="textInputKaryawan">Jumlah Stok</label>
                        <input type="number" name="stok" id="stok" class="inputKaryawan" placeholder="Masukkan jumlah stok">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="inputImg" class="textInputKaryawan">Upload gambar produk</label>
                        <div class="flex flex-col items-center bg-Neutral/20 border-2 border-dashed border-Primary-surface rounded-3xl gap-2 cursor-pointer">
                            <label for="inputImg" id="drop-area" class="flex flex-col justify-center items-center m-2 px-[20%] py-[2%] h-[28vh] laptop1:h-[32vh] laptop3:h-[30vh] laptop2:h-[36vh]">
                                <img src="../public/Assets/svg/upload.svg" alt="upload">
                                <p class="text-Neutral/80 text-center text-sm"><span class="text-Neutral/100 font-semibold underline">Pilih gambar</span> untuk
                                    diunggah
                                    atau tarik dan
                                    lepas gambar disini</p>
                            </label>
                            <input type="file" name="inputImg" id="inputImg" class="inputImg" hidden>
                        </div>
                    </div>
                    <div class="flex flex-col gap-8">
                        <div class="flex flex-col gap-3">
                            <p class="textInputKaryawan">Kategori</p>
                            <div class="flex gap-3">
                                <label for="makanan" class="inputRadio">
                                    <input type="radio" name="kategori" id="makanan" value="Makanan">
                                    Makanan
                                </label>
                                <label for="minuman" class="inputRadio">
                                    <input type="radio" name="kategori" id="minuman" value="Minuman">
                                    Minuman
                                </label>
                                <label for="atk" class="inputRadio">
                                    <input type="radio" name="kategori" id="atk" value="ATK">
                                    ATK
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <label for="date-input" class="textInputKaryawan">Tanggal Kadaluarsa</label>
                            <div class="flex gap-2 w-full bg-Neutral/20 pr-6 rounded-xl">
                                <input type="text" name="date" id="date-input" class="inputKaryawan w-full" placeholder="Masukkan tanggal" onblur="blurDate()" onfocus="focusDate()">
                                <img src="../public/Assets/svg/calendar-2.svg" alt="">
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <label for="harga" class="textInputKaryawan">Harga Jual</label>
                            <div class="flex gap-2 items-baseline px-6 py-4 bg-Neutral/20 rounded-xl w-full">
                                <span class="text-Neutral/50">
                                    Rp |
                                </span>
                                <input type="number" name="harga" id="inputEditHarga" class="bg-Neutral/20 outline-none w-[80%]" placeholder="Masukkan harga">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="addButton self-end">Tambah</button>
            </form>
        </div>
    </div>
    <!-- end modal add -->
    <!-- start modal edit -->
    <div id="editReqBarang" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
        <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[50%] laptop1:w-[62%] laptop3:w-[68%]">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-Neutral/100">Edit Data Barang</h2>
                <button id="closeModal" class="cursor-pointer" onclick="closeModal('editReqBarang')">
                    <img src="../public/Assets/svg/close.svg" alt="close">
                </button>
            </div>
            <form id="formEdit" class="flex flex-col gap-8 justify-center items-stretch" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-8">
                    <div class="flex flex-col gap-3">
                        <label for="editNamaBarang" class="textInputKaryawan">Nama Barang</label>
                        <input type="text" name="nama" id="editNamaBarang" class="inputKaryawan" placeholder="Masukkan nama barang">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="editStok" class="textInputKaryawan">Jumlah Stok</label>
                        <input type="number" name="stok" id="editStok" class="inputKaryawan" placeholder="Masukkan jumlah stok">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="inputImg" class="textInputKaryawan">Upload gambar produk</label>
                        <div class="flex flex-col items-center bg-Neutral/20 border-2 border-dashed border-Primary-surface rounded-3xl gap-2 cursor-pointer">
                            <label for="inputImgEdit" id="drop-area-edit" class="flex flex-col justify-center items-center m-2 px-[20%] py-[2%] h-[28vh] laptop1:h-[32vh] laptop3:h-[30vh] laptop2:h-[36vh]">
                                <img src="../public/Assets/svg/upload.svg" alt="upload">
                                <p class="text-Neutral/80 text-center text-sm"><span class="text-Neutral/100 font-semibold underline">Pilih gambar</span> untuk
                                    diunggah
                                    atau tarik dan
                                    lepas gambar disini</p>
                            </label>
                            <input type="file" name="inputImgEdit" id="inputImgEdit" class="inputImg" hidden>
                        </div>
                    </div>
                    <div class="flex flex-col gap-8">
                        <div class="flex flex-col gap-3">
                            <p class="textInputKaryawan">Kategori</p>
                            <div class="flex gap-3">
                                <label for="editMakanan" class="inputRadio">
                                    <input type="radio" name="kategori" id="editMakanan">
                                    Makanan
                                </label>
                                <label for="editMinuman" class="inputRadio">
                                    <input type="radio" name="kategori" id="editMinuman">
                                    Minuman
                                </label>
                                <label for="editAtk" class="inputRadio">
                                    <input type="radio" name="kategori" id="editAtk">
                                    ATK
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <label for="date-input" class="textInputKaryawan">Tanggal Kadaluarsa</label>
                            <div class="flex gap-2 w-full bg-Neutral/20 pr-6 rounded-xl">
                                <input type="text" name="date" id="date-input-edit" class="inputKaryawan w-full" placeholder="Masukkan tanggal" onblur="blurDate()" onfocus="focusDate()">
                                <img src="../public/Assets/svg/calendar-2.svg" alt="">
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <label for="harga" class="textInputKaryawan">Harga Jual</label>
                            <div class="flex gap-2 items-baseline px-6 py-4 bg-Neutral/20 rounded-xl w-full">
                                <span class="text-Neutral/50">
                                    Rp |
                                </span>
                                <input type="number" name="harga" id="inputEditHarga" class="bg-Neutral/20 outline-none w-[80%]" placeholder="Masukkan harga">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="addButton self-end">Simpan</button>
            </form>
        </div>
    </div>
    <!-- end modal edit -->
    <!-- start modal delete -->
    <div id="deleteReq" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
        <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[20%] laptop1:w-[27%] laptop3:w-[30%]">
            <p class="text-Neutral/100 text-xl font-semibold text-center">Apakah anda yakin ingin menghapus data
                ini?</p>
            <div class="flex justify-between">
                <a href="">
                    <button class="px-[3.25rem] py-3 text-white bg-red-600 rounded-full">Hapus</button>
                </a>
                <button class="px-[3.25rem] py-3 text-Neutral/100 bg-[#EEE] rounded-full" onclick="closeModal('deleteReq')">Batal</button>
            </div>
        </div>
    </div>
    <!-- end modal delete -->
</section>
<script>
    // upload
    const inputFile = document.getElementById("inputImg")
    const dropArea = document.getElementById("drop-area")
    const original = dropArea.innerHTML

    let file;


    inputFile.addEventListener("change", function() {
        file = this.files[0]
        showFile()
    })

    dropArea.addEventListener("dragover", e => {
        e.preventDefault()
    })

    dropArea.addEventListener("drop", e => {
        e.preventDefault()
        file = e.dataTransfer.files[0]
        showFile()
    })

    const cancelUp = () => {
        dropArea.innerHTML = null
        dropArea.innerHTML = original
        dropArea.parentNode.classList.add("bg-Neutral/20")
    }


    const showFile = () => {
        let fileType = file.type;
        let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
        if (validExtensions.includes(fileType)) {
            let fileReader = new FileReader();
            fileReader.onload = () => {
                let fileURL = fileReader.result;
                dropArea.parentNode.classList.remove("bg-Neutral/20")
                dropArea.innerHTML = null;
                dropArea.innerHTML = `<div class="flex flex-col items-start w-fit">
                                <div class="flex justify-end w-full -mb-2 cursor-pointer" onclick="cancelUp()">
                                    <img src="../public/Assets/svg/close.svg" alt="" class="-mr-[0.8rem]">
                                </div>
                                    <img src="${fileURL}" alt="" class="px-10 py-7 bg-Neutral/20 rounded-3xl">
                                </div>`;
            }
            fileReader.readAsDataURL(file);
        } else {
            alert("This is not an Image File!");
        }
    }

    // end upload

    // start date

    const input = document.getElementById('date-input');
    const inputEdit = document.getElementById('date-input-edit');

    const focusDate = () => {
        if (input || inputEdit) {
            input.type = "date";
            inputEdit.type = "date"
        }
    };

    const blurDate = () => {
        if ((input && input.value.trim() === '') || (inputEdit && inputEdit.value.trim() === '')) {
            input.type = "text";
            inputEdit.type = "text";
        }
    };
    // start end date

    // modal edit
    let fileEdit;

    const imgEdit = document.getElementById("inputImgEdit")
    const dropAreaEdit = document.getElementById("drop-area-edit")
    const originalEdit = dropAreaEdit.innerHTML

    imgEdit.addEventListener("change", function() {
        fileEdit = this.files[0]
        showFileEdit()
    })

    dropAreaEdit.addEventListener("dragover", e => {
        e.preventDefault()
    })

    dropAreaEdit.addEventListener("drop", e => {
        e.preventDefault()
        fileEdit = e.dataTransfer.files[0]
        showFileEdit()
    })

    const cancelUpEdit = () => {
        dropAreaEdit.innerHTML = null
        dropAreaEdit.innerHTML = original
        dropAreaEdit.parentNode.classList.add("bg-Neutral/20")
    }


    const showFileEdit = () => {
        let fileType = fileEdit.type;
        let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
        if (validExtensions.includes(fileType)) {
            let fileReader = new FileReader();
            fileReader.onload = () => {
                let fileURL = fileReader.result;
                dropAreaEdit.parentNode.classList.remove("bg-Neutral/20")
                dropAreaEdit.innerHTML = null;
                dropAreaEdit.innerHTML = `<div class="flex flex-col items-start w-fit">
                                <div class="flex justify-end w-full -mb-2 cursor-pointer" onclick="cancelUpEdit()">
                                    <img src="../public/Assets/svg/close.svg" alt="" class="-mr-[0.8rem]">
                                </div>
                                    <img src="${fileURL}" alt="" class="px-10 py-7 bg-Neutral/20 rounded-3xl">
                                </div>`;
            }
            fileReader.readAsDataURL(fileEdit);
        } else {
            alert("This is not an Image File!");
        }
    }
</script>
