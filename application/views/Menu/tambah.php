
<div class="container">
	<h1 class="text-dark"><b>Form Tambah Data</b></h1>	
  <div class="card">
    <div class="card-body">
      <?= form_open_multipart('Menu/tambah'); ?>
        <div class="form-group">
          <label for="menu"><b>Nama Menu :</b></label>
          <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukan Nama Menu">
          <small class="form-text text-danger"><b><u><?= form_error('menu') ?></u></b></small>
        </div>
        <span style="float: right">
          <button type="submit" class="btn btn-success"><a href="<?= base_url('Menu/index'); ?>">Cancel</a></button>
        </span>
        <button type="submit" name="tambah" value="tambah" class="btn btn-success">Tambah</button>
      <?= form_close(); ?>
    </div>
  </div>
</div>

