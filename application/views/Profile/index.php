<center>
<div class="container">
    <div class="col-xl-6 col-lg-8 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0"> 
            	<div class="card">
              		<h4 class="card-header text-center"><b>Data Lengkap Mahasiswa</b></h4>
              		<div class="card-body">
                	    <h4 class="card-title"><b>Nama : </b><?= $user['nama']; ?></h4>
                		<h6 class="card-text"><b>Nama Komunitas : </b><?= $user['id_komunitas']; ?></h6>
                		<h6 class="card-text"><b>Email : </b><?= $user['email']; ?></h6>
                        <h6 class="card-text"><b>Alamat : </b><?= $user['alamat']; ?></h6>
                        <h6 class="card-text"><b>Tanggal Lahir : </b><?= $user['tgl_lahir']; ?></h6>
                        <br>
                        <h6 class="card-text text-center"><img src="<?= base_url('assets/img/') . $user['image'] ?>" height="200" width="200"></h6>
                		<br>
                		<a href="<?= base_url('profile/edit')?>" class="btn btn-info"> Edit Profile </a>
              		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
