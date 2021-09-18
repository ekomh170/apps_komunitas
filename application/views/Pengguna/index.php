<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
    <h1 class="h3 mb-2 text-dark"><b>Akun Data Pengguna</b></h1>
    <p></p>
    <!--<p lass="mb-4"></p>-->
    <?php if( $this->session->flashdata('berhasil') ) : ?>
    <script src="<?= base_url('assets/'); ?>vendor/js/sweetalert2.all.min.js"></script>    
    <script>
        Swal.fire({
            icon: 'success',
            title: "Data User",
            text: "Data Berhasil <?php echo $this->session->flashdata('berhasil'); ?>",
            timer: 1500,
            showConfirmButton: true,
            type: 'success'
        });
    </script>   
	<!--<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">Data Pengguna<strong>Berhasil</strong> <?= $this->session->flashdata('berhasil'); ?>
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  				</button>	
			</div>
		</div>
	</div>-->
	<?php endif; ?>	
	<div>
        <form action="" method="post" class="form-inline">
            <input class="form-control mr-sm-1" type="search" placeholder="Search" name="cari" aria-label="Search">
            <button class="btn btn-outline-info my-1 my-sm-0" type="submit">Search</button>
        </form>
	</div>
	<br>
	<!-- DataTales Exadue -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        	<h6 class="m-0 font-weight-bold text-dark">Database User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    	<th>No</th>
                    	<th class="text-center">Nama</th>
                    	<th class="text-center">Email</th>
                        <th>Komunitas</th>
                    	<th>Kode Role</th>
                    	<th>Status</th>
                    	<th class="text-center">Dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                   $no = 1;
                    foreach ( $data as $du ) :
                    	$id=$du['id'];
                    	$nama=$du['nama'];
                        $email=$du['email'];
                        $id_komunitas=$du['nama_komunitas'];
                        $id_role=$du['id_role'];
                        $is_active=$du['is_active'];
                        $data_created=$du['data_created'];
                    ?>
						<tr>
                    		<td><?= $no; ?></td>
                    		<td><?= $nama; ?></td>
                    		<td><?= $email; ?></td>
                            <td><?= $id_komunitas; ?></td>
                    		<td><?= $id_role; ?></td>
                    		<td><?= $is_active; ?></td>
                    		<td><?= $data_created; ?></td>
                            <td class="text-center">
                                <!--Izin Akses-->
                                <?php if ($this->session->userdata('id_role') == "1") { ?>
                                <?php if ($du['is_active'] == '0') { ?>
                                    <?= anchor(base_url('Pengguna/aktif/') . $du['id'], '<button type="button" class="btn btn-warning"><i class="fas fa-lock"></i></button>')?> <b>|</b>
                                <?php } ?>
                                <!--nonaktif-->
                                <?php if ($du['is_active'] == '1') { ?>
                                <?= anchor(base_url('Pengguna/nonaktif/') . $du['id'], '<button type="button" class="btn btn-warning"><i class="fas fa-ban"></i></button>')?> <b>|</b>
                                <?php } }?>
                                <!--Hapus-->
                                <a href="<?= base_url(); ?>Pengguna/hapus/<?= $du['id']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ??');"><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>
                            </td>
                    	</tr>
                    <?php $no++ ?>
                    <?php endforeach; ?>
                 </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->