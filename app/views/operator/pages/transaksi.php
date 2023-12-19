<section class="flex fadeIn p-4 gap-2 w-full h-screen">
    <!-- Col 1 -->
    <div class="flex flex-col w-[80%] laptop1:w-[75%] laptop3:h-[84vh] laptop2:h-[81vh] bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%]">
        <label for="cari-barang" class="flex justify-between w-fit px-7 py-3 border border-Neutral/30 rounded-full" aria-label="Search by nama barang" title="search By nama barang">
            <input type="search" name="" id="cari-barang" onkeyup="cariBarang()" class="outline-none" placeholder="Cari barang">
            <img src="../public/Assets/svg/search-normal.svg" alt="search">
        </label>
        <!-- start grid -->
        <section class="grid grid-cols-4 laptop1:grid-cols-3 laptop3:grid-cols-3 gap-4 p-2 overflow-auto" id="section-barang">
            <?php foreach ($data['barang'] as $barang) : ?>
                <div class="flex flex-col border border-Neutral/30 rounded-3xl p-[0.2rem] div-barang">
                    <div class="flex flex-col items-center bg-Neutral/20 p-4 rounded-[1.25rem]">
                        <span class="bg-Neutral/10 px-5 py-2 rounded-full w-fit self-start laptop3:text-sm"><?= $barang['stok']; ?>
                            Tersedia</span>
                        <img src="../public/Assets/img/jajan.png" alt="jajan">
                    </div>
                    <div class="flex flex-col gap-3 p-4">
                        <p class="text-Neutral/100 font-semibold text-base laptop3:text-sm w-full overflow-hidden whitespace-nowrap text-ellipsis p-barang">
                            <?= $barang['nama']; ?>
                        </p>
                        <p class="text-Primary-blue text-xl font-semibold">Rp
                            <?= number_format($barang['hrg_jual'], 0, ',', '.'); ?><span class="text-Neutral/50 text-xs">/pcs</span></p>
                        <div class="flex items-center justify-start gap-1 text-Neutral/70 font-medium text-sm laptop3:text-xs">
                            <p><?= $barang['kategori']; ?></p>
                            <img src="../public/Assets/svg/Ellipse 5.svg" alt="">
                            <p>Exp
                                <?= ($barang['tgl_expire'] != NULL) ? date('d/m/Y', strtotime($barang['tgl_expire'])) : ''; ?>
                            </p>
                        </div>
                    </div>
                    <div class="flex justify-center w-full p-4">
                        <button aria-label="tambah barang ke keranjang" title="tambah barang" id="cart<?= $barang['id_barang']; ?>" class="bg-Neutral/20 p-3 text-Primary-blue rounded-full w-full active:brightness-90 transition-all duration-300 ease-in-out" onclick="addProductToCart(this,',../public/Assets/img/jajan.png','<?= $barang['id_barang']; ?>','<?= $barang['nama']; ?>','<?= $barang['hrg_jual']; ?>')">
                            Tambah
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>

        </section>
    </div>

    <!-- Col 2 -->
    <div class=" flex flex-col justify-between w-[20%] laptop1:w-[25%] laptop3:w-[30%] bg-Neutral/10 rounded-[1.25rem] p-6 h-[87%] laptop3:h-[84vh] laptop2:h-[81vh]">
        <div class="flex flex-col gap-6">
            <div class="flex justify-between items-center">
                <p class="text-xl font-semibold text-Neutral/100">Keranjang</p>
                <p aria-label="hapus keranjang" title="hapus semua item" class="text-[#FF0000] font-medium text-xs cursor-pointer" onclick="deleteAll()">Hapus semua</p>
            </div>
            <section id="keranjang" class="flex flex-col w-full gap-5 items-center justify-start overflow-auto h-[55vh] laptop2:h-[45vh]">
            </section>
        </div>

        <div class="flex flex-col p-3 bg-Neutral/20 justify-between w-full rounded-2xl">
            <p class="font-semibold text-Neutral/100 text-base border-b border-b-Neutral/40 pb-4">
                Rincian Pembayaran</p>
            <div class="flex justify-between items-center mt-2">
                <p class="text-sm font-semibold text-Neutral/100">Total</p>
                <p class="text-sm font-semibold text-Neutral/100 price">
                    Rp 0,00</p>
            </div>
            <button aria-label="konfirmasi pembayaran" title="konfirmasi" class="rounded-full bg-Primary-blue p-3 text-white mt-4 active:opacity-80" onclick="openPembayaran()">Konfirmasi</button>
        </div>
    </div>
    <!-- modal pembayaran -->
    <div id="modalPembayaran" class="fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-60 hidden">
        <div class="flex flex-col modal bg-white p-8 rounded-[2rem] shadow-lg gap-8 w-[28%] laptop1:w-[36%] laptop3:w-[42%]">
            <div class="flex justify-between items-center">
                <p class="text-xl text-Neutral/100 font-semibold">Pembayaran</p>
                <button id="closePembayaran" class="cursor-pointer" onclick="closePembayaran()">
                    <img src="../public/Assets/svg/close.svg" alt="close">
                </button>
            </div>
            <div class="flex flex-col gap-3">
                <label for="money" class="textInputKaryawan">Nominal uang masuk</label>
                <input type="number" name="money" id="money" class="inputKaryawan" placeholder="Masukkan nominal" oninput="MoneyInput()">
            </div>
            <div class="flex flex-col gap-4">
                <p class="text-base font-semibold text-Neutral/100">Rincian Pembayaran</p>
                <div class="flex justify-between items-center">
                    <p class="font-medium text-sm text-Neutral/100">Total</p>
                    <p class="font-medium text-sm text-Neutral/100" id="totalAmount">Rp 0,00</p>
                </div>
                <div class="flex justify-between items-center border-b border-b-Neutral/40 pb-4">
                    <p class="font-medium text-sm text-Neutral/100">Uang Masuk</p>
                    <p class="font-medium text-sm text-Neutral/100" id="moneyInput">Rp 0,00</p>
                </div>
                <div class="flex justify-between items-center">
                    <p class="font-medium text-sm text-Neutral/100">Kembalian</p>
                    <p class="font-medium text-sm text-Neutral/100" id="changeAmount">Rp 0,00</p>
                </div>
            </div>
            <button class="rounded-full bg-Primary-blue p-3 text-white mt-4 active:opacity-80" onclick="sendData()">Simpan</button>
        </div>
    </div>
    <!-- end modal pembayaran -->
