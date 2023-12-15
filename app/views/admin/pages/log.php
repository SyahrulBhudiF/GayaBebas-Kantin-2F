<section class="flex flex-col fadeIn p-4 gap-2 w-full h-screen">
    <div class="flex flex-col bg-Neutral/10 rounded-[1.25rem] p-6 gap-6 h-[87%] laptop2:h-[85%]">
        <!-- Start table -->
        <div class="overflow-auto">
            <table class="table-auto w-full px-3">
                <thead class="bg-Neutral/20 rounded-thead">
                    <tr>
                        <th class="tableHead">No</th>
                        <th class="tableHead">Nama Operator</th>
                        <th class="tableHead">Aksi Operator</th>
                        <th class="tableHead">Tanggal Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data['log'] as $data) : ?>
                        <tr>
                            <td class="tableContent text-Neutral/60"><?= $no; ?></td>
                            <td class="tableContent"><?= $data['nama_user']; ?></td>
                            <td class="tableContent"><?= $data['aksi']; ?></td>
                            <td class="tableContent"><?= tgl_indo($data['tgl_aksi']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End Table -->
    </div>
</section>