<div class="container">
  <h1 class="text-dark"><b>Form Ubah Data</b></h1> 
  <div class="card">
    <div class="card-body">
         <form action="<?= base_url('Komunitas/ubah/') . $tb_komunitas['id_komunitas'] ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_komunitas" value="<?= $tb_komunitas['id_komunitas']; ?>">  
        <div class="form-group">
          <label for="nama_komunitas"><b>Nama Komunitas :</b></label>
          <input type="text" class="form-control" id="nama_komunitas" name="nama_komunitas" placeholder="Masukan Nama Komunitas" value="<?= $tb_komunitas['nama_komunitas'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('nama_komunitas') ?></u></b></small>
        </div>
         <div class="form-group">
          <div><b>Upload Foto Komunitas :</b></div>
          <input type="file" id="image" name="image" value="<?= $tb_komunitas['image'] ?>">
        </div>  
         <div class="form-group">
          <label for="daerah"><b>Daerah :</b></label>
          <input type="text" class="form-control" id="daerah" name="daerah" placeholder="Masukan Nama Daerah" value="<?= $tb_komunitas['daerah'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('daerah') ?></u></b></small>
        </div>
        <span style="float: right">
            <button type="submit" class="btn btn-success"><a href="<?= base_url('Komunitas/index'); ?>">Cancel</a></button>
        </span>    
        <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
       <?= form_close(); ?>
    </div>
  </div>
</div>
