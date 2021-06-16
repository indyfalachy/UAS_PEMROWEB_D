<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title" style="text-align: center"> Daftar Nasabah dan Saldo</h2>
                    <?php if ($_SESSION['role'] == 2){ ?>
                    <a href="<?= BASEURL ?>transaksi/create" type="button" class="btn btn-primary btn-sm"
                       style="margin-right: ">
                        Kirim sampah
                        <?php } ?>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Jenis Sampah</th>
                            <th>Jumlah sampah</th>
                            <th>Total Harga</th>
                            <th>Catatan</th>
                            </thead>
                            <tbody>
                            <?php foreach ($data['transaksi'] as $transaksi) : ?>
                                <tr>
                                    <td><?= $transaksi['name'] ?></td>
                                    <td><?= $transaksi['jumlah'] ?></td>
                                    <td><?= $transaksi['jumlah'] * $transaksi['harga'] ?></td>
                                    <td><?= $transaksi['deskripsi'] ?></td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>