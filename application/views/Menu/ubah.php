<div class="container">
  <h1 class="text-dark"><b>Form Ubah Data</b></h1> 
  <div class="card">
    <div class="card-body">
      <form action="<?= base_url('Menu/ubah/') . $user_menu['id'] ?>" method="post">
         <input type="hidden" name="id" value="<?= $user_menu['id']; ?>">    
        <div class="form-group">
          <label for="menu"><b>Nama Menu :</b></label>
          <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukan Nama Menu" value="<?= $user_menu['menu'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('menu') ?></u></b></small>
        </div>
        <span style="float: right">
            <button type="submit" class="btn btn-success"><a href="<?= base_url('Menu/index'); ?>">Cancel</a></button>
        </span>    
        <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
      </form>
    </div>
  </div>
</div>
