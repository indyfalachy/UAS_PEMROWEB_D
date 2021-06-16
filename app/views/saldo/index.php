<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title" style="text-align: center"> Daftar Nasabah dan Saldo</h2>   kop'

                    <button type="button" class="btn btn-primary btn-sm" style="margin-right: ">Rekap Transaksi dan saldo
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th class="text-right">Saldo</th>
                            </thead>
                            <tbody>
                            <?php foreach ($data['users'] as $user) : ?>
                                <tr>
                                    <td>
                                        <?= $user['name'] ?>
                                    </td>
                                    <td>
                                        <?= $user['email'] ?>
                                    </td>
                                    <td>
                                        <?= $user['address'] ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $user['saldo'] ?>
                                    </td>
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