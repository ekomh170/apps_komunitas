<div class="container">
	<h1 class="text-dark"><center><b>Form Tambah Diskusi</b></center></h1>	
  <br>
  <div class="card">
    <div class="card-body">
      <?= form_open_multipart('Saran/tambah'); ?>
        <div class="form-group">
          <label for="nama_pertanyaan"><b>Judul Pertanyaan :</b></label>
          <input type="text" class="form-control" id="nama_pertanyaan" name="nama_pertanyaan" placeholder="Masukan Judul Pertanyaan" required>
          <small class="form-text text-danger"><b><u><?= form_error('nama_pertanyaan') ?></u></b></small>
        </div>
        <div class="form-group">
    <label for="isi_pertanyaan"><b>Isi Pertanyaan :</b></label>
    <textarea class="form-control" id="isi_pertanyaan" name="isi_pertanyaan" placeholder="Masukan Isi Pertanyaan" rows="3" required></textarea>
  </div>
        <!-- <span style="float: right">
          <button type="submit" class="btn btn-success"><a href="<?= base_url('Saran/index'); ?>">Cancel</a></button>
        </span> -->
        <button type="submit" name="tambah" value="tambah" class="btn btn-success">Tambah</button>
      <?= form_close(); ?>
    </div>
  </div>
</div>