</section>
<script>
    let total = 0;

    function updatePembayaranDetails() {
        const totalElement = document.getElementById('totalAmount');
        const moneyInputElement = document.getElementById('moneyInput');
        const changeAmountElement = document.getElementById('changeAmount');

        // Dapatkan nilai uang masuk dari input
        const moneyInputAmount = document.getElementById('money').value;

        const changeAmount = moneyInputAmount - total;

        const nonNegativeChangeAmount = Math.max(0, changeAmount);

        // Perbarui elemen dengan nilai yang dihitung
        totalElement.textContent = `${numberFormat(total)}`;
        moneyInputElement.textContent = `${numberFormat(moneyInputAmount)}`;
        changeAmountElement.textContent = `${numberFormat(nonNegativeChangeAmount)}`;
    }

    function MoneyInput() {
        updatePembayaranDetails();
    }

    function openPembayaran() {
        const modal = document.getElementById('modalPembayaran')
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        updatePembayaranDetails()
    }

    function closePembayaran() {
        const modal = document.getElementById('modalPembayaran')
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.getElementById('money').value = 0
        calculateTotal()
    }

    function deleteAll() {
        const keranjang = document.getElementById('keranjang');
        keranjang.innerHTML = '';
        calculateTotal()

        const addButtons = document.querySelectorAll('button[onclick^="addProductToCart"]');
        addButtons.forEach(button => {
            button.disabled = false;
            button.classList.remove('pointer-events-none')
        });
    }

    // Fungsi untuk membuat elemen HTML di keranjang
    function createProductCard({
        imagePath,
        id,
        name,
        price,
        quantity
    }) {
        return `
      <div class="flex gap-2 w-full cards card-barang">
        <div class="bg-Neutral/20 p-2 rounded-xl w-[30%]">
          <img src="../public/Assets/img/jajan.png" alt="${name}">
        </div>
        <div class="flex flex-col justify-between w-[70%]">
          <p class="text-Neutral/100 font-semibold text-sm overflow-hidden whitespace-nowrap text-ellipsis p-barang">
            ${name}
          </p>
          <p class="text-Primary-blue text-xs font-semibold pricing">${numberFormat(price)}</p>
          <div class="flex justify-between items-center">
            <p class="text-sm text-Neutral/100 font-medium" id="quantity_${id}"> ${quantity} Barang</p>
            <div class="flex justify-between items-center gap-3 bg-Neutral/20 rounded-full">
              <img src="../public/Assets/svg/minus.svg" alt="minus" class="p-2 rounded-full border border-Neutral/40 bg-white cursor-pointer" onclick="adjustQuantity(this, -1)" title="kurang">
              <p class="quantityValue">${quantity}</p>
              <img src="../public/Assets/svg/plus.svg" alt="plus" class="p-2 rounded-full bg-Neutral/100 border border-Neutral/100 cursor-pointer" onclick="adjustQuantity(this, 1)" title="tambah">
            </div>
          </div>
        <p class="id-barang" hidden>${id}</p>
        <p class="price-barang" hidden>${price}</p>
        </div>
      </div>
    `;
    }

    // Fungsi untuk menghitung total harga barang di keranjang
    function calculateTotal() {
        const productCards = document.querySelectorAll('.cards');
        const totalElement = document.querySelector('.price');
        totalElement.textContent = 'Rp 0,00'
        total = 0;

        productCards.forEach((productCard) => {
            const priceElement = productCard.querySelector('.pricing');
            const quantityElement = productCard.querySelector('.quantityValue');

            if (priceElement && quantityElement) {
                // Mengambil teks harga dari elemen dan mengonversi ke angka
                const priceText = priceElement.textContent.replace(/[^\d]/g, ''); // Hanya menyisakan digit
                const price = Number(priceText) / 100 ||
                    0;
                const quantity = parseInt(quantityElement.textContent, 10);

                total += price * quantity;
            }

        });

        // Perbarui tampilan total

        totalElement.textContent = numberFormat(total);

        return total;
    }

    /// Fungsi untuk menangani penambahan atau pengurangan jumlah barang
    function adjustQuantity(element, amount) {
        const quantityElement = element.parentElement.querySelector('.quantityValue');

        let currentQuantity = parseInt(quantityElement.textContent, 10);

        currentQuantity += amount;

        if (currentQuantity >= 0) {
            const productId = element.closest('.flex.gap-2.w-full').querySelector('.id-barang').textContent;
            const quantityId = `quantity_${productId}`;
            document.getElementById(quantityId).textContent = `${currentQuantity} Barang`;
            quantityElement.textContent = currentQuantity;

            // Hapus elemen jika jumlah menjadi 0
            if (currentQuantity === 0) {
                const productCard = element.closest('.flex.gap-2.w-full');

                const addButton = document.querySelector(`#cart${productId}`);
                console.log(addButton)

                if (addButton) {
                    addButton.disabled = false;
                    addButton.classList.remove('pointer-events-none');
                }

                productCard.remove();
            }

            calculateTotal(); // Perbarui total setelah penyesuaian jumlah
        }
    }

    // Fungsi untuk memformat angka sebagai mata uang
    function numberFormat(number) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(number);
    }

    // Fungsi untuk menambah produk ke dalam keranjang
    function addProductToCart(button, img, id, name, price) {
        const keranjang = document.getElementById('keranjang');
        const productData = {
            img,
            id,
            name,
            price,
            quantity: 1
        }; // Mulai dengan jumlah 1
        keranjang.innerHTML += createProductCard(productData);
        calculateTotal();

        button.disabled = true;
        button.classList.add('pointer-events-none')
    }

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

    async function sendData() {
        // Mengambil nilai dari tabel
        const keranjang = document.getElementById('keranjang');
        const rows = keranjang.querySelectorAll('.card-barang');

        let data = [];

        // Iterasi melalui setiap baris section
        rows.forEach((e) => {
            // Menambahkan data ke dalam array
            data.push({
                idBarang: e.querySelector('.id-barang').textContent,
                quantity: parseInt(e.querySelector('.quantityValue').textContent),
                price: parseInt(e.querySelector('.price-barang').textContent) * parseInt(e
                    .querySelector('.quantityValue').textContent)
            });
        })

        // send data ke php
        let Url = '<?= BASEURL; ?>/operatortransaksi/setTransaksi';

        try {
            const response = await fetch(Url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            location.reload();

        } catch (error) {

            console.error('Error during data submission:', error);
        }
    }
</script>

<script>

</script>
