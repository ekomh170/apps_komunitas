<div class="container">
	<h1 class="text-dark"><b>Form Tambah Data</b></h1>	
  <div class="card">
    <div class="card-body">
      <?= form_open_multipart('Sub/tambah'); ?>
        <div class="form-group">
          <label for="id_menu"><b>Kode Menu :</b></label>
          <input type="text" class="form-control" id="id_menu" name="id_menu" placeholder="Masukan Kode Menu">
          <small class="form-text text-danger"><b><u><?= form_error('id_menu') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="title"><b>Judul :</b></label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Masukan Judul">
           <small class="form-text text-danger"><b><u><?= form_error('title') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="url"><b>URL :</b></label>
          <input type="text" class="form-control" id="url" name="url" placeholder="Masukan URL">
           <small class="form-text text-danger"><b><u><?= form_error('url') ?></u></b></small>
        </div>  
        <div class="form-group">
          <label for="icon"><b>Icon :</b></label>
          <input type="text" class="form-control" id="icon" name="icon" placeholder="Masukan Nama Icon">
           <small class="form-text text-danger"><b><u><?= form_error('icon') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="is_active"><b>Status :</b></label>
          <input type="text" class="form-control" id="is_active" name="is_active" placeholder="Masukan Status Menggunakan Angka">
           <small class="form-text text-danger"><b><u><?= form_error('is_active') ?></u></b></small>
        </div>
        <span style="float: right">
          <button type="submit" class="btn btn-success"><a href="<?= base_url('Sub/index'); ?>">Cancel</a></button>
        </span>      
        <button type="submit" name="tambah" value="tambah" class="btn btn-success">Tambah</button>
      <?= form_close(); ?>
    </div>
  </div>
</div>

