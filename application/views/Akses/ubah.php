
<div class="container">
  <h1 class="text-dark"><b>Form Ubah Data</b></h1> 
  <div class="card">
    <div class="card-body">
      <form action="<?= base_url('Akses/ubah/') . $user_menu_akses['id'] ?>" method="post">
         <input type="hidden" name="id" value="<?= $user_menu_akses['id']; ?>">    
        <div class="form-group">
          <label for="id_role"><b>Kode Role :</b></label>
          <input type="text" class="form-control" id="id_role" name="id_role" placeholder="Masukan Nama" value="<?= $user_menu_akses['id_role'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('id_role') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="id_menu"><b>Kode Menu :</b></label>
          <input type="text" class="form-control" id="id_menu" name="id_menu" placeholder="Masukan Nama" value="<?= $user_menu_akses['id_menu'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('id_menu') ?></u></b></small>
        </div>
        <span style="float: right">
            <button type="submit" class="btn btn-success"><a href="<?= base_url('Menu/index'); ?>">Cancel</a></button>
        </span>    
        <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
      </form>
    </div>
  </div>
</div>
