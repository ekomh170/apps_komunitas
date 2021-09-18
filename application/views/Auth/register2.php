<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <img src="<?= base_url('assets/img/logo3.png')?>" class="img-responsive center-block" width="150" height="150" alt="logo">
              <br><br>
              <h1 class="h4 text-gray-900 mb-4"><b>Buat Akun Yang Sudah Punya Komunitas</b></h1>
            </div>
            <form class="user" method="post" action="<?= base_url('Auth/register2')?>">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                <?= form_error('nama', '<small class="form-text text-danger pl-3">','</small>'); ?>
              </div>
              <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="form-text text-danger pl-3">','</small>'); ?>
              </div>
              <div class="form-group">
                <select class="form-control" id="nama_komunitas" name="nama_komunitas">
                  <option value="">--Pilih Komunitas--</option>
                  <?php foreach ($tb_komunitas as $value) { ?>
                    <option value="<?= $value->id_komunitas ?>"><?= $value->nama_komunitas?></option>
                  <?php } ?>
                </select>
                <?= form_error('nama_komunitas', '<small class="form-text text-danger pl-3">','</small>'); ?>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                  <?= form_error('password1', '<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password">
                  <?= form_error('password2', '<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-info btn-user btn-block">
                  Register
              </button>
            </form>
            <hr>
            <div class="text-info">
              <a class="small" href="<?= base_url('Auth/register'); ?>">Buat Akun dan Buat Komunitas</a>
            </div>
            <!-- <div class="text-info">
              <a class="small" href="<?= base_url('Auth/register2'); ?>">Buat Akun dan Join Komunitas</a>
            </div> -->
            <hr>
            <div class="text-center text-info">
              <a class="small" href="<?= base_url('Auth/lupapasword'); ?>">Lupa Password?</a>
            </div>
            <div class="text-center text-info">
              <a class="small" href="<?= base_url('Auth/index'); ?>">Punya Akun? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

  