<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <div class="flex flex-col w-full gap-4">
            <div class="flex justify-between">
                <label for="cari-barang" class="flex justify-between px-7 py-3 border border-Neutral/30 rounded-full" aria-label="Search by nama barang" title="search By nama barang">
                    <input type="search" name="" id="cari-barang" onkeyup="cariBarangReq()" class="outline-none" placeholder="Cari barang">
                    <img src="Assets/svg/search-normal.svg" alt="search">
                </label>
                <div aria-label="Tombol untuk menambah barang" title="tambah barang baru">
                    <button class="py-3 px-5 rounded-full text-white bg-Primary-blue active:opacity-80" onclick="openModal('addReqBarang')">Tambahkan</button>
                </div>
            </div>
        </div>
        <!-- Start table -->
        <div class="overflow-auto">
            <table class="table-auto w-full px-3" id="tabel-request">
                <thead class="bg-Neutral/20 rounded-thead">
                    <tr>
                        <th class="tableHead">No</th>
                        <th class="tableHead">Nama Barang</th>
                        <th class="tableHead">Status</th>
                        <th class="tableHead">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data['request_user'] as $request) : ?>
                        <tr>
                            <td class="tableContent text-Neutral/60"><?= $no; ?></td>
                            <td class="tableContent"><?= $request['nama_barang']; ?></td>
                            <td class="tableContent">
                                <div>
                                    <?php
                                    if ($request['status'] === 'Sedang Diproses') : ?>
                                        <span class="statusProses">
                                            <img src="Assets/svg/kuning.svg" alt="">
                                            Menunggu
                                        </span>
                                    <?php elseif ($request['status'] === 'Ditolak') : ?>
                                        <span class="statusProses">
                                            <img src="Assets/svg/merah.svg" alt="">
                                            <?= $request['status']; ?>
                                        </span>
                                    <?php elseif ($request['status'] === 'Disetujui') : ?>
                                        <span class="statusProses">
                                            <img src="Assets/svg/hijau.svg" alt="">
                                            <?= $request['status']; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="tableContent flex justify-start gap-2">
                                <img onclick="openModal('editReqBarang<?= $request['id_request_barang']; ?>')" src="../public/Assets/svg/edit.svg" alt="edit" class="p-3 rounded-full border border-Neutral/40 edit <?= $request['status'] === 'Sedang Diproses' ? 'cursor-pointer' : 'notActiveReject'; ?>" aria-label="edit request" title="edit">
                                <img onclick="openModal('deleteReq<?= $request['id_request_barang']; ?>')" src="../public/Assets/svg/trash.svg" alt="delete" class="p-3 rounded-full border border-Neutral/40 delete <?= $request['status'] === 'Sedang Diproses' ? 'cursor-pointer' : 'notActiveReject'; ?>" aria-label="hapus request" title="hapus">
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
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
            <form id="formAdd" class="flex flex-col gap-8 justify-center items-stretch" action="<?= BASEURL; ?>/operatorrequestbarang/tambahDataRequest" method="POST" enctype="multipart/form-data">
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
                                <input type="text" name="date" id="date-input" class="inputKaryawan w-full" placeholder="Masukkan tanggal" onblur="blurDate('date-input')" onfocus="focusDate('date-input')">
                                <img src="../public/Assets/svg/calendar-2.svg" alt="" class="date">
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
    <?php foreach ($data['request'] as $value) : ?>
        <div id="editReqBarang<?= $value['id_request_barang']; ?>" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
            <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[50%] laptop1:w-[62%] laptop3:w-[68%]">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-Neutral/100">Edit Data Barang</h2>
                    <button id="closeModal" class="cursor-pointer" onclick="closeModal('editReqBarang<?= $value['id_request_barang']; ?>')">
                        <img src="../public/Assets/svg/close.svg" alt="close">
                    </button>
                </div>
                <form id="formEdit" class="flex flex-col gap-8 justify-center items-stretch" action="<?= BASEURL; ?>/operatorrequestbarang/ubahDataRequestById/<?= $value['id_request_barang']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="grid grid-cols-2 gap-8">
                        <div class="flex flex-col gap-3">
                            <label for="editNamaBarang" class="textInputKaryawan">Nama Barang</label>
                            <input type="text" name="nama" id="editNamaBarang" class="inputKaryawan" placeholder="Masukkan nama barang" value="<?= $value['nama']; ?>">
                        </div>
                        <div class="flex flex-col gap-3">
                            <label for="editStok" class="textInputKaryawan">Jumlah Stok</label>
                            <input type="number" name="stok" id="editStok" class="inputKaryawan" placeholder="Masukkan jumlah stok" value="<?= $value['stok']; ?>">
                        </div>
                        <div class="flex flex-col gap-3">
                            <label for="inputImg" class="textInputKaryawan">Upload gambar produk</label>
                            <div class="flex flex-col items-center border-2 border-dashed border-Primary-surface rounded-3xl gap-2 cursor-pointer">
                                <label for="inputImgEdit<?= $value['id_request_barang']; ?>" id="drop-area-edit<?= $value['id_request_barang']; ?>" class="flex flex-col justify-center items-center m-2 px-[20%] py-[2%] h-[28vh] laptop1:h-[32vh] laptop3:h-[30vh] laptop2:h-[36vh]">
                                    <div class="flex flex-col items-start w-fit">
                                        <div class="flex justify-end w-full -mb-2 cursor-pointer" onclick="cancelUpEdit<?= $value['id_request_barang']; ?>()">
                                            <img src="../public/Assets/svg/close.svg" alt="" class="-mr-[0.8rem]">
                                        </div>
                                        <img src="../../GayaBebas-Kantin-2F/public/Assets/img/barang/<?= $value['foto']; ?>" alt="" class="px-10 py-7 bg-Neutral/20 rounded-3xl">
                                    </div>
                                </label>
                                <input type="file" name="inputImgEdit" id="inputImgEdit<?= $value['id_request_barang']; ?>" class="inputImg" hidden>
                            </div>
                        </div>
                        <div class="flex flex-col gap-8">
                            <div class="flex flex-col gap-3">
                                <p class="textInputKaryawan">Kategori</p>
                                <div class="flex gap-3">
                                    <label for="editMakanan" class="inputRadio">
                                        <input type="radio" name="kategori" id="editMakanan" value="Makanan" <?= ($value['kategori'] == 'Makanan') ? 'checked' : ''; ?>>
                                        Makanan
                                    </label>
                                    <label for="editMinuman" class="inputRadio">
                                        <input type="radio" name="kategori" id="editMinuman" value="Minuman" <?= ($value['kategori'] == 'Minuman') ? 'checked' : ''; ?>>
                                        Minuman
                                    </label>
                                    <label for="editAtk" class="inputRadio">
                                        <input type="radio" name="kategori" id="editAtk" value="ATK" <?= ($value['kategori'] == 'ATK') ? 'checked' : ''; ?>>
                                        ATK
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-col gap-3">
                                <label for="date-input" class="textInputKaryawan">Tanggal Kadaluarsa</label>
                                <div class="flex gap-2 w-full bg-Neutral/20 pr-6 rounded-xl">
                                    <input type="text" name="date" id="date-input-edit" class="inputKaryawan w-full" placeholder="Masukkan tanggal" onblur="blurDate('date-input-edit')" onfocus="focusDate('date-input-edit')" value="<?= $value['tgl_expire']; ?>">
                                    <img src="../public/Assets/svg/calendar-2.svg" alt="" class="date">
                                </div>
                            </div>
                            <div class="flex flex-col gap-3">
                                <label for="harga" class="textInputKaryawan">Harga Jual</label>
                                <div class="flex gap-2 items-baseline px-6 py-4 bg-Neutral/20 rounded-xl w-full">
                                    <span class="text-Neutral/50">
                                        Rp |
                                    </span>
                                    <input type="number" name="harga" id="inputEditHarga" class="bg-Neutral/20 outline-none w-[80%]" placeholder="Masukkan harga" value="<?= $value['hrg_jual']; ?>">
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
        <div id="deleteReq<?= $value['id_request_barang']; ?>" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
            <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[20%] laptop1:w-[27%] laptop3:w-[30%]">
                <p class="text-Neutral/100 text-xl font-semibold text-center">Apakah anda yakin ingin menghapus data
                    ini?</p>
                <div class="flex justify-between">
                    <a href="<?= BASEURL; ?>/operatorrequestbarang/hapusDataRequestById/<?= $value['id_request_barang']; ?>">
                        <button class="px-[3.25rem] py-3 text-white bg-red-600 rounded-full">Hapus</button>
                    </a>
                    <button class="px-[3.25rem] py-3 text-Neutral/100 bg-[#EEE] rounded-full" onclick="closeModal('deleteReq<?= $value['id_request_barang']; ?>')">Batal</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end modal delete -->
