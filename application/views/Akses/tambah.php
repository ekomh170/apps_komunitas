
<div class="container">
	<h1 class="text-dark"><b>Form Tambah Data</b></h1>	
  <div class="card">
    <div class="card-body">
      <?= form_open_multipart('Akses/tambah'); ?>
        <div class="form-group">
          <label for="id_role"><b>Kode Role :</b></label>
          <input type="text" class="form-control" id="id_role" name="id_role" placeholder="Masukan Nama">
          <small class="form-text text-danger"><b><u><?= form_error('id_role') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="id_menu"><b>Kode Menu :</b></label>
          <input type="text" class="form-control" id="id_menu" name="id_menu" placeholder="Masukan Nama">
          <small class="form-text text-danger"><b><u><?= form_error('id_menu') ?></u></b></small>
        </div>
        <span style="float: right">
          <button type="submit" class="btn btn-success"><a href="<?= base_url('Akses/index'); ?>">Cancel</a></button>
        </span>
        <button type="submit" name="tambah" value="tambah" class="btn btn-success">Tambah</button>
      <?= form_close(); ?>
    </div>
  </div>
</div>

