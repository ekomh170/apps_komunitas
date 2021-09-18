  
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
      
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">>
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <img src="<?= base_url('assets/img/logo3.png')?>" class="img-responsive center-block" width="150" height="150" alt="logo">
                    <h1 class="h4 text-gray-900 mb-2"><b>Lupa Password !!</b></h1>
                    <p class="mb-4"><b>Lupa Password</b> agar anda bisa mengakses akun anda</p>
                      <?= $this->session->flashdata('message'); ?>
                  </div>
                  <form class="user" action="<?=base_url('Auth/lupapassword'); ?>" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="email" placeholder="Masukan Email">
                      <?= form_error('email', '<small class="form-text text-danger pl-3">','</small>'); ?>
                    </div>
                    <button type="sumbit" class="btn btn-info btn-user btn-block">
                      Lupa Password
                      </button>
                  </form>
                  <hr>
                  <span style="float: right">
                    <div class="text-info">
                      <a class="small" href="<?= base_url('Auth/register'); ?>">Buat Account yang Blom Punya Komunitas</a>
                    </div>
                  </span><br><hr>  
                  <div class="text-info">
                    <a class="small" href="<?= base_url('Auth/register2'); ?>">Buat Account yang Sudah Punya Komunitas</a>
                  </div>
                  <hr>
                  <div class="text-center text-info">
                    <a class="small" href="<?= base_url('Auth')?>">Sudah Punya Akun?Login !</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


