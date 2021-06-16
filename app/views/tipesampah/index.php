<div class="content">
    <h3 style="text-align: center">JENIS SAMPAH</h3>
    <br>
    <a href="<?= BASEURL; ?>tipesampah/create" class="btn btn-danger"> Tambah</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['tipesampah'] as $loop=>$sampah) : ?>
        <tr>
            <th scope="row"><?= $loop+1 ?></th>
            <td><?= $sampah['name'] ?></td>
            <td><?= $sampah['harga'] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>