<div class="content">
    <h3 style="text-align: center">FORM TAMBAH TIPE SAMPAH</h3>
    <br>
    <br>
    <form method="post" action="<?= BASEURL; ?>tipesampah/tambah">
        <div class="form-group">
            <label for="tipesampah">Tipe Sampah</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama sampah" required>

        </div>
        <div class="form-group">
            <label for="Harga">Harga</label>
            <input type="number" name="harga" class="form-control" id="exampleInputPassword1" placeholder="Harga perkliogram" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>