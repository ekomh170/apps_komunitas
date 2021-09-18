<div class="container">
	<h1 class="text-dark"><b>Form Tambah Data</b></h1>	
  <div class="card">
    <div class="card-body">
      <?= form_open_multipart('Role/tambah'); ?>
        <div class="form-group">
          <label for="role"><b>Nama Role :</b></label>
          <input type="text" class="form-control" id="role" name="role" placeholder="Masukan Nama Role">
          <small class="form-text text-danger"><b><u><?= form_error('role') ?></u></b></small>
        </div>
        <span style="float: right">
          <button type="submit" class="btn btn-success"><a href="<?= base_url('Role/index'); ?>">Cancel</a></button>
        </span>
        <button type="submit" name="tambah" value="tambah" class="btn btn-success">Tambah</button>
      <?= form_close(); ?>
    </div>
  </div>
</div>

