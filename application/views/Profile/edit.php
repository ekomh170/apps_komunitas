<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><b><?= $judul; ?></b></h1>
  <div class="row">
    <div class="col-lg-8">
      <?= form_open_multipart('Profile/edit'); ?>
      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama_komunitas" class="col-sm-2 col-form-label">Nama Komunitas</label>
        <div class="col-sm-10">
          <input type="nama_komunitas" class="form-control" id="nama_komunitas" name="nama_komunitas" value="<?= $user['id_komunitas']; ?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="nama" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $user['tgl_lahir']; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
          <input type="alamat" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-2">Foto</div>
        <div class="col-sm-10">
          <div class="row">
            <div class="col-sm-3">
              <img src="<?= base_url('assets/img/') . $user['image'];?>" class="img-thumbnail">
            </div>

            <div class="col-sm-9">
              <div class="custom-file">
                <input type="file" id="image" name="image">
              </div>  
            </div>

            <div class="form-group row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Edit</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>