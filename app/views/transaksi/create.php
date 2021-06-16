<div class="content">
    <h2 style="text-align: center">FORM TRANSAKSI</h2>
    <form action="<?= BASEURL; ?>transaksi/tambah" method="post">
        <div class="form-group">
            <label for="Sampah Botol Plastik">Jenis Sampah</label>
            <select name="tipe_sampah_id" id="" class="form-control"
                    style="padding-top: 10px;padding-bottom: 10px;height: 50px">
                <?php foreach ($data['tp'] as $tipe) : ?>
                    <option value="<?= $tipe['id'] ?>"><?= $tipe['name'] . " " . $tipe['harga'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="Catatan">Jumlah</label>
            <input type="number" id="sampah" name="jumlah" class="form-control" placeholder="Satuan Kilogram" value="0">
        </div>

        <div class="form-group">
            <label for="Catatan">Catatan</label>
            <textarea class="form-control" id="Catatan" rows="3" name="deskripsi" placeholder="Catatan ..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>