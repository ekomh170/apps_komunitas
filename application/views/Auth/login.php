  <!--css  -->
  <style type="text/css">
    .koliiii{
      background: 
    }

  </style>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <img src="<?= base_url('assets/img/logo3.png')?>" class="img-responsive center-block" width="150" height="150" alt="logo">
                    <h1 class="h4 text-gray-900 mb-4"><b>Login</b></h1>
                  </div>
                  
                  <?= $this->session->flashdata('message'); ?>

                  <form class="user" action="<?=base_url('Auth'); ?>" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                     <?= form_error('email', '<small class="form-text text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Password">
                      <?= form_error('password', '<small class="form-text text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>  
                      <button type="sumbit" class="btn btn-info btn-user btn-block">
                      Login
                      </button>
                  </form>
                  <hr>
                  <span style="float: right">
                    <div class="text-info">
                      <a class="small" href="<?= base_url('Auth/register'); ?>">Buat Account yang Blom Punya Komunitas</a>
                    </div>
                  </span>  
                  <div class="text-info">
                    <a class="small" href="<?= base_url('Auth/register2'); ?>">Buat Account yang Sudah Punya Komunitas</a>
                  </div>
                  <hr>
                  <div class="text-center text-info">
                    <a class="small" href="<?= base_url('Auth/lupapassword')?>">Lupa Pasword!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  
