<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
    <h1 class="h3 mb-2 text-dark"><b>Data Komunitas</b></h1>
    <p></p>
    <!--<p lass="mb-4"></p>-->
    <?php if( $this->session->flashdata('berhasil') ) : ?>
    <script src="<?= base_url('assets/'); ?>vendor/js/sweetalert2.all.min.js"></script>    
    <script>
        Swal.fire({
            icon: 'success',
            title: "Data Komunitas",
            text: "Data Berhasil <?php echo $this->session->flashdata('berhasil'); ?>",
            timer: 1500,
            showConfirmButton: true,
            type: 'success'
        });
    </script>   
	<?php endif; ?>
    <span style="float: right">
    </span>
    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
        <a href="<?= base_url(); ?>Komunitas/tambah" class="btn btn-block btn-dark bg-info"><b>+ Data Baru</b></a>
    </div>
	<br>
	<!-- DataTales Exakmse -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        	<h6 class="m-0 font-weight-bold text-dark">Database Komunitas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"  id="table1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    	<th>No</th>
                    	<th>Nama Komunitas</th>
                        <th>Foto Komunitas</th>    
                    	<th>Jumlah Member</th>
                        <th>Daerah</th>
                        <th>Kapan Dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $no = 1;
                    foreach ( $tb_komunitas as $kms ) :
                    	$id_komunitas = $kms['id_komunitas'];
                    	$nama_komunitas = $kms['nama_komunitas'];
                        $image = $kms['image'];
                        $jumlah_member = $kms['jumlah_member'];
                        $daerah = $kms['daerah'];
                        $data_created=$kms['data_created'];
                    ?>
						<tr>
                    		<td><?= $no; ?></td>
                    		<td><?= $nama_komunitas; ?></td>
                            <td><img src="<?= base_url('assets/img/') . $image ?>" height="100" width="100"></td>
                    		<td><?= $jumlah_member; ?></td>
                            <td><?= $daerah; ?></td>
                            <td><?= $data_created; ?></td>
                    		<td>
                                <a href="<?= base_url(); ?>Komunitas/edit/<?= $kms['id_komunitas']; ?>"><button type="button" class="btn btn-success"><i class="fas fa-fw fa-edit"></i></button></a> <b>|</b>
                                <a href="<?= base_url(); ?>Komunitas/hapus/<?= $kms['id_komunitas']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ??');"><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a><b> | </b>

                                <a href="<?= base_url(); ?>Komunitas/joinkomunitas/<?= $kms['id_komunitas']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ??');"><button type="button" class="btn btn-warning"><i class="fas fa-fw fa-check"></i></button></a>
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