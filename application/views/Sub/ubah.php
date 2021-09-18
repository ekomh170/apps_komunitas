<div class="container">
  <h1 class="text-dark"><b>Form Ubah Data</b></h1> 
  <div class="card">
    <div class="card-body">
      <form action="<?= base_url('Sub/ubah/') . $user_sub_menu['id'] ?>" method="post">
         <input type="hidden" name="id" value="<?= $user_sub_menu['id']; ?>">    
        <div class="form-group">
          <label for="id_menu"><b>Kode Menu :</b></label>
          <input type="text" class="form-control" id="id_menu" name="id_menu" placeholder="Masukan Kode Menu" value="<?= $user_sub_menu['id_menu'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('id_menu') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="title"><b>Judul :</b></label>
          <input type="text" class="form-control" id="title" name="title" value="<?= $user_sub_menu['title'] ?>" placeholder="Masukan Judul">
          <small class="form-text text-danger"><b><u><?= form_error('title') ?></u></b></small>
        </div>  
        <div class="form-group">
          <label for="url"><b>URL :</b></label>
          <input type="text" class="form-control" id="url" name="url" value="<?= $user_sub_menu['url'] ?>" placeholder="Masukan Judul">
          <small class="form-text text-danger"><b><u><?= form_error('url') ?></u></b></small>
        </div>  
        <div class="form-group">
          <label for="icon"><b>Icon :</b></label>
          <input type="text" class="form-control" id="icon" name="icon" value="<?= $user_sub_menu['icon'] ?>" placeholder="Masukan Nomer Telpon">
          <small class="form-text text-danger"><b><u><?= form_error('icon') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="is_active"><b>Status :</b></label>
          <input type="text" class="form-control" id="is_active" name="is_active" value="<?= $user_sub_menu['is_active'] ?>" placeholder="Masukan Status">
          <small class="form-text text-danger"><b><u><?= form_error('is_active') ?></u></b></small>
        </div>
        <br>
        <span style="float: right">
            <button type="submit" class="btn btn-success"><a href="<?= base_url('Sub/index'); ?>">Cancel</a></button>
        </span>    
        <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
      </form>
    </div>
  </div>
</div>
