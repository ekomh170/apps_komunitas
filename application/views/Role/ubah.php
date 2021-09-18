<div class="container">
  <h1 class="text-dark"><b>Form Ubah Data</b></h1> 
  <div class="card">
    <div class="card-body">
      <form action="<?= base_url('Role/ubah/') . $user_role['id'] ?>" method="post">
         <input type="hidden" name="id" value="<?= $user_role['id']; ?>">    
        <div class="form-group">
          <label for="role"><b>Nama Role :</b></label>
          <input type="text" class="form-control" id="role" name="role" placeholder="Masukan Nama Role" value="<?= $user_role['role'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('role') ?></u></b></small>
        </div>
        <span style="float: right">
            <button type="submit" class="btn btn-success"><a href="<?= base_url('Role/index'); ?>">Cancel</a></button>
        </span>    
        <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
      </form>
    </div>
  </div>
</div>