</section>

<?php Flasher::flash(); ?>

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


    const focusDate = (id) => {
        const input = document.getElementById(id);
        const calendar = document.querySelector('.date');
        if (input || inputEdit) {
            input.type = "date";
            input.classList.add('w-full')
            calendar.classList.add('hidden');
        }
    };

    const blurDate = (id) => {
        const input = document.getElementById(id);
        const calendar = document.querySelector('.date');
        if ((input && input.value.trim() === '')) {
            input.type = "text";
            input.classList.add('w-full')
            calendar.classList.remove('hidden');
        }
    };
    // start end date

    // modal edit
    <?php foreach ($data['request'] as $value) : ?>
        let fileEdit<?= $value['id_request_barang']; ?>;

        const imgEdit<?= $value['id_request_barang']; ?> = document.getElementById(
            "inputImgEdit<?= $value['id_request_barang']; ?>")
        const dropAreaEdit<?= $value['id_request_barang']; ?> = document.getElementById(
            "drop-area-edit<?= $value['id_request_barang']; ?>")
        // const originalEdit = dropAreaEdit.innerHTML

        imgEdit<?= $value['id_request_barang']; ?>.addEventListener("change", function() {
            fileEdit<?= $value['id_request_barang']; ?> = this.files[0]
            showFileEdit<?= $value['id_request_barang']; ?>()
        })

        dropAreaEdit<?= $value['id_request_barang']; ?>.addEventListener("dragover", e => {
            e.preventDefault()
        })

        dropAreaEdit<?= $value['id_request_barang']; ?>.addEventListener("drop", e => {
            e.preventDefault()
            fileEdit<?= $value['id_request_barang']; ?> = e.dataTransfer.files[0]
            showFileEdit<?= $value['id_request_barang']; ?>()
        })

        const cancelUpEdit<?= $value['id_request_barang']; ?> = () => {
            dropAreaEdit<?= $value['id_request_barang']; ?>.innerHTML = null
            dropAreaEdit<?= $value['id_request_barang']; ?>.innerHTML = `<img src="../public/Assets/svg/upload.svg" alt="upload">
                                        <p class="text-Neutral/80 text-center text-sm"><span class="text-Neutral/100 font-semibold underline">Pilih gambar</span> untuk
                                            diunggah
                                            atau tarik dan
                                            lepas gambar disini</p>`
            dropAreaEdit<?= $value['id_request_barang']; ?>.parentNode.classList.add("bg-Neutral/20")
        }


        const showFileEdit<?= $value['id_request_barang']; ?> = () => {
            let fileType = fileEdit<?= $value['id_request_barang']; ?>.type;
            let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
            if (validExtensions.includes(fileType)) {
                let fileReader = new FileReader();
                fileReader.onload = () => {
                    let fileURL = fileReader.result;
                    dropAreaEdit<?= $value['id_request_barang']; ?>.parentNode.classList.remove("bg-Neutral/20")
                    dropAreaEdit<?= $value['id_request_barang']; ?>.innerHTML = null;
                    dropAreaEdit<?= $value['id_request_barang']; ?>.innerHTML = `<div class="flex flex-col items-start w-fit">
                                <div class="flex justify-end w-full -mb-2 cursor-pointer" onclick="cancelUpEdit<?= $value['id_request_barang']; ?>()">
                                    <img src="../public/Assets/svg/close.svg" alt="" class="-mr-[0.8rem]">
                                </div>
                                    <img src="${fileURL}" alt="" class="px-10 py-7 bg-Neutral/20 rounded-3xl">
                                </div>`;
                }
                fileReader.readAsDataURL(fileEdit<?= $value['id_request_barang']; ?>);
            } else {
                alert("This is not an Image File!");
            }
        }
    <?php endforeach; ?>

    function cariBarangReq() {
        let input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("cari-barang");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabel-request");
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