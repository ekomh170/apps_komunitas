<div class="container">
    <h1 class="text-dark">
        <center><b>Form Tambah Diskusi</b></center>
    </h1>
    <br>
    <div class="card">
        <div class="card-body">
            <?= form_open_multipart('Post/tambah'); ?>
            <div class="form-group">
                <label for="nama_pertanyaan"><b>Judul Pertanyaan :</b></label>
                <input type="text" class="form-control" id="judul_post" name="judul_post" placeholder="Masukan Judul Post" required>
                <small class="form-text text-danger"><b><u><?= form_error('judul_post') ?></u></b></small>
            </div>
            <div class="form-group">
                <label for="isi_pertanyaan"><b>Isi Pertanyaan :</b></label>
                <textarea class="form-control" id="isi_post" name="isi_post" placeholder="Masukan Isi Post" rows="3" required></textarea>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Foto</div>
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-11">
                            <div class="custom-file">
                                <input type="file" id="image" name="image">

                            </div>
                        </div>
                        <!-- <span style="float: right">
          <button type="submit" class="btn btn-success"><a href="<?= base_url('Saran/index'); ?>">Cancel</a></button>
        </span> -->
                        <button type="submit" name="tambah" value="tambah" class="btn btn-success">Tambah</button>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>